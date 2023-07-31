<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\Products\ProductsRepositoryInterface;
use App\Repositories\Suppliers\SuppliersRepositoryInterface;
use App\Repositories\PurchaseOrder\PurchaseOrderRepositoryInterface;

class PurchaseOrderController extends Controller
{

    public $data = [];
    private $productsRepository;
    private $suppliersRepository;
    private $purchaseOrderRepository;

    public function __construct(ProductsRepositoryInterface $productsRepository, SuppliersRepositoryInterface $suppliersRepository, PurchaseOrderRepositoryInterface $purchaseOrderRepository)
    {
        $this->productsRepository = $productsRepository;
        $this->suppliersRepository = $suppliersRepository;
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['purchaseOrder'] = $this->purchaseOrderRepository->allPurchaseOrder();
        $this->data['title'] = "Purchase Order list";
        $this->data['pageTitle'] = 'Purchase Order';
        return view('admin.purchase-order.dashboard', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['products'] = $this->productsRepository->allProducts();
        $this->data['suppliers'] = $this->suppliersRepository->allSuppliers();
        $this->data['title'] = "Purchase Order list";
        $this->data['pageTitle'] = 'Purchase Order list';
        return view('admin.purchase-order.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'supplier_id' => 'required|numeric|min:0|not_in:0',
            'product_id' => 'required|numeric|min:0|not_in:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->purchaseOrderRepository->storePurchaseOrder($request->all());
            return response()->json(['success' => 'Purchase order successfully']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['products'] = $this->productsRepository->allProducts();
        $this->data['suppliers'] = $this->suppliersRepository->allSuppliers();
        $this->data['purchaseOrder'] = $this->purchaseOrderRepository->findPurchaseOrder($id);
        $this->data['id'] = $id;
        $this->data['title'] = "Edit Purchase Order";
        $this->data['pageTitle'] = 'Purchase Order';
        return view('admin.purchase-order.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'supplier_id' => 'required|numeric|min:0|not_in:0',
            'product_id' => 'required|numeric|min:0|not_in:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->purchaseOrderRepository->updatePurchaseOrder($request->all(), $request->id);
            return response()->json(['success' => 'Purchase Order edited successfully']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->purchaseOrderRepository->destroyPurchaseOrder($id);
        return back();
    }
}
