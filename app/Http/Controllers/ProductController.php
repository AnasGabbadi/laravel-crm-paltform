<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest; 
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where("user_id", "=", Auth::user()->user_id)->get()
        ->merge(Product::where("user_id", "=", Auth::user()->team_id)->get());
            return view('products.index',[
                'products' => $products
            ]);
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
     * @param  \Illuminate\Http\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {   
        try {
            $data = $request->validated();
            $data['user_id'] = Auth::user()->id;
    
            if ($request->hasFile('photo')) {
                $fileName = time().$request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('images', $fileName, 'public');
                $data['photo'] = '/storage/'.$path;
            }
            Product::create($data);
            return redirect()->route('products')->with('success', 'Product added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
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
        return view('products.edit', compact('product'));
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
        $product->update($request->all());
        return redirect()->route('products')->with('success', 'product updated successfully');
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
  
        return redirect()->route('products')->with('success', 'product deleted successfully');
    }
}
