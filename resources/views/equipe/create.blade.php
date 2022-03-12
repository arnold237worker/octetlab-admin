@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Enregistrer membre</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('teams')}}">membres</a></li>
                            <li class="breadcrumb-item active">Enregistrer</li>
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
                        <h4 class="card-title">Enregistrer un nouveau membre</h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('teams.store')}} " enctype="multipart/form-data" >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="nom">Nom <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" id="nom" name="nom" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="email" id="email" name="email" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="posteFr">Poste occupé(Français) <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" id="posteFr" name="poste_fr" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="posteEn">Poste occupé(Anglais) <span class="text-info">*</span></label>
                                        <input class="form-control" required type="text" id="posteEn" name="poste_en" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-1">
                                        <label class="form-label" for="posteDe">Poste occupé(Allemand) <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" id="posteDe" name="poste_de">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="facebook">Lien facebook </label>
                                        <input class="form-control" type="text" id="facebook" name="facebook" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="instagran">Lien instagran </label>
                                        <input class="form-control" type="text" id="instagran" name="instagran" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="linkedin">Lien linkedin </label>
                                        <input class="form-control" type="text" id="linkedin" name="linkedin" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label class="form-label" for="default-input">Image </label>
                                <input type="file" name="image" class="dropify" >
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