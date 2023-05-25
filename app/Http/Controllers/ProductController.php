<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\InvoicePattern;
use App\Models\InvoiceType;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    private ProductRepositoryInterface $product;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->product = $productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $invoicePatterns = InvoicePattern::all();
        $companies = Company::all();
        return view('product.create',compact('invoicePatterns','companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->product->create($request->validated());
        return $this->product->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

}
