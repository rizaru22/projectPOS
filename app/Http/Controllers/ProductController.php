<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    //

    public function index()
    {
        $product=Product::all(); 
        return view('product.index',[
            "title"=>"Product",
            "data"=>$product
        ]);
    }

    public function create():View
    {
        return view('product.create')->with([
            "title" => "Tambah Data Product",
            "data"=>Category::all()
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "description"=>"nullable",
            "stock"=>"required",
            "price"=>"required",
            "category_id"=>"required"
        ]);
        
        Product::create($request->all());
        return redirect()->route('produk.index')->with('success','Data Produk Berhasil Ditambahkan');
    }

    public function edit(Product $produk):View
    {
        return view('product.edit',compact('produk'))->with([
            "title" => "Ubah Data Produk",
            "data"=>Category::all()
        ]);
    }
    
    public function update(Product $produk, Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "description"=>"nullable",
            "stock"=>"required",
            "price"=>"required",
            "category_id"=>"required"
        ]);

        $produk->update($request->all());
        return redirect()->route('produk.index')->with('updated','Data Produk Berhasil Diubah');
    }
    public function destroy($id):RedirectResponse
    {
        
        Product::where('id',$id)->delete();
        return redirect()->route('produk.index')->with('deleted','Data Produk Berhasil Dihapus');
    }

    public function show():View
    {
        $product=Product::all();
        return view('product.show')->with([
            "title" => "Tampil Data Produk",
            "data"=>$product
        ]);
    }
    public function code($id): View
{
    $product = Product::find($id);

    if ($product) {
        $code = str_pad($product->id, 5, '0', STR_PAD_LEFT); // Menghasilkan kode berdasarkan ID
        $stock = $product->stock;
        $codes = array_fill(0, $stock, $code); // Buat array berisi kode yang sama sebanyak jumlah stok

        for ($i = 0; $i < $stock; $i++) {
            // Lakukan tindakan yang sesuai dengan penggunaan barang
            // Contoh: Logika untuk penggunaan barang
        }

        return view('product.code')->with([
            "title" => "Tampil Data Produk",
            "product" => $product,
            "codes" => $codes, // Mengirim array kode ke tampilan
        ]);
    }

    return "ID barang tidak ditemukan.";
}

}
