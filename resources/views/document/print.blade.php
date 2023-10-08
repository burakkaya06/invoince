@extends('content.printcontent')
@section('content')

    <div id="delivery_note" class="delivery_note"
         style="margin: 0 auto; border: 1px solid black; position: relative; padding: 20px; height: 980px">
        <!-- First Section -->
        <div>
            <div class="col-12">
                <div class="col-6 mt-5">
                    <div id="upname">Test</div>
                    <br><br>

                </div>
            </div>
            <br><br>
            <div class="col-12">
                <div class="col-5" style="margin-left: auto;">
                    <table style="width:100%;">
                    </table>
                </div>
            </div>
        </div>


        <div class="col-12" style="padding-top: 100px">
            <h1>Confirmation</h1>
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

                </tbody>
            </table>
            <hr style="border-color: black; border-width: 1px; border-style: solid;">


            <div class="col-12">
                <div class="col-8" style="float: left;">
                </div>
                <div class="col-4" style="float: right;">
                    </table>
                    <hr style="border-color: black; border-width: 1px; border-style: solid;">
                    <table style="width:100%; text-align:center; border-collapse: collapse;">
                        <tr>
                            <td style="border-style: none; text-align: left; color: black;font-weight:bold;">
                                Total
                            </td>
                            <td id="total_with_vat"
                                style="border-style: none; text-align: right;color: black;font-weight:bold;">
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
            <div class="col-12">
                <div class=""></div>
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
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-4" style="display: flex; align-items: center;">
                        <div class="col-6">
                            <label style="margin-right: 10px;">Vat Number</label>
                        </div>
                        <div class="col-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
