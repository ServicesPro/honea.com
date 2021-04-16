@extends('layouts.master')

@section('css')
<link href="{{ asset('styles/product.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
    {{-- <script src="{{ asset('js/product.js') }}"></script> --}}
@endsection

@section('content-second')

<div class="w-main">
    <div id="sideMenu">
        @foreach ($categories as $category)
            <a class="s-itm" href="{{route('products.index', ['category_id' => $category->id])}}">
                {{-- <img src="../icon/ic_supermaket.svg" height="20" width="20" alt="icon"> --}}
                <span id="categorie1">{{ $category->name }}</span>
            </a>
        @endforeach
    </div>
    <div class="navText">
        <a href="/" class="navHome">Accueil</a>
        <a>></a>
        <a class="navProduit">Produit</a>
    </div>
    <section class="navSection">
        <div class="navWrapper">
            <div class="navImage">
                <a>
                    <img class="lazy" id="topImage" src="{{ asset('image/placeholder_categorie.jpg') }}" data-src="{{ asset('image/a.jpeg') }}">
                </a>
            </div>
        </div>
    </section>
    <div id="mainContainer">
        <div class="sideSection">
            <div class="sideWrapper">
                    <a>
                        {{-- <img src="/icon/icon_side0.svg" height="20" width="20" alt="icon"> --}}
                        <span id="cat">CATEGORIES</span>
                    </a>
                    @php
                        $counter = 0;
                    @endphp
                    @foreach ($categories as $category)
                        @php
                            $counter++;
                        @endphp
                        <a class="sideCat" href="{{route('products.index', ['category_id' => $category->id])}}">
                            {{-- <img src="../icon/ic_supermaket.svg" height="20" width="20" alt="icon"> --}}
                            <span id="categorie{{ $counter }}">{{ $category->name }}</span>
                        </a>
                    @endforeach
                    <div class="filterSection" id="prixFilter">
                        <a>
                            <img src="/icon/icon_side0.svg" height="20" width="20" alt="icon">
                            <span id="cat">TRIER PAR PRIX</span>
                        </a>
                        <a>
                            <span class="radioItem"></span>
                            <span class="tPrix">Prix croissant</span>
                        </a>
                        <a>
                            <span class="radioItem"></span>
                            <span class="tPrix">Prix décroissant</span>
                        </a>
                    </div>
            </div>
        </div>
        <div class="product-list">
            <section>
                <header>
                    <h1>Produits</h1>
                    <h2 id="all">Nouvel arrivage<span></span></h2>
                    <div class="dropSort">
                        <h3>Nouvel arrivage</h3>
                        <h3>Prix croissant</h3>
                        <h3>Prix décroissant</h3>
                    </div>
                </header>
                {{-- <div class="loadContainer">
                    <div class="loading">

                    </div>
                </div> --}}
                <div class="product-content">
                    @foreach ($allProducts as $product)
                        <div class="p-item" id="{{ $product->id }}">
                            <a data-id="{{ $product->id }}" href="{{ route('products.show', $product) }}">
                                <img src="/storage/{{ $product->cover_img }}" style="display: inline-block" alt="" class="lazy">
                                <div class="productName">{{ $product->name }}</div>
                                <div class="productPrice">{{ $product->price }}</div>
                                <div class="promoCard" style="display: inline-block">14 %</div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="productFooter">
                    <div class="prev">
                        <img class="iconP" src="../image/forward_50px.png" width="20" height="20">
                        <h4>Précédent</h4>
                    </div>
                    <h5>0</h5>
                    <div class="next">
                        <h4>Suivant</h4>
                        <img src="../image/forward_50px.png" width="20" height="20">
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
