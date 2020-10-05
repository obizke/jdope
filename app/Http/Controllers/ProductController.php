<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use App\Notifications\OrderRequest;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $products = $this->productRepository->paginate(6);

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'nature'=>'required',
            'size'=>'required',
            'photo'=>'image|nullable|max:4999'
        ]);
        // handle file upload
        if ($request->hasFile('photo')) {
        //  get filename with extensions
          $filenameWithExt=$request->file('photo')->getClientOriginalName();
          // get file name
          $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
          // get the extension
          $extension=$request->file('photo')->getClientOriginalExtension();
          // file name to store
          $fileNameToStore=$filename.'_'.time().'.'.$extension;
          //upload image
          $path=$request->file('photo')->storeAs('public/shop',$fileNameToStore);
        }else{
          $fileNameToStore='noimage.jpg';
        }
        // saving to the database
        $products =new Product;
        $products->name=$request->input('name');
        $products->description=$request->input('description');
        $products->nature=$request->input('nature');
        $products->size=$request->input('size');
        $products->price=$request->input('price');
        $products->photo=$fileNameToStore;
        $products->save();
        Flash::success('Product saved successfully.');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);
        if ($product->photo != 'noimage.jpg') {
            // delete the image
            Storage::delete('public/shop/'.$product->photo);
  
          }

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
