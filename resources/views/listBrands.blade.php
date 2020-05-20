@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mt-5">          
            <div class="list-group">
                @foreach($listBrands as $b)
                <div class="row">
                    <div class="col-4">  
                        <div class="row">
                            <p>{{$b->name}}</p>
                        </div>
                    </div>
                    <div class="col-3 m-1">  
                        <div class="row">
                        <a href='/brands/update/{{$b->id}}' class="list-group-item list-group-item-action">update</a>
                        </div>
                    </div>
                    <div class="col-3 m-1">  
                        <div class="row">
                        <a href='/brands/delete/{{$b->id}}' class="list-group-item list-group-item-action">delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
            <br>

        {{ $listBrands->links() }}

        
    </div>
@endsection