@extends('layouts.template')

@section('title-description')
<title >Elementary | Liste des année académique</title>
<meta name="description" content="Elementary">
@endsection


@section('academic-active')
sub-group-active
@endsection

@section('all-academic')
menu-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Année Académique</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Toutes les Année Académique</li>
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
                    Données sur les écoles
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

       
        <div class="container-fluid">
            <div class="row">
                @foreach ($academics as $academic)
                <!-- Student Item -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="student-inner-std res-mg-b-30">
                        <div class="student-img">
                            <img src="/img/academic.jpg" alt="" />
                        </div>
                        <div class="student-dtl">
                            <h2>{!! $academic->begin !!} / {!! $academic->end !!}</h2>
                            <div class="action">
                                <a class="action-link" href="{!! URL::route('academicyear.edit', [$academic->id]) !!}"><i class="flaticon-edit"></i></a>
                                {!! Form::open(['route' => ['academicyear.destroy',$academic->id],'method' => 'DELETE', 'class' => 'deleter new-added-form']) !!}
                                <button style="border: none; background: none; color: #007bff;cursor: pointer;" onclick="return confirm('Vraiment supprimer ?')" type="submit" class="action-link">
                                    <i class="flaticon-delete"></i>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            {{$links }}
        </div>
    </div>
</div>
@endsection
<!-- Student Table Area End Here -->