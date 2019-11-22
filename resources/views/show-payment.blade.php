@extends('layouts.template')



@section('title-description')
<title >Elementary | Paiement</title>
<meta name="description" content="Elementary">
@endsection


@section('installment-active')
sub-group-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Professeur</h3>
    <ul>
        <li>
            <a href="index-2.html">Home</a>
        </li>
        <li>Profile professeur</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Student Details Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>A propos</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#">...</a>

            </div>
        </div>
        <div class="single-info-details">
            <div style="width: 23%;" class="item-img">
                <img src="/img/pay.jpg" alt="student">
            </div>
            <div class="item-content">
                <div class="header-inline item-header">
                    <h3 class="text-dark-medium font-medium">{!! $payment->installment->label !!}</h3>
                    <div class="header-elements">
                        <ul>
                            <li><a href="{!! URL::route('payments.edit', [$payment->id]) !!}"><i class="far fa-edit"></i></a></li>
                            <li><a href="#"><i class="fas fa-print"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="info-table table-responsive">
                    <table class="table text-nowrap">
                        <tbody>
                            <tr>
                                <td>Payeur:</td>
                                <td class="font-medium text-dark-medium">{!! $payment->student->firstname !!} {!! $payment->student->lastname !!}</td>
                            </tr>
                            <tr>
                                <td>Montant:</td>
                                <td class="font-medium text-dark-medium">{!! number_format($payment->installment->amount) !!} CFA</td>
                            </tr>
                            <tr>
                                <td>Niveau:</td>
                                <td class="font-medium text-dark-medium">{!! $payment->installment->level !!}</td>
                            </tr>
                            <tr>
                                <td>Numero du recu:</td>
                                <td class="font-medium text-dark-medium capitalize">{!! $payment->receiptno !!}</td>
                            </tr>
                            <tr>
                                <td>Date du paiement:</td>
                                <td class="font-medium text-dark-medium">{!! date('d F Y', strtotime($payment->date)) !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Student Details Area End Here -->
@endsection


