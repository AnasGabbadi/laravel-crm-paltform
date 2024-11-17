<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register() 
    {
        return view('auth.form');
    }

    public function registerSave(Request $request) 
    {
        $user = Auth::user();
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
        $level = $request->filled('level') ? $request->level : 'admin';
        $user_id = $request->filled('user_id') ? $request->user_id : 0;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $level,
            'user_id' => $user_id,
        ]);
        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.form');
    }

    public function loginAction(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $user = Auth::user();
            $user->update(['user_id' => $user->id]);
            if ($user->level === 'admin' || $user->level === 'teamAdmin') {
                return redirect()->route('dashboard',['user'=>$user->id]);
            } elseif ($user->level === 'administration') {
                return redirect()->route('dashboardAdministration');
            } else {
                return '<h1>404 | Erreur</h1>';
            }
        }
    
        throw ValidationException::withMessages([
            'email' => trans('auth.failed')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    public function dashboard()
    {  
        $products = Product::where("user_id", "=", Auth::user()->user_id)->get()
        ->merge(Product::where("user_id", "=", Auth::user()->team_id)->get());

        $orders = Order::where("user_id", "=", Auth::user()->user_id)->get()
        ->merge(Order::where("user_id", "=", Auth::user()->team_id)->get());

        $totalProducts = $products->count(); 
        $totalOrders = $orders->count(); 
        $totalUsers = User::count();
        $inProgressOrders = $orders->where('condition', 'In_Progress')->count();
        $deliveredOrders = $orders->where('condition', 'Delivered')->count();
        $deliveredOrderList = $orders->where('condition', 'Delivered');
        
        $data = $deliveredOrderList->groupBy(function($order) {
            return Carbon::parse($order->updated_at)->format('H:i');
        });
        
        $times = [];
        $orderCount = [];
        foreach($data as $time => $values) {
            $times[] = $time;
            $orderCount[] = count($values);
        }

        $canceledOrders = $orders->where('condition', 'Canceled')->count();
        $confirmdOrders = $orders->where('condition', 'Confirmed')->count();
        $orderQuantity = $orders->where('quantity')->count();

        return view('dashboard', compact('totalProducts', 'totalOrders', 'totalUsers'
        , 'inProgressOrders','deliveredOrders','canceledOrders','confirmdOrders',
        'orders','products','orderQuantity','deliveredOrderList', 'times', 'orderCount'));
    }

    public function profile()
    {
        return view('profile');
    }
}
