@extends('layouts.template')



@section('title-description')
<title >Elementary | Ajouter Une Classe</title>
<meta name="description" content="Elementary">
@endsection

@section('level-active')
sub-group-active
@endsection

@section('add-level')
menu-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Classe</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Ajouter une classe</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Ajouter une nouvelle classe</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => 'levels.store', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Filière *</label>
                <input name="name" required="" type="text" placeholder="nom de la filière" class="form-control">
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Niveau *</label>
                <input name="level" required="" type="text" placeholder="Entrez le niveau" class="form-control">
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

