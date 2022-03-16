@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Editer une réalisation</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('realisations')}}">Réalisations</a></li>
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
                        <h4 class="card-title">Modifier la réalisation</h4>
                        <p class="card-title-desc">Veuillez renseigner les informations dans toutes les langues <a href="https://deepl.com/translator" class="text-info" target="_blank">Cliquez-ici pour traduire vos textes</a>. Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('realisations.update', $realisation->id)}} " enctype="multipart/form-data" >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Nom de la réalisation(Français) <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" value=" {{$realisation->nom_fr}} " id="nomFr" name="nom_fr" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomEn">Nom de la réalisation(Anglais) <span class="text-info">*</span></label>
                                        <input class="form-control" required type="text" id="nomEn" value=" {{$realisation->nom_en}} " name="nom_en" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomDe">Nom de la réalisation(Allemand) <span class="text-info">*</span> </label>
                                        <input class="form-control" required type="text" id="nomDe" name="nom_de" value=" {{$realisation->nom_de}} " placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la réalisation(Français) <span class="text-info">*</span> </label>
                                        <textarea  class="form-control" required name="contenu_fr" placeholder="" rows="10">{{$realisation->contenu_fr}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la réalisation(Anglais) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_en" required class="form-control" placeholder="" rows="10">{{$realisation->contenu_en}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contenu de la réalisation(Allemand) <span class="text-info">*</span> </label>
                                        <textarea name="contenu_de" required class="form-control" placeholder="" cols="30" rows="10">{{$realisation->contenu_de}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="service">Service <span class="text-info">*</span> </label>
                                        <select class="form-select" required name="service_id" id="autoSizingSelect">
                                            @foreach ($services as $item)
                                                <option value=" {{$item->id}} " @if ($item->id == $realisation->service_id) selected="selected" @endif > {{$item->nom_fr}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="nom du client">Nom du client</label>
                                            <input class="form-control"  type="text" id="client" name="client" value=" {{$realisation->client}} " placeholder="">
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Présentation du client(Français)  </label>
                                            <textarea  class="form-control" name="presentation_client_fr" placeholder="" rows="10"> {{$realisation->presentation_client_fr}} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Présentation du client(Anglais)  </label>
                                            <textarea name="presentation_client_en" class="form-control" placeholder="" rows="10"> {{$realisation->presentation_client_en}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Présentation du client(Allemand)  </label>
                                            <textarea name="presentation_client_de" class="form-control" placeholder="" cols="30" rows="10"> {{$realisation->presentation_client_de}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="lien">Lien vers la réalisation </label>
                                            <input class="form-control"  type="text" id="lien" name="lien" value=" {{$realisation->lien}} " placeholder="">
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="date_realisation">Date de réalisation </label>
                                            <input class="form-control"  type="text" id="date_realisation" name="date_realisation" value=" {{$realisation->date_realisation}} " placeholder="">
                                        </div>
                                    </div>
                            </div>
                            
                            <button type="submit" class="btn btn-info waves-effect waves-light">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-8">
                                <h4 class="card-title">Les images de la réalisation</h4>
                            </div>
                            <div class="col-sm-4">
                                <div class="float-end">
                                    <a href=" {{route('realisations.create')}} "  class="btn btn-info btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Ajouter des images</a> <br>
                                     <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title">Ajouter des images</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form action=" {{route('realisationImage.store')}} " method="post" enctype="multipart/form-data"> 
                                                         @csrf
                                                         <input type="hidden" name="realisation_id", value=" {{$realisation->id}} ">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="default-input">Images (Sélectionner une ou plusieurs images) * </label>
                                                            <input type="file" name="images[]" required multiple class="dropify" >
                                                        </div>
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Enregistrer</button>
                                                     </form>
                                                 </div>
                                             </div><!-- /.modal-content -->
                                         </div><!-- /.modal-dialog -->
                                     </div><!-- /.modal -->
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            @if (count($realisation->images) > 0)
                            @foreach ($realisation->images as $item)
                                <div class="col-sm-3">
                                    <div class="mb-2">
                                        <img class="rounded" alt="200x200" style="width: 200px; height: 200px; object-fit: contain; border: 1px solid #eee" src=" {{$item->path}} " data-holder-rendered="true">
                                    </div>
                                    <code><a href="{{route('realisationImage.delete', $item->id)}}" onclick="return confirm('Voulez-vous vraiment supprimer cette image ?') " class="btn btn-outline-danger btn-sm edit" title="Supprimer">
                                        <i class="fas fa-trash-alt fa-xs"></i> Retirer
                                    </a></code>
                                </div>
                            @endforeach
                            @else
                              <div class="col-sm-12 text-center">
                                  Aucune image enregistrée pour l'instant !
                              </div>
                            @endif

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row  -->
        
        

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection