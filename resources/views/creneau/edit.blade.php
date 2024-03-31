@extends('layout')

@section('title', 'Modifier creneau')

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
                    <h3 class="card-header text-center">Modifier creneau</h3>
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
        <form action="{{ route('creneaus.update', $creneau->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('PUT')
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
                        <input value="{{ $creneau->jour}}" type="date" placeholder="Jour" id="jour" class="form-control" name="jour" required
                            autofocus>
                        @if ($errors->has('jour'))
                        <span class="text-danger">{{ $errors->first('jour') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input value="{{ $creneau->debut_periode}}" type="time" placeholder="Debut periode" id="debut_periode" class="form-control" name="debut_periode" required
                            autofocus>
                        @if ($errors->has('debut_periode'))
                        <span class="text-danger">{{ $errors->first('debut_periode') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input value="{{ $creneau->fin_periode}}" type="time" placeholder="Fin periode" id="fin_periode" class="form-control" name="fin_periode" required
                            autofocus>
                        @if ($errors->has('fin_periode'))
                        <span class="text-danger">{{ $errors->first('fin_periode') }}</span>
                        @endif
                    </div>

                    <div>
                      <label for="activite_id">Activite:</label>
                      <select name="activite_id" id="activite_id">
                      @foreach($activites as $activite)
                      <option value="{{$activite->id}}">{{$activite->titre}}</option>                                       
                      @endforeach
                      </select>
                    </div>
                    <button class="btn btn-danger btn-sm"" type="submit">Confirmer</button>   
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