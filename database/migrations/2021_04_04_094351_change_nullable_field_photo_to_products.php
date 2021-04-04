<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// To change column without losing data:
// It means you're modifying the column for this you have to
// install the package named "doctrine/dbal"
// "composer require doctrine/dbal" then it is possible to modifying the column
// with migration but this time the migration will be different not
// Schema::create() instead of Schema::table('products')
class ChangeNullableFieldPhotoToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('photo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('photo')->nullable(false)->change();
        });
    }
}
