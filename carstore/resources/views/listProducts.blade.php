@extends('layouts.app')

@section('buscador')
<div class="container">
    <nav class="navbar navbar-light float-right">
        <form class="form-inline">

            <select name="tipoBuscar" class="form-control mr-sm-2" id="filtro">
            <option>Buscar por:</option>
            <option>plazas</option>
            <option>year</option>
            <option>price</option>
            </select>

            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por" aria-label="Search">
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>
</div>
@endsection

@section('ordenar')
<div class="container">
    <nav class="navbar navbar-light float-left">
        <form class="form-inline">

            <select name="tipoOrdenar" class="form-control mr-sm-2" id="filtro">
                <option>Ordenar por:</option>
                <option>plazas</option>
                <option>year</option>
                <option>price</option>
                <option>model</option>
            </select>

            <select name="ordenarpor" class="form-control mr-sm-2" id="filtro">
                <option>De forma:</option>
                <option>asc</option>
                <option>desc</option>
            </select>
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ordenar</button>
        </form>
    </nav>
</div>
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="row ">
            @foreach($listProducts as $p)
                    <div class="mt-4 col-lg-4">
                        <div class="carCard" style="background-image:url('{{$p->image}}')">
                            <div class="row carInfo">
                                <div class="col-4 year"> {{$p->year}}</div>
                                <div class="col-5">
                                    <div class="row">
                                        <h2>{{$p->model}}</h2>
                                        <p>{{$p->plazas}} plazas</p>
                                    </div>
                                </div>
                                <div class="col-3">  
                                    <div class="row">
                                        <h2>{{$p->price}} €</h2>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        

                        <div class ="row ">
                            <div class="col-lg-6">
                                <div class="row ">
                                    <p><a href='/products/update/{{$p->id}}'>Update</a></p>
                                </div>
                            </div>
                            <div class="col-lg-6">  
                                <div class="row">
                                    <p><a href='/products/delete/{{$p->id}}'>Delete</a></p>
                                </div>
                            </div>
                        
                        </div>
                    </div>
            @endforeach
        </div>

        {{ $listProducts->links() }}

        
    </div>
@endsection