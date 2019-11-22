@extends('layouts.template')

@section('title-description')
<title >Elementary | Modifier une année académique</title>
<meta name="description" content="Elementary">
@endsection

@section('academic-active')
sub-group-active
@endsection

@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Année Académique</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Modifié une Année Académique</li>
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

                    @endif
                </h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => ['academicyear.update',$academic->id], 'method'=> 'PUT', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Début *</label>
                <select name="begin" class="select2">
                    <option value="" disabled="" selected="">Choissisez une année *</option>
                    @foreach($years as $year)
                    @if($academic->begin == $year)
                    <option value="{{ $year }}" selected="">{{ $year }}</option>
                    @else
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endif

                    @endforeach
                </select>
                {!! $errors->first('begin', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Début *</label>
                <select name="end" class="select2">
                    <option value="" disabled="" selected="">Choissisez une année *</option>
                    @foreach($years as $year)
                    @if($academic->end == $year)
                    <option value="{{ $year }}" selected="">{{ $year }}</option>
                    @else
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endif

                    @endforeach
                </select>
                {!! $errors->first('begin', '<small class="help-block">:message</small>') !!}
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
