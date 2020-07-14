<?php

namespace App\Http\Controllers;

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

    private function add_img($image, $type, $product_id)
    {
        $rand = $product_id . strval(mt_rand());
        $nameFile = $rand . "." . $image->getClientOriginalExtension();

        if ($type == 1) {
            // save the thumb image
            $resize_thumb = Image::make($image)->orientate()->fit(275, 330)->encode();
            Storage::put($nameFile, $resize_thumb);   
            Storage::move($nameFile, 'thumbnails/'.$nameFile);
        }
        // save the large image
        $resize_large = Image::make($image)->orientate()->fit(1200, 1440)->encode();
        Storage::put($nameFile, $resize_large);
        Storage::move($nameFile, 'large/' . $nameFile);

        // save the normal image
        $resize_image = Image::make($image)->orientate()->fit(460, 552)->encode();
        Storage::put($nameFile, $resize_image);
        Storage::move($nameFile, 'products/' . $nameFile);

        return $nameFile;
    }

    public function insert(Request $request)
    {
        //try {
            $product = new Product();
            $product->id = rand(1000, 9999);
            $product_id = $product->id;
            $product->name = $request->input('name');
            $product->code = $request->input('code');
            $product->price = $request->input('price');
            $product->gross_weight = $request->input('gross_weight');
            $product->weight = $request->input('weight');
            $product->segment = $request->get('segment');
            $product->brand = $request->get('brand');
            $product->category = $request->get('category');
            $product->recommendation = $request->get('recommendation');
            $product->description = $request->get('description');
            
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $product->image = $this->add_img($image, 1, $product_id);
            }
            if ($request->hasFile('image2') && $request->file('image2')->isValid()) {
                $image = $request->file('image2');
                $product->image2 = $this->add_img($image, 2, $product_id);
            }
            $product->save();

            return redirect()->route('admin.produto.gerenciar', ['result' => 0]);
        //} catch (Exception $e) {
        //    return redirect()->route('admin.produto.gerenciar', ['result' => 1]);
        //}
    }
}
