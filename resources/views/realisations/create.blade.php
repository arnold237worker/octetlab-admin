@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Enregistrer une réalisation</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('realisations')}}">Réalisations</a></li>
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
                        <h4 class="card-title">Enregistrer une nouvelle réalisation</h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('realisations.store')}} " enctype="multipart/form-data" >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Nom de la réalisation(Français) <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" id="nomFr" name="nom_fr" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomEn">Nom de la réalisation(Anglais) <span class="text-info">*</span></label>
                                        <input class="form-control" required type="text" id="nomEn" name="nom_en" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomDe">Nom de la réalisation(Allemand) <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" id="nomDe" name="nom_de" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la réalisation(Français) <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="contenu_fr" placeholder="" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la réalisation(Anglais) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_en" required class="form-control" placeholder="" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la réalisation(Allemand) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_de" required class="form-control" placeholder="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="service">Service <span class="text-info">*</span> </label>
                                        <select class="form-select" required name="service_id" id="autoSizingSelect">
                                            @foreach ($services as $item)
                                                <option value=" {{$item->id}} "> {{$item->nom_fr}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="nom du client">Nom du client</label>
                                        <input class="form-control"  type="text" id="client" name="client" placeholder="">
                                    </div>
                                </div>
                            
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Présentation du client(Français) </label>
                                        <textarea  class="form-control" name="presentation_client_fr" placeholder="" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Présentation du client(Anglais) </label>
                                        <textarea name="presentation_client_en" class="form-control" placeholder="" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Présentation du client(Allemand) </label>
                                        <textarea name="presentation_client_de" class="form-control" placeholder="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="lien">Lien vers la réalisation </label>
                                        <input class="form-control"  type="text" id="lien" name="lien" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_realisation">Date de réalisation </label>
                                        <input class="form-control"  type="text" id="date_realisation" name="date_realisation" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="default-input">Images (Sélectionner une ou plusieurs images) * </label>
                                <input type="file" name="images[]" required multiple class="dropify" >
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