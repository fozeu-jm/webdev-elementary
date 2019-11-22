<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        @yield('title-description')
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">

        <!-- Normalize CSS -->
        <link rel="stylesheet" href="/css/normalize.css">

        <!-- Main CSS -->
        <link rel="stylesheet" href="/css/main.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="/css/all.min.css">

        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="/fonts/flaticon.css">

        <!-- Select 2 CSS -->
        <link rel="stylesheet" href="/css/select2.min.css">

        <!-- Date Picker CSS -->
        <link rel="stylesheet" href="/css/datepicker.min.css">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="/css/all.min.css">


        <!-- Animate CSS -->
        <link rel="stylesheet" href="/css/animate.min.css">
        <!-- Data Table CSS -->
        <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="/css/style.css">
        <!-- Modernize js -->
        <script src="/js/modernizr-3.6.0.min.js"></script>
    </head>

    <body>
        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <div id="wrapper" class="wrapper bg-ash">


            <!-- Header Menu Area Start Here -->
            <div class="navbar navbar-expand-md header-menu-one bg-light">
                <div class="nav-bar-header-one">
                    <div style="text-align: -webkit-center;" class="header-logo">
                        <a style="width: 80%;" href="#">
                            <img src="/img/elementary_logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-button sidebar-toggle">
                        <button type="button" class="item-link">
                            <span class="btn-icon-wrap">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="d-md-none mobile-nav-bar">
                    <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                        <i class="far fa-arrow-alt-circle-down"></i>
                    </button>
                    <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                    <ul class="navbar-nav">
                        <li class="navbar-item header-search-bar">
                            <div class="input-group stylish-input-group">
                                <span class="input-group-addon">
                                </span>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="navbar-item dropdown header-admin">
                            <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-expanded="false">
                                <div class="admin-title">
                                    <h5 class="item-title">{{ Auth::user()->name }}</h5>
                                    <span>{{ Auth::user()->role }}</span>
                                </div>
                                <div class="admin-img">
                                    <img src="/img/figure/admin.jpg" alt="Admin">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="item-header">
                                    <h6 class="item-title">{{ Auth::user()->name }}</h6>
                                </div>
                                <div class="item-content">
                                    <ul class="settings-list">
                                        <li><a href="#"><i class="flaticon-two-settings-cogwheels"></i>Parametre</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                                <i class="flaticon-shut-down-icon"></i>Déconnexion
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
<!--                        <li class="navbar-item dropdown header-language">
                            <a class="navbar-nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>EN</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">English</a>
                                <a class="dropdown-item" href="#">Spanish</a>
                                <a class="dropdown-item" href="#">Franchis</a>
                                <a class="dropdown-item" href="#">Chiness</a>
                            </div>
                        </li>-->
                    </ul>
                </div>
            </div>
            <!-- Header Menu Area End Here -->


            <!-- Page Area Start Here -->
            <div class="dashboard-page-one">


                <!-- mobile Sidebar Area Start Here -->
                <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
                    <div class="mobile-sidebar-header d-md-none">
                        <div class="header-logo">
                            <a href="#"><img src="/img/elementary_logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="sidebar-menu-content">
                        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                            <li class="nav-item @yield('setting-active')">
                                <a href="{!! URL::route('dash') !!}" class="nav-link @yield('dashboard-active')"><i
                                        class="flaticon-dashboard"></i><span>Tableau de bord</span></a>
                            </li>
                          
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Etudiants</span></a>
                                <ul class="nav sub-group-menu @yield('student-active')">
                                    <li class="nav-item">
                                        <a href="{{ URL::route('students.index') }}" class="nav-link @yield('all-student')">
                                            <i class="fas fa-angle-right"></i>Tous les étudiants
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ URL::route('students.create') }}" class="nav-link @yield('add-student')"><i
                                                class="fas fa-angle-right"></i>Ajouter un etudiant</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i
                                        class="flaticon-teacher"></i><span>Professeurs</span></a>
                                <ul class="nav sub-group-menu @yield('prof-active')">
                                    <li class="nav-item">
                                        <a href="{!! URL::route('professors.index') !!}" class="nav-link @yield('all-prof')"> 
                                            <i class="fas fa-angle-right"></i>Tous les Professeurs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{!! URL::route('professors.create') !!}" class="nav-link @yield('add-prof')">
                                            <i class="fas fa-angle-right"></i>Ajouter un professeur</a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-calculator"></i><span>Comptabilité</span></a>
                                <ul class="nav sub-group-menu @yield('installment-active')">
                                    <li class="nav-item">
                                        <a href="{!! URL::route('payments.index') !!}" class="nav-link @yield('all-payments')"><i class="fas fa-angle-right"></i>
                                            Tous les paiement
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{!! URL::route('payments.create') !!}" class="nav-link @yield('add-payment')"><i class="fas fa-angle-right"></i>
                                            Enregistrez un paiement
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{!! URL::route('installments.index') !!}" class="nav-link @yield('all-installment')"><i
                                                class="fas fa-angle-right"></i>Toutes les tranches</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{!! URL::route('installments.create') !!}" class="nav-link @yield('add-installment')"><i
                                                class="fas fa-angle-right"></i>Creer un tranche</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i
                                        class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Classe</span></a>
                                <ul class="nav sub-group-menu @yield('level-active')">
                                    <li class="nav-item">
                                        <a href="{!! URL::route('levels.index') !!}" class="nav-link @yield('all-levels')"><i class="fas fa-angle-right"></i>
                                            Toutes les classes
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{!! URL::route('levels.create') !!}" class="nav-link @yield('add-level')">
                                            <i class="fas fa-angle-right"></i>Ajouter une classe</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-open-book"></i><span>Matières</span></a>
                                <ul class="nav sub-group-menu @yield('course-active')">
                                    <li class="nav-item">
                                        <a href="{{ URL::route('courses.index')  }}" class="nav-link @yield('all-course')">
                                            <i class="fas fa-angle-right"></i>Toutes les matières
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ URL::route('courses.create')  }}" class="nav-link @yield('add-course')">
                                            <i class="fas fa-angle-right"></i>Ajouter une matières</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-books-stack-of-three"></i><span>Stage Académique</span></a>
                                <ul class="nav sub-group-menu @yield('internship-active')">
                                    <li class="nav-item">
                                        <a href="{!! URL::route('internships.index') !!}" class="nav-link @yield('all-internship')"><i class="fas fa-angle-right"></i>
                                            Liste des stage étudiants</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{!! URL::route('internships.create') !!}" class="nav-link @yield('add-internship')"><i class="fas fa-angle-right"></i>
                                            Ajouter un stage</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-test"></i><span>Notes d'examen</span></a>
                                <ul class="nav sub-group-menu @yield('exam-active')">
                                    <li class="nav-item ">
                                        <a href="{{ URL::route('students.notes')  }}" class="nav-link @yield('choose-exam')">
                                            <i class="fas fa-angle-right"></i>Entrer les notes d'examen
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ URL::route('students.attendance')  }}" class="nav-link @yield('attendance-active')">
                                    <i class="flaticon-shopping-list"></i><span>Presence</span></a>
                            </li>

                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-users-social-symbol"></i><span>Utilisateurs</span></a>
                                <ul class="nav sub-group-menu @yield('user-active')">
                                    <li class="nav-item">
                                        <a href="{!! URL::route('users.index') !!}" class="nav-link @yield('all-user-active')">
                                            <i class="fas fa-angle-right"></i>Tous les utilisateurs
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{!! URL::route('users.create') !!}" class="nav-link @yield('add-user')">
                                            <i class="fas fa-angle-right"></i>Ajouter un utilisateur</a>
                                    </li>
                                </ul>
                            </li>
                            @if(Auth::user()->role == 'root')
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-university"></i><span>Root Management</span></a>

                                <ul  class="nav sub-group-menu @yield('group-active')">
                                    <li class="nav-item">
                                        <a href="{!! URL::route('schools.index') !!}" class="nav-link @yield('read-active')">
                                            <i class="fas fa-angle-right"></i>
                                            Toutes les écoles
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{!! URL::route('schools.create') !!}" class="nav-link @yield('A-ecole-active')">
                                            <i class="fas fa-angle-right"></i>
                                            Ajouter une école
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{!! URL::route('users.nega') !!}" class="nav-link">
                                            <i class="fas fa-angle-right"></i>
                                            Tous les utilisaateur
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            @endif
                            
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-script"></i><span>Année Académique</span></a>
                                <ul class="nav sub-group-menu @yield('academic-active')">
                                    <li class="nav-item ">
                                        <a href="{!! URL::route('academicyear.index') !!}" class="nav-link @yield('all-academic')"><i class="fas fa-angle-right"></i>
                                            Liste des année académique</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{!! URL::route('academicyear.create') !!}" class="nav-link @yield('add-academic')"><i class="fas fa-angle-right"></i>
                                            Créer une année académique</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @yield('setting-active')">
                                <a href="{!! URL::route('settings.index') !!}" class="nav-link @yield('setting-active')"><i
                                        class="flaticon-two-settings-cogwheels"></i><span>Parametre</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar Area End Here -->

                <div class="dashboard-content-one">
                    @yield('content')
                    <footer class="footer-wrap-layout1">
                        <div class="copyright text-center">
                            &COPY; Copyrights Elementary 2019. All rights reserved. Powered                                                                     by 
                            <a href="https://www.kaizerwebdesign.com" target="_blank">KaizerWebDesign</a></div>
                    </footer>
                </div>
            </div>
            <!-- Page Area End Here -->
        </div>
        <!-- jquery-->
        <script src="/js/jquery-3.3.1.min.js"></script>
        <!-- Plugins js -->
        <script src="/js/plugins.js"></script>
        <!-- Popper js -->
        <script src="/js/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- Scroll Up Js -->
        <script src="/js/jquery.scrollUp.min.js"></script>
        <!-- Data Table Js -->
        <script src="/js/jquery.dataTables.min.js"></script>
        <!-- Select 2 Js -->
        <script src="/js/select2.min.js"></script>
        <!-- Date Picker Js -->
        <script src="/js/datepicker.min.js"></script>
        <!-- Smoothscroll Js -->
        <script src="/js/jquery.smoothscroll.min.html"></script>
        <!-- Scroll Up Js -->
        <script src="/js/jquery.scrollUp.min.js"></script>
        <!-- Custom Js -->
        <script src="/js/main.js"></script>

    </body>


    <!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/all-student.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 May 2019 09:50:33 GMT -->
</html>
