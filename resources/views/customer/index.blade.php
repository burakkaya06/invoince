@extends('content.app')
@section('create-new')
    <div class="dropdown d-none d-sm-inline-block">
        <button type="button" class="btn header-item waves-effect" data-toggle="modal"
                data-target="#createCustomerModal">
            <i class="mdi mdi-plus"></i> Create New Customer
        </button>

    </div>
@endsection
@section('content')
    <div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog"
         aria-labelledby="createCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCustomerModalLabel">Create New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf
                        <label for="name" style="font-weight: bold">Invoice Adress</label>
                        <div class="form-group row mb-3">
                            <label for="customer_id_name" class="col-form-label col-md-2">Customer Id</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="customer_id_name" name="customer_id_name" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="company_name" class="col-form-label col-md-2">Company Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="company_name" name="company_name" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="first_name" class="col-form-label col-md-2">First Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="last_name" class="col-form-label col-md-2">Last Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="additional_line" class="col-form-label col-md-2">Additional Line</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="additional_line" name="additional_line"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="street_adress" class="col-form-label col-md-2">Street Address</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="street_adress" name="street_adress"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="zip_code" class="col-form-label col-md-2">ZIP Code</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="city" class="col-form-label col-md-2">City</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="state" class="col-form-label col-md-2">State</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="country" class="col-form-label col-md-2">Country</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                        </div>

                        <label for="name" style="font-weight: bold">Shipping Adress</label>
                        <div class="form-group row mb-3">
                            <label for="s_company_name" class="col-form-label col-md-2">Company Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_company_name" name="s_company_name"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="s_first_name" class="col-form-label col-md-2">First Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_first_name" name="s_first_name" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="s_last_name" class="col-form-label col-md-2">Last Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_last_name" name="s_last_name" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="s_additional_line" class="col-form-label col-md-2">Additional Line</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_additional_line" name="s_additional_line"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="s_street_adress" class="col-form-label col-md-2">Street Address</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_street_adress" name="s_street_adress"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="s_zip_code" class="col-form-label col-md-2">ZIP Code</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_zip_code" name="s_zip_code" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="s_city" class="col-form-label col-md-2">City</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_city" name="s_city" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="s_state" class="col-form-label col-md-2">State</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_state" name="s_state" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="s_country" class="col-form-label col-md-2">Country</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="s_country" name="s_country" required>
                            </div>
                        </div>


                        <label for="name" style="font-weight: bold">Payment Terms</label>
                        <div class="form-group">
                            <div class="form-group row mb-3">
                                <!-- Skonto Percent ve Days İçin Alanlar -->
                                <label class="col-form-label col-md-2" for="skonto_percent">Skonto</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="skonto_percent"
                                               name="skonto_percent" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="skonto_days" name="skonto_days"
                                               required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">days</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-form-label col-md-2" for="payment_window">Payment Window</label>
                                <div class="col-md-3">
                                    <input type="number" class="form-control" id="payment_window" name="payment_window"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-form-label col-md-2" for="vat">VAT Yes/No</label>
                                <div class="col-md-3">
                                    <select class="form-control" id="vat" name="vat" required>
                                        <option value="">Please select</option>
                                        <option value=1>Yes</option>
                                        <option value=0>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-form-label col-md-2" for="vat_number">Vat Number</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="vat_number" name="vat_number" required>
                                </div>
                            </div>
                        </div>

                        <label for="name" style="font-weight: bold">Special Fields</label>
                        <div class="form-group">

                            <div class="form-group row mb-3">
                                <label class="col-form-label col-md-2" for="custom_fields1">Custom Fields 1</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="custom_fields1" name="custom_fields1">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-form-label col-md-2" for="custom_fields2">Custom Fields 2</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="custom_fields2" name="custom_fields2">
                                </div>
                            </div>

                        </div>


                        <!-- Other form fields can be added here -->
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
                        <h4 class="mb-0 font-size-18">Customers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Customers</li>
                            </ol>
                        </div>

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
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->customer_id_name }}</td>
                                        <td>{{ $customer->company_name }}</td>
                                        <td>{{ $customer->shippingAddress->s_street_adress ?? 'Address not available' }}</td>
                                        <td>
                                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning"><i class="feather-edit"></i></a>
                                            <form action="{{ route('customer.delete', $customer->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="feather-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach






                                </tbody>
                            </table>
                            <!-- Sayfalama Linkleri -->
                            {{ $customers->links('vendor.pagination.bootstrap-4') }}

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container-fluid -->
    </div>
@endsection
