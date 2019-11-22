@extends('layouts.template')


@section('title-description')
<title >Elementary | Profil du professeur</title>
<meta name="description" content="Elementary">
@endsection

@section('prof-active')
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
                <img src="/img/prof.jpg" alt="student">
            </div>
            <div class="item-content">
                <div class="header-inline item-header">
                    <h3 class="text-dark-medium font-medium">{!! $professor->firstname !!} {!! $professor->lastname !!}</h3>
                    <div class="header-elements">
                        <ul>
                            <li><a href="{!! URL::route('professors.edit', [$professor->id]) !!}"><i class="far fa-edit"></i></a></li>
                            <li><a href="#"><i class="fas fa-print"></i></a></li>
                            <li><a href="#"><i class="fas fa-download"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="info-table table-responsive">
                    <table class="table text-nowrap">
                        <tbody>
                            <tr>
                                <td>Noms:</td>
                                <td class="font-medium text-dark-medium">{!! $professor->firstname !!}</td>
                            </tr>
                            <tr>
                                <td>Prenoms:</td>
                                <td class="font-medium text-dark-medium">{!! $professor->lastname !!}</td>
                            </tr>
                            <tr>
                                <td>Sexe:</td>
                                <td class="font-medium text-dark-medium capitalize">{!! $professor->gender !!}</td>
                            </tr>
                            <tr>
                                <td>Date de naissance:</td>
                                <td class="font-medium text-dark-medium">{!! $professor->datebirth !!}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td class="font-medium text-dark-medium">{!! $professor->email !!}</td>
                            </tr>
                            <tr>
                                <td>Telephone:</td>
                                <td class="font-medium text-dark-medium">{!! $professor->phoneno !!}</td>
                            </tr>
                            <tr>
                                <td>Adresse:</td>
                                <td class="font-medium text-dark-medium">{!! $professor->adress !!}</td>
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