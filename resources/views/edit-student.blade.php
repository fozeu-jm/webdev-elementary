@extends('layouts.template')

@section('title-description')
<title >Elementary | Modifier un étudiant</title>
<meta name="description" content="Elementary">
@endsection

@section('student-active')
sub-group-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Etudiants</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Modifier un etudiant</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3 class="capitalize">Modifier un étudiant</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' =>['students.update',$student->id], 'method' => 'PUT', 'files' => true , 'class' => 'new-added-form']) !!}
        <div class="row">
            @if(session()->has('error'))
            <div class="col-12">
                <div class="alert alert-danger">{!! session('error') !!}</div>
            </div>
            @endif
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom de l'étudiant *</label>
                <input name="firstname" value="{{ $student->firstname }}" required="" type="text" placeholder="nom " class="form-control">
                {!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Prenoms *</label>
                <input name="lastname" value="{{ $student->lastname }}" required="" type="text" placeholder="prenom" class="form-control">
                {!! $errors->first('lastname', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">sexe *</label>
                <input name="gender" value="{{ $student->gender }}" required="" type="text" placeholder="sexe" class="form-control">
                {!! $errors->first('gender', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Nationalité *</label>
                <input name="nationality" value="{{ $student->nationality }}" required="" type="text" placeholder="nationalité" class="form-control">
                {!! $errors->first('nationality', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Date de naissance *</label>
                <input name="datebirth" value="{{ $student->datebirth }}" required="" type="text" placeholder="YYYY/MM/DD" class="form-control air-datepicker">
                {!! $errors->first('datebirth', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Lieu de naissance *</label>
                <input name="birthplace" required="" value="{{ $student->birthplace }}" type="text" placeholder="Lieu de naissance" class="form-control">
                {!! $errors->first('birthplace', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Email *</label>
                <input name="email" value="{{ $student->email }}" required="" type="email" placeholder="email" class="form-control">
                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Numero de telephone *</label>
                <input name="phoneno" value="{{ $student->phoneno }}" required="" type="number" placeholder="telephone (+237)" class="form-control">
                {!! $errors->first('phoneno', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Niveau *</label>
                <select name="niveau" class="select2" required="">
                    <?php
                    $list = array('I', 'II', 'III', 'IV', 'V');
                    foreach ($list as $value) {
                        if ($value == $student->levels) {
                            ?>
                            <option value="<?php echo $value ?>" selected=""><?php echo $value ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $value ?>"><?php echo $value ?></option>
                        <?php }
                    }
                    ?>
                </select>
                {!! $errors->first('niveau', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Numero d'urgence *</label>
                <input name="emergency" value="{{ $student->emergency }}" required="" type="number" placeholder="telephone (+237)" class="form-control">
                {!! $errors->first('emergency', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Classe</label>
                <select name="level" class="select2" required="">
                    @foreach($levels as $level)
                    @if($level->id == $student->level->id)
                    <option value="{{ $level->id }}" selected="">{{ $level->name }}</option>
                    @else
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('level', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label class="capitalize">Année academique</label>
                <select name="academic" class="select2" required="">
                    @foreach($academics as $academic)
                    @if($academic->id == $student->academicYear->id)
                    <option value="{{ $academic->id }}" selected="">{{ $academic->begin }} / {{ $academic->end }}</option>
                    @else
                    <option value="{{ $academic->id }}">{{ $academic->begin }} / {{ $academic->end }}</option>
                    @endif
                    @endforeach
                </select>
                {!! $errors->first('academic', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Addresse *</label>
                <input name="adress" value="{{ $student->adress }}" required="" type="text" placeholder="addresse" class="form-control">
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