@extends('content.app')
@section('create-new')

@endsection

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            @include('content.success')
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Order {{$orderDetail->order_id_name}}</h1>
                        <div class="d-flex align-items-center">
                            <button onclick="window.history.back();"
                                type="button"
                                class="btn header-item waves-effect mr-2"
                                style="background-color: #000; color: #fff; border-radius: 100px; height: 30px;"> Back

                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-12 mt-3">

                    <div class="d-flex align-items-center">
                        <form action="{{ route('document.confirmation') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value={{$orderDetail->id}}>
                            <button
                                type="submit"
                                class="btn header-item waves-effect mr-2"
                                style="background-color: #000; color: #fff; border-radius: 100px; height: 30px;">
                                Create Information
                            </button>
                        </form>

                        <button
                            type="button"
                            class="btn header-item waves-effect mr-2"
                            style="background-color: #000; color: #fff; border-radius: 100px; height: 30px;"> Create Delivery Note

                        </button>
                        <button
                            type="button"
                            class="btn header-item waves-effect mr-2"
                            style="background-color: #000; color: #fff; border-radius: 100px; height: 30px;"> Create Invoince

                        </button>
                    </div>

                </div>

            </div>
            <!-- end page title -->

            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="" class="table dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Customer</th>
                                    <th>Creation Date</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                                </thead>


                                <tbody>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
