@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Réalisations</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Réalisations</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <h4 class="card-title">Liste des réalisations</h4>
                            </div>
                            <div class="col-sm-4">
                                <div class="float-end">
                                    <a href=" {{route('realisations.create')}} "  class="btn btn-info">Enregistrer une réalisation</a> <br>
                                </div>
                            </div>
                        </div>
                        <br>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Nom de la réalisations</th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($realisations as $item)
                                    <tr>
                                        <td> {{$item->nom_fr}} </td>
                                        <td> {{$item->service->nom_fr}} </td>
                                        <td width="12%">
                                            <a href=" {{route('realisations.edit', $item->slug)}} "  class="btn btn-outline-info btn-sm edit" title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="{{route('realisations.delete', $item->id)}}" onclick="return confirm('Voulez-vous vraiment supprimer cette image ?') " class="btn btn-outline-danger btn-sm edit" title="Supprimer">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection