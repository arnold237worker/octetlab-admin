@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Web design process</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Web design process</li>
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
                                <h4 class="card-title">Les étapes du web design process (Elles s'afficheront dans l'ordre d'enregistrement)</h4>
                            </div>
                            <div class="col-sm-4">
                                <div class="float-end">
                                    <a href=" {{route('process.create')}} "  class="btn btn-info">Enregistrer une étape</a> <br>
                                </div>
                            </div>
                        </div>
                        <br>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Etape</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($process as $item)
                                    <tr>
                                        <td> {{$item->titre_fr}} </td>
                                        <td width="12%">
                                            <a href=" {{route('process.edit', $item->id)}} "  class="btn btn-outline-info btn-sm edit" title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="{{route('process.delete', $item->id)}}" onclick="return confirm('Voulez-vous vraiment supprimer cette étape ?') " class="btn btn-outline-danger btn-sm edit" title="Supprimer">
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