@extends('content.printcontent')
@section('content')

    <div id="delivery_note" class="delivery_note"
         style="margin: 0 auto; border: 1px solid black; position: relative; padding: 20px; height: 980px">
        <!-- First Section -->
        <div>
            <div class="col-12">
                <div class="col-6 mt-5">
                    <div id="upname">{{$detail['company_name']}} - {{$detail['invoince_adress']}}
                        - {{$detail['invoince_zip_code']}} {{$detail['invoince_city']}}</div>
                    <br><br>
                    <h5 id="firstsectionname">{{$detail['name']}}</h5>
                    <h5 id="firstsectioninvoince_adress2">{{$detail['invoince_adress2']}}</h5>
                    <h5 id="firstsectionstatecountry">{{$detail['invoince_state']}}
                        , {{$detail['invoince_country']}}</h5>
                </div>
            </div>
            <br><br>
            <div class="col-12">
                <div class="col-5" style="margin-left: auto;">
                    <table style="width:100%;">
                        <tr>
                            <td style="text-align:left;">Date</td>
                            <td style="text-align:left; font-weight:bold;" id="dateCell">
                                <span id="dateDisplay">{{$detail['date']}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Customer</td>
                            <td id="customer"
                                style="text-align:left; font-weight:bold;">{{$detail['customer']}}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Confirmation Number</td>
                            <td id="orderIdName" style="text-align:left;">{{$detail['order_id_name']}}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Delivery Date</td>
                            <td style="text-align:left; font-weight:bold;" id="dateCell">
                                <span id="dateDisplay2">{{$detail['delivery_date']}}</span>
                            </td>

                        </tr>
                        <tr>
                            <td style="text-align:left;">Custom Field1</td>
                            <td id="custom_fields1"
                                style="text-align:left;">{{$detail['custom_fields1']}}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Custom Field2</td>
                            <td id="custom_fields2"
                                style="text-align:left;">{{$detail['custom_fields2']}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-12" style="padding-top: 100px">
            <h1>Confirmation {{$detail['order_id_name']}}</h1>
            <hr style="border-color: black; border-width: 1px; border-style: solid;">
            <table id="producttable" style="width:100%; text-align:center; border-collapse: collapse;">
                <thead>
                <tr>
                    <th style="border-style: none;text-align: left">POS</th>
                    <th style="border-style: none;text-align: left">Product ID</th>
                    <th style="border-style: none;text-align: left">Description</th>
                    <th style="border-style: none;">Quantity</th>
                    <th style="border-style: none;">Price</th>
                    <th style="border-style: none;">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detail['products'] as $key => $product)
                    <tr data-product-id="{{$product['product_id_name']}}">
                        <td style="border-style: none; text-align: left;">{{$key+1}}</td>
                        <td style="border-style: none; text-align: left">{{$product['product_id_name']}}</td>
                        <td style="border-style: none; text-align: left">{{$product['description']}}</td>
                        <td style="border-style: none;">
                            <span class="quantity-value">{{$product['quantity']}}</span>
                        </td>
                        <td style="border-style: none;">
                            <span>€</span> <span class="editable-price" contenteditable="true"
                                                 data-original-price="{{$product['price']}}">{{$product['price']}}</span>
                        </td>
                        <td style="border-style: none;" class="product-total">€ {{$product['total']}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <hr style="border-color: black; border-width: 1px; border-style: solid;">


            <div class="col-12">
                <div class="col-8" style="float: left;">
                    <h3 id="vatstring"> {{$detail['vatstring']}}</h3>
                </div>
                <div class="col-4" style="float: right;">
                    <table style="width:100%; text-align:center; border-collapse: collapse;">
                        <tr>
                            <td style="border-style: none; text-align: left;">Net Total</td>
                            <td id="totalCost" style="border-style: none; text-align: right;">
                                € {{$detail['total']}}</td>
                        </tr>
                        <tr>
                            <td style="border-style: none; text-align: left;">Vat {{$detail['vat_ratio']}}
                                %
                            </td>
                            <td id="withVat" style="border-style: none; text-align: right;">
                                € {{$detail['vat']}}</td>
                        </tr>
                    </table>
                    <hr style="border-color: black; border-width: 1px; border-style: solid;">
                    <table style="width:100%; text-align:center; border-collapse: collapse;">
                        <tr>
                            <td style="border-style: none; text-align: left; color: black;font-weight:bold;">
                                Total
                            </td>
                            <td id="total_with_vat"
                                style="border-style: none; text-align: right;color: black;font-weight:bold;">
                                € {{$detail['total_with_vat']}}
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
            <div style="padding-top: 100px" >
                <div class="">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-12" >
                                <label style="">Vat Option : {{$detail['vat_option']}}</label>
                            </div>
                            <div class="col-12" >
                                <label style="">Vat Number : {{$detail['vat_number']}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection
