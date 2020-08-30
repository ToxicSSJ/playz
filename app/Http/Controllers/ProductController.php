<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    
    public $listProducts = array();

    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);

        if($product == null) {
            return redirect()->route('home.index');
        }

        $listOfSizes = array("XS","S","M","L","XL");

        $data["title"] = $product->getName();
        $data["product"] = $product;
        $data["sizes"] = $listOfSizes;
        return view('product.show')->with("data",$data);
    }


    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["products"] = Product::all();

        return view('product.create')->with("data",$data);
    }

    /*public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|gt:0"
        ]);

        // dd($request->all());
        $val = array("name"=>$request->name, "price"=>$request->price);
        array_push($this->listProducts, $val);

        end($this->listProducts);
        $id = key($this->listProducts);
        $val["id"] = $id;

        $data = [];
        $listOfSizes = array("XS","S","M","L","XL");

        $data["title"] = $val["name"];
        $data["product"] = $val;
        $data["sizes"] = $listOfSizes;

        return view('product.saved')->with("data", $data);
        //here goes the code to call the model and save it to the database
    }*/

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);
        Product::create($request->only(["name","price"]));

        return back()->with('success','Item created successfully!');
    }

    public function saved($name, $price)
    {
        return view('product.saved')->with("data", null); // iwp
    }

}
