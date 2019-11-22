@extends('layouts.template')

@section('title-description')
<title >Elementary | Ajouter un stage</title>
<meta name="description" content="Elementary">
@endsection


@section('internship-active')
sub-group-active
@endsection

<?php
$related = array();
foreach ($internship->student as $relate) {
    array_push($related, $relate->id);
}

?>

@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Stage Academique</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Modifier un stage</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Modifier un stage</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => ['internships.update', $internship->id], 'method' => 'put', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Theme du stage *</label>
                <input name="theme" required="" value="{{ $internship->theme }}" type="text" placeholder="theme" class="form-control">
                {!! $errors->first('theme', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label> Participant(s) *</label>
                <select name="students[]" class="select2" multiple="multiple">
                    @foreach($students as $student)
                    
                    @if(in_array($student->id,$related))
                    <option value="{{ $student->id }}" selected="">{{ $student->firstname.' '.$student->lastname }} - {{ $student->level->name }}</option>
                    @else
                    <option value="{{ $student->id }}">{{ $student->firstname.' '.$student->lastname }} - {{ $student->level->name }}</option>
                    @endif
                    
                    
                    @endforeach
                </select>
                {!! $errors->first('students', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label>Note de soustenance</label>
                @foreach($internship->student as $etude)
                <input name="mark" value="{{ $etude->pivot->mark }}" type="number" placeholder="note" class="form-control">
                @break;
                @endforeach
                {!! $errors->first('mark', '<small class="help-block">:message</small>') !!}
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