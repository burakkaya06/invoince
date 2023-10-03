@extends('content.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">New/Edit Delivery Note</h4>
                    </div>
                </div>

            </div>
            <div id="delivery_note" style="width: 794px; height: 1123px; margin: auto; border: 1px solid black;  position: relative;">
                <!-- First Section -->
                <div>
                    <div class="col-12">
                        <div class="col-6 mt-5">
                            Company Name - Awesomestreet 1 - 10115 Berlin
                            <br><br>
                            <h5>Apple Inc.</h5>
                            <h5>Infinite Loop</h5>
                            <h5>ACupertino, CA</h5>
                            <button style="background-color: black; color: white;">Choose Customer</button>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-12">
                        <div class="col-5" style="margin-left: auto;">
                            <table style="width:100%;">
                                <tr>
                                    <td style="text-align:left;">Date</td>
                                    <td style="text-align:right; font-weight:bold;">aaaaaa</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;">Customer</td>
                                    <td style="text-align:right; font-weight:bold;">aaaaaa</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;">Confirmation Number</td>
                                    <td style="text-align:right;">aaa</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;">Custom Field1</td>
                                    <td style="text-align:right;">aaa</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;">Custom Field2</td>
                                    <td style="text-align:right;">aaa</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="col-12" style="padding-top: 100px">
                    <h1>Delivery Note 2023-002</h1>
                    <hr style="border-color: black; border-width: 1px; border-style: solid;">
                    <table style="width:100%; text-align:center; border-collapse: collapse;">
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
                        <tr>
                            <td style="border-style: none; text-align: left;">1</td>
                            <td style="border-style: none;text-align: left">101</td>
                            <td style="border-style: none; text-align: left">Sample Product</td>
                            <td style="border-style: none;">2</td>
                            <td style="border-style: none;">$50</td>
                            <td style="border-style: none;">$100</td>
                        </tr>

                        </tbody>
                    </table>
                    <button style="background-color: black; color: white; margin-top: 10px">Add Product</button>
                    <hr style="border-color: black; border-width: 1px; border-style: solid;">


                    <div class="col-12">
                        <div class="col-8" style="float: left;">
                            7 Days 2% Skonto, 30 Days net.
                        </div>
                        <div class="col-4" style="float: right;">
                            <table style="width:100%; text-align:center; border-collapse: collapse;">
                                <tr>
                                    <td style="border-style: none; text-align: left;">Net Total</td>
                                    <td style="border-style: none; text-align: right;">$300</td>
                                </tr>
                                <tr>
                                    <td style="border-style: none; text-align: left;">Vat 19%</td>
                                    <td style="border-style: none; text-align: right;">$57</td>
                                </tr>
                            </table>
                            <hr style="border-color: black; border-width: 1px; border-style: solid;">
                            <table style="width:100%; text-align:center; border-collapse: collapse;">
                                <tr>
                                    <td style="border-style: none; text-align: left; color: black;font-weight:bold;">
                                        Total
                                    </td>
                                    <td style="border-style: none; text-align: right;color: black;font-weight:bold;">
                                        $300
                                    </td>
                                </tr>

                            </table>
                        </div>

                    </div>


                </div>

                <!-- vat number -->
                <div class="vat-option" style="position: absolute; bottom: 10px; left: -10px; width: 100%;">
                    <div class="col-12">
                        <div class="col-12">
                            <div class="col-4" style="display: flex; align-items: center">
                                <div class="col-6">
                                    <label style="margin-right: 10px;">Vat Option</label>
                                </div>
                                <div class="col-6">
                                    <select class="l" id="vat" name="vat" required>
                                        <option value="">Please select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="col-4" style="display: flex; align-items: center;">
                                <div class="col-6">
                                    <label style="margin-right: 10px;">Vat Number</label>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="l" id="vat_number" name="vat_number" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div style="width: 794px; height: auto; margin: auto; margin-top: 20px">

                <button type="button" style="float: right;" class="btn btn-success">Create Document</button>
            </div>
        </div>
@endsection
