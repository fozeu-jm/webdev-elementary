@extends('layouts.template')


@section('title-description')
<title >Elementary | Accueil</title>
<meta name="description" content="Elementary">
@endsection

@section('dashboard-active')
menu-active
@endsection


@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Tableau de bord</h3>
    <ul>
        <li>
            <a href="#">Accueil</a>
        </li>
        <li>Admin</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Dashboard summery Start Here -->
<div class="row gutters-20">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-green ">
                        <i class="flaticon-classmates text-green"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Students</div>
                        <div class="item-number"><span class="counter" data-num="{{ $students->count() }}">{{ number_format($students->count())}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-blue">
                        <i class="flaticon-multiple-users-silhouette text-blue"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Teachers</div>
                        <div class="item-number"><span class="counter" data-num="{{ $professors->count()}}">{{ number_format($professors->count())}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-yellow">
                        <i class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler text-orange"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Classes</div>
                        <div class="item-number"><span class="counter" data-num="{{ $levels->count()}}">{{ number_format($levels->count())}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-red">
                        <i class="flaticon-open-book text-red"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Matières</div>
                        <div class="item-number"><span class="counter" data-num="{{ $courses->count()}}">{{ number_format($courses->count())}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard summery End Here -->

@endsection