{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.auth')

@section('content')
<div id="login" class="colon">
    <form method="POST" action="{{ route('register') }}" id="connectionForm">
        @csrf

        <h1></h1>
        <div id="connection_wrapper">
            <div class="form" id="name">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete=>
            </div>
            <div class="form" id="formName">
                <label for="formNom">Adresse e-mail</label>
                <input id="formNom" type="email" name="email" value="{{ old('email') }}" required autocomplete=>
            </div>
            <div class="form" id="formNumberContainer">
                <label for="formNumber">Mot de passe</label>
                <div class="inputContainer">
                    <input id="formNumber" type="password" name="password" required autocomplete="current-password">
                </div>
            </div>
            <div class="form" id="pswc">
                <label for="pswc">Confirmez le mot de passe</label>
                <div class="inputContainer">
                    <input id="pswc" type="password" name="password_confirmation" required autocomplete="current-password">
                </div>
            </div>
        </div>
        <div style="margin-top: 3.5rem; text-align: center; color: orangered; border-style: none; padding-left: 16px; padding-right: 16px; font-size: .75rem; line-height: 1.2; padding-top: 8px; padding-bottom: 8px; border: 1px solid orangered; border-radius: 4px; text-transform: uppercase;">
            <a href="{{ route('login') }}">Vous avez déjà un compte? Connectez-vous</a>
        </div>
        {{-- <div id="recaptcha-container" style="margin-top: 30px;"></div>
        <div id="btnCode" class="btnlogin">VERIFIER LE CODE</div> --}}
        <button type="submit" id="btnConnection" class="btnlogin"><span class="icone1"></span>S'ENREGISTRER</button>
        {{-- <div id="btnGmail" class="btnlogin"><span class="icone2"></span>SE CONNECTER AVEC GMAIL</div> --}}
    </form>
</div>
@endsection
