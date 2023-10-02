@extends('content.app')
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            @include('content.success')
            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row mb-3">
                    <label for="product_id_name" class="col-form-label col-md-2">Product Id</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="product_id_name" name="product_id_name" value="{{ $product->product_id_name }}" readonly>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="product_name" class="col-form-label col-md-2">Product Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="description" class="col-form-label col-md-2">Description</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="description" name="description" style="height: 100px" value="{{$product->description}}" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="price" class="col-form-label col-md-2">Price</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" required>
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
