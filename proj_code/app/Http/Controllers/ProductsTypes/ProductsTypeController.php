<?php

namespace App\Http\Controllers\ProductsTypes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\ProductTypes\ProductTypeRepositoryInterface;

class ProductsTypeController extends Controller
{
    public $data = [];
    private $productTypeRepository;

    public function __construct(ProductTypeRepositoryInterface $productTypeRepository)
    {
        $this->productTypeRepository = $productTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['prodTypes'] = $this->productTypeRepository->allProductTypes();
        $this->data['title'] = "Products Types";
        $this->data['pageTitle'] = 'Products Types';
        return view('admin.product-types.dashboard', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = "Add Products Types";
        $this->data['pageTitle'] = 'Products Types';
        return view('admin.product-types.create', $this->data);
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
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->productTypeRepository->storeProductTypes($request->all());
            return response()->json(['success' => 'Product Type added successfully']);

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
        $this->data['prodType'] = $this->productTypeRepository->findProductTypes($id);
        $this->data['id'] = $id;
        $this->data['title'] = "Add Products Types";
        $this->data['pageTitle'] = 'Products Types';
        return view('admin.product-types.edit', $this->data);
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
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->productTypeRepository->updateProductTypes($request->all(), $request->id);
            return response()->json(['success' => 'Product Type edited successfully']);

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
        $this->productTypeRepository->destroyProductTypes($id);
        return back();
    }
}
