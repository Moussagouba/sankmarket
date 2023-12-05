<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class Homecontroller extends Controller
{
    public function index()
    {
        $product = Product::paginate(3);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == "1") {
            return view("admin.home");
        } else {
            $product = Product::paginate(3);
            return view('home.userpage', compact('product'));
        }
    }
    public function details($id)
    {
        $product = Product::find($id);
        return view('home.details', compact('product'));
    }
    public function add_cart(Request $request, $id)
    {

        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->adresse = $user->adresse;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            if ($cart->price = $product->discount_price != null) {
                $cart->price = $product->discount_price * $cart->quantity = $request->quantity;
            } else {
                $cart->price = $product->price * $cart->quantity = $request->quantity;
            }
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
        } else {
            return redirect('login');
        }


        return view('home.showcart', compact('cart'));
    }
    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message', 'produit rétirer du panier avec succes');
    }
    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where("user_id", "=", $userid)->get();
        foreach ($data as $data) {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->adresse = $data->adresse;
            $order->phone = $data->phone;
            $order->image = $data->image;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Paiement à la livraison';
            $order->delivery_status = 'En Traitement';

            $order->save();

            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();
        }
        return redirect()->back()->with('message', 'votre orde a été transmise .Nous vous tiendrons au courant pour la suite');
    }
    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }
}
