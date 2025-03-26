@extends('base')

@section('title', 'Liste des Vignettes')

@section('content')
<div class="container">
    <h1 class="my-4">Liste des Vignettes</h1>
    <div class="row">
    {{-- @foreach ($vignettes as $vignette) -- }}
        <div class="col-md-3 my-2">
            <div class="card">
                <img src="{{-- $vignette->image --}}" class="card-img-top" alt="Image de la vignette">
                <div class="card-body">
                    <h5 class="card-title">{{-- $vignette->title --}}</h5>
                    <p class="card-text">{{-- $vignette->description --}}</p>
                    <a href="{{-- route('vignettes.show', $vignette->id) --}}" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
</div>
@endsection
