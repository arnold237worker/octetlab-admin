@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Modifier la catégorie de service</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('categorieservices')}}">Catégories</a></li>
                            <li class="breadcrumb-item active">Editer</li>
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
                        <h4 class="card-title">Modifier la categorie <strong> {{$categorieservice->nom_fr}} </strong> </h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('categorieservices.update', $categorieservice->id)}} " enctype="multipart/form-data" >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="etat">Statut <span class="text-info">*</span> </label>
                                        <select class="form-select" required name="etat" id="autoSizingSelect">
                                            <option value="published" @if ($categorieservice->etat == "published")
                                                selected="selected"
                                            @endif>Publier</option>
                                            <option value="draft" @if ($categorieservice->etat == "draft")
                                                selected="selected"
                                            @endif>Brouillon</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Nom de la catégorie(Français) <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" value=" {{$categorieservice->nom_fr}} " id="nomFr" name="nom_fr" placeholder="Entrer le nom de la catégorie">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomEn">Nom de la catégorie(Anglais) <span class="text-info">*</span></label>
                                        <input class="form-control" required type="text" value="{{$categorieservice->nom_en}} " id="nomEn" name="nom_en" placeholder="Enter the name of the categorieservice">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomDe">Nom de la catégorie(Allemand) <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" value="{{$categorieservice->nom_de}} " id="nomDe" name="nom_de" placeholder="Geben Sie den Namen der Abteilung ein">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la catégorie(Français) <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="contenu_fr"  rows="10">{{$categorieservice->contenu_fr}} </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la catégorie(Anglais) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_en" required class="form-control"  rows="10">{{$categorieservice->contenu_en}} </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la catégorie(Allemand) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_de" required class="form-control"  cols="30" rows="10">{{$categorieservice->contenu_de}} </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="default-input">Image </label>
                                <input type="file" name="image" @if ($categorieservice->image) data-default-file=" {{$categorieservice->image}} " @endif id="image" >
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

@section('script')
    <script>
        let image =  '<?php echo $categorieservice->image ?>'  
         $("#image").addClass('dropify');
        $("#image").attr("data-default-file", image);
        $('.dropify').dropify();
    </script>
@endsection 