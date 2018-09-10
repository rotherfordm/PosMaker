<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Attribute;
use DB; //library for sql queries

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(10); //pagination   
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        $attributes = array();
        for($x = 1; $x < 20; $x++){
            if($request->input('t'.$x) !== null)
            {
                array_push($attributes, ["AttributeType".$x => $request->input('t'.$x),
                "AttributeName".$x => Input::get('value'.$x)]);
            }
        }

        //Cover Image upload
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $product = new Product;
        $product->name = $request->input('product_name');
        $product->user_id = auth()->user()->id;
        $product->cover_image = $fileNameToStore;
        $product->save();
        //$product = Product::find($id);
        //return $product;

        //Insert Every Attribute into the database
        $attribute_counter = 1;
        for($x = 0;$x < count($attributes); $x++)
        {
            $product_attribute = new Attribute;
            $product_attribute->type = $attributes[$x]["AttributeType".$attribute_counter];
            $product_attribute->name = $attributes[$x]["AttributeName".$attribute_counter];
            $product_attribute->product_id = $product->id;
            $product_attribute->save();
            $attribute_counter++;
        }

        return redirect('/products')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        //$attributes = DB::select('SELECT * FROM attributes where attributes.product_id = ' . $id );
        $attributes = Attribute::where('product_id', $id)->get();
        //return $attributes;
        return view('products.show')->with('product', $product)->with('attributes', $attributes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        
        if(auth()->user()->id !== $product->user_id){
            return redirect('/products')->with('error', 'Unauthorized Page');
        }
        return view('products.edit')->with('product', $product);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        
        $product = Product::find($id);
        //$product->title = $request->input('title');
        //$product->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $product->cover_image = $fileNameToStore;
        }
        
        $product->save();

        return redirect('/products')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(auth()->user()->id !== $product->user_id){
            return redirect('/products')->with('error', 'Unauthorized Page');
        }

        if($product->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$product->cover_image);
        }

        $product->delete();
        return redirect('/products')->with('success', 'Product Removed');
    }
}
