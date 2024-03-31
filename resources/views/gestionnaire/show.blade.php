@extends('layout')

@section('title', 'Gestionnaire')

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
                        
                        <a href="{{ route('inscriptions.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace inscriptions</span></a>
                        <a href="{{ route('absences.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace Absences</span></a>
                        <a href="{{ route('enfants.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace  enfants</span></a>
                        <a href="{{ route('activites.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace  activites</span></a>
                        <a href="{{ route('creneaus.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"> <span>Espace  creneaus</span></a>
                        
                    </div>
                </div>
            </div>
            <main class="col ps-md-2 pt-2">
                <div class="container">
                <!-- content -->
                 <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Nom</td>
          <td>Prenom</td>
          <td>Adresse</td>
          <td>Telephone</td>
          <td>Email</td>
          <td>Creer il y a</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$gestionnaire->id}}</td>
            <td>{{$gestionnaire->user->name}}</td>
            <td>{{$gestionnaire->user->prenom}}</a></td>
            <td>{{$gestionnaire->user->adresse}}</a></td>
            <td>{{$gestionnaire->user->tele}}</a></td>
            <td>{{$gestionnaire->user->email}}</a></td>
            <td>{{$gestionnaire->created_at->diffForHumans()}}</td>
            <td class="text-center">
                <a href="{{ route('gestionnaires.edit', $gestionnaire->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('gestionnaires.destroy', $gestionnaire->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
    </tbody>
  </table>
  <a href="{{ route('users.edit', $gestionnaire->user->id)}}">Modifier profile</a>

            </div>
            </main>
        </div>
    </div>
   

@endsection  

