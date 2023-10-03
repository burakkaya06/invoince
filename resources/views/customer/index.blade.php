@extends('content.app')
@section('create-new')

@endsection
@section('content')

    @include('customer.newcustomermodal')

    <div class="page-content">
        <div class="container-fluid">
            @include('content.success')
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Customers</h4>
                        @component('content.search')
                            @slot('title', 'New Customer')
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
                                            <a href="{{ route('customer.edit', $customer->id) }}"><i
                                                    style="font-size: 20px; color: black" class="fas fa-edit"></i></a>
                                            <form action="{{ route('customer.delete', $customer->id) }}" method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        style="border: none; background: transparent; padding: 0; outline: none;">
                                                    <i class="feather-trash-2" style="font-size: 24px;"></i>
                                                </button>
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
    <script src="{{asset('js/project/customer.js')}}"></script>

@endsection
