@extends('base')
@section("titre","Login")
@section("titre_page","Login | ".config('app.name'))
@section("sous_titre",config('app.name')."/Login")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 d-none d-lg-block" style="position: relative; left:18px; bottom:7px;">
            <img src="{{ asset('dist/img/login31.png') }}" alt="Login" style="width:100%; height:530px;" class="img-fluid rounded">
        </div>
        <div class="col-md-5 mt-4">
            <div class="card" style="background-color: rgba(165, 165, 231, 0.536);">
                <div class="card-header text-light h4 font-italic" style="background-color:rgb(12, 116, 161);"><i class="fas fa-lock"></i> {{ __('Login') }}</div>
                    <div class="text-center">
                        <img src="{{ asset('dist/img/login21.png') }}" alt="avatar" class="img-fluid rounded" style="width:200px;">
                    </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse Email') }}</label> --}}

                            <div class="col-md-12">
                                <input id="email" placeholder="Ex: john@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" placeholder="Ex: password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-light" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-2 offset-sm-4 text-center">
                                <button type="submit" class="btn btn-outline-light rounded-pill">
                                    <i class="fas fa-check"></i>  {{ __('S\'authentifier') }}
                                </button> <br>
                            </div>
                            <div class="col-md-12 row">
                                <a class="btn btn-link text-light col-md-6" href="{{ route('register') }}">
                                    {{ __('S\'inscrire ?') }}
                                </a>
    
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-light col-md-6" href="{{ route('password.request') }}">
                                        {{ __('Mot de Passe Oublié?') }}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
