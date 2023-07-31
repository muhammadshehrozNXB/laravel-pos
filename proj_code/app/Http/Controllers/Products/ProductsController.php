<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\ProductTypes\ProductTypeRepositoryInterface;
use App\Repositories\Products\ProductsRepositoryInterface;

class ProductsController extends Controller
{
    public $data = [];
    private $productsRepository;
    private $productTypeRepository;

    public function __construct(ProductTypeRepositoryInterface $productTypeRepository, ProductsRepositoryInterface $productsRepository)
    {
        $this->productTypeRepository = $productTypeRepository;
        $this->productsRepository = $productsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = $this->productsRepository->allProducts();
        $this->data['title'] = "Products list";
        $this->data['pageTitle'] = 'Products list';
        return view('admin.products.dashboard', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['prodTypes'] = $this->productTypeRepository->allProductTypes();
        $this->data['products'] = $this->productsRepository->allProducts();
        $this->data['title'] = "Products list";
        $this->data['pageTitle'] = 'Products list';
        return view('admin.products.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'product_type_id' => 'required|numeric|min:0|not_in:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->productsRepository->storeProducts($request->all());
            return response()->json(['success' => 'Product added successfully']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['prod'] = $this->productsRepository->findProducts($id);
        $this->data['prodTypes'] = $this->productTypeRepository->allProductTypes();
        $this->data['id'] = $id;
        $this->data['title'] = "Edit Products Types";
        $this->data['pageTitle'] = 'Product Detail';
        return view('admin.products.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'product_type_id' => 'required|numeric|min:0|not_in:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->productsRepository->updateProducts($request->all(), $request->id);
            return response()->json(['success' => 'Product edited successfully']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productsRepository->destroyProducts($id);
        return back();
    }
}
