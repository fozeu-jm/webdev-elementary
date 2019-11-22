@extends('layouts.template')



@section('title-description')
<title >Elementary | Modifier Un Paiement</title>
<meta name="description" content="Elementary">
@endsection


@section('installment-active')
sub-group-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Paiement</h3>
    <ul>
        <li>
            <a href="index-2.html">Accueil</a>
        </li>
        <li>Modifier un paiement</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Enregistrez un paiement</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::model($payment,['route' =>['payments.update',$payment->id],'method' => 'put', 'class' => 'new-added-form']) !!}
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Etudiants *</label>
                <select name="student" class="select2">
                    <option value="" disabled="" selected="">Choissisez l'etudiant</option>
                    @foreach($students as $student)
                    @if($payment->stu_id == $student->id)
                    <option selected="" value="{{ $student->id }}">{{ $student->firstname.' '.$student->lastname }} - {{ $student->academicYear->begin.' / '.$student->academicYear->end }}</option>
                    @else
                    <option value="{{ $student->id }}">{{ $student->firstname.' '.$student->lastname }} - {{ $student->academicYear->begin.' / '.$student->academicYear->end }}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Paiement *</label>
                <select name="installment" class="select2">
                    <option value="" disabled="" selected="">Choissisez la tranche payer</option>
                    @foreach($installments as $installment)
                    @if($payment->ins_id == $installment->id)
                    <option selected="" value="{{ $installment->id }}">{{ $installment->label }} - {{ number_format($installment->amount)  }}</option>
                    @else
                    <option value="{{ $installment->id }}">{{ $installment->label }} - {{ number_format($installment->amount)  }}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('installment', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Numero du recu </label>
                {!! Form::text('receiptno', null, ['class' => 'form-control', 'placeholder' => 'numéro du recu']) !!}
                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Date du paiement </label>
                {!! Form::text('date', null, ['class' => 'form-control air-datepicker', 'placeholder' => 'date de paiement','required' => 'true']) !!}
                {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
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
