<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct (OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index ()
    {
        $orders = $this->orderService->getOrders();
        return view('order.index' , compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create ()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (Request $request)
    {
        $this->orderService->saveOrder($request);
        return redirect()->route('order.index')->with('success' , 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show (string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (Request $request , string $id)
    {
        //
    }


    public function custom (Request $request)
    {
        $orders = $this->orderService->getCustomer($request);
        return $orders;
    }

    public function createOrderId ()
    {
        $orderId = $this->orderService->createOrderId();
        return $orderId;
    }

    public function detail(Request $request) {
        $order = $this->orderService->getDetail($request->id);
        return view('order.detail', compact('order'));
    }

}
