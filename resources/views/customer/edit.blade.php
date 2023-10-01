@extends('content.app')
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            @include('content.success')
            <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="name" style="font-weight: bold">Invoice Adress</label>
                <div class="form-group row mb-3">
                    <label for="customer_id_name" class="col-form-label col-md-2">Customer Id</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="customer_id_name" name="customer_id_name" value="{{ $customer->customer_id_name }}" readonly>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="company_name" class="col-form-label col-md-2">Company Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{$customer->company_name}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="first_name" class="col-form-label col-md-2">First Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{$customer->first_name}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="last_name" class="col-form-label col-md-2">Last Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$customer->last_name}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="additional_line" class="col-form-label col-md-2">Additional Line</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="additional_line" name="additional_line" value="{{$customer->invoiceAddress->additional_line}}"
                               required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="street_adress" class="col-form-label col-md-2">Street Address</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="street_adress" name="street_adress" value="{{$customer->invoiceAddress->street_adress}}"
                               required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="zip_code" class="col-form-label col-md-2">ZIP Code</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="zip_code" name="zip_code" required value="{{$customer->invoiceAddress->zip_code}}" >
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="city" class="col-form-label col-md-2">City</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="city" name="city"   value="{{$customer->invoiceAddress->city}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="state" class="col-form-label col-md-2">State</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="state" name="state"  value="{{$customer->invoiceAddress->state}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="country" class="col-form-label col-md-2">Country</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="country" name="country" value="{{$customer->invoiceAddress->country}}" required>
                    </div>
                </div>

                <label for="name" style="font-weight: bold">Shipping Adress</label>
                <div class="form-group row mb-3">
                    <label for="s_company_name" class="col-form-label col-md-2">Company Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_company_name" name="s_company_name" value="{{$customer->shippingAddress->s_company_name}}"
                               required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="s_first_name" class="col-form-label col-md-2">First Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_first_name" name="s_first_name" value="{{$customer->shippingAddress->s_first_name}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="s_last_name" class="col-form-label col-md-2">Last Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_last_name" name="s_last_name" value="{{$customer->shippingAddress->s_last_name}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="s_additional_line" class="col-form-label col-md-2">Additional Line</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_additional_line" name="s_additional_line" value="{{$customer->shippingAddress->s_additional_line}}"
                               required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="s_street_adress" class="col-form-label col-md-2">Street Address</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_street_adress" name="s_street_adress" value="{{$customer->shippingAddress->s_street_adress}}"
                               required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="s_zip_code" class="col-form-label col-md-2">ZIP Code</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_zip_code" name="s_zip_code" value="{{$customer->shippingAddress->s_zip_code}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="s_city" class="col-form-label col-md-2">City</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_city" name="s_city" value="{{$customer->shippingAddress->s_city}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="s_state" class="col-form-label col-md-2">State</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_state" name="s_state" value="{{$customer->shippingAddress->s_state}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="s_country" class="col-form-label col-md-2">Country</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="s_country" name="s_country"  value="{{$customer->shippingAddress->s_country}}" required>
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
                                       name="skonto_percent"  value="{{$customer->paymentTerm->skonto_percent}}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="skonto_days" name="skonto_days"
                                       required value="{{$customer->paymentTerm->skonto_days}}" >
                                <div class="input-group-append">
                                    <span class="input-group-text">days</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-form-label col-md-2" for="payment_window">Payment Window</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" id="payment_window" name="payment_window" value="{{$customer->paymentTerm->payment_window}}"
                                   required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-form-label col-md-2" for="vat">VAT Yes/No</label>
                        <div class="col-md-3">
                            <select class="form-control" id="vat" name="vat" required>
                                <option value="">Please select</option>
                                <option value="1" {{ $customer->paymentTerm->vat == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $customer->paymentTerm->vat == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-form-label col-md-2" for="vat_number">Vat Number</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="vat_number" name="vat_number"  value="{{$customer->paymentTerm->vat_number}}" required>
                        </div>
                    </div>
                </div>

                <label for="name" style="font-weight: bold">Special Fields</label>
                <div class="form-group">

                    <div class="form-group row mb-3">
                        <label class="col-form-label col-md-2" for="custom_fields1">Custom Fields 1</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="custom_fields1" name="custom_fields1" value="{{$customer->specialField->custom_fields1}}" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-form-label col-md-2" for="custom_fields2">Custom Fields 2</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="custom_fields2" name="custom_fields2" value="{{$customer->specialField->custom_fields2}}">
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
@endsection
