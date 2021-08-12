<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
   
    public function index()
    {
        return view('products.index');
    }

   
    public function getProducts(Request $request, Product $product)
    {
        $data = $product->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function ($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditProductData" data-id="' . $data->id . '">Edit</button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteProductModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

   
    public function store(Request $request, Product $product)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $product->storeData($request->all());

        return response()->json(['success' => 'Product added successfully']);
    }

    
    public function edit($id)
    {
        $product = new Product;
        $data = $product->findData($id);

        $html = '<div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="title" id="editTitle" value="' . $data->name . '">
                </div>
                <div class="form-group">
                    <label for="Name">Description:</label>
                    <textarea class="form-control" name="description" id="editDescription">' . $data->description . '                        
                    </textarea>
                </div>';

        return response()->json(['html' => $html]);
    }

    
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $product = new Product;
        $product->updateData($id, $request->all());

        return response()->json(['success' => 'Product updated successfully']);
    }

   
    public function destroy($id)
    {
        $product = new Product;
        $product->deleteData($id);

        return response()->json(['success' => 'Product deleted successfully']);
    }
}