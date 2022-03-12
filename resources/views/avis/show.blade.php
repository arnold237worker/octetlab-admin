@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Détails</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{route('avis')}}">Avis</a></li>
                            <li class="breadcrumb-item active">Détails</li>
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
                        <form method="post" action="#" >
                            @csrf
                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="">
                                        <label class="form-label" for="nomFr">Nom</label>
                                        <input class="form-control" required value=" {{$avis->nom}} " readonly  type="text" id="nomFr" name="nom_fr" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomFr">Email</label>
                                        <input class="form-control" required value=" {{$avis->email}} " readonly  type="text" id="nomFr" name="nom_fr" >
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Avis/Commentaire </label>
                                        <textarea  class="form-control" readonly required name="services_fr" placeholder="Séparer les services par une virgule. Exemple: Service1, Service2, etc..."  rows="10">{{$avis->commentaire}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 g-md-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Note </label><br>
                                        @for ($i=0; $i<$avis->note; $i++)
                                            <i class="fa fa-star text-info"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
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