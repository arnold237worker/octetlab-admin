@extends('template')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profil</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Profil</li>
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
                        <h4 class="card-title">Editer le compte  </h4>
                        <p class="card-title-desc">Tous les champs marqués d'une étoile sont obligatoires.</p>

                        <form method="post" action=" {{route('users.update', $user->id)}} " enctype="multipart/form-data" >
                            @csrf
                            <div class="row g-2 g-md-4 mb-3">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label" for="nomFr">Nom <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="text" value=" {{$user->name}} " id="nomFr" name="name" placeholder="Entrer le nom de l'utilisateur">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label" for="email">Email <span class="text-info">*</span> </label>
                                        <input class="form-control" required  type="email" readonly value=" {{$user->email}} " id="email" name="email" placeholder="Entrer l'adresse email">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="default-input">Avatar </label>
                                <input type="file" name="image" @if ($user->avatar) data-default-file=" {{$user->avatar}} " @endif id="image" >
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
        let image =  '<?php echo $user->avatar ?>'  
         $("#image").addClass('dropify');
        $("#image").attr("data-default-file", image);
        $('.dropify').dropify();
    </script>
@endsection 