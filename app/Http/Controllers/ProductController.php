<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // Q: What does it mean?
        /**
         * We will got photo with random name `photo/34432g23h4j32hj4.png`
         * It was uploaded in `storage/app/photo` (We have a new storage called photo Laravel created!)
         * So After that, We can store the database filename with directory in the database.
         * Actual filename was in the `storage` folder.
         * These are the default settings and these files are not publicly accessible.
         * But you can access the image with URL something like this:
         * basic.test/photos/435345345.png
         * Error: It will not found.
         * Why?
         * The `config/filesystems.php` has default array "disks" 'local' &
         * 'public'. Inside the store('photos' , OnWhichDiskYourDirectoryCreated)
         * Now Second parameter is important and we enter "public".
         * Now our storage will be inside "storage/public/photos" directory.
         * ----------
         * But Here is the problem In Real world laravel only show assets from the root
         * "/public" directory and our storage means photos are located at the "/storage/public"
         * So we have to use symlink or shortcut strategy.
         * If you symlink storage/app/public, all containing folders will be served there
         * the only thing that changes is that the content itself is not actually within
         * public, it is just referenced there.
         * "php artisan storage:link"
         * It will create the symlink.
         */
        $path = $request->file('photo')->store('photos', 'public');
        //dd($path); //dump&die

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'photo' => $path
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'photo' => ''
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
