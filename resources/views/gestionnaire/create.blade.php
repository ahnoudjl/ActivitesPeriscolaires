@extends('layout')

@section('title', 'Liste des gestionnaires')

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
  
        <form action="{{ route('gestionnaires.store')}}" method="post" style="display: inline-block">
        @csrf
        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
        <div>
          <label for="user_id">Utilisateur:</label>
          <select name="user_id" id="user_id">
          @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}, {{$user->prenom}}, {{$user->email}}</option>                                       
          @endforeach
          </select>
        </div>

        <div>
          <label for="association_id">Association:</label>
          <select name="association_id" id="association_id">
          @foreach($associations as $association)
          <option value="{{$association->id}}">{{$association->titre}}</option>                                       
          @endforeach
          </select>
        </div>
        <button class="btn btn-danger btn-sm"" type="submit">Creer</button>   
        </form>
   
<div>

            </div>
            </main>
        </div>
    </div>

@endsection