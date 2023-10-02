@extends('content.app')
@section('create-new')

@endsection
@section('content')
    <div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog"
         aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProductModalLabel">Create New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('products.store') }}">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="product_id_name" class="col-form-label col-md-2">Product ID</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="product_id_name" name="product_id_name" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="product_name" class="col-form-label col-md-2">Product Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label for="description" class="col-form-label col-md-2">Product Description</label>
                            <div class="col-md-10">
                                <input style="height: 100px" type="text" class="form-control" id="description" name="description" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="price" class="col-form-label col-md-2">Price</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" id="price" name="price" required>
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
                        <h4 class="mb-0 font-size-18">Products</h4>
                        @component('content.search')
                            @slot('title', 'New Product')

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
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>

                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->product_id_name }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}" ><i  style="font-size: 20px; color: black" class="fas fa-edit" ></i></a>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none; background: transparent; padding: 0; outline: none;">
                                                    <i class="feather-trash-2"  style="font-size: 24px;"></i>
                                                </button>
                                            </form>
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
@endsection
