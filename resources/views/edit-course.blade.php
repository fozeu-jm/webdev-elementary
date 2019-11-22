@extends('layouts.template')


@section('title-description')
<title >Elementary | Modifier Une Matière</title>
<meta name="description" content="Elementary">
@endsection

@section('course-active')
sub-group-active
@endsection


<?php
$related = array();
foreach ($course->level as $relate) {
    array_push($related, $relate->id);
}

$related2 = array();
foreach ($course->professor as $relate2) {
    array_push($related2, $relate2->id);
}

?>

@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Matière</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Ajouter matière</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Ajouter une matière</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => ['courses.update',$course->id], 'method' => 'PUT', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom de la matière *</label>
                {!! Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'nom', 'required' => 'true']) !!}
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Coefficient de la matière *</label>
                {!! Form::number('coefficient', $course->coefficient, ['class' => 'form-control', 'placeholder' => 'coefficient','required' => 'true']) !!}
                {!! $errors->first('coefficient', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Professeur(s)  de la matière *</label>
                <select name="professor[]" class="select2" multiple="multiple">
                    @foreach($professors as $professor)

                    @if(in_array($professor->id,$related2))
                    <option value="{{ $professor->id }}" selected="">{{ $professor->firstname }} {{ $professor->lastname }}</option>
                    @else
                    <option value="{{ $professor->id }}">{{ $professor->firstname }} {{ $professor->lastname }}</option>
                    @endif

                    @endforeach
                </select>
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Les classes faisant cette matière</label>
                <select name="levels[]" class="select2" multiple="multiple" required="">
                    @foreach($levels as $level)

                    @if(in_array($level->id,$related))
                    <option value="{{ $level->id }}" selected="">{{ $level->name }}</option>
                    @else
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endif

                    @endforeach
                </select>
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
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

