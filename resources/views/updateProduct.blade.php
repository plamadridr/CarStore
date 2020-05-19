@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

<div class="container mt-5">
    <h1>Update Product</h1>

    <form method="POST" action="/productupdateaction">

        {{ csrf_field() }}

        <div class="form-group">
            <input type="hidden" class="form-control"  name="product_id" value="{{$product->id}}"/>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Brand" name="brand" value="{{$product->brand_id}}"/>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Change Name model" name="model" value="{{$product->model}}"/>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" placeholder="Change Year" name="year" value="{{$product->year}}"/>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" placeholder="Change Price" name="price" value="{{$product->price}}"/>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" placeholder="Change Nº plazas" name="plazas" value="{{$product->plazas}}"/>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Change Image (url)" name="image" value="{{$product->image}}"/>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
    </form>  
</div>

@endsection