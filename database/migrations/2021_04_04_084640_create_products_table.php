<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price');
            $table->string('photo');

            /// 1:
            // Define Relationship
            // To create foreign key in the migration we need to perform 2 line steps
            // It is basically 1 to 1 relationship
            // As we know foreign key always take reference from other table
            // Here "on('categories')" represents the "categories" table
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            // TODO 2:
            // Foreign column creation alternative way:
            // It means relate category to product so category_id will be foreign key
           // $table->integer('category_id')->unsigned()->index(); // Index() helps to speed the database index

            // TODO 3:
            // -----------------------------
            // category_id references "categories" table
            // and the id column Basically this line is telling us. $table->foreignId('category_id')
            // and constrained() means we have a "foreign key" as a constrained()

            // also we can add onDelete('cascade') It means when when category is deleted the product is
            // also deleted.
            // -----------------------------
          //  $table->foreignId('category_id')->constrained()->onDelete('cascade');


            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
