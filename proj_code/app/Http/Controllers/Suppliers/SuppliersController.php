<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\Suppliers\SuppliersRepositoryInterface;

class SuppliersController extends Controller
{

    public $data = [];
    private $suppliersRepository;

    public function __construct(SuppliersRepositoryInterface $suppliersRepository)
    {
        $this->suppliersRepository = $suppliersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['suppliers'] = $this->suppliersRepository->allSuppliers();
        $this->data['title'] = "Suppliers";
        $this->data['pageTitle'] = 'Suppliers';
        return view('admin.suppliers.dashboard', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = "Add Supplier";
        $this->data['pageTitle'] = 'Supplier';
        return view('admin.suppliers.create', $this->data);
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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->suppliersRepository->storeSuppliers($request->all());
            return response()->json(['success' => 'Supplier added successfully']);

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
        $this->data['suppliers'] = $this->suppliersRepository->findSuppliers($id);
        $this->data['id'] = $id;
        $this->data['title'] = "Edit Supplier";
        $this->data['pageTitle'] = 'Supplier';
        return view('admin.suppliers.edit', $this->data);
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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->suppliersRepository->updateSuppliers($request->all(), $request->id);
            return response()->json(['success' => 'Supplier edited successfully']);

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
        $this->suppliersRepository->destroySuppliers($id);
        return back();
    }
}
