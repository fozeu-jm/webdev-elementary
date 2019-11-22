@extends('layouts.template')



@section('title-description')
<title >Elementary | Ajouter Un utilisateur</title>
<meta name="description" content="Elementary">
@endsection

@section('prof-active')
sub-group-active
@endsection

@section('add-prof')
menu-active
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
        {!! Form::open(['route' => 'professors.store', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom  *</label>
                <input name="firstname" required="" type="text" placeholder="nom " class="form-control">
                {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Prenom *</label>
                <input name="lastname" required="" type="text" placeholder="prenom" class="form-control">
                {!! $errors->first('lastname', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Date de Naissance *</label>
                <input name="datebirth" type="text" placeholder="yyyy/mm/dd" class="form-control air-datepicker">
                {!! $errors->first('datebirth', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Sexe *</label>
                <input name="gender" required="" type="text" placeholder="sexe" class="form-control">
                {!! $errors->first('gender', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Email *</label>
                <input name="email" required="" type="email" placeholder="email " class="form-control">
                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Telephone *</label>
                <input name="phoneno" required="" type="number" placeholder="telephone" class="form-control">
                {!! $errors->first('phoneno', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Addresse *</label>
                <input name="adress" required="" type="text" placeholder="addressse" class="form-control">
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


