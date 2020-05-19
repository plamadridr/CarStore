@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <?php 
    /*
    {{ Form::open(array('url' => '/productaction', 'method' => 'post')); }}
        echo Form::label('brand', 'Brand: ');
        echo Form::text('brand', 'example@gmail.com');
        echo '<br/>';

        echo '<br/>';

        echo Form::label('model', 'Name model: ');
        echo Form::text('model');
        echo '<br/>';
        echo '<br/>';


        echo Form::label('year', 'Year: ');
        echo Form::number('year');
        echo '<br/>';
        echo '<br/>';


        echo Form::label('price', 'Price: ');
        echo Form::number('price');
        echo '<br/>';
        echo '<br/>';


        echo Form::label('plazas', 'Nº plazas: ');
        echo Form::number('plazas');
        echo '<br/>';
        echo '<br/>';


        echo Form::label('image', 'Image (url): ');
        echo Form::text('image');
        echo '<br/>';
        echo '<br/>';

        
        echo Form::submit('Enviar');
{{ Form::close(); }}
*/
?> 

<div class="container mt-5">
    <h1>Create New Product</h1>

    <form method="POST" action="/productaction">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="">Select a brand</label>
            
            <select name="brand" class="form-control">
            @foreach($brands as $b)
                <option value="{{$b->id}}" >{{$b->name}}</option>
            @endforeach
            </select>            
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Model" name="model"/>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" placeholder="Year" name="year"/>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" placeholder="Price" name="price"/>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" placeholder="Nº plazas" name="plazas"/>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Image (url)" name="image"/>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>  
</div>

@endsection