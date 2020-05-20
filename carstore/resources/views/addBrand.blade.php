@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <div class="container mt-5">
    <h1>Create New Brand</h1>

    <form method="POST" action="/brands/action">

        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name"/>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>  
</div>

@endsection