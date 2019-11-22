@extends('layouts.template')

@section('title-description')
<title >Elementary | Modifier une école</title>
<meta name="description" content="Elementary">
@endsection

@section('group-active')
sub-group-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Écoles</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Modifier école</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">
                    @if(isset($message))
                        {!! $message !!}
                    @else
                        Données sur les écoles
                    @endif
                </h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::model($college, ['route' => ['schools.update',$college->id],'method' => 'PUT', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom de l'école *</label>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nom', 'required' => 'true']) !!}
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">email de l'école *</label>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email','required' => 'true']) !!}
                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Numero de l'école *</label>
                {!! Form::text('phoneno', null, ['class' => 'form-control', 'placeholder' => 'numéro de téléphone','required' => 'true']) !!}
                {!! $errors->first('phoneno', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Boite postale (B.P) </label>
                {!! Form::text('po_box', null, ['class' => 'form-control', 'placeholder' => 'boite postale','required' => 'true']) !!}
                {!! $errors->first('po_box', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Site Web </label>
                {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'site web','required' => 'true']) !!}
                {!! $errors->first('website', '<small class="help-block">:message</small>') !!}
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