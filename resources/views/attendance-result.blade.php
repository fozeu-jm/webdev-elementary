@extends('layouts.template')


@section('title-description')
<title >Elementary | Les etudiants</title>
<meta name="description" content="Elementary">
@endsection

@section('attendance-active')
menu-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Etudiants</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Presence au cours</li>
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
                    Entrer les notes des étudiants
                    @endif
                </h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-expanded="false">...</a>

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

        {!! Form::open(['route' => 'students.filterPresence', 'class' => 'mg-b-20', 'method' => 'POST']) !!}
        <div class="row gutters-8">
            <div class="col-xl-3 col-lg-3 col-12 form-group">
                <input type="text" name="term" placeholder="Recherche par noms" class="form-control">
            </div>
            <div class="col-xl-3 col-lg-3 col-12 form-group">
                <select name="level" class="select2">
                    <option value="" disabled="" >Recherche par classe</option>
                    @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-12 form-group">
                <select name="academic" class="select2">
                    <option value="" disabled="">Recherche par année academique</option>
                    @foreach($academics as $academic)
                    <option value="{{ $academic->id }}">{{ $academic->begin }} / {{ $academic->end }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-12 form-group">
                <button style="width: auto;" type="submit" class="fw-btn-fill btn-gradient-yellow">RECHERCHER</button>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="container-fluid">
            <div class="row">
                @foreach ($students as $student)
                <!-- Student Item -->
                <?php
                if (is_null($student->picture)) {
                    $picture = "user.jpg";
                } else {
                    $picture = $student->picture;
                }
                ?>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="student-inner-std res-mg-b-30">
                        <div class="student-img">
                            <img src="/uploads/{{ $picture }}" alt="Elementary Student Management System" />
                        </div>
                        <div class="student-dtl">
                            <h2 style="font-weight: 500;">{!! $student->firstname !!} <br> {!! $student->lastname !!}</h2>
                            <div style="text-align: center" class="info">
                                <p class="dp"><b>Class:</b> {!! $student->level->name !!}</p>
                                <p class="dp"><b>email:</b> {!! $student->email !!}</p>
                            </div>
                            <div class="action">
                                <a class="action-link" href="{!! URL::route('students.fillAttendance', [$student->id]) !!}"><i class="flaticon-edit"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
<!-- Student Table Area End Here -->