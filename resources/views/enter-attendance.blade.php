@extends('layouts.template')


@section('title-description')
<title >Elementary | Enregistrez les absences</title>
<meta name="description" content="Elementary">
@endsection

@section('attendance-active')
menu-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Heure D'abscence</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Ajouter heure</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 >Entrer les heure d'abscence de l'etudiant(e) {{ $student->firstname }} {{ $student->lastname }}</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => ['students.saveAbscence',$student->id],'method' =>'put', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom  *</label>
                <select name="student" class="form-control select2 black-select" >
                    <option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->lastname }}</option>
                </select>
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Heure d'absence totale </label>
                <input name="abscences" value="<?php echo isset($student->attendance[0]->abscences) ? $student->attendance[0]->abscences : null ?>" type="number" min="0" placeholder="heure d'absence" class="form-control">
                {!! $errors->first('coefficient', '<small class="help-block">:message</small>') !!}
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
