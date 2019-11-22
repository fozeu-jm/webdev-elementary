@extends('layouts.template')

@section('title-description')
<title >Elementary | Modifier un professeur</title>
<meta name="description" content="Elementary">
@endsection

@section('prof-active')
sub-group-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Utilisateurs</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Ajouter un utilisateur</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Ajouter un nouvelle utilisateur</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::model($professor, ['route' => ['professors.update',$professor->id], 'method' => 'PUT', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom  *</label>
                {!! Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'nom', 'required' => 'true']) !!}
                {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Prenom *</label>
                {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'prenom', 'required' => 'true']) !!}
                {!! $errors->first('lastname', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Date de Naissance *</label>
                {!! Form::text('datebirth', null, ['class' => ['form-control','air-datepicker'], 'placeholder' => 'yyyy/mm/dd', 'required' => 'true']) !!}
                {!! $errors->first('datebirth', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Sexe *</label>
                {!! Form::text('gender', null, ['class' => 'form-control', 'placeholder' => 'sexe', 'required' => 'true']) !!}
                {!! $errors->first('gender', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Email *</label>
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email', 'required' => 'true']) !!}
                {!! $errors->first('datebirth', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Telephone *</label>
                {!! Form::number('phoneno', null, ['class' => 'form-control', 'placeholder' => 'telephone', 'required' => 'true']) !!}
                {!! $errors->first('phoneno', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Addresse *</label>
                {!! Form::text('adress', null, ['class' => 'form-control', 'placeholder' => 'addresse', 'required' => 'true']) !!}
                {!! $errors->first('adress', '<small class="help-block">:message</small>') !!}
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