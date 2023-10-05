@extends('content.app')
@section('content')

    <!-- Customer search modal -->
    <div class="modal fade" id="createOrderModal" role="dialog"
         aria-labelledby="createOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createOrderModalLabel">Search Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="customer_id" class="col-form-label">Select Customer</label>
                        <div class="d-flex align-items-center">
                            <select class="js-example-basic-single" name="customer_id" style="width: 200px;" required>
                                <option value="">Please select customer</option>

                            </select>
                        </div>
                    </div>


                    <div class="d-flex">
                        <button type="submit" class="btn btn-dark ml-auto" id="setCustomer">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Add product modal -->
    <div class="modal fade" id="addProductModal" role="dialog"
         aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-l" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <div class="col-12 row">
                            <div class="col-6">
                                <label for="customer_id" class="col-form-label">Select Product</label>
                                <div class="d-flex align-items-center">
                                    <select class="product-search" name="productidselect" style="width: 200px;"
                                            required>
                                        <option value="">Please select product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="customer_id" class="col-form-label">Count</label>
                                <div class="d-flex align-items-center">
                                    <input type="number" id="countid">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="d-flex">
                        <button type="submit" class="btn btn-dark ml-auto" id="addProduct">Add</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">New/Edit Confirmation</h4>
                    </div>
                </div>

            </div>
            <div id="delivery_note"
                 style="width: 794px; height: 1123px; margin: auto; border: 1px solid black;  position: relative;">
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

                            <button
                                type="button"
                                class="btn header-item waves-effect mr-2"
                                data-toggle="modal" data-target="#createOrderModal"
                                style="background-color: black; color: white; height: 35px">Choose Customer
                            </button>
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
                                        <input type="text" id="datePicker" style="display:none;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;">Customer</td>
                                    <td id="customer"
                                        style="text-align:left; font-weight:bold;">{{$detail['customer']}}</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;">Confirmation Number</td>
                                    <td style="text-align:left;">{{$detail['order_id_name']}}</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;">Delivery Date</td>
                                    <td style="text-align:left; font-weight:bold;" id="dateCell">
                                        <span id="dateDisplay2">{{$detail['delivery_date']}}</span>
                                        <input type="text" id="datePicker2" style="display:none;">
                                    </td>

                                </tr>
                                <tr>
                                    <td style="text-align:left;">Custom Field1</td>
                                    <td id="custom_fields1" style="text-align:left;">{{$detail['custom_fields1']}}</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;">Custom Field2</td>
                                    <td id="custom_fields2" style="text-align:left;">{{$detail['custom_fields2']}}</td>
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

                        </tbody>
                    </table>
                    <button style="background-color: black; color: white; margin-top: 10px" data-toggle="modal"
                            data-target="#addProductModal">Add Product
                    </button>
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
                                    <td style="border-style: none; text-align: left;">Vat {{$detail['vat_ratio']}}%</td>
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
                                    <select class="l" id="vat" name="vat" required>
                                        <option value="">Please select</option>
                                        <option value="1" {{ $detail['vat_option'] == 1 ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="0" {{ $detail['vat_option'] == 0 ? 'selected' : '' }}>No</option>
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
                                    <input type="text" class="l" id="vat_number" name="vat_number"
                                           value="{{$detail['vat_number']}}" readonly>
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

        <script>

            $('#createOrderModal').on('shown.bs.modal', function (e) {
                $('.js-example-basic-single').select2({

                    ajax: {
                        url: '/orders/custom-search',
                        dataType: 'json',
                        delay: 1000,
                        data: function (params) {
                            return {
                                q: params.term, // search query
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 1
                });

            });

            $(document).ready(function () {

                $(document).on('click', '.quantity-increase, .quantity-decrease', function() {
                    let row = $(this).closest('tr');
                    let quantityCell = row.find('.quantity-value');
                    let currentQuantity = parseInt(quantityCell.text());
                    let price = parseFloat(row.find('td:eq(4)').text().replace('€ ', '')); // Fiyatı al

                    if ($(this).hasClass('quantity-increase')) {
                        currentQuantity += 1;
                    } else if ($(this).hasClass('quantity-decrease')) {
                        if (currentQuantity > 1) {
                            currentQuantity -= 1;
                        } else {
                            row.remove();
                            updateTotalCost();
                            return; // Satırı sildikten sonra işlem yapmayı durdur
                        }
                    }

                    quantityCell.text(currentQuantity);

                    // Toplam fiyatı hesapla ve güncelle
                    let newTotal = currentQuantity * price;
                    row.find('td:eq(5)').text('€ ' + newTotal.toFixed(2));
                    updateTotalCost();
                });

                $("#datePicker").datepicker({
                    dateFormat: "dd-mm-yy",
                    onClose: function(selectedDate) {
                        // Datepicker kapandığında tarihi güncelle ve inputu tekrar gizle
                        $("#dateDisplay").text(selectedDate);
                        $("#datePicker").hide();
                        $("#dateDisplay").show();
                    }
                });

                // Tarih metni üzerine tıklandığında
                $("#dateDisplay").on('click', function() {
                    $(this).hide();
                    $("#datePicker").show().focus();
                });

                $("#datePicker2").datepicker({
                    dateFormat: "dd-mm-yy",
                    onClose: function(selectedDate) {
                        // Datepicker kapandığında tarihi güncelle ve inputu tekrar gizle
                        $("#dateDisplay2").text(selectedDate);
                        $("#datePicker2").hide();
                        $("#dateDisplay2").show();
                    }
                });

                // Tarih metni üzerine tıklandığında
                $("#dateDisplay2").on('click', function() {
                    $(this).hide();
                    $("#datePicker2").show().focus();
                });

                function updateTotalCost() {
                    let netTotalCost = 0;
                    $('#producttable tbody tr').each(function () {
                        let productTotal = parseFloat($(this).find('td:eq(5)').text().replace('€ ', ''));
                        netTotalCost += productTotal;
                    });
                    let ratio = {{$detail['vat_ratio']}};
                    let totalCostVat = netTotalCost * (ratio / 100);
                    let totalCostWithOutVat = netTotalCost - totalCostVat;


                    $('#totalCost').text("€ " + totalCostWithOutVat.toFixed(2));
                    $('#withVat').text("€ " + totalCostVat.toFixed(2));
                    $('#total_with_vat').text("€ " + netTotalCost.toFixed(2));
                }

                $("#addProduct").on('click', function () {
                    let productId = $("select[name='productidselect']").val();
                    let count = $("#countid").val();

                    if (count == "") {
                        count = 1;
                    } else {
                        count = parseInt(count);
                    }

                    $.ajax({
                        type: 'GET',
                        url: '/products/get-detail',
                        data: {
                            productId: productId
                        },
                        success: function (responseData) {
                            let existingRow = $('#producttable tbody tr[data-product-id="' + responseData.pid + '"]');

                            if (existingRow.length > 0) {
                                // Ürün zaten tabloda var, sadece miktarını ve toplamını güncelle
                                let currentQuantity = parseInt(existingRow.find('td:eq(3)').text());
                                let newQuantity = currentQuantity + count;
                                let newTotal = newQuantity * parseFloat(responseData.price);

                                existingRow.find('td:eq(3)').text(newQuantity);
                                existingRow.find('td:eq(5)').text("€ " + newTotal.toFixed(2));
                                updateTotalCost();
                            } else {
                                // Ürün tabloda yok, yeni bir satır ekleyin
                                let pos = $('#producttable tbody tr').length + 1;
                                let total = count * parseFloat(responseData.price);

                                let newProductRow = `
    <tr data-product-id="${responseData.pid}">
        <td style="border-style: none; text-align: left;">${pos}</td>
        <td style="border-style: none; text-align: left">${responseData.pid}</td>
        <td style="border-style: none; text-align: left">${responseData.description}</td>
        <td style="border-style: none;">
    <button class="quantity-decrease" style="margin-right:5px;">-</button>
    <span class="quantity-value">${count}</span>
    <button class="quantity-increase" style="margin-left:5px;">+</button>
    </td>
        <td style="border-style: none;">€ ${responseData.price}</td>
        <td style="border-style: none;">€ ${total.toFixed(2)}</td>
    </tr>
`;

                                $('#producttable tbody').append(newProductRow);

                                updateTotalCost();
                            }

                            $('#addProductModal').modal('hide');
                        },
                        error: function (error) {
                            console.error("Ürün bilgisi alınırken bir hata oluştu!", error);
                        }
                    });
                });
            });


            $('#addProductModal').on('shown.bs.modal', function (e) {
                $('.product-search').select2({


                    ajax: {
                        url: '/products/custom-search',
                        dataType: 'json',
                        delay: 1000,
                        data: function (params) {
                            return {
                                q: params.term, // search query
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 1
                });

            });

            $(document).ready(function () {
                $("#setCustomer").on('click', function () {
                    let customerId = $("select[name='customer_id']").val();

                    $.ajax({
                        type: 'GET',
                        url: '/documents/search-customer',
                        data: {
                            customer_id: customerId
                        },
                        success: function (responseData) {
                            updatePage(responseData);
                        },
                        error: function (error) {
                            console.error("Bir hata oluştu:", error);
                            alert("Bir hata oluştu. Lütfen tekrar deneyin.");
                        }
                    });
                });

                function updatePage(detail) {
                    $('#upname').text(detail.company_name + ' - ' + detail.invoince_adress + ' - ' + detail.invoince_zip_code + ' ' + detail.invoince_city)
                    $('#firstsectionname').text(detail.name)
                    $('#firstsectioninvoince_adress2').text(detail.firstsectioninvoince_adress2)
                    $('#firstsectionstatecountry').text(detail.invoince_state + ' ' + detail.invoince_country)
                    $('#customer').text(detail.customer)
                    $('#custom_fields1').text(detail.custom_fields1)
                    $('#custom_fields2').text(detail.custom_fields2)
                    $('#vatstring').text(detail.vatstring)
                    $('#vat_number').val(detail.vat_number)
                    $("#vat").val(detail.vat_option);
                    $('#createOrderModal').modal('hide');
                }
            });


        </script>

        <script src="{{asset('js/project/customer.js')}}"></script>
@endsection
