<?php

namespace App\Services;

use App\Http\Enum\DocumentType;
use App\Http\Enum\OrderStatus;
use App\Models\Customer;
use App\Models\DocumentProducts;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Documents;
use Illuminate\Support\Facades\DB;

class DocumentService
{
    public function createConfirmation (Request $request)
    {
        $order = Order::find($request->order_id);


        $document = new Documents();
        $document->order_id_name = $order->order_id_name;
        $document->order_id = $order->id;
        $document->customer_id = $order->customer_id;
        $document->type = DocumentType::CONFIRMATION;
        $document->save();

    }

    public function indexConfirmation (Request $request)
    {
        $order = Order::find($request->id)->toArray();
        $customer = Customer::with('shippingAddress')->
        with('invoiceAddress')->
        with('paymentTerm')->
        with('specialField')
            ->find($order[ 'customer_id' ])
            ->toArray();

        $document = [];


        return $this->prepareConirmationContent($order , $customer , $document);
    }

    public function editConfirmation (Request $request)
    {

        $documentId = $request->id;
        $order = DB::select(" SELECT o.*
    FROM documents as d
    INNER JOIN orders as o ON d.order_id = o.id
    WHERE d.id = :documentId" , [ 'documentId' => $documentId ]);


        $order = json_decode(json_encode($order) , true)[0];
        $customer = Customer::with('shippingAddress')->
        with('invoiceAddress')->
        with('paymentTerm')->
        with('specialField')
            ->find($order[ 'customer_id' ])
            ->toArray();

        $document = Documents::where('id', $documentId)
            ->where('type' , DocumentType::CONFIRMATION)
            ->get()->toArray();


        return $this->prepareConirmationContent($order , $customer , $document);
    }

    public function searchCustomer (Request $request)
    {
        $customer = Customer::with('shippingAddress')->
        with('invoiceAddress')->
        with('paymentTerm')->
        with('specialField')
            ->find($request->customer_id)
            ->toArray();

        return $this->prepareCustomerContent($customer);
    }

    public function prepareCustomerContent ($customer)
    {
        $returnData = [];
        $returnData[ 'company_name' ] = $customer[ 'company_name' ];
        $returnData[ 'invoince_adress' ] = $customer[ 'invoice_address' ][ 'street_adress' ];
        $returnData[ 'invoince_city' ] = $customer[ 'invoice_address' ][ 'city' ];
        $returnData[ 'invoince_zip_code' ] = $customer[ 'invoice_address' ][ 'zip_code' ];
        $returnData[ 'invoince_state' ] = $customer[ 'invoice_address' ][ 'state' ];
        $returnData[ 'invoince_country' ] = $customer[ 'invoice_address' ][ 'country' ];
        $returnData[ 'name' ] = $customer[ 'first_name' ] . ' ' . $customer[ 'last_name' ];
        $returnData[ 'invoince_adress2' ] = $customer[ 'invoice_address' ][ 'street_adress' ];
        $returnData[ 'customer' ] = $customer[ 'customer_id_name' ];
        $returnData[ 'custom_fields1' ] = $customer[ 'special_field' ][ 'custom_fields1' ];
        $returnData[ 'custom_fields2' ] = $customer[ 'special_field' ][ 'custom_fields2' ];
        $returnData[ 'vatstring' ] = $customer[ 'payment_term' ][ 'skonto_days' ] . ' Days ' . $customer[ 'payment_term' ][ 'skonto_percent' ] . '%  Skonto, ' . $customer[ 'payment_term' ][ 'payment_window' ] . ' Days Net';
        $returnData[ 'vat_option' ] = $customer[ 'payment_term' ][ 'vat' ];
        $returnData[ 'vat_number' ] = $customer[ 'payment_term' ][ 'vat_number' ];

        return $returnData;
    }

    private function prepareConirmationContent ($order , $customer , $document)
    {

        $returnData = [];

        $returnData[ 'company_name' ] = $customer[ 'company_name' ];
        $returnData[ 'invoince_adress' ] = $customer[ 'invoice_address' ][ 'street_adress' ];
        $returnData[ 'invoince_city' ] = $customer[ 'invoice_address' ][ 'city' ];
        $returnData[ 'invoince_zip_code' ] = $customer[ 'invoice_address' ][ 'zip_code' ];
        $returnData[ 'invoince_state' ] = $customer[ 'invoice_address' ][ 'state' ];
        $returnData[ 'invoince_country' ] = $customer[ 'invoice_address' ][ 'country' ];
        $returnData[ 'name' ] = $customer[ 'first_name' ] . ' ' . $customer[ 'last_name' ];
        $returnData[ 'invoince_adress2' ] = $customer[ 'invoice_address' ][ 'street_adress' ];

        if ( count($document) > 0 ) {
            $returnData[ 'date' ] = date('d.m.Y' , strtotime($document[ 0 ][ 'creation_date' ]));
        } else {
            $returnData[ 'date' ] = date('d.m.Y' , strtotime('now'));
        }

        $returnData[ 'customer' ] = $customer[ 'customer_id_name' ];
        $returnData[ 'order_id_name' ] = $order[ 'order_id_name' ];
        $returnData[ 'delivery_date' ] = count($document) > 0 ? date('d.m.Y' , strtotime($document[ 0 ][ 'delivery_date' ])) : date('d.m.Y' , strtotime('now'));
        $returnData[ 'custom_fields1' ] = $customer[ 'special_field' ][ 'custom_fields1' ];
        $returnData[ 'custom_fields2' ] = $customer[ 'special_field' ][ 'custom_fields2' ];
        $returnData[ 'vatstring' ] = $customer[ 'payment_term' ][ 'skonto_days' ] . ' Days ' . $customer[ 'payment_term' ][ 'skonto_percent' ] . '%  Skonto, ' . $customer[ 'payment_term' ][ 'payment_window' ] . ' Days Net';
        $returnData[ 'total' ] = count($document) > 0 ? $document[ 0 ][ 'total_amount_net' ] : 0;
        $returnData[ 'vat' ] = count($document) > 0 ? $document[ 0 ][ 'total_vat' ] : 0;
        $returnData[ 'vat_ratio' ] = 19;
        $returnData[ 'total_with_vat' ] = count($document) > 0 ? $document[ 0 ][ 'total_amount' ] : 0;
        $returnData[ 'vat_option' ] = $customer[ 'payment_term' ][ 'vat' ];
        $returnData[ 'vat_number' ] = $customer[ 'payment_term' ][ 'vat_number' ];
        $returnData[ 'products' ] = [];
        $returnData[ 'editable' ] = false;
        if ( count($document) > 0 ) {
            $returnData[ 'editable' ] = true;
            // Todo B++ burası her döküman için product ayrı olacaksa döküman id kullanılmalı
            $products = DocumentProducts::where('order_id_name' , $order[ 'order_id_name' ])->where('document_id',$document[0]['id'])->get();
            if ( $products ) {
                foreach ( $products as $product ) {
                    $returnData[ 'products' ][] = [
                        'product_id' => $product->product_id ,
                        'price' => $product->price ,
                        'description' => $product->description ,
                        'quantity' => $product->quantity ,
                        'total' => $product->total_price ,
                        'product_id_name' => $product->product_id_name ,
                    ];
                }
            }
        }
        $returnData['document_id'] = count($document) > 0 ? $document[0]['id'] : 0;
        return $returnData;

    }

    public function saveDocument (Request $request)
    {
        $order = Order::where('order_id_name' , $request->orderId)->first();
        $document = null;
        if ($request->noNew == 1) {
            $document = Documents::where('order_id' , $order->id)
                ->where('id' , $request->documentId)
                ->where('type' , DocumentType::CONFIRMATION)
                ->first();
        }
        $customer = Customer::where('customer_id_name' , $request->customer)->first();
        $order->customer_id = $customer->id;
        $order->save();
        if ( $document == null ) {
            $document = new Documents();
            $document->status = OrderStatus::PENDING;
            $document->order_id_name = $order->order_id_name;
            $document->order_id = $order->id;
            $document->customer_id = $customer->id;
            $document->type = DocumentType::CONFIRMATION;
            $document->creation_date = date('Y-m-d H:i:s' , strtotime($request->date));
            $document->delivery_date = date('Y-m-d H:i:s' , strtotime($request->deliveryDate));
            $totalAmount = str_replace('€' , '' , $request->totalAmount);
            $document->total_amount = floatval($totalAmount);
            $totalAmountNet = str_replace('€' , '' , $request->netTotal);
            $document->total_amount_net = floatval($totalAmountNet);
            $totalVat = str_replace('€' , '' , $request->vat);
            $document->total_vat = floatval($totalVat);
        } else {
            $document->status = OrderStatus::PENDING;
            $document->customer_id = $customer->id;
            $document->creation_date = date('Y-m-d H:i:s' , strtotime($request->date));
            $document->delivery_date = date('Y-m-d H:i:s' , strtotime($request->deliveryDate));
            $totalAmount = str_replace('€' , '' , $request->totalAmount);
            $document->total_amount = floatval($totalAmount);
            $totalAmountNet = str_replace('€' , '' , $request->netTotal);
            $document->total_amount_net = floatval($totalAmountNet);
            $totalVat = str_replace('€' , '' , $request->vat);
            $document->total_vat = floatval($totalVat);
        }
        $document->save();

        /**
         * Saving Product
         */
        DocumentProducts::where('document_id' , $document->id)->delete();
        if ( !empty($request->products) ) {

            $products = $request->products;

            foreach ( $products as $product ) {

                $documentProducts = new DocumentProducts();
                $documentProducts->document_id = $document->id;
                $vtProduct = Product::where('product_id_name' , $product[ 'productId' ])->first();
                $documentProducts->product_id = $vtProduct->id;
                $documentProducts->product_id_name = $product[ 'productId' ];
                $documentProducts->description = $product[ 'description' ];
                $documentProducts->quantity = $product[ 'quantity' ];
                $documentProducts->price = $product[ 'price' ];
                $documentProducts->total_price = str_replace('€' , '' , $product[ 'total' ]);
                $documentProducts->order_id_name = $order->order_id_name;
                $documentProducts->type = DocumentType::CONFIRMATION;
                $documentProducts->save();

            }
        }

        return $order->id;

    }

}
