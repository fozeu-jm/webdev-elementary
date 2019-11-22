@extends('layouts.template')


@section('title-description')
<title >Elementary | Presence</title>
<meta name="description" content="Elementary">
@endsection

@section('attendance-active')
menu-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Etudiants</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Tous les etudiants</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Student Table Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>
                    @if(session()->has('message'))
                    {!! session('message') !!}
                    @else
                    Recherche des etudiants
                    @endif
                </h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-expanded="false">...</a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-times text-orange-red"></i>Close</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                </div>
            </div>
        </div>

        {!! Form::open(['route' => 'students.filterPresence', 'class' => 'mg-b-20', 'method' => 'POST']) !!}
        <div class="row gutters-8">
            <div class="col-xl-3 col-lg-3 col-12 form-group">
                <input type="text" name="term" placeholder="Recherche par noms" class="form-control">
            </div>
            <div class="col-xl-3 col-lg-3 col-12 form-group">
                <select name="level" class="select2">
                    <option value="" disabled="" >Recherche par classe</option>
                    @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-12 form-group">
                <select name="academic" class="select2">
                    <option value="" disabled="">Recherche par année academique</option>
                    @foreach($academics as $academic)
                    <option value="{{ $academic->id }}">{{ $academic->begin }} / {{ $academic->end }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-12 form-group">
                <button style="width: auto;" type="submit" class="fw-btn-fill btn-gradient-yellow">RECHERCHER</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection