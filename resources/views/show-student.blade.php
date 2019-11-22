@extends('layouts.template')


@section('title-description')
<title >Elementary | Profil de l'étudiant</title>
<meta name="description" content="Elementary">
@endsection

@section('student-active')
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
        <li>Profile etudiant</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Student Details Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Fiche de l'étudiant(e)</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#">...</a>

            </div>
        </div>
        <div class="single-info-details">
            <?php
            if (is_null($student->picture)) {
                $picture = "user.jpg";
            } else {
                $picture = $student->picture;
            }
            ?>
            <div style="width: 23%;" class="item-img">
                <img src="/uploads/{{ $picture }}" alt="Profile etudiant | elementary systeme de gestion d'université">
            </div>
            <div class="item-content">
                <div class="header-inline item-header">
                    <h3 class="text-dark-medium font-medium">{!! $student->firstname !!} {!! $student->lastname !!}</h3>
                    <div class="header-elements">
                        <ul>
                            <li><a href="{!! URL::route('students.edit', [$student->id]) !!}"><i class="far fa-edit"></i></a></li>
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
                                <td class="font-medium text-dark-medium">{!! $student->firstname !!}</td>
                            </tr>
                            <tr>
                                <td>Prenoms:</td>
                                <td class="font-medium text-dark-medium">{!! $student->lastname !!}</td>
                            </tr>
                            <tr>
                                <td>Sexe:</td>
                                <td class="font-medium text-dark-medium capitalize">{!! $student->gender !!}</td>
                            </tr>
                            <tr>
                                <td>Date de naissance:</td>
                                <td class="font-medium text-dark-medium">{!! $student->datebirth !!}</td>
                            </tr>
                            <tr>
                                <td>Classe:</td>
                                <td class="font-medium text-dark-medium">{!! $student->level->name !!}</td>
                            </tr>
                            <tr>
                                <td>Année Academique:</td>
                                <td class="font-medium text-dark-medium">{!! $student->academicYear->begin !!} / {!! $student->academicYear->end !!}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td class="font-medium text-dark-medium">{!! $student->email !!}</td>
                            </tr>
                            <tr>
                                <td>Telephone:</td>
                                <td class="font-medium text-dark-medium">{!! $student->phoneno !!}</td>
                            </tr>
                            <tr>
                                <td>Adresse:</td>
                                <td class="font-medium text-dark-medium">{!! $student->adress !!}</td>
                            </tr>
                            <tr>
                                <td>Numero d'urgence:</td>
                                <td class="font-medium text-dark-medium">{!! $student->emergency !!}</td>
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