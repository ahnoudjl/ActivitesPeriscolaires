@extends('layout')

@section('title', 'Creneau')

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
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Jour</td>
          <td>Debut periode</td>
          <td>Fin periode</td>
          <td>Activite</td>
          <td>Creer il y a</td>
          @if($role === 'gestionnaire' || $role === 'admin')
          <td class="text-center">Action</td>
          @endif
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$creneau->id}}</td>
            <td><a href="{{ route('creneaus.show', $creneau->id)}}">{{$creneau->jour}}</a></td>
            <td>{{$creneau->debut_periode}}</a></td>
            <td>{{$creneau->fin_periode}}</a></td>
            <td>{{$creneau->activite->titre}}</a></td>
            <td>{{$creneau->created_at->diffForHumans()}}</td>
            @if($role === 'gestionnaire' || $role === 'admin')
            <td class="text-center">
                <a href="{{ route('creneaus.edit', $creneau->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('creneaus.destroy', $creneau->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
            @endif
        </tr>
    </tbody>
  </table>
<div>

            </div>
            </main>
        </div>
    </div>

@endsection