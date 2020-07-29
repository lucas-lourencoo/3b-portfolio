<?php

namespace App\Http\Controllers;

use App\Entities\Bull;
use App\Entities\Product;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $groups = DB::table('groups')->get();
        $brands = DB::table('brands')->get();

        return view('admin.product.add', [
            'categories' => $categories,
            'groups' => $groups,
            'brands' => $brands,
            'update' => false
        ]);
    }

    public function editar($id)
    {
        $categories = DB::table('categories')->get();
        $groups = DB::table('groups')->get();
        $brands = DB::table('brands')->get();
        $product = DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brand')
            ->join('categories', 'categories.id', '=', 'products.category')
            ->where('products.id', $id)
            ->get([
                'products.*',
                'brands.name as brand',
                'categories.name as category'
            ])
            ->first();

        $animals = DB::table('animals')
            ->where('product', $product->id)
            ->get();

        return view('admin.product.add', [
            'update' => true,
            'categories' => $categories,
            'groups' => $groups,
            'brands' => $brands,
            'product' => $product,
            'animals' => $animals
        ]);
    }

    public function list()
    {
        $products = DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brand')
            ->join('categories', 'categories.id', '=', 'products.category')
            ->get([
                'products.*',
                'brands.name as brand',
                'categories.name as category'
            ]);
        $datatable = DataTables::of($products);

        return $datatable->blacklist(['action'])->make(true);
    }

    private function add_img($image, $product_id)
    {
        $rand = $product_id . strval(mt_rand());
        $nameFile = $rand . "." . $image->getClientOriginalExtension();

        // save the large image
        $resize_large = Image::make($image)->orientate()->fit(1200, 1440)->encode();
        Storage::put($nameFile, $resize_large);
        Storage::move($nameFile, 'public/large/' . $nameFile);

        // save the normal image
        $resize_image = Image::make($image)->orientate()->fit(460, 552)->encode();
        Storage::put($nameFile, $resize_image);
        Storage::move($nameFile, 'public/products/' . $nameFile);

        return $nameFile;
    }

    private function save_animal($animals, $product)
    {
        foreach ($animals as $animal) {
            DB::table('animals')->insert([
                'product' => $product,
                'name' => $animal
            ]);
        }
    }

    private function update_animal($animals, $product)
    {
        DB::table('animals')->where('product', $product)->delete();
        foreach ($animals as $animal) {
            DB::table('animals')->insert([
                'name' => $animal,
                'product' => $product
            ]);
        }
    }

    public function insert(Request $request)
    {
        try {
            $product = new Product();
            $product->id = rand(1000, 9999);
            $product_id = $product->id;
            $product->name = $request->input('name');
            $product->code = $request->input('code');
            $product->price = number_format(\floatval($request->input('price')), 2, '.', '');
            $product->gross_weight = $request->input('gross_weight');
            $product->weight = $request->input('weight');
            $product->segment = $request->get('segment');
            $product->brand = $request->get('brand');
            $product->bull = $request->get('bull');
            $product->category = $request->get('category');
            $product->recommendation = $request->get('recomend');
            $product->description = $request->get('description');

            if ($request->hasFile('img1') && $request->file('img1')->isValid()) {
                $image = $request->file('img1');
                $product->image = $this->add_img($image, $product_id);
            }
            if ($request->hasFile('img2') && $request->file('img2')->isValid()) {
                $image = $request->file('img2');
                $product->image2 = $this->add_img($image, $product_id);
            }
            $product->save();

            //Salvar o animal
            if ($request->get('animal'))
                $this->save_animal($request->get('animal'), $product_id);

            return redirect()->route('admin.produto.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.produto.gerenciar', ['result' => 1, 'e' => $e->getMessage()]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $product = Product::find($id);
            $product_id = $product->id;
            $product->name = $request->input('name');
            $product->code = $request->input('code');
            $product->price = number_format(\floatval($request->input('price')), 2, '.', '');
            $product->gross_weight = $request->input('gross_weight');
            $product->weight = $request->input('weight');
            $product->segment = $request->get('segment');
            $product->brand = $request->get('brand');
            $product->bull = $request->get('bull');
            $product->category = $request->get('category');
            $product->recommendation = $request->get('recomend');
            $product->description = $request->get('description');

            Storage::delete('public/large/' . $product->image);
            Storage::delete('public/products/' . $product->image);

            if ($product->image2) {
                Storage::delete('public/large/' . $product->image2);
                Storage::delete('public/products/' . $product->image2);
            }

            if ($request->hasFile('img1') && $request->file('img1')->isValid()) {
                $image = $request->file('img1');
                $product->image = $this->add_img($image, $product_id);
            }
            if ($request->hasFile('img2') && $request->file('img2')->isValid()) {
                $image = $request->file('img2');
                $product->image2 = $this->add_img($image, $product_id);
            }
            $product->save();

            //Salvar os animais
            if ($request->get('animal'))
                $this->update_animal($request->get('animal'), $product_id);

            return redirect()->route('admin.produto.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.produto.gerenciar', ['result' => 1, 'e' => $e->getMessage()]);
        }
    }

    public function excluir($id)
    {
        try {
            $product = Product::find($id);

            Storage::delete('public/large/' . $product->image);
            Storage::delete('public/products/' . $product->image);

            if ($product->image2) {
                Storage::delete('public/large/' . $product->image2);
                Storage::delete('public/products/' . $product->image2);
            }

            DB::table('animals')->where('product', $id)->delete();
            DB::table('products')->delete($id);
            return redirect()->route('admin.produto.gerenciar', ['result' => 2]);
        } catch (Exception $e) {
            return redirect()->route('admin.produto.gerenciar', ['result' => 1]);
        }
    }
}
