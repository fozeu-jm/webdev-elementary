@extends('layouts.template')



@section('title-description')
<title >Elementary | Ajouter Une École</title>
<meta name="description" content="Elementary">
@endsection


@section('group-active')
sub-group-active
@endsection

@section('A-ecole-active')
menu-active
@endsection




@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Écoles</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Ajouter une nouvelle école</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Ajouter une nouvelle école</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => 'schools.store', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom de l'école *</label>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nom', 'required' => 'true']) !!}
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">email de l'école *</label>
                {!! Form::text('schoolmail', null, ['class' => 'form-control', 'placeholder' => 'email','required' => 'true']) !!}
                {!! $errors->first('schoolmail', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Numero de l'école *</label>
                {!! Form::text('tel', null, ['class' => 'form-control', 'placeholder' => 'numéro de téléphone','required' => 'true']) !!}
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Boite postale (B.P) </label>
                {!! Form::text('box', null, ['class' => 'form-control', 'placeholder' => 'boite postale','required' => 'true']) !!}
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Site Web </label>
                {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'site web','required' => 'true']) !!}
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-12 form-group">
                <h3 class="capitalize">Information Utilisateur</h3>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom de l'utilisateur *</label>
                <input name="username" required="" type="text" placeholder="nom d'utilisateur" class="form-control">
                {!! $errors->first('username', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">email de l'utilisateur *</label>
                <input name="email" required="" type="email" placeholder="email d'utilisateur" class="form-control">
                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Mot de passe</label>
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
                {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Confirmation</label>
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe']) !!}
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

