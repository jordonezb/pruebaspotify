@extends('layouts.index')
@section('title','Lista de Novedades')
@section('nombre_modulo','Lanzamientos')
@section('content') 
<h1>Nuevos Lanzamiento Spotify</h1>

<div class="row">
    @foreach ( $lista as $row )        
        @php
            echo '<pre>';
            print_r($row);
            echo '</pre>'
        @endphp
        <div class="col-4" style="margin-bottom:20px;">
            <div class="card">
                <img class="card-img-top" src="{{$row->images[0]->url}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$row->name}}</h5>
                    <p class="card-text">Tipo Album: {{$row->album_type}}</p>                    
                    <p class="card-text">Publicado: {{$row->release_date}}</p>
                    @foreach ( $row->artists as $artista )        
                        <a href="/{{$artista->id}}" class="btn btn-primary small-btn">{{$artista->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection   