@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Enregistrer section</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('sections')}}">Sections</a></li>
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
                        <h4 class="card-title">Enregistrer une section</h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('sections.store')}} " >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sectionID">sectionID <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" id="sectionID" name="sectionID" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description de la section <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="description"  rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Titre de la section(Français) <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" id="nomFr" name="titre_fr" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomEn">Titre de la section(Anglais) <span class="text-info">*</span></label>
                                        <input class="form-control" required type="text" id="nomEn" name="titre_en" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomDe">Titre de la section(Allemand) <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" id="nomDe" name="titre_de" >
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu (Français) <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="contenu_fr"  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu (Anglais) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_en" required class="form-control"  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu (Allemand) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_de" required class="form-control"  cols="30" rows="10"></textarea>
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