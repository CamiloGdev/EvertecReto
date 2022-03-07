<?php

namespace App\Http\Controllers;

use App\Actions\StoreProductImagesAction;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        abort_if(Gate::denies('product_index'), 403);
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        //
        abort_if(Gate::denies('product_create'), 403);
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, StoreProductImagesAction $imagesAction): RedirectResponse
    {
        //
        $product = Product::create($request->only('ref', 'name', 'price', 'quantity', 'description'));

        $imagesAction->execute($request->images, $product);

        return redirect()->route('products.show', $product->id)->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product): View
    {
        //
        abort_if(Gate::denies('product_show'), 403);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
      abort_if(Gate::denies('product_edit'), 403);

      return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
     $product->update($request->only('ref', 'name', 'price', 'quantity', 'description'));

     return redirect()->route('products.show', $product->id)->with('success', 'Successful data update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
      abort_if(Gate::denies('product_destroy'), 403);

      $product->delete();

      return back();
    }
}
