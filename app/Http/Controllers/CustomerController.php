<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->customerService->saveCustomer($request);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');

    }

    public function show($id)
    {
        $customer = $this->customerService->getCustomerById($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
       $this->customerService->updateCustomer($request, $id);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $this->customerService->deleteCustomer($id);

        return redirect()->route('customers.index')->with('success', 'Customer has been deleted successfully.');
    }




}
