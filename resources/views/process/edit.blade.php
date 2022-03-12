@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Modifier une étape</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('process')}}">Web design process</a></li>
                            <li class="breadcrumb-item active">Modifier</li>
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
                        <h4 class="card-title">Modifier une étpape</h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('process.update', $process->id)}} " >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Nom de l'étape(Français) <span class="text-info">*</span> </label>
                                        <input class="form-control" required value=" {{$process->titre_fr}} "  type="text" id="nomFr" name="titre_fr" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomEn">Nom de l'étape(Anglais) <span class="text-info">*</span></label>
                                        <input class="form-control" required type="text" value=" {{$process->titre_fr}} " id="nomEn" name="titre_en" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomDe">Nom de l'étape(Allemand) <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" value=" {{$process->titre_fr}} " id="nomDe" name="titre_de" >
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu (Français) <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="contenu_fr"  rows="10">{{$process->contenu_fr}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu (Anglais) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_en" required class="form-control"  rows="10">{{$process->contenu_en}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu (Allemand) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_de" required class="form-control"  cols="30" rows="10">{{$process->contenu_de}}</textarea>
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