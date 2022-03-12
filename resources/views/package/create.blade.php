@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Enregistrer un pack</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('packages')}}">Packages</a></li>
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
                        <h4 class="card-title">Enregistrer un pack</h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('package.store')}} " >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Nom du pack(Français) <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" id="nomFr" name="nom_fr" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomEn">Nom du pack(Anglais) <span class="text-info">*</span></label>
                                        <input class="form-control" required type="text" id="nomEn" name="nom_en" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomDe">Nom du pack(Allemand) <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" id="nomDe" name="nom_de" >
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Services (Français) <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="services_fr" placeholder="Séparer les services par une virgule. Exemple: Service1, Service2, etc..."  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Services (Anglais) <span class="text-info">*</span> </label>
                                        <textarea name="services_en" required class="form-control" placeholder="Séparer les services par une virgule. Exemple: Service1, Service2, etc..."  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">services (Allemand) <span class="text-info">*</span> </label>
                                        <textarea name="services_de" required class="form-control" placeholder="Séparer les services par une virgule. Exemple: Service1, Service2, etc..."  cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="prix">Prix du pack  </label>
                                        <input class="form-control" type="text" id="prix" name="prix" >
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