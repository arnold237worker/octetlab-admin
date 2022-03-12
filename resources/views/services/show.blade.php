@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Modifier le service</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('services')}}">Services</a></li>
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
                        <h4 class="card-title">Modifier le service <strong> {{$service->nom_fr}} </strong> </h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('services.update', $service->id)}} " enctype="multipart/form-data" >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Nom du service(Français) <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" value=" {{$service->nom_fr}} " id="nomFr" name="nom_fr" placeholder="Entrer le nom du service">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomEn">Nom du service(Anglais) <span class="text-info">*</span></label>
                                        <input class="form-control" required type="text" value="{{$service->nom_en}} " id="nomEn" name="nom_en" placeholder="Enter the name of the service">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomDe">Nom du service(Allemand) <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" value="{{$service->nom_de}} " id="nomDe" name="nom_de" placeholder="Geben Sie den Namen der Abteilung ein">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu du service(Français) <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="contenu_fr" placeholder="Entrer la description du service" rows="10">{{$service->contenu_fr}} </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu du service(Anglais) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_en" required class="form-control" placeholder="Enter the service description" rows="10">{{$service->contenu_en}} </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu du service(Allemand) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_de" required class="form-control" placeholder="Geben Sie die Beschreibung des Dienstes ein"  cols="30" rows="10">{{$service->contenu_de}} </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="default-input">Image </label>
                                <input type="file" name="image" @if ($service->image) data-default-file=" {{$service->image}} " @endif id="image" >
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
        let image =  '<?php echo $service->image ?>'  
         $("#image").addClass('dropify');
        $("#image").attr("data-default-file", image);
        $('.dropify').dropify();
    </script>
@endsection 