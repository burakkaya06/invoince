@extends('content.app')
@section('create-new')

@endsection

@section('content')
    @include('customer.newcustomermodal')
    <div class="modal fade" id="createOrderModal" role="dialog"
         aria-labelledby="createOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createOrderModalLabel">Create New Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="order_id_name" class="col-form-label">Order Id</label>
                            <input type="text" class="form-control" id="order_id_name" name="order_id_name" required
                                   readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="customer_id" class="col-form-label">Select Customer</label>
                            <div class="d-flex align-items-center">
                                <select class="js-example-basic-single" name="customer_id" style="width: 200px;" required>
                                    <option value="">Please select customer</option>

                                </select>
                                <button type="button" class="btn btn-dark ml-2" style="border-radius: 1px;"
                                        data-toggle="modal" data-target="#createCustomerModal">Add New Customer
                                </button>
                            </div>
                        </div>


                        <div class="d-flex">
                            <button type="submit" class="btn btn-dark ml-auto">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container-fluid">
            @include('content.success')
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Orders</h4>
                        @component('content.search',['parameter' => '#createOrderModal'])
                            @slot('title', 'New Order')
                        @endcomponent
                    </div>
                </div>

            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="" class="table dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Customer</th>
                                    <th>Creation Date</th>
                                    <th>Due Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                                </thead>


                                <tbody>

                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_id_name }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->creation_date }}</td>
                                        <td>{{ $order->due_date }}</td>
                                        <td>€ {{ $order->amount }} </td>
                                        <td>{{ $order->status }}</td>

                                        <td>
                                            <a href="{{ route('order.edit', $order->id) }}"><i
                                                    style="font-size: 20px; color: black" class="fas fa-edit"></i></a>
                                            <form action="{{ route('order.delete', $order->id) }}" method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        style="border: none; background: transparent; padding: 0; outline: none;">
                                                    <i class="feather-trash-2" style="font-size: 24px;"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-left">
                                            <a href="{{ route('order.detail', $order->id) }}">
                                                <i style="font-size: 20px; color: black" class="feather-chevron-right"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


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

            $.ajax({
                url: '/orders/create-order-id',
                method: 'GET',
                success: function (data) {
                    debugger
                    $('#order_id_name').val(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    debugger
                    console.error(textStatus, errorThrown);
                }
            });
        });


    </script>
    <script src="{{asset('js/project/customer.js')}}"></script>
@endsection
