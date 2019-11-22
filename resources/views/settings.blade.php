@extends('layouts.template')


@section('title-description')
<title >Elementary | Paramètre</title>
<meta name="description" content="Elementary">
@endsection

@section('setting-active')
menu-active
@endsection



@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Paramètre</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Paramètre</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">
                    @if(session()->has('message'))
                    {!! session('message') !!}
                    @else
                    Gerer vos reglages
                    @endif
                </h3>
            </div>
            <div style="width: 10%;" class="dropdown">
                <img src="/uploads/{{$setting->logo}}" alt="">
            </div>
        </div>
        {!! Form::model($setting,['route' => ['settings.update',$setting->id], 'method' => 'put', 'files' => true , 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-12  col-12 form-group">
                <label class="capitalize">Noms de l'ecole dans une langue secondaire *</label>
                {!! Form::text('name_en', null, ['class' => 'form-control', 'placeholder' => 'Noms','required' => 'true']) !!}
                {!! $errors->first('begin', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-12 form-group">
                <label class="capitalize">Slogan de l'école (Fr)</label>
                {!! Form::text('motto', null, ['class' => 'form-control', 'placeholder' => 'Slogan Francais','required' => 'true']) !!}
                {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-6 col-12 form-group">
                <label class="capitalize">Slogan de l'école (En)</label>
                {!! Form::text('motto_en', null, ['class' => 'form-control', 'placeholder' => 'Slogan anglais','required' => 'true']) !!}
                {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-6 col-12 form-group">
                <label class="capitalize">Poste du Signeur du bulletin </label>
                {!! Form::text('sign_title', null, ['class' => 'form-control', 'placeholder' => 'Slogan anglais','required' => 'true']) !!}
                {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-6  col-12 form-group">
                <label class="capitalize">Nom du Signeur du bulletin </label>
                {!! Form::text('sign_name', null, ['class' => 'form-control', 'placeholder' => 'Slogan anglais','required' => 'true']) !!}
                {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-12 form-group">
                <label class="capitalize">Pourcentage de la note de stage (%) </label>
                {!! Form::number('intern_percent', null, ['class' => 'form-control', 'placeholder' => 'Slogan anglais','required' => 'true']) !!}
                {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Logo de l'ecole ( Taille conseillé : 800 x 800) *</label>
                <input name="logo"  type="file" class="form-control">
                {!! $errors->first('picture', '<small class="help-block">:message</small>') !!}
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