@extends('layouts.master')

{{-- @section('content') --}}

{{-- {{-- <div class="product-details ptb-100 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <div class="product-details-5 pr-70">
                    <img src="/assets/img/product-details/l1-details-5.png" alt="">
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h3>{{$product->name}}</h3>
                    <div class="rating-number">
                        <div class="quick-view-rating">
                            <i class="pe-7s-star red-star"></i>
                            <i class="pe-7s-star red-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                        </div>
                        <div class="quick-view-number">
                            <span>2 Ratting (S)</span>
                        </div>
                    </div>
                    <div class="details-price">
                        <span>${{$product->price}}</span>
                    </div>
                    <p>{!! $product->description !!}</p>

                    <div class="quickview-plus-minus">

                        <div class="quickview-btn-cart">
                            <a class="btn-hover-black" href="{{route('cart.add', $product)}}">add to cart</a>
                        </div>

                    </div>
                    <div class="product-details-cati-tag mt-35">
                        <ul>
                            <li class="categories-title">Categories :</li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">electronics</a></li>
                            <li><a href="#">toys</a></li>
                            <li><a href="#">food</a></li>
                            <li><a href="#">jewellery</a></li>
                        </ul>
                    </div>
                    <div class="product-details-cati-tag mtb-10">
                        <ul>
                            <li class="categories-title">Tags :</li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">electronics</a></li>
                            <li><a href="#">toys</a></li>
                            <li><a href="#">food</a></li>
                            <li><a href="#">jewellery</a></li>
                        </ul>
                    </div>
                    <div class="product-share">
                        <ul>
                            <li class="categories-title">Share :</li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-flikr"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- reviews section --}}

{{-- @include('product._reviews') --}}

<!-- related product area start -->
{{-- @include('product._related-product') --}}

{{-- @endsection --}}

@section('css')
    <link href="{{ asset('styles/detail.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
<script src="{{ asset('js/detail.js') }}"></script>
<script>
    if(pays == "Togo"){
        document.querySelector("#fraiL").textContent = "Nos frais de livraison varient en fonction de votre ville mais gratuits à lomé";
    }else if(pays == "Benin"){
        document.querySelector("#fraiL").textContent = "Nos frais de livraison varient en fonction de votre ville mais gratuits à cotonou et à CALAVI";
    }else if(pays == "CoteDivoire"){
        document.querySelector("#fraiL").textContent = "Nos frais de livraison varient en fonction de votre ville mais gratuits à abidjan";
    }
</script>
<script>
    if(pays == "Togo"){
        document.querySelector("#numero").textContent = "Appelez nous pour passer votre commande au numéro +22890650505";
    }else if(pays == "Benin"){
        document.querySelector("#numero").textContent = "Appelez nous pour passer votre commande au numéro +22999999783";
    }else if(pays == "CoteDivoire"){
        document.querySelector("#numero").textContent = "Appelez nous pour passer votre commande au numéro +22574361442";
    }
</script>
@endsection

@section('content-second')
<div class="buttonBy2">
    <div id="btnConnection" class="btnChoise  btn_buyM">ACHETER MAINTENANT</div>
    <div id="btnGmail" class="btnChoise btn_addM"><img src="icon/add_shopping_cart.svg"></div>
</div>
<div id="mainContainer">
    <div id="sideMenu">
        <script>
            $("#sideMenu").load("pages/side-menu.html");
        </script>
    </div>
    <div class="navText">
        <a href="{{ url('/') }}"lass="navHome">Accueil</a>
        <a>></a>
        <a href="#produit.html" class="navProduit">Produit</a>
        <a>></a>
        <a class="navSelect">{{ $product->name }}</a>
    </div>
    <div class="wrapperMain">
        <div class="firstSection">
            <div class="part1" data-categorie="Maison et bureau,Gros Électroménagers,Réfrigérateurs">
                <div class="sectionImage">
                    <div class="productImage">
                        <div class="loadContainer" style="display: none;">
                            <div class="loading">
                            </div>
                        </div>
                        <img src="{{ asset("storage/$product->cover_img") }}" data-thumb2="" data-thumb3="" height="400px" width="400px">
                    </div>
                    <div class="line">
                    </div>
                </div>
                <div class="sectionImageMulti">
                    <div class="productImageMulti">
                        <img id="img1" src="{{ asset('image/placeholder_image.jpg') }}">
                        <img id="img2" src="{{ asset('image/placeholder_image.jpg') }}" style="display: none;">
                        <img id="img3" src="{{ asset('image/placeholder_image.jpg') }}" style="display: none;">
                    </div>
                    <div class="line">
                    </div>
                </div>
                <div class="sectionDesc" data-id="{{ $product->id }}" data-search="{{ $product->name }}">
                    <h1>{{ $product->name }}</h1>
                    {{-- <p>Marque: RENZ</p> --}}
                    <div class="rateSection">
                        <div class="productRate">
                            <div class="rate" style="width: 100px;">
                            </div>
                        </div>
                        <span>(Donnez votre avis)</span>
                    </div>
                    <h2 data-prix="{{ $product->price }}">{{ $product->price }} FCFA</h2>

                        <div class="promoCount" style="display: flex;">
                            <span class="oldPrice"><del>{{ $product->price }} FCFA</del></span>
                            <span class="promoCard">10 %</span>
                        </div>
                    {{-- <div class="tailleSection" data-value="" data-couleur="">
                        <h3>Taille ou numéro disponible</h3>
                        <div class="detailCard">
                        </div>
                    </div> --}}
                    <div class="like">
                        <img src="icon/testicon.html" width="24" height="24" alt=" ">
                    </div>
                </div>
                <div class="buttonBy">
                    <div id="btnConnection" class="btnChoise btn_buy">ACHETER MAINTENANT</div>
                    <a href="{{ route('cart.add', $product->id) }}" id="btnGmail" class="btnChoise btn_add"><img src="{{ asset('icon/add_shopping_cart.svg') }}"></a>
                </div>
            </div>
            <div class="ficheSection">
                <header>
                    <h1>Détails</h1>
                </header>
                <div>
                    {{ $product->description }}
                </div>
                <div>
                    <p>{{$product->shop->owner->name ?? 'n/a'}}</p>
                </div>
            </div>
            {{-- <div class="ficheTeknic">
                <header>
                    <h1>Fiche technique</h1>
                </header>
                <div class="fiche">
                    <article class="tekSection">
                        <div class="tekContainer">
                            <h2>PRINCIPALES CARACTERISTIQUES</h2>
                            <div>
                                <ul class="caract" data-value="Économie d’énergie,Grand panier pour stocker plus de fruits et légumes,Écologique,Gaz R600,Technologie japonaise,Refroidissement plus rapide,Garantie de 2 ans,compresseur puissant,verrouiller la sécurité">
                                    <li>N/A</li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article  class="tekSection">
                        <div class="tekContainer">
                            <h2>INFORMATION GENERALE</h2>
                            <ul class="caract2" data-value="">
                                <li>N/A</li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div> --}}
            {{-- <div class="productSection" id="aviSection">
                <section>
                    <header>
                        <h2>Avis des utilisateurs</h2>
                    </header>
                    <div class="productContainer" id="aviContent">

                    </div>
                </section>
            </div> --}}
        </div>
        <div class="secondSection">
            <section>
                <h2>Livraison &amp; Paiement</h2>
                <article>
                    <img class="fIcon" src="{{ asset('icon/plane.png') }}" height="24" width="24">
                    <div>
                        <img src="{{ asset('image/best_express.png') }}" width="120">
                        <p>Soyez livrer chez vous dans un bref délai.</p>
                    </div>
                </article>
                <article>
                    <img class="fIcon" src="{{ asset('icon/coins.png') }}" height="24" width="24">
                    <div>
                        <h3>Frais de livraison</h3>
                        <p id="fraiL">Nos frais de livraison varient en fonction de votre ville mais gratuits à lacapital.</p>
                    </div>
                </article>
                <article>
                    <img class="fIcon" src="{{ asset('icon/delivery.png') }}" height="24" width="24">
                    <div>
                        <h3>Délais de livraison</h3>
                        <p>Le délai de livraison est de 24h mais peut varier en fonction de l’heure à laquelle vous
                            passez votre commande ou en fonction de votre ville ou quartier.
                        </p>
                    </div>
                </article>
                <article>
                    <img class="fIcon" src="{{ asset('icon/receive.png') }}" height="24" width="24">
                    <div>
                        <h3>Mode de paiement</h3>
                        <p>Paiement à la livraison, ou vous pouvez aussi payer par Flooz, Visa, Master Card
                        </p>
                    </div>
                </article>
            </section>
            <div id="sellerSection" style="padding-bottom: 13px;">
            <div class="seller">
                <section>
                    <h2>Nous contactez</h2>
                    <div class="sel1">
                        <p id="numero">Appelez nous pour passer votre commande au numéro</p>
                        <p>Ou envoyer nous un email</p>
                        <div class="sel2">
                            contact@honea.com
                        </div>
                    </div>
                </section>
            </div>
            <div class="seller">
                <section>
                    <h2>Partager le produit</h2>
                    <div class="shareIcon">
                        <a class="fbShare">
                            <img src="{{ asset('icon/facebook.png') }}" width="36px" height="36px" style="margin-bottom: 2px;">
                        </a>
                        <a class="twShare">
                            <img src="{{ asset('icon/twitter.png') }}" width="40px" height="40px">
                        </a>
                    </div>
                </section>
            </div>
            </div>

        </div>
    </div>
    <div class="productSection" id="similarProduct">
        <section>
            <header>
                <h2>Produits similaires</h2>
            </header>
            <div class="productContainer">
                <div class="topProductWrapper">
                    <div class="productItem item1">
                        <a>
                            <img src="{{ asset('image/placeholder_image.jpg') }}" width="185" height="185">
                            <div class="productName"></div>
                            <div class="productPrice"></div>
                            <div class="promoPrice">&nbsp;</div>
                            <div class="promoCard"></div>
                        </a>
                    </div>
                    <div class="productItem item2">
                        <a>
                            <img src="{{ asset('image/placeholder_image.jpg') }}" width="185" height="185">
                            <div class="productName">&nbsp;</div>
                            <div class="productPrice">&nbsp;</div>
                            <div class="promoPrice">&nbsp;</div>
                            <div class="promoCard"></div>
                        </a>
                    </div>
                    <div class="productItem item3">
                        <a>
                            <img src="{{ asset('image/placeholder_image.jpg') }}" width="185" height="185">
                            <div class="productName">&nbsp;</div>
                            <div class="productPrice">&nbsp;</div>
                            <div class="promoPrice">&nbsp;</div>
                            <div class="promoCard"></div>
                        </a>
                    </div>
                    <div class="productItem item4">
                        <a>
                            <img src="{{ asset('image/placeholder_image.jpg') }}" width="185" height="185">
                            <div class="productName">&nbsp;</div>
                            <div class="productPrice">&nbsp;</div>
                            <div class="promoPrice">&nbsp;</div>
                            <div class="promoCard"></div>
                        </a>
                    </div>
                    <div class="productItem item5">
                        <a>
                            <img src="{{ asset('image/placeholder_image.jpg') }}" width="185" height="185">
                            <div class="productName">&nbsp;</div>
                            <div class="productPrice">&nbsp;</div>
                            <div class="promoPrice">&nbsp;</div>
                            <div class="promoCard"></div>
                        </a>
                    </div>
                    <div class="productItem item6">
                        <a>
                            <img src="{{ asset('image/placeholder_image.jpg') }}" width="185" height="185">
                            <div class="productName">&nbsp;</div>
                            <div class="productPrice">&nbsp;</div>
                            <div class="promoPrice">&nbsp;</div>
                            <div class="promoCard"></div>
                        </a>
                    </div>
                </div>
                <button class="iconP" style="display: none">
                    <img src="{{ asset('con/icon_side1.svg') }}i" height="20" width="20" alt="icon">
                </button>
                <button class="iconP" style="display: none">
                    <img src="{{ asset('icon/icon_side1.svg') }}" height="20" width="20" alt="icon">
                </button>
            </div>
        </section>
    </div>
</div>
@endsection
