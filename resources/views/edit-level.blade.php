@extends('layouts.template')



@section('title-description')
<title >Elementary | Modifier Une Classe</title>
<meta name="description" content="Elementary">
@endsection

@section('level-active')
sub-group-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Classe</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Modifier une classe</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Modifier une classe</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => ['levels.update',$level->id], 'method' => 'PUT', 'class' => 'new-added-form']) !!}
        <?php $result = breaker($level->name); ?>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Filière *</label>
                <input name="name" value="{{ $result['filiere'] }}" required="" type="text" placeholder="nom de la filière" class="form-control">
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Niveau *</label>
                <input name="level" value="{{$result['niveau']}}" required="" type="text" placeholder="Entrez le niveau" class="form-control">
                {!! $errors->first('level', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-md-3 d-none d-xl-block form-group">

            </div>
            <div class="col-12 form-group mg-t-8">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<!-- Add New Book Area End Here -->
@endsection


<?php

function breaker($text) {
    $pieces = explode('-', $text);
    $n = count($pieces);
    $first = array();
    $last = '';

    for ($i = 0; $i < $n; $i++) {
        if ($i == $n - 1) {
            $last = $pieces[$i];
        } else {
            array_push($first, $pieces[$i]);
        }
    }

    $result = array(
        'filiere' => implode('', $first),
        'niveau' => $last
    );

    return $result;
}
?>