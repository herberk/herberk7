@extends('layouts.app')
@section('content')
  <div class="card">
        <h4 class="card-header">Avatar  usuario</h4>
     <div class="card-body">
      <div class="container">
        <div class="row justify-content-center">
            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" />
                    <!-- badge -->
                    <div class="rank-label-container mt-4">
                        <h3 class="label label-default rank-label">{{$user->name}}</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <form action="profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-2">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted mt-2">Por favor, cargue un archivo de imagen válido. El tamaño de la imagen no debe ser superior a 1MB..</small>
                </div>
                <div class="row justify-content-center mb-2">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
  </div>
 </div>
@endsection
