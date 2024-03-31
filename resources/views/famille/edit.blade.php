@extends('layout')

@section('title', 'Modifier famille')

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
                    <h3 class="card-header text-center">Creer famille</h3>
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
                  <form action="{{ route('familles.update', $famille->id)}}" method="post" style="display: inline-block">
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
                        <input value="{{$famille->tel_fixe}}" type="text" placeholder="N° Telepnone fixe" id="tel_fixe" class="form-control" name="tel_fixe" required
                            autofocus>
                        @if ($errors->has('tel_fixe'))
                        <span class="text-danger">{{ $errors->first('tel_fixe') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input value="{{$famille->tel_portable}}" type="text" placeholder="N° Telepnone portable" id="tel_portable" class="form-control" name="tel_portable" required
                            autofocus>
                        @if ($errors->has('tel_portable'))
                        <span class="text-danger">{{ $errors->first('tel_portable') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input value="{{$famille->tel_travail}}" type="text" placeholder="N° Telepnone travail" id="tel_travail" class="form-control" name="tel_travail" required
                            autofocus>
                        @if ($errors->has('tel_travail'))
                        <span class="text-danger">{{ $errors->first('tel_travail') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input value="{{$famille->remarques}}" type="text" placeholder="Reamrques..." id="remarques" class="form-control" name="remarques" required
                            autofocus>
                        @if ($errors->has('remarques'))
                        <span class="text-danger">{{ $errors->first('remarques') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input value="{{$famille->n_caf}}" type="text" placeholder="N° CAF" id="n_caf" class="form-control" name="n_caf" required
                            autofocus>
                        @if ($errors->has('n_caf'))
                        <span class="text-danger">{{ $errors->first('n_caf') }}</span>
                        @endif
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