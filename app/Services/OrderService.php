<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderService
{

    public function getOrders ()
    {

        return Order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.company_name as customer_name')
            ->get();
    }

    public function getCustomer(Request $request)
    {
        $query = $request->input('q');
        $customer = Customer::select('id','company_name')
            ->where('company_name', 'like', "%{$query}%")
                ->orWhere('customer_id_name', 'like', "%{$query}%")->get();

        return $this->handleSearchCustomerData($customer);
    }

    public function saveOrder(Request $request)
    {
        $order = new Order();

        $order->customer_id = $request->customer_id;
        $order->order_id_name = $request->order_id_name;
        $order->creation_date = date('Y-m-d H:i:s');
        $order->due_date = date('Y-m-d H:i:s');
        $order->amount = 0;
        $order->save();
    }

    public function  getDetail($id) {
        $order = Order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.company_name as customer_name')
            ->where('orders.id', $id)
            ->first();
        return $order;
    }

    public function createOrderId() {

        $order = Order::orderBy('id', 'desc')->first();
        $year = date('Y');

        if ($order) {
            $nextId = $order->id + 1;
        } else {
            $nextId = 1;
        }

        $orderId = $year . '-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        return $orderId;
    }
    private function handleSearchCustomerData($customers) {

        $arr = [];
        $items = [];
        $customers = $customers->toArray();
        foreach ($customers as $customer) {
            $items [] = [
                'id' => $customer['id'],
                'text' => $customer['company_name']
            ];
        }
        return [
            'items' => $items,
            'total_count' => count($items)
        ];
    }

}
