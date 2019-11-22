@extends('layouts.template')

@section('title-description')
<title >Elementary | Tous les paiements</title>
<meta name="description" content="Elementary">
@endsection

@section('installment-active')
sub-group-active
@endsection

@section('all-payments')
menu-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Paiement</h3>
    <ul>
        <li>
            <a href="index-2.html">Accueil</a>
        </li>
        <li>Tous les paiement</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Student Table Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>
                    @if(session()->has('message'))
                    {!! session('message') !!}
                    @else
                    Données sur les paiement
                    @endif
                </h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" >...</a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-times text-orange-red"></i>Close</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                </div>
            </div>
        </div>

        {!! Form::open(['route' => 'payments.search', 'class' => 'mg-b-20', 'method' => 'POST']) !!}
        <div class="row gutters-8">
            <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                <input type="text" name="term" placeholder="Recherche" class="form-control" required="">
            </div>
            <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                <button style="width: auto;" type="submit" class="fw-btn-fill btn-gradient-yellow">RECHERCHER</button>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="container-fluid">
            <div class="row">
                @foreach ($payments as $payment)
                <!-- Student Item -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="student-inner-std res-mg-b-30">
                        <div class="student-img">
                            <img src="/img/pay.jpg" alt="" />
                        </div>
                        <div class="student-dtl">
                            <h2>{!! $payment->label !!}</h2>
                            <div style="text-align: center" class="info">
                                <p class="dp" ><b>Clients :</b> {{ $payment->student->firstname }} {{ $payment->student->lastname }}</p>
                                <p class="dp-ag"><b>Montant:</b> {!! number_format($payment->installment->amount) !!} CFA</p>
                                <p class="dp-ag"><b>Date:</b> {!! date('d F Y', strtotime($payment->date))  !!}</p>
                            </div>
                            <div class="action">
                                <a class="action-link" href="{!! URL::route('payments.show', [$payment->id]) !!}"><i class="flaticon-cv"></i></a>
                                <a class="action-link" href="{!! URL::route('payments.edit', [$payment->id]) !!}"><i class="flaticon-edit"></i></a>
                                {!! Form::open(['route' => ['payments.destroy',$payment->id],'method' => 'DELETE', 'class' => 'deleter new-added-form']) !!}
                                <button style="border: none; background: none; color: #007bff;cursor: pointer;" onclick="return confirm('Vraiment supprimer cette école?')" type="submit" class="action-link">
                                    <i class="flaticon-delete"></i>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    {{ $links }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Student Table Area End Here -->