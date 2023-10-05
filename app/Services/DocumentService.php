<?php

namespace App\Services;

use App\Http\Enum\DocumentType;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Documents;

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

    public function indexConfirmation(Request $request)
    {
        $order = Order::find($request->id)->toArray();
        $customer = Customer::with('shippingAddress')->
            with('invoiceAddress')->
            with('paymentTerm')->
            with('specialField')
            ->find($order['customer_id'])
            ->toArray();

        $document = Documents::where('order_id', $order['id'])
            ->where('type', DocumentType::CONFIRMATION)
            ->get()->toArray();


        return $this->prepareConirmationContent($order,$customer,$document);
    }

    public function searchCustomer(Request $request)
    {
        $customer = Customer::with('shippingAddress')->
        with('invoiceAddress')->
        with('paymentTerm')->
        with('specialField')
            ->find($request->customer_id)
            ->toArray();

        return $this->prepareCustomerContent($customer);
    }

    public function prepareCustomerContent($customer) {
        $returnData =  [] ;
        $returnData['company_name'] = $customer['company_name'];
        $returnData['invoince_adress'] = $customer['invoice_address']['street_adress'];
        $returnData['invoince_city'] = $customer['invoice_address']['city'];
        $returnData['invoince_zip_code'] = $customer['invoice_address']['zip_code'];
        $returnData['invoince_state'] = $customer['invoice_address']['state'];
        $returnData['invoince_country'] = $customer['invoice_address']['country'];
        $returnData['name'] = $customer['first_name'] . ' ' . $customer['last_name'];
        $returnData['invoince_adress2'] = $customer['invoice_address']['street_adress'];
        $returnData['customer'] = $customer['customer_id_name'];
        $returnData['custom_fields1'] = $customer['special_field']['custom_fields1'];
        $returnData['custom_fields2'] = $customer['special_field']['custom_fields2'];
        $returnData['vatstring'] = $customer['payment_term']['skonto_days'].' Days '.$customer['payment_term']['skonto_percent'].'%  Skonto, '.$customer['payment_term']['payment_window'].' Days Net';
        $returnData['vat_option'] = $customer['payment_term']['vat'];
        $returnData['vat_number'] = $customer['payment_term']['vat_number'];

        return $returnData;
    }
    private function prepareConirmationContent ($order,$customer,$document)
    {

        $returnData =  [] ;

        $returnData['company_name'] = $customer['company_name'];
        $returnData['invoince_adress'] = $customer['invoice_address']['street_adress'];
        $returnData['invoince_city'] = $customer['invoice_address']['city'];
        $returnData['invoince_zip_code'] = $customer['invoice_address']['zip_code'];
        $returnData['invoince_state'] = $customer['invoice_address']['state'];
        $returnData['invoince_country'] = $customer['invoice_address']['country'];
        $returnData['name'] = $customer['first_name'] . ' ' . $customer['last_name'];
        $returnData['invoince_adress2'] = $customer['invoice_address']['street_adress'];

        if(count($document) > 0) {
            $returnData['date'] = date('d.m.Y', strtotime($document['creation_date']));
        } else {
            $returnData['date'] = date('d.m.Y', strtotime('now'));
        }

        $returnData['customer'] = $customer['customer_id_name'];
        $returnData['order_id_name'] = $order['order_id_name'];
        //todo delivery date nereden girilecek
        $returnData['delivery_date'] = date('d.m.Y', strtotime('now'));
        $returnData['custom_fields1'] = $customer['special_field']['custom_fields1'];
        $returnData['custom_fields2'] = $customer['special_field']['custom_fields2'];
        $returnData['vatstring'] = $customer['payment_term']['skonto_days'].' Days '.$customer['payment_term']['skonto_percent'].'%  Skonto, '.$customer['payment_term']['payment_window'].' Days Net';
        $returnData['product'] = [];
        $returnData['total'] = 0;
        $returnData['vat'] = 0;
        $returnData['vat_ratio'] = 19;
        $returnData['total_with_vat'] = 0;
        $returnData['vat_option'] = $customer['payment_term']['vat'];
        $returnData['vat_number'] = $customer['payment_term']['vat_number'];
        return $returnData;



    }

}
