@extends('layout')

@section('title', 'Liste Activite')

@section('content')

<div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <div id="sidebar" class="collapse collapse-horizontal show border-end">
                    <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
                         @if($role === 'admin')
                        <a href="{{ route('communes.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace communes</span> </a>
                        <a href="{{ route('associations.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Expace associations</span></a>
                        <a href="{{ route('users.all') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace utilisateurs</span></a>
                        <a href="{{ route('gestionnaires.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace gestionnaires</span></a>
                        @endif
                        @if($role === 'admin' || $role === 'gestionnaire')
                        <a href="{{ route('tuteurs.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace tuteurs</span></a>
                        <a href="{{ route('chef_familles.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace Parent</span></a>
                        <a href="{{ route('familles.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace  familles</span></a>
                        @endif
                        
                        <a href="{{ route('inscriptions.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace tuteurs</span></a>
                        <a href="{{ route('absences.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace Parent</span></a>
                        <a href="{{ route('enfants.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace  enfants</span></a>
                        <a href="{{ route('activites.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace  activites</span></a>
                        <a href="{{ route('creneaus.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace  creneaus</span></a>
                        

                    </div>
                </div>
            </div>
            <main class="col ps-md-2 pt-2">
                <div class="container">
                <!-- content -->
                <style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if($role === 'gestionnaire' || $role === 'admin')
  <!-- Button trigger activite modal -->
  <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Ajouter Activite">
  <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#activiteModal">Ajouter activiter</a>
  </span>
  @endif

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Titre</td>
          <td>Prix</td>
          <td>Capacite</td>
          <td>Association</td>
          <td>Creer il y a</td>
          @if($role === 'gestionnaire' || $role === 'admin')
          <td class="text-center">Action</td>
          @endif
        </tr>
    </thead>
    <tbody id="activitesBody">
        @foreach($activites as $activite)
        <tr>
            <td>{{$activite->id}}</td>
            <td><a href="{{ route('activites.show', $activite->id)}}">{{$activite->titre}}</a></td>
            <td>{{$activite->prix}}</a></td>
            <td>{{$activite->capacite}}</a></td>
            <td>{{$activite->association->titre}}</a></td>
            <td>{{$activite->created_at->diffForHumans()}}</td>
            @if($role === 'gestionnaire' || $role === 'admin')
            <td class="text-center">
                <a href="{{ route('activites.edit', $activite->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('activites.destroy', $activite->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
            @endif

        </tr>
        @endforeach
    </tbody>
  </table>
<div>
            </div>
            </main>
        </div>
    </div>

<!-- Activite Modal -->
<div class="modal fade" id="activiteModal" tabindex="-1" aria-labelledby="activiteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activiteModalLabel">Ajouter une activite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="activiteForm">
                    @csrf
                    <div class="form-group row">
                        <label for="titre" class="col-md-4 col-form-label text-md-right">Titre</label>
                        <div class="col-md-6">
                            <input type="text" id="titre" class="form-control" name="titre" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <input type="description" id="description" class="form-control" name="description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="prix" class="col-md-4 col-form-label text-md-right">Prix</label>
                        <div class="col-md-6">
                            <input type="number" id="prix" class="form-control" name="prix">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="capacite" class="col-md-4 col-form-label text-md-right">Capacite</label>
                        <div class="col-md-6">
                            <input type="number" id="capacite" class="form-control" name="capacite">
                        </div>
                    </div>
                    <input type="text" id="association_id" class="form-control" name="association_id" value="{{$association_id}}" hidden>

                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js-files')

        <!-- Include AJAX and Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


@endsection

@section('page-js-script')
        <script>
            $("#activiteForm").submit( function (e) {
                e.preventDefault();
                let titre = $('#titre').val();
                let description = $('#description').val();
                let prix = $('#prix').val();
                let capacite = $('#capacite').val();
                let association_id = $('#association_id').val();
                let _token = $('input[name=_token]').val();
                $.ajax({
                    url: "{{route('activites.ajax_store')}}",
                    type: "POST",
                    async: false,
                    data:{
                        titre:titre,
                        description:description,
                        prix:prix,
                        capacite:capacite,
                        association_id:association_id,
                        _token:_token
                    },
                    success:function(response){
                        if (response){
                            console.log(response);
                            console.log(response.association.titre);
                            let ligne = `
                                <tr>
                                    <td>${response.id}</td>
                                    <td><a href="{{ route('activites.show', ":id")}}">${response.titre}</a></td>
                                    <td>${response.prix}</a></td>
                                    <td>${response.capacite}</a></td>
                                    <td>${response.association.titre}</a></td>
                                    @if($role === 'gestionnaire' || $role === 'admin')
                                    <td class="text-center">
                                        <a href="{{ route('activites.edit', ":id")}}" class="btn btn-primary btn-sm"">Edit</a>
                                        <form action="{{ route('activites.destroy', ":id")}}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                                        </form>
                                    </td>
                                    @endif

                                </tr>
                                `;
                            ligne =ligne.replace(':id', response.id);
                            $('#activitesBody').prepend(ligne);
                            $('#activiteForm')[0].reset();
                            $('#activiteModal').modal('hide');
                            setTimeout(
                            function() 
                            {
                                location.reload();
                            }, 8000);
                        }
                    }
                });
            });
            // Activation pop overs
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>
@endsection