@extends('base')
@section("titre","Email")
@section("titre_page","Email | ".config('app.name'))
@section("sous_titre",config('app.name')."/Email")

@section('content')
{{-- <div class="container"> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:rgb(12, 116, 161);">
                <div class="card-header text-light font-italic" style="background-color:rgb(12, 116, 161);">{{ __('Renitialiser son Mot de Passe') }}</div>
                <x-Authlogo />
                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-light text-md-end">{{ __('Adresse Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 offset-sm-3">
                                <button type="submit" class="btn btn-outline-light">
                                   <i class="fas fa-location-arrow"></i> {{ __('Envoyez le lien de rénitialisation') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection
