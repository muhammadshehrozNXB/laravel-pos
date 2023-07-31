<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\Customers\CustomersRepositoryInterface;

class CustomerController extends Controller
{

    public $data = [];
    private $customersRepository;

    public function __construct(CustomersRepositoryInterface $customersRepository)
    {
        $this->customersRepository = $customersRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['customers'] = $this->customersRepository->allCustomers();
        $this->data['title'] = "Customers";
        $this->data['pageTitle'] = 'Customers';
        return view('admin.customers.dashboard', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = "Add Customers";
        $this->data['pageTitle'] = 'Customers';
        return view('admin.customers.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'avatar' => 'required|mimes:jpeg,png,jpg|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->customersRepository->storeCustomers($request);
            return response()->json(['success' => 'Customer added successfully']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['customer'] = $this->customersRepository->findCustomers($id);
        $this->data['id'] = $id;
        $this->data['title'] = "Edit Customers";
        $this->data['pageTitle'] = 'Customers';
        return view('admin.customers.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'avatar' => 'mimes:jpeg,png,jpg|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        try {

            $this->customersRepository->updateCustomers($request, $request->id);
            return response()->json(['success' => 'Product Type edited successfully']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->customersRepository->destroyCustomers($id);
        return back();
    }
}
