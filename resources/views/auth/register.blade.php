@extends('base')
@section("titre","Register")
@section("titre_page","Identification | ".config('app.name'))
@section("sous_titre",config('app.name')."/Identification")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 d-none d-lg-block" style="position: relative; left:18px; bottom:7px;">
            <img src="{{ asset('dist/img/monuser.png') }}" alt="Login" style="width:70%; height:600px;" class="img-fluid rounded">
        </div>
        <div class="col-md-5">
            <div class="card" style="background-color: rgba(165, 165, 231, 0.536);">
                <div class="card-header text-light font-italic h4" style="background-color:rgb(12, 116, 161);"><i class="fas fa-user-plus"></i> {{ __('Identification') }}</div>
                <x-Authlogo />
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Noms') }}</label> --}}

                            <div class="col-md-12">
                                <input id="name" placeholder="Ex: john Dupon" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label for="email"  class="col-md-4 col-form-label text-md-end">{{ __('Adresse Email') }}</label> --}}

                            <div class="col-md-12">
                                <input id="email" placeholder="Ex: dupon@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de Passe') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password" placeholder=" taper votre mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer Mot de Passe') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="confirmer votre mot de passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                {{-- <button type="submit" class="btn btn-outline-primary font-italic">
                                   <i class="fas fa-user-plus"></i> {{ __('S\'Enregistrer') }}
                                </button> --}}
                                <div class="mr-5">
                                    
                                    <x-savebtn />
                                </div>
                            </div>
                            <div class="col-md-12 text-center">

                                <a class="btn btn-link text-light mr-4" href="{{ route('login') }}">
                                    {{ __('Se connecter ?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
