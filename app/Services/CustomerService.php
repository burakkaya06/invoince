<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\InvoiceAddress;
use App\Models\PaymentTerm;
use App\Models\ShippingAddress;
use App\Models\SpecialField;
use Illuminate\Http\Request;

class CustomerService
{

    public function saveCustomer(Request $request)
    {
        $data = $request->validate([
            'customer_id_name' => 'required|string',
            'company_name' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'additional_line' => 'nullable|string',
            'street_adress' => 'required|string',
            'zip_code' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            's_company_name' => 'required|string',
            's_first_name' => 'required|string',
            's_last_name' => 'required|string',
            's_additional_line' => 'nullable|string',
            's_street_adress' => 'required|string',
            's_zip_code' => 'required|string',
            's_city' => 'required|string',
            's_state' => 'required|string',
            's_country' => 'required|string',
            'skonto_percent' => 'required|numeric',
            'skonto_days' => 'required|numeric',
            'payment_window' => 'required|numeric',
            'vat' => 'required|string',
            'vat_number' => 'required|string',
            'custom_fields1' => 'nullable|string',
            'custom_fields2' => 'nullable|string'
        ]);


        $customer = Customer::create($data);


        $invoiceAddress = new InvoiceAddress($request->only([
            'additional_line', 'street_adress', 'zip_code', 'city', 'state', 'country'
        ]));
        $customer->invoiceAddress()->save($invoiceAddress);

        $shippingAddress = new ShippingAddress($request->only([
            's_company_name', 's_first_name', 's_last_name', 's_additional_line',
            's_street_adress', 's_zip_code', 's_city', 's_state', 's_country'
        ]));
        $customer->shippingAddress()->save($shippingAddress);

        $paymentTerm = new PaymentTerm($request->only([
            'skonto_percent', 'skonto_days'
            ,'payment_window', 'vat', 'vat_number']));
        $customer->paymentTerm()->save($paymentTerm);

        $specialField = new SpecialField($request->only(['custom_fields1', 'custom_fields2']));
        $customer->specialField()->save($specialField);


    }

    public function getAllCustomers(Request $request)
    {
        $query = $request->query('query');

        if($query) {
            $customers = Customer::select('id', 'company_name', 'customer_id_name')
                ->with('shippingAddress')
                ->where('customer_id_name', 'like', "%{$query}%")
                ->orderBy('id', 'desc')
                ->paginate(5)->appends(request()->query());
        } else {
            $customers = Customer::select('id', 'company_name', 'customer_id_name')
                ->with('shippingAddress')
                ->orderBy('id', 'desc')
                ->paginate(5);
        }
        return $customers;
    }

    public function getCustomerById($id)
    {
        $customer = Customer::with('shippingAddress')
            ->with('invoiceAddress')
            ->with('paymentTerm')
            ->with('specialField')
            ->findOrFail($id);
        return $customer;
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
    }

    public function updateCustomer(Request $request, $id)
    {

        $customer = Customer::findOrFail($id);

        $customer->update($request->only('company_name', 'first_name', 'last_name'));

        if($customer->shippingAddress) {
            $customer->shippingAddress->update($request->only(
                's_company_name',
                's_first_name',
                's_last_name',
                's_additional_line',
                's_street_adress',
                's_zip_code',
                's_city',
                's_state',
                's_country'));
        }

        if($customer->invoiceAddress) {
            $customer->invoiceAddress->update($request->only(
                'additional_line',
                'street_adress',
                'zip_code',
                'city',
                'state',
                'country'));
        }
        if($customer->paymentTerm) {
            $customer->paymentTerm->update($request->only(
                'skonto_percent',
                'skonto_days',
                'payment_window',
                'vat',
                'vat_number'));
        }

        if($customer->specialField) {
            $customer->specialField->update($request->only(
                'custom_fields1',
                'custom_fields2'));
        }
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    public function checkCustomerId(Request $request) {
        $customerId = $request->input('customer_id_name');
        $customer = Customer::where('customer_id_name', $customerId)->first();

        return response()->json(['exists' => !!$customer]);
    }

}
