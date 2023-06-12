<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    
    public function index() {

        $search = request('search');

        if($search) {
            $products = Product::where([
                ['modelo', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $products = Product::all();
        }
    
        return view('welcome',['products' => $products, 'search' => $search]);

    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $product = new Product;

        $product->modelo = $request->modelo;
        $product->fabricante = $request->fabricante;
        $product->descricao = $request->descricao;
        $product->preco = $request->preco;

        // image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $product->image = $imageName;

        }

        $user = auth()->user();
        $product->user_id = $user->id;

        $product->save();

        return redirect('/')->with('msg', 'Produto registrado!');
    }

    public function show($id) {
        $product = Product::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        $productOwner = User::where('id', $product->user_id)->first();

        return view('products.show', ['product' => $product, 'productOwner' => $productOwner, 'hasUserJoined' => $hasUserJoined]);

    }

    public function dashboard() {
            return redirect('/');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        if (auth()->user()->id === $product->user_id) {
            $product->delete();
            return redirect('/')->with('msg', 'Produto excluído com sucesso.');
        } else {
            return redirect('/')->with('err', 'Você não tem permissão para excluir este produto.');
        }
    }

    public function edit($id) {

        $user = auth()->user();
        $product = Product::findOrFail($id);

        if($user->id != $product->user->id){
            return redirect('/')->with('err', 'Você não tem permissão para alterar este produto.');
        } else {
            return view('products.edit', ['product' => $product]);
        }
        
    }

    public function update(Request $request){

        $data = $request->all();

        // image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $data['image'] = $imageName;

        }

        Product::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Produto editado com sucesso!');
    }

}
