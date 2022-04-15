<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/upzet/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Mar 2022 04:05:02 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>OctetLab | Panneau d'administration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Panneau d'administration d'OctetLab" name="description" />
        <meta content="Arnold FOSSO" name="author" />
        <!-- App favicon -->
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}} ">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}} ">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
        
        <!-- jvectormap -->
        <link href=" {{asset('assets/libs/jqvmap/jqvmap.min.css')}} " rel="stylesheet" />
        <link href=" {{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}} " rel="stylesheet" type="text/css" />
        <link href=" {{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}} " rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href=" {{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}} " rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href=" {{asset('assets/css/bootstrap.min.css')}} " id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=" {{asset('assets/css/icons.min.css')}} " rel="stylesheet" type="text/css" />
        <link href=" {{asset('assets/css/dropify.css')}} " rel="stylesheet" type="text/css" />
        <link href=" {{asset('assets/css/noty.css')}} " rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=" {{asset('assets/css/app.min.css')}} " id="app-style" rel="stylesheet" type="text/css" />
        <link href=" {{asset('assets/libs/quill/quill.core.css')}} " rel="stylesheet" type="text/css" />
        <link href=" {{asset('assets/libs/quill/quill.snow.css')}} " rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box text-center">
                            <a href="index-2.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src=" {{asset('assets/images/4.png')}} " alt="logo-sm-dark" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/4.png')}}" alt="logo-dark" height="24">
                                </span>
                            </a>

                            <a href="index-2.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src=" {{asset('assets/images/4.png')}} " alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/5.png')}}" alt="logo-light" height="24">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src=" @if (Auth::user()->avatar)
                                    {{ Auth::user()->avatar }}
                                @else
                                    {{asset('assets/images/user.png')}}
                                @endif  "
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1"> {{Auth::user()->name}} </span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href=" {{route('profil')}} "><i class="ri-user-line align-middle me-1"></i> Profil</a>
                                <a class="dropdown-item" href="{{route('modifier-mot-de-passe')}}"><i class="ri-wallet-2-line align-middle me-1"></i> Mot de passe</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href=" {{route('deconnexion')}} "><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Déconnexion</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href=" {{route('dashboard')}} " class="waves-effect">
                                    <i class="mdi mdi-home-variant-outline"></i>
                                    <span>Tableau de bord</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('categorieservices')}} " class=" waves-effect">
                                    <i class="mdi mdi-label-outline"></i>
                                    <span>Categorie Services</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('services')}} " class=" waves-effect">
                                    <i class="mdi mdi-briefcase"></i>
                                    <span>Services</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('realisations')}} " class=" waves-effect">
                                    <i class="mdi mdi-rocket-launch"></i>
                                    <span>Réalisations</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('teams')}} " class=" waves-effect">
                                    <i class="mdi mdi-human-male-female"></i>
                                    <span>Equipe</span>
                                </a>
                            </li>

                            {{-- <li>
                                <a href=" {{route('sections')}} " class=" waves-effect">
                                    <i class="mdi mdi-file-document-edit"></i>
                                    <span>Sections</span>
                                </a>
                            </li> --}}

                            <li>
                                <a href=" {{route('packages')}} " class=" waves-effect">
                                    <i class="mdi mdi-package"></i>
                                    <span>Packages</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('process')}} " class=" waves-effect">
                                    <i class="mdi mdi-order-bool-ascending-variant"></i>
                                    <span>Process</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('testimonial')}} " class=" waves-effect">
                                    <i class="mdi mdi-comment-edit-outline"></i>
                                    <span>Témoignages</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('avis')}} " class=" waves-effect">
                                    <i class="mdi mdi-comment"></i>
                                    <span>Avis et commentaires</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('logs')}} " class=" waves-effect">
                                    <i class="mdi mdi-line"></i>
                                    <span>Logs</span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{route('users')}} " class=" waves-effect">
                                    <i class="mdi mdi-human-male"></i>
                                    <span>Utilisateurs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('content')
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © OctetLab.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Panneau d'administration
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        {{-- <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.png" class="img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.png" class="img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.png" class="img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div> --}}
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src=" {{asset('assets/libs/jquery/jquery.min.js')}} "></script>
        <script src=" {{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
        <script src=" {{asset('assets/libs/metismenu/metisMenu.min.js')}} "></script>
        <script src=" {{asset('assets/libs/simplebar/simplebar.min.js')}} "></script>
        <script src=" {{asset('assets/libs/node-waves/waves.min.js')}} "></script>

        <!-- apexcharts js -->
        <script src=" {{asset('assets/libs/apexcharts/apexcharts.min.js')}} "></script>

        <!-- jquery.vectormap map -->
        <script src=" {{asset('assets/libs/jqvmap/jquery.vmap.min.js')}} "></script>
        <script src=" {{asset('assets/libs/jqvmap/maps/jquery.vmap.usa.js')}} "></script>

        <script src=" {{asset('assets/js/pages/dashboard.init.js')}} "></script>

        <!-- Required datatable js -->
        <script src=" {{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}} "></script>
        <script src=" {{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}} "></script>
        <!-- Buttons examples -->
        <script src=" {{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}} "></script>
        <script src=" {{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}} "></script>
        <script src=" {{asset('assets/libs/jszip/jszip.min.js')}} "></script>
        <script src=" {{asset('assets/libs/pdfmake/build/pdfmake.min.js')}} "></script>
        <script src=" {{asset('assets/libs/pdfmake/build/vfs_fonts.js')}} "></script>
        <script src=" {{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}} "></script>
        <script src=" {{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}} "></script>
        <script src=" {{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}} "></script>
        <!-- Responsive examples -->
        <script src=" {{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}} "></script>
        <script src=" {{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}} "></script>

        <!-- Datatable init js -->
        <script src=" {{asset('assets/js/pages/datatables.init.js')}} "></script>

        <!--Quill js-->
        <script src=" {{asset('assets/libs/quill/quill.min.js')}} "></script>

        <!-- init js -->
        <script src=" {{asset('assets/js/pages/form-editor.init.js')}} "></script>
        <script src=" {{asset('assets/js/dropify.js')}} "></script>
        <script src=" {{asset('assets/js/noty.js')}} "></script>

        <script src=" {{asset('assets/js/app.js')}} "></script>
        
        <script>
            (function($) {
            'use strict'
            $(function() {
                $('.dropify').dropify({
                    messages: {
                        'default': 'Faites glisser et déposez un fichier ici ou cliquez sur',
                        'replace': 'Glisser et déposer ou cliquer pour remplacer',
                        'remove':  'Retirer',
                        'error':   'Ooops, quelque chose s\'est mal passé.'
                    }
                })
            })
            })(jQuery)
        </script>
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
        @yield('script')

    </body>

<!-- Mirrored from themesdesign.in/upzet/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Mar 2022 04:06:02 GMT -->
</html>
