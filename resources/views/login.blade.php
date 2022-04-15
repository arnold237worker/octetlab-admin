<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/upzet/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Mar 2022 04:06:33 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>OctetLab | Connexion </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Tableau de bord d'OctetLab" name="description" />
        <meta content="Arnold FOSSO" name="author" />
        <!-- App favicon -->
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}} ">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}} ">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">

        <!-- Bootstrap Css -->
        <link href=" {{asset('assets/css/bootstrap.min.css')}} " id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=" {{asset('assets/css/icons.min.css')}} " rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=" {{asset('assets/css/app.min.css')}} " id="app-style" rel="stylesheet" type="text/css" />
        <link href=" {{asset('assets/css/noty.css')}} " rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <a href="#" class="">
                                            <img src=" {{asset('assets/images/4.png')}} " alt="" height="24" class="auth-logo logo-dark mx-auto">
                                            <img src="{{asset('assets/images/5.png')}}" alt="" height="24" class="auth-logo logo-light mx-auto">
                                        </a>
                                    </div>
                                    <!-- end row -->
                                    <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                    <p class="mb-5 text-center">Connectez-vous pour continuer vers le panneau d'administration d'OctetLab.</p>
                                    <form class="form-horizontal" method="post" action=" {{route('dologin')}} ">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" required placeholder="Entrer votre adresse e-mail">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="userpassword">Mot de passe</label>
                                                    <input type="password" required class="form-control" name="password" id="userpassword" placeholder="Entrer votre mot de passe">
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                                            <label class="form-label" class="form-check-label" for="customControlInline">Se souvenir de moi</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid mt-4">
                                                    <button class="btn btn-info waves-effect waves-light" type="submit">Se connecter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="text-white-50">© {{date('Y')}} OctetLab.</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src=" {{asset('assets/libs/jquery/jquery.min.js')}} "></script>
        <script src=" {{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
        <script src=" {{asset('assets/libs/metismenu/metisMenu.min.js')}} "></script>
        <script src=" {{asset('assets/libs/simplebar/simplebar.min.js')}} "></script>
        <script src=" {{asset('assets/libs/node-waves/waves.min.js')}} "></script>
        <script src=" {{asset('assets/js/noty.js')}} "></script>

        <script src=" {{asset('assets/js/app.js')}} "></script>

        <script>
            @if ($errors->any())
                  var message = "{{ $errors->all()[0] }}"
                  new Noty({
                      type: 'error',
                      text: message,
                      timeout: 7000,
                      killer: true
                  }).show();
              @endif
        
              @if(session()->has('success'))
              var message = "{{ session('success') }}"
                  new Noty({
                      type: 'success',
                      text: message,
                      timeout: 5000,
                      killer: true
                  }).show();
              @endif
        </script>

    </body>

<!-- Mirrored from themesdesign.in/upzet/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Mar 2022 04:06:33 GMT -->
</html>
