@extends('layouts.template')


@section('title-description')
<title >Elementary | Toutes les classes</title>
<meta name="description" content="Elementary">
@endsection

@section('level-active')
sub-group-active
@endsection

@section('all-levels')
menu-active
@endsection

@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Classes</h3>
    <ul>
        <li>
            <a href="index-2.html">Accueil</a>
        </li>
        <li>Toutes les classes</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Student Table Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>
                    @if(isset($message))
                    {!! $message !!}
                    @else
                    Données sur les classes
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

        {!! Form::open(['route' => 'levels.search', 'class' => 'mg-b-20', 'method' => 'POST']) !!}
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
                @foreach ($levels as $level)
                <!-- Student Item -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="student-inner-std res-mg-b-30">
                        <div class="student-img">
                            <img src="/img/user.jpg" alt="" />
                        </div>
                        <div class="student-dtl">
                            <h2>{!! $level->name !!}</h2>
                            <div style="text-align: center" class="info">
                                <?php $result = breaker($level->name); ?>
                                <p class="dp"><b>Filière :</b> {!! $result['filiere'] !!}</p>
                                <p class="dp"><b>Niveau :</b> {!! $result['niveau'] !!}</p>
                            </div>
                            <div class="action">
                                <a class="action-link" href="{!! URL::route('levels.edit', [$level->id]) !!}"><i class="flaticon-edit"></i></a>
                                {!! Form::open(['route' => ['levels.destroy',$level->id],'method' => 'DELETE', 'class' => 'deleter new-added-form']) !!}
                                <button style="border: none; background: none; color: #007bff;cursor: pointer;" onclick="return confirm('Vraiment supprimer cette classe?')" type="submit" class="action-link">
                                    <i class="flaticon-delete"></i>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    {{$links}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<?php
    
function breaker ($text){
    $pieces = explode('-', $text);
    $n = count($pieces);
    $first = array();
    $last = '';
    
    for($i=0;$i<$n;$i++){
        if($i == $n-1){
            $last = $pieces[$i];
        }else{
            array_push($first, $pieces[$i]);
        }
    }
    
    $result = array(
        'filiere' => implode('', $first),
        'niveau' => $last
    );
    
    return $result;
}

?>
<!-- Student Table Area End Here -->