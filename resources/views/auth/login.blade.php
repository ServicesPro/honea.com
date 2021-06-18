{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.auth')

@section('content')
    <div id="login" class="colon">
        <form method="POST" action="{{ route('login') }}" id="connectionForm">
            @csrf

            <h1></h1>
            <div id="connection_wrapper">
                <div class="form" id="formName">
                    <label for="formNom">Adresse mail</label>
                    <input id="formNom" required type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete=>
                </div>
                <div class="form" id="formNumberContainer">
                    <div style="margin-bottom: .25rem; display: flex;" class="">
                        <div style="width: 70%"></div>
                        <a style="justify-content: cener; align-items: end;" href="{{ route('password.request') }}">Mot de passe oubllié ?</a>
                    </div>
                    <label for="formNumber">Mot de passe</label>
                    <div class="inputContainer">
                        <input id="formNumber" required type="password" name="password" required autocomplete="current-password">
                    </div>
                </div>
            </div>
            <div style="margin-top: 3.5rem; text-align: center; color: orangered; border-style: none; padding-left: 16px; padding-right: 16px; font-size: .75rem; line-height: 1.2; padding-top: 8px; padding-bottom: 8px; border: 1px solid orangered; border-radius: 4px; text-transform: uppercase;">
                <a href="{{ route('register') }}">Vous n'avez pas de compte? Inscrivez-vous</a>
            </div>
            {{-- <div id="recaptcha-container" style="margin-top: 30px;"></div>
            <div id="btnCode" class="btnlogin">VERIFIER LE CODE</div> --}}
            <button type="submit" id="btnConnection" class="btnlogin"><span class="icone1"></span>SE CONNECTER</button>
            {{-- <div id="btnGmail" class="btnlogin"><span class="icone2"></span>SE CONNECTER AVEC GMAIL</div> --}}
        </form>
    </div>
@endsection
