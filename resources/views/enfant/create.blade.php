@extends('layout')

@section('title', 'Ajouter enfant')

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
                <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Creer enfant</h3>
                    <div class="card-body">
                         @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                           @endif
        <form action="{{ route('enfants.store')}}" method="post" style="display: inline-block">
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
                    <div class="form-group mb-3">
                        <input type="text" placeholder="Nom" id="nom" class="form-control" name="nom" required
                            autofocus>
                        @if ($errors->has('nom'))
                        <span class="text-danger">{{ $errors->first('nom') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" placeholder="Prenom" id="prenom" class="form-control" name="prenom" required
                            autofocus>
                        @if ($errors->has('prenom'))
                        <span class="text-danger">{{ $errors->first('prenom') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="date" placeholder="Date de naissance" id="date_naissance" class="form-control" name="date_naissance" required
                            autofocus>
                        @if ($errors->has('date_naissance'))
                        <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                        @endif
                    </div>
                    
                    <div>
                      <label for="famille_id">Famille:</label>
                      <select name="famille_id" id="famille_id">
                      @foreach($familles as $famille)
                      <option value="{{$famille->id}}">{{$famille->n_caf}}</option>                                       
                      @endforeach
                      </select>
                    </div>
                    <button class="btn btn-danger btn-sm"" type="submit">Creer</button>   
                  </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</main>

            </div>
            </main>
        </div>
    </div>

@endsection