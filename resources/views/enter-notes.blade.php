@extends('layouts.template')


@section('title-description')
<title >Elementary | Remplir les notes</title>
<meta name="description" content="Elementary">
@endsection

@section('exam-active')
sub-group-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Notes d'examen</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Ajouter matière</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->

<!-- Add New Book Area Start Here -->
<div class="card height-auto">
    <div class="card-body">


        <div class="heading-layout1">
            <div class="item-title">
                <h3 >Imprimer le bulletin</h3>
            </div>

        </div>
        {!! Form::open(['route' => ['students.printReport',$student->id],'method' =>'put']) !!}
        <div style="margin-bottom: 40px;" class="row">

            <div class="col-xl-3 col-lg-12 col-12 form-group">
                <input name="the_title" required="" type="text" placeholder="Titre du bulletin" class="form-control">
                {!! $errors->first('the_title', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-12 col-12 form-group">
                <input name="the_comment" required="" type="text" placeholder="Commentaire du conseil" class="form-control">
                {!! $errors->first('the_comment', '<small class="help-block">:message</small>') !!}
            </div>
            
            <div class="col-xl-3 col-lg-12 col-12 form-group">
                <input name="the_discipline" required="" type="text" placeholder="Commentaire Disciplinaire" class="form-control">
                {!! $errors->first('the_discipline', '<small class="help-block">:message</small>') !!}
            </div>

            <div class="col-xl-3 col-lg-12 col-12 form-group ">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Imprimer</button>
            </div>

        </div>
        {!! Form::close() !!}


        <div class="heading-layout1">
            <div class="item-title">
                <h3 >Entrer les notes de l'etudiant(e) {{ $student->firstname }} {{ $student->lastname }}</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button">...</a>

                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
        {!! Form::open(['route' => ['students.enter',$student->id],'method' =>'put', 'class' => 'new-added-form']) !!}
        <div class="row">
            <?php $i = 0; ?>
            @foreach($level->course as $subject)
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Nom de la matière *</label>
                <select name="subject-<?php echo $i; ?>" class="form-control select2 black-select" >
                    <option style="color: black;" value="{{ $subject->id }}">{{ $subject->name }}</option>
                </select>
                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label class="capitalize">Notes obtenu *</label>
                <?php
                $mark = "";
                foreach ($student->course as $matiere) {
                    if ($matiere->id == $subject->id) {
                        $mark = $matiere->pivot->mark;
                    }
                }
                ?>

                <input name="mark-<?php echo $i; ?>" value="<?php echo $mark; ?>" type="number" min="0" step="any" max="20" placeholder="note" class="form-control">
                {!! $errors->first('coefficient', '<small class="help-block">:message</small>') !!}
            </div>
            <?php $i++; ?>
            @endforeach

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
