<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Attribute;
use App\PointOfSale;

class PointsOfSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$pos = POS::orderBy('created_at','desc')->paginate(10); //pagination   
        return view('pointsofsale.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pointsofsale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request, [
            'pos_name' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999|required'
        ]); */

        #Get all Products and store it on the database
        $products = array();
        $products_dict = array();

        for($x = 1; $request->input('product'.$x) !== null ; $x++){
            array_push($products, $request->input('product'.$x));
        }
        #print_r($request->input('product'.'1'.'a'.'1'.'name'));
        #print_r($request->input('product'.'1'.'a'.'1'.'value'));
        #print_r($products);
        
        #Get all the Product's attribute
        for($i = 1; $i <= count($products); $i++){
            for($x = 1; $x <= 10; $x++){

                #print_r($products[$i - 1]);
                #print_r('attribute'.$x);
                #print_r(['name' => $request->input('product'.$i.'a'.$x.'name')]);
                #print_r(['value' => $request->input('product'.$i.'a'.$x.'value')]);

                if($request->input('product'.$i.'a'.$x.'name') == '' 
                ||$request->input('product'.$i.'a'.$x.'value') == ''){
                    break;
                }

                array_push($products_dict, 
                    [ 
                        $products[$i - 1] => 
                        [ 
                            'attribute'.$x =>
                            [
                                'name' => $request->input('product'.$i.'a'.$x.'name'),
                                'value' => $request->input('product'.$i.'a'.$x.'value')
                            ]
                        ]
                    ]
                );

                
                print_r('<br> iteration ' . $x);
                print_r($products_dict);
            }
        } 


        #print_r('<br> end ');
        #print_r($products_dict);
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
        #print_r($products_dict);
        #print_r($products_dict[0]);
        #print_r($products_dict[0]['NAME']['attribute1']);
        #print_r($products_dict[0]['NAME']['attribute1']['name']);
        #print_r($products_dict[0]['NAME']['attribute1']['value']);
        foreach($products_dict as $product)
        {
            #print_r('<br>');
            #print_r(array_keys($product)[0]);
            #print_r($product[array_keys($product)[0]]); //Gets 
        }
/*
        $pos = new PointOfSale;
        $pos->name = $request->input('pos_name');
        $pos->description = $request->input('description');
        $pos->cover_image = $fileNameToStore;
        $pos->user_id = auth()->user()->id;

        $pos->save();

        #print_r($pos->id);

        


        foreach
            $product = new Product;
            $product->name = $products_dict[$i - 1];
            $product->pos_id = $pos->id;
            print_r("ASDASDASDASDASDAS");
            print_r(array_keys((string)$products_dict[$i - 1]));
            #$product->save();
        } 

        foreach($age as $x=>$x_value)
  {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
  } */

        #print_r($products_dict);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pointsofsale.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
