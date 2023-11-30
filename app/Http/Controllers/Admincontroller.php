<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;

class Admincontroller extends Controller
{
    public function view_categorie()
    {
        $data = Categorie::all();
        return view("admin.categorie", compact('data'));
    }
    public function add_categorie(Request $request)
    {
        $data = new Categorie;
        $data->name = $request->name;
        $data->save();
        return redirect()->back()->with('message', 'catégorie ajouter avec succes');
    }
    public function delete_categorie($id)
    {
        $data = Categorie::find($id);
        dd();
        $data->delete();
        return redirect()->back()->with('message', 'catégorie supprimer avec succes');
    }
    public function voir_product()
    {
        $category = Categorie::all();
        return view('admin.product', compact('category'));
    }
    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->categorie = $request->categorie;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();
        return redirect()->back()->with('message', 'produit ajouter avec succes');
    }
    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }
    public function supprimer($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'produit supprimer avec succes');
    }

    public function update_product($id)
    {
        $product = product::find($id);
        $category = categorie::all();
        return view('admin.update_product', compact('product', 'category'));
    }
    public function add_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }


        $product->save();
        return redirect()->back()->with('message', 'produit modifier avec succes');
    }
}
