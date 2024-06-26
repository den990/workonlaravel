<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create(ProductRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user();
        $data['author_id'] = $user->id;
        if (isset($data['img_id'])) {

            $file = $request->file('img_id');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');


            $fileModel = new File;
            $fileModel->file_name = $filePath;
            $fileModel->save();
            $data['img_id'] = $fileModel->id;
        }

        Product::create($data);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('product.products_list', compact('products'));
    }

    public function view($id)
    {
        $product = Product::findOrFail($id);
        return view('product.view', compact('product'));
    }
}
