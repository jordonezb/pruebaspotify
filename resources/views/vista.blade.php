@extends('layouts.index')
@section('title','Lista de Novedades')
@section('nombre_modulo',$artista->name)
@section('content') 
<h1>Detalles del Artista</h1>

@php
echo '<pre>';
print_r($artistaAlbums);
echo '</pre>'

@endphp

<div class="row">         
    <div class="col-3">        
        <img class="rounded-circle" src="{{$artista->images[0]->url}}">
    </div>
    <div class="col-4">        
        <h2 class=" text-left font-weight-bold">{{$artista->name}}</h2>
        @foreach ( $artista->genres as $genero )        
            <a href="#" class="btn btn-primary small-btn">{{$genero}}</a>
        @endforeach
    </div>
</div>
<br/>
<div class="table-responsive">
    <table class="table">
        <caption>List of users</caption>
        <thead>
            <tr>
            <th scope="col">Foto</th>
            <th scope="col">Album</th>
            <th scope="col">Cancion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $artistaAlbums as $track )  
                <tr>
                    <th scope="row">
                        <img class="rounded-circle" src="{{$track->album->images[0]->url}}">
                    </th>
                    <td>{{$track->album->name}}</td>
                    <td>{{$track->name}}</td>
                </tr>  
            @endforeach        
        </tbody>
    </table>
</div>

@endsection   