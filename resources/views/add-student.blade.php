@extends('layouts.template')

@section('title-description')
<title >Elementary | Inscrire Un étudiant</title>
<meta name="description" content="Elementary">
@endsection


@section('student-active')
sub-group-active
@endsection

@section('add-student')
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
        <li>Ajouter un etudiant</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Ajouter un nouvelle étudiant</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' =>'students.store', 'files' => true , 'class' => 'new-added-form']) !!}
        <div class="row">
            @if(session()->has('error'))
            <div class="col-12">
                <div class="alert alert-danger">{!! session('error') !!}</div>
            </div>
            @endif
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom de l'étudiant *</label>
                <input name="firstname" required="" type="text" placeholder="nom " class="form-control">
                {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Prenoms *</label>
                <input name="lastname" required="" type="text" placeholder="prenom" class="form-control">
                {!! $errors->first('lastname', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">sexe *</label>
                <input name="gender" required="" type="text" placeholder="sexe" class="form-control">
                {!! $errors->first('gender', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nationalité *</label>
                <input name="nationality" required="" type="text" placeholder="nationalité" class="form-control">
                {!! $errors->first('nationality', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Date de naissance *</label>
                <input name="datebirth" required="" type="text" placeholder="YYYY/MM/DD" class="form-control air-datepicker">
                {!! $errors->first('datebirth', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Lieu de naissance *</label>
                <input name="birthplace" required="" type="text" placeholder="Lieu de naissance" class="form-control">
                {!! $errors->first('birthplace', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Email *</label>
                <input name="email" required="" type="email" placeholder="email" class="form-control">
                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Numero de telephone *</label>
                <input name="phoneno" required="" type="number" placeholder="telephone (+237)" class="form-control">
                {!! $errors->first('phoneno', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Niveau *</label>
                <select name="niveau" class="select2" required="">
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                </select>
                {!! $errors->first('niveau', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Numero d'urgence *</label>
                <input name="emergency" required="" type="number" placeholder="telephone (+237)" class="form-control">
                {!! $errors->first('emergency', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Classe</label>
                <select name="level" class="select2" required="">
                    @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('level', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Année academique</label>
                <select name="academic" class="select2" required="">
                    @foreach($academics as $academic)
                    <option value="{{ $academic->id }}">{{ $academic->begin }} / {{ $academic->end }}</option>
                    @endforeach
                </select>
                {!! $errors->first('academic', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Addresse *</label>
                <input name="adress" required="" type="text" placeholder="addresse" class="form-control">
                {!! $errors->first('adress', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Photo de l'etudiant *</label>
                <input name="picture"  type="file" class="form-control">
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