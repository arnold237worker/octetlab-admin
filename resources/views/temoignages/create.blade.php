@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Enregistrer témoignage</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('testimonial')}}">Témoignages</a></li>
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
                        <h4 class="card-title">Enregistrer un nouveau témoignage</h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('temoignages.store')}} " enctype="multipart/form-data" >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Nom de la personne <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" id="nomFr" name="nom" >
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Témoignage(Français) <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="contenu_fr"  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Témoignage(Anglais) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_en" required class="form-control"  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Témoignage(Allemand) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_de" required class="form-control"  cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="default-input">Image (100x100 pixels) </label>
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