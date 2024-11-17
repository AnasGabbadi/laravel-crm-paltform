<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderCreateRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where("user_id", "=", Auth::user()->user_id)->get()
        ->merge(Order::where("user_id", "=", Auth::user()->team_id)->get());
        return view('orders.index',[
            'orders' => $orders
        ]);
    }

    public function simulator()
    {
        return view('orders.simulator');
    }

    public function search()
    {
        return view('agents.search');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        Order::create($data);
        return redirect()->route('orders')->with('success', 'Order added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
  
        return view('orders.edit', compact('order'));
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
        $order = Order::findOrFail($id);
  
        $order->update($request->all());
  
        return redirect()->route('orders')->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
  
        $order->delete();
  
        return redirect()->route('orders')->with('success', 'product deleted successfully');
    }

    public function displayOrder(Request $request)
    {
        $code = $request->input('code');
        $order = Order::where('barcode', $code)->first();
        $totalOrdersWithSameProductCode = Order::groupBy('barcode')->count();
        $totalOrdersWithSameProductDelivered = Order::where('condition', 'Delivered')->count();
        $totalOrdersWithSameProductConfirm = Order::where('condition', 'Confirm')->count();

        if ($order) {
            return view('orders.simulatorOrder', ['order' => $order], compact(
                'totalOrdersWithSameProductCode','totalOrdersWithSameProductDelivered',
                'totalOrdersWithSameProductConfirm'
            )); 
        } else {
            return redirect()->route('orders.simulator')->with('error', 'Commande introuvable.');
        }
    }

    public function displayAgent(Request $request)
    {
        $totalTeamUsers = User::where('level', 'TeamAdmin')->count();
        $date = $request->input('date');
        $created_at = Order::where('created_at', $date)->first();
        $code = $request->input('code');
        $order = Order::where('product_code', $code)->first();
        $totalOrdersWithSameProductCode = Order::groupBy('product_code')->count();
        $totalOrdersWithSameProductDelivered = Order::where('product_condition', 'Delivered')->count();
        $totalOrdersWithSameProductConfirm = Order::where('product_condition', 'Confirm')->count();

        if ($order) {
            return view('agents.simulatorAgent', ['order' => $order], compact(
                'totalOrdersWithSameProductCode','totalOrdersWithSameProductDelivered',
                'totalOrdersWithSameProductConfirm','totalTeamUsers','created_at'
            )); 
        } else {
            return redirect()->route('agents.search')->with('error', 'Commande introuvable.');
        }
    }
}
