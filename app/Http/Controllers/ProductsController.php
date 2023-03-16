<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function list()
    {
        $products = Product::all();
        return response()->json(['products' => $products], 200);
    }

    public function info($product_id)
    {
        $product = Product::whereId($product_id)->first();
        $product_attributes = ProductAttribute::whereProductId($product_id)->get();

        foreach($product_attributes as $item) {
            $product[$item["key"]] = $item["value"];
        }

        return response()->json($product, 200);
    }

    public function delete($product_id)
    {

        Product::destroy($product_id);
        ProductAttribute::where('product_id', '=', $product_id)->delete();

        // TODO pārbaudīt vai nav kaut kādas problēmas dzēšot
        return response()->json(['status' => "ok"], 200);
    }

    public function create(Request $request)
    {
        $data = request()->post();

        if(!empty($data['products'])) {
            foreach($data['products'] as $item) {

                $product = Product::updateOrCreate([
                    'id'          => $item["id"],
                    'name'        => $item["name"],
                    'description' => $item["description"],
                ]);
            }
        }

        if(!empty($data['product_attributes'])) {
            foreach($data['product_attributes'] as $item) {
                $product = ProductAttribute::updateOrCreate([
                    'id'          => $item["id"],
                    'product_id'  => $item["product_id"],
                    'key'         => $item["key"],
                    'value'       => $item["value"],
                ]);
            }
        }

        // TODO pārbaudīt vai nav kaut kādas problēmas saglabājot
        return response()->json(['status' => "ok"], 200);
    }
}