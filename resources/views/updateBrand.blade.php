@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

<div class="container mt-5">
    <h1>Update brand_id</h1>

    <form method="POST" action="/brands/update/action">

        {{ csrf_field() }}

        <div class="form-group">
            <input type="hidden" class="form-control"  name="brand_id" value="{{$brand->id}}"/>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Brand Name" name="name" value="{{$brand->name}}"/>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
    </form>  
</div>

@endsection