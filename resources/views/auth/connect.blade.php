<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Elementary | Connexion</title>

        <!-- Normalize CSS -->
        <link rel="stylesheet" href="/css/normalize.css">
        
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">

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
        <link href="/css/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <link href="/css/login.css" rel="stylesheet" media="all">

        <link href="/css/animate.css" rel="stylesheet" media="all">
    </head>
    <body style="margin: 0;">

        <div class="container">
            <div class="row">
                <div style="margin: auto;" class="col-md-4 text-center animated fadeInDown ">
                    <img style="max-width: 100%;" class="mobile-img" src="/img/elementary_logo.png" alt=""/>
                </div>
            </div>
        </div>

        <div class="modal-dialog text-center row">
            <div class="col-sm-12 col-md-9 main-section">
                <div class="modal-content">
                    <div class="col-12 user-img">
                        <img src="/images/person.png" alt="user-logo">
                    </div>

                    <div class="col-12 form-input">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input style="height: auto;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <button class="btn btn-success custom-btn">Login</button>
                        </form>
                    </div>
                    <div class="col-12 forgot">
                        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    </div>

                </div>
            </div>
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
        <!-- Scroll Up Js -->
        <script src="/js/jquery.scrollUp.min.js"></script>
    </body>
</html>
