@extends('layouts.master')

@section('css')
    <link href="{{ asset('styles/panier.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
    <script src="{{ asset('js/panier.js') }}"></script>
@endsection

@section('content')


<livewire:mall-cart />



@endsection
