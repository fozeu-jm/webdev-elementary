@extends('layouts.template')



@section('title-description')
<title >Elementary | Ajouter Une Matière</title>
<meta name="description" content="Elementary">
@endsection


@section('course-active')
sub-group-active
@endsection

@section('add-course')
menu-active
@endsection


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
        {!! Form::open(['route' => 'courses.store', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom de la matière *</label>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nom', 'required' => 'true']) !!}
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Coefficient de la matière *</label>
                {!! Form::number('coefficient', null, ['class' => 'form-control', 'placeholder' => 'coefficient','required' => 'true']) !!}
                {!! $errors->first('coefficient', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Professeur(s)  de la matière *</label>
                <select name="professor[]" class="select2" multiple="multiple" required="">
                    @foreach($professors as $professor)
                    <option value="{{ $professor->id }}">{{ $professor->firstname }} {{ $professor->lastname }}</option>
                    @endforeach
                </select>
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Les classes faisant cette matière</label>
                <select name="levels[]" class="select2" multiple="multiple" required="">
                    @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
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

