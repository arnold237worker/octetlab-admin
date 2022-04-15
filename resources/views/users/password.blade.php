@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Modifier mot de passe </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Modifier mot de passe</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-5">
                    <div class="card-body">
                        <h4 class="card-title">Modifier mot de passe  </h4>
                        <p class="card-title-desc">Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('users.update-password')}} " >
                            @csrf
                            <div class="row g-2 g-md-4 mb-3">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label" for="password">Mot de passe actuel <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="password"  id="password" name="password" placeholder="Entrer votre mot de passe actuel">
                                    </div>
                                </div><div class="col-lg-12">
                                    <div>
                                        <label class="form-label" for="npassword">Nouveau Mot de passe <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="password"  id="npassword" name="npassword" placeholder="Entrer votre nouveau mot de passe">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label" for="cpassword">Confirmer nouveau mot de passe <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="password"  id="cpassword" name="cpassword" placeholder="Confirmer votre nouveau mot de passe">
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="submit" class="btn btn-info waves-effect waves-light">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row  -->
        
        

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
