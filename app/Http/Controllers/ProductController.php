<?php

namespace App\Http\Controllers;

use App\Entities\Bull;
use App\Entities\Product;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $groups = DB::table('groups')->get();
        $brands = DB::table('brands')->get();

        return view('admin.product.add', ['categories' => $categories, 'groups' => $groups, 'brands' => $brands]);
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

    private function save_bull($bull, $product)
    {
        DB::table('bulls')->insert([
            'product_id' => $product,
            'description' => $bull
        ]);
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
            $product->category = $request->get('category');
            $product->recommendation = $request->get('recommendation');
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

            //Salvar a bula
            if($request->get('bull'))
                $this->save_bull($request->get('bull'), $product_id);

            return redirect()->route('admin.produto.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.produto.gerenciar', ['result' => 1, 'e' => $e->getMessage()]);
        }
    }
}
