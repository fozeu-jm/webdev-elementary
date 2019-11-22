@extends('layouts.template')


@section('title-description')
<title >Elementary | Modifier une tranche</title>
<meta name="description" content="Elementary">
@endsection

@section('installment-active')
sub-group-active
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
                <h3 class="capitalize">Modifier une date limite</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::model($installment,['route' => ['installments.update',$installment->id], 'method' =>'put', 'class' => 'new-added-form']) !!}
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
                    <?php 
                        $items = array(1,2,3,4,5);
                    ?>
                    @foreach($items as $item)
                    @if($item == $installment->level)
                    <option value="{{ $item }}" selected="">{{ $item }}</option>
                    @else
                    <option value="{{ $item }}">{{ $item }}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('level', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Année academique *</label>
                <select name="academic" class="select2" required="">
                    @foreach($academics as $academic)
                    @if($installment->academicYear->id == $academic->id)
                    <option value="{{ $academic->id }}" selected="">{{ $academic->begin }} / {{ $academic->end }}</option>
                    @else
                    <option value="{{ $academic->id }}">{{ $academic->begin }} / {{ $academic->end }}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label class="capitalize">Date limite</label>
                {!! Form::text('dateline', null, ['class' => 'form-control air-datepicker', 'placeholder' => 'YYYY/MM/DD', 'required' => 'true']) !!}
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
