@extends('layouts.template')


@section('title-description')
<title >Elementary | Creer une tranche</title>
<meta name="description" content="Elementary">
@endsection

@section('installment-active')
sub-group-active
@endsection

@section('add-installment')
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
        <li>Creer date limite</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Creer une date limite</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => 'installments.store', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-12 form-group">
                <label class="capitalize">Libellé *</label>
                {!! Form::text('label', null, ['class' => 'form-control', 'placeholder' => 'libellé', 'required' => 'true']) !!}
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-4 col-lg-6 col-12 form-group">
                <label class="capitalize">Montant (FCFA) *</label>
                {!! Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 'CFA','required' => 'true']) !!}
                {!! $errors->first('amount', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-4 col-lg-6 col-12 form-group">
                <label class="capitalize ">Niveau *</label>
                <select class="select2" name="level">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                {!! $errors->first('level', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Année academique *</label>
                <select name="academic" class="select2" required="">
                    @foreach($academics as $academic)
                    <option value="{{ $academic->id }}">{{ $academic->begin }} / {{ $academic->end }}</option>
                    @endforeach
                </select>
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Date limite</label>
                <input name="dateline" required="" type="text" placeholder="YYYY/MM/DD" class="form-control air-datepicker">
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

