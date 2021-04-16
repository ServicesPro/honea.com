@extends('layouts.master')

@section('css')
    <link href="{{ asset('styles/policy.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('styles/main.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div id="mainSection">
    <div id="sideMenu">
        <a>
            <img src="icon/ic_categorie.svg" height="20" width="20" alt="icon">
            <span>Nos catégories</span>
        </a>

        @php
            $counter = 0;
        @endphp

        @foreach($categories as $category)
            @php
                $counter++;
            @endphp

            <a class="s-itm" href="{{route('products.index', ['category_id' => $category->id])}}">
                {{-- <img src="icon/ic_supermaket.svg" height="20" width="20" alt="icon"> --}}
                <span id="categorie{{ $counter }}">{{$category->name}}</span>
            </a>
            @php
                $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
            @endphp

            @if($children->isNotEmpty())
                <div class="sub" id="sub{{ $counter }}">
                    <div class="sub-w">
                        @foreach ($children as $child)
                            <div class="co" id="co{{ $counter }}">
                                <span class="cat-title">
                                    <a href="{{route('products.index', ['category_id' => $child->id])}}">
                                        {{$child->name}}
                                    </a>
                                </span>

                                @php
                                    $grandChild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                @endphp

                                @if($grandChild->isNotEmpty())
                                    @foreach ($grandChild as $c)
                                        <span class="cat-itm">
                                            <a href="{{route('products.index', ['category_id' => $c->id])}}">
                                                {{$c->name}}
                                            </a>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div id="sliderContent" style="display: none;">
        <div id="wrapper_slide" style="display: none;">
            <div id="slider">
                <section class="slide_section"><a id="sect1"><img src="image/slider_placeholder.jpg"
                            class="slide" id="slide1" alt=""></a></section>
                <section class="slide_section"><a id="sect2"><img src="image/slider_placeholder.jpg"
                            class="slide" id="slide2" alt=""></a></section>
                <section class="slide_section"><a id="sect3"><img src="image/slider_placeholder.jpg"
                            class="slide" id="slide3" alt=""></a></section>
                <section class="slide_section"><a id="sect4"><img src="image/slider_placeholder.jpg"
                            class="slide" id="slide4" alt=""></a></section>
                <section class="slide_section"><a id="sect5"><img src="image/slider_placeholder.jpg"
                            class="slide" id="slide5" alt=""></a></section>
            </div>
            <div class="controls">
                <ul>
                    <li class="selected"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="controls-arrow"
                style="display: none; width: 100%; position: absolute; z-index: 1; top: 42%; justify-content: space-between;">
                <div class="slide-arrow" style="padding: 14px;">
                    <img id="slide-prev" src="icon/ic_slide_button2.svg" height="32" width="32">
                </div>
                <div class="slide-arrow" style="padding: 14px;">
                    <img id="slide-next" src="icon/ic_slide_button.svg" height="32" width="32">
                </div>
            </div>
        </div>
    </div>
    <div class="mySlider">
        <div class="slides-wrapper">
            <div id="slidi1" class="slido active"></div>
            <div id="slido2" class="slido"></div>
            <div id="slidn3" class="slido"></div>
            <div id="slidm4" class="slido"></div>
            <div id="slid5" class="slido"></div>
        </div>
        <div class="slide-indicators">
            <button type="button" class="active"></button>
            <button type="button"></button>
            <button type="button"></button>
            <button type="button"></button>
            <button type="button"></button>
        </div>
        <button type="button" class="prev-button"></button>
        <button type="button" class="next-button"></button>
    </div>
    <div id="sidePub">
        <div class="pubItem">
            <a href="{{ route('contact') }}"><img class="lazy" src="image/placeholder_image.jpg"
                    data-src="image/p1.jpeg" alt=""></a>
        </div>
        <div class="pubItem">
            <a href="marketplace-mail.html"><img class="lazy" src="image/placeholder_image.jpg"
                    data-src="image/p2.jpeg" alt=""></a>
        </div>
    </div>
</div>
<div id="homeMenu">
    <div class="menuIcon">
        <a id="distributeur" href="{{ route('distributeur') }}">
            <img src="image/icon1.png" width="40" height="40">
            <span>Distributeurs</span>
        </a>
    </div>
    <div class="menuIcon">
        <a id="historique" href="#">
            <img src="image/icon2.png" width="40" height="40">
            <span>Historiques</span>
        </a>
    </div>
    <div class="menuIcon">
        <a href="#">
            <img src="image/icon3.png" width="40" height="40">
            <span>Produits</span>
        </a>
    </div>
    <div class="menuIcon">
        <a id="commande" href="#">
            <img src="image/icon4.png" width="40" height="40">
            <span>Commandes</span>
        </a>
    </div>
</div>
<div class="productSection" id="topProduct">
    <section>
        <header>
            <h2>Les plus demandés</h2>
        </header>
        <div class="productContainer">
            <div class="topProductWrapper">
                @foreach ($bestProducts as $product)
                    <div class="productItem item1">
                        <a href="{{route('products.show', $product)}}">
                            <img class="lazy" src="image/placeholder_image.jpg" data-src="/storage/{{ $product->cover_img }}"
                                width="185" height="185">
                            <div class="productName">{{ $product->name }}</div>
                            <div class="productPrice">{{ $product->price }} FCFA</div>
                            {{-- <div class="promoPrice"><del>189,000 FCFA</del></div> --}}
                            <div class="promoCard" style="display: inline-flex;">10 %</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<div class="productSection" id="newProduct">
    <section>
        <header>
            <h2>Offres du jour</h2>
            <a href="offres-du-jour.html">
                <h3 id="all" style="color: #fff;">VOIR TOUT</h3>
            </a>
        </header>
        <div class="productContainer">
            <div class="topProductWrapper">
                {{-- <div class="productItem item1">
                    <a href="smart-technology-tv-led-43-pouces--full-option---decodeur-integre-GKVGgzIHcIPzMYnC44cj.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FGKVGgzIHcIPzMYnC44cj_thumb?alt=media&amp;token=800b2dbf-620d-43cc-9425-b4d16a27794e"
                            width="185" height="185">
                        <div class="productName">SMART TECHNOLOGY TV LED 43 Pouces- Full Option - Décodeur Intégré</div>

                        <div class="productPrice">145,800 FCFA</div>
                        <div class="promoPrice"><del>180,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">19 %
                        </div>
                    </a>
                </div> --}}
                @foreach ($dayProducts as $product)
                    <div class="productItem item1">
                        <a href="{{route('products.show', $product)}}">
                            <img class="lazy" src="image/placeholder_image.jpg" data-src="/storage/{{ $product->cover_img }}"
                                width="185" height="185">
                            <div class="productName">{{ $product->name }}</div>
                            <div class="productPrice">{{ $product->price }} FCFA</div>
                            {{-- <div class="promoPrice"><del>189,000 FCFA</del></div> --}}
                            <div class="promoCard" style="display: inline-flex;">19 %</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
{{-- <div id="topCategorie">
    <div id="categorieContainer">
        <h2 class="collectionH2">Nos collections</h2>
        <section>
            <div id="categorieWrapper">
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat1.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat1">Corps de rêve</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat2.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat2">Made in Togo</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat3.3.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat3">Bling Bling</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat4.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat4">Allons jouer</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat5.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat5">Décoration</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat11.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat11">Cinéma</p>
                </a>
            </div>
            <div id="categorieWrapper2">
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat7.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat7">Robes et combinaisons</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat8.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat8">Courses du quotidien</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat9.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat9">L'art du rangement</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat10.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat10">Cuisine 5 étoiles</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat6.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat6">Sapé comme jamais</p>
                </a>
                <a class="categorieItem">
                    <img class="lazy" src="image/placeholder_cat.jpg"
                        data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat12.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <p class="sCat12">Gadget électronique</p>
                </a>
            </div>
        </section>
    </div>
</div> --}}
<div class="twoImge">
    <div class="twoImageContainer">
        <div class="twoImageWrapper">
            <a class="deuxImage imago" id="flyer1">
                <img class="lazy" src="image/placeholder_slide.jpg">
            </a>
            <a class="deuxImage imago2" id="flyer2">
                <img class="lazy" src="image/placeholder_slide.jpg">
            </a>
        </div>
    </div>
</div>
<div class="productSection" id="categorieProduct1">
    <section>
        <header style="background-color: #ff7414; color: #fff;">
            <h2>Maison et bureau</h2>
            <h3 class="all" data-categorie="Maison et bureau">VOIR TOUT</h3>
        </header>
        <div class="productContainer">
            <div class="topProductWrapper">
                @foreach ($men as $man)
                    <div class="productItem item1">
                        <a href="coupe-legumes-multifonctionnel---rappeuse-yjyCdUSt8TxkBsIX8A6B.html">
                            <img class="lazy" src="image/placeholder_image.jpg" data-src="{{ $man->image }}"
                                width="185" height="185">
                            <div class="productName">{{ $man->name }}</div>


                            <div class="productPrice">{{ $man->price }}</div>
                            {{-- <div class="promoPrice"><del>{{ $product->name }}</del></div> --}}
                            {{-- <div class="promoCard" style="display: inline-flex;">30 % --}}
                            {{-- </div> --}}

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<div id="topCategorie">
    <div id="categorieContainer">
        <h2 id="popu">Catégories populaires</h2>
        <section class="kongaCat">
            <div id="categorie2Wrapper">
                <a class="categorieItem2">
                    <p class="sCat2">Ordinateurs</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon3.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Ordinateurs</h4>
                        <h5>Macbook</h5>
                        <h5>Bureau et moniteurs</h5>
                        <h5>Portatifs</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Téléphones et Tablettes</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon2.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Smartphones</h4>
                        <h5>IPhone</h5>
                        <h5>Téléphones Android</h5>
                        <h5>Tablettes</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Electronique</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon4.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Electronique</h4>
                        <h5>Télévision</h5>
                        <h5>Lecteur DVD</h5>
                        <h5>Camera de surveillance</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Best Fashion</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon5.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Best Fashion</h4>
                        <h5>Vêtements Homme</h5>
                        <h5>Vêtements Femme</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Maison et bureau</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon6.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Maison et bureau</h4>
                        <h5>Gros Électroménagers</h5>
                        <h5>Petit Électroménagers</h5>
                        <h5>Meubles</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Bien être bébé</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon7.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Bien être bébé</h4>
                        <h5>Alimentation pour bébé</h5>
                        <h5>Vêtements et accessoires</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Boissons</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon1.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Boissons</h4>
                        <h5>Boissons gazeuses</h5>
                        <h5>Vins</h5>
                        <h5>Sirop et sucres</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Soins personnel</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon8.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Soins personnel </h4>
                        <h5>Massage et détente</h5>
                        <h5>Coiffure et soins</h5>
                        <h5>Soins pour la peau</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Sport et Fitness</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon9.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Sport et Fitness</h4>
                        <h5>Jeux intérieur et extérieur</h5>
                        <h5>Tenue de sport</h5>
                    </div>
                </a>
                <a class="categorieItem2">
                    <p class="sCat2">Automobile</p>
                    <img
                        src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fkon10.jpg?alt=media&amp;token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                    <div class="hove">
                        <h4>Automobile</h4>
                        <h5>Outils et accessoires automobiles</h5>
                        <h5>Sureté et sécurité</h5>
                        <h5>Autocare et maintenance</h5>
                    </div>
                </a>
            </div>
        </section>
    </div>
</div>
<div class="twoImge">
    <div class="twoImageContainer">
        <div class="twoImageWrapper">
            <a class="deuxImage imago" id="flyer3">
                <img class="lazy" src="image/placeholder_slide.jpg">
            </a>
            <a class="deuxImage imago2" id="flyer4">
                <img class="lazy" src="image/placeholder_slide.jpg">
            </a>
        </div>
    </div>
</div>
<div class="productSection" id="categorieProduct2">
    <section>
        <header>
            <h2>Mode Femme</h2>
            <h3 class="all" data-categorie="Mode Femme">VOIR TOUT</h3>
        </header>
        <div class="productContainer">
            <div class="topProductWrapper">
                <div class="productItem item1">
                    <a href="sacs-a-main---4-pieces-pour-femme-bUk78hM1gwzRA6HilBnf.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FbUk78hM1gwzRA6HilBnf_thumb?alt=media&amp;token=d0fcfe99-a889-47a6-842d-d926099b1018"
                            width="185" height="185">
                        <div class="productName">Sacs A Main - 4 Pièces Pour Femme</div>


                        <div class="productPrice">16,800 FCFA</div>
                        <div class="promoPrice"><del>21,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">20 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="sacs-a-main---4-pieces-pour-femme-pk3yiHsdT7WLV000t3X5.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2Fpk3yiHsdT7WLV000t3X5_thumb?alt=media&amp;token=0b98608e-3970-4179-9ce7-34857e0f3b77"
                            width="185" height="185">
                        <div class="productName">Sacs A Main - 4 Pièces Pour Femme</div>


                        <div class="productPrice">16,800 FCFA</div>
                        <div class="promoPrice"><del>21,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">20 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="ensemble-complet-de-sport-pour-femmes-HhhFQnkAY4bLTazkgE2W.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FHhhFQnkAY4bLTazkgE2W_thumb?alt=media&amp;token=58c85a81-219b-4aba-9def-ed680e81a0f7"
                            width="185" height="185">
                        <div class="productName">Ensemble Complet de Sport Pour Femmes</div>


                        <div class="productPrice">8,000 FCFA</div>
                        <div class="promoPrice"><del>10,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">20 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="collier-a-pendentif-pour-femmes---argent---rouge-i1zfJH7MIESmBjPvU915.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2Fi1zfJH7MIESmBjPvU915_thumb?alt=media&amp;token=3ba24c9b-863c-4fa0-8536-408a5d093201"
                            width="185" height="185">
                        <div class="productName">Collier A Pendentif Pour Femmes - Argent - Rouge</div>


                        <div class="productPrice">2,000 FCFA</div>
                        <div class="promoPrice"><del>5,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">60 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="ensemble-collier-%2b-boucles-d%27oreilles--v2WDnRx12GMDgLZ9KQFL.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2Fv2WDnRx12GMDgLZ9KQFL_thumb?alt=media&amp;token=a32d929d-4902-4908-acf8-1359a67c4fc0"
                            width="185" height="185">
                        <div class="productName">Ensemble Collier + Boucles d&#x27;oreilles </div>


                        <div class="productPrice">8,000 FCFA</div>
                        <div class="promoPrice"><del>10,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">20 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="robe-moulante-sexy-pour-taille-fine-et-moyenne-v78Yt9EDLfI1K3WCcTuS.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2Fv78Yt9EDLfI1K3WCcTuS_thumb?alt=media&amp;token=1f00eb77-3d17-4b40-98d5-48d640eef2a1"
                            width="185" height="185">
                        <div class="productName">Robe Moulante Sexy Pour Taille Fine Et Moyenne</div>


                        <div class="productPrice">4,000 FCFA</div>
                        <div class="promoPrice"><del>10,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">60 %
                        </div>

                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="twoImge">
    <div class="twoImageContainer">
        <div class="twoImageWrapper">
            <a class="deuxImage imago" id="flyer5">
                <img class="lazy" src="image/placeholder_slide.jpg">
            </a>
            <a class="deuxImage imago2" id="flyer6">
                <img class="lazy" src="image/placeholder_slide.jpg">
            </a>
        </div>
    </div>
</div>
<div class="productSection" id="categorieProduct3">
    <section>
        <header style="background-color: #ff4747; color: #fff;">
            <h2>Mode Homme</h2>
            <h3 class="all" data-categorie="Mode Homme">VOIR TOUT</h3>
        </header>
        <div class="productContainer">
            <div class="topProductWrapper">
                <div class="productItem item1">
                    <a href="vestes-pour-hommes---3-pieces---marshalino---d25-eZK0be5KLibexim3ebAH.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FeZK0be5KLibexim3ebAH_thumb?alt=media&amp;token=5b7881f5-3a2e-4cf9-9a4c-b90bb29c93fc"
                            width="185" height="185">
                        <div class="productName">Vestes Pour Hommes - 3 Pièces - MARSHALINO - D25</div>


                        <div class="productPrice">39,950 FCFA</div>
                        <div class="promoPrice"><del>47,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="vestes-pour-hommes---3-pieces---marshalino---d24-jeyDNLmKH7y3V1HQtq7G.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FjeyDNLmKH7y3V1HQtq7G_thumb?alt=media&amp;token=b7d02640-f8b2-4ccf-b311-0a32f806a798"
                            width="185" height="185">
                        <div class="productName">Vestes Pour Hommes - 3 Pièces - MARSHALINO - D24</div>


                        <div class="productPrice">39,950 FCFA</div>
                        <div class="promoPrice"><del>47,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="vestes-pour-hommes---3-pieces---marshalino---d23-HbwMZFmt79oaDhyWdSEO.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FHbwMZFmt79oaDhyWdSEO_thumb?alt=media&amp;token=ec19116a-20c6-43aa-b1df-3df3bae1617c"
                            width="185" height="185">
                        <div class="productName">Vestes Pour Hommes - 3 Pièces - MARSHALINO - D23</div>


                        <div class="productPrice">39,950 FCFA</div>
                        <div class="promoPrice"><del>47,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="vestes-pour-hommes---3-pieces---marshalino---d22-u76Ka5ClPCOZjkizpGjQ.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2Fu76Ka5ClPCOZjkizpGjQ_thumb?alt=media&amp;token=c9652c23-3a3e-44a8-a8d6-cacb1153f330"
                            width="185" height="185">
                        <div class="productName">Vestes Pour Hommes - 3 Pièces - MARSHALINO - D22</div>


                        <div class="productPrice">39,950 FCFA</div>
                        <div class="promoPrice"><del>47,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="vestes-pour-hommes---3-pieces---marshalino---d21-gyLXGsBCEpBXmeGlhU4O.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FgyLXGsBCEpBXmeGlhU4O_thumb?alt=media&amp;token=6c994d71-98f2-4e34-a855-d9e7a4c97ec5"
                            width="185" height="185">
                        <div class="productName">Vestes Pour Hommes - 3 Pièces - MARSHALINO - D21</div>


                        <div class="productPrice">39,950 FCFA</div>
                        <div class="promoPrice"><del>47,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="vestes-pour-hommes---3-pieces---marshalino---d20-TjdXaHMN6taxp1WnOJwD.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FTjdXaHMN6taxp1WnOJwD_thumb?alt=media&amp;token=f5e4cda2-0ef5-44f5-8e49-43d98b2e5d12"
                            width="185" height="185">
                        <div class="productName">Vestes Pour Hommes - 3 Pièces - MARSHALINO - D20</div>


                        <div class="productPrice">39,950 FCFA</div>
                        <div class="promoPrice"><del>47,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="twoImge">
    <div class="twoImageContainer">
        <div class="twoImageWrapper">
            <a class="deuxImage imago" id="flyer7">
                <img class="lazy" src="image/placeholder_slide.jpg">
            </a>
            <a class="deuxImage imago2" id="flyer8">
                <img class="lazy" src="image/placeholder_slide.jpg">
            </a>
        </div>
    </div>
</div>
<div class="productSection" id="categorieProduct4">
    <section>
        <header>
            <h2>Nos packs</h2>
            <h3 class="all" data-categorie="Nos packs">VOIR TOUT</h3>
        </header>
        <div class="productContainer">
            <div class="topProductWrapper">
                <div class="productItem item1">
                    <a href="pack-electromenager-3---refrigerateur-renz-185-l-%2b-mixeur-roch-incassable-%2b-regulateur-renz-a-commande-1000w-5c5T6D1sgv4pEOlcjzT6.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2F5c5T6D1sgv4pEOlcjzT6_thumb?alt=media&amp;token=53ade929-03a0-48a0-a3fc-a6a3a9f6eda2"
                            width="185" height="185">
                        <div class="productName">PACK ELECTROMENAGER 3 - Réfrigerateur Renz 185 L + Mixeur Roch Incassable + Régulateur RENZ à commande 1000W</div>

                        <div class="productPrice">150,450 FCFA</div>
                        <div class="promoPrice"><del>177,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="pack-electromenager-1---refrigerateur-renz-90l-%2b-mixeur-roch-incassable-%2b-ventilateur-a-commande-vJNzyjuQOlXmWyQIDb3B.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FvJNzyjuQOlXmWyQIDb3B_thumb?alt=media&amp;token=808945ae-da16-4fe4-9119-f8fc97d394d7"
                            width="185" height="185">
                        <div class="productName">PACK ELECTROMENAGER 1 - Réfrigerateur Renz 90L + Mixeur Roch Incassable + VENTILATEUR A COMMANDE</div>

                        <div class="productPrice">102,000 FCFA</div>
                        <div class="promoPrice"><del>120,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="pack-cuisine-1---mixeur-2-in-1-%2b-cuisiniere-vitree-3-feux-%2b-chauffe-eau-scarlett-%2b-fer-a-repasser-binatone-uNt1N6TTzBsIHaLmoj0z.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FuNt1N6TTzBsIHaLmoj0z_thumb?alt=media&amp;token=d7eb8c1c-3b45-4ed4-9230-cc812cd30e1d"
                            width="185" height="185">
                        <div class="productName">PACK CUISINE 1 - Mixeur 2 in 1 + Cuisinière vitrée 3 feux + Chauffe eau Scarlett + Fer à Repasser Binatone</div>

                        <div class="productPrice">43,200 FCFA</div>
                        <div class="promoPrice"><del>54,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">20 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="pack-electromenager-3---congelateur-renz-110-l-%2b-mixeur-roch-incassable-%2b-ventilateur-a-commande-zLKFZAw1p13NENjHPSKY.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FzLKFZAw1p13NENjHPSKY_thumb?alt=media&amp;token=d52bc18c-098c-41d5-a8ee-ae7f8e12e77d"
                            width="185" height="185">
                        <div class="productName">PACK ELECTROMENAGER 3 - Congelateur Renz 110 L + Mixeur Roch Incassable + Ventilateur à Commande</div>

                        <div class="productPrice">126,000 FCFA</div>
                        <div class="promoPrice"><del>150,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">16 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="pack-electromenager-2---refrigerateur-renz-185-l-%2b-mixeur-roch-incassable-%2b-ventilateur-a-commande-8HPaQvdGaXu9xyaD6YxO.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2F8HPaQvdGaXu9xyaD6YxO_thumb?alt=media&amp;token=794f6374-d8bd-4baa-bf25-9bc416c858dc"
                            width="185" height="185">
                        <div class="productName">PACK ELECTROMENAGER 2 - Réfrigerateur Renz 185 L + Mixeur Roch Incassable + Ventilateur à Commande</div>

                        <div class="productPrice">140,250 FCFA</div>
                        <div class="promoPrice"><del>165,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">15 %
                        </div>

                    </a>
                </div>
                <div class="productItem item1">
                    <a href="pack-cuisine-2---mixeur-2-in-1-%2b-cuisiniere-vitree-3-feux-%2b-fer-a-repasser-binatone-AqGOv00osbvgTGeFLCJQ.html">
                        <img class="lazy" src="image/placeholder_image.jpg" data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/Togo%2FProduitImages%2FAqGOv00osbvgTGeFLCJQ_thumb?alt=media&amp;token=067c456d-abe2-4c95-9ae3-6ee15bbaa6cf"
                            width="185" height="185">
                        <div class="productName">PACK CUISINE 2 - Mixeur 2 in 1 + Cuisinière vitrée 3 feux + Fer à Repasser Binatone</div>

                        <div class="productPrice">40,000 FCFA</div>
                        <div class="promoPrice"><del>50,000 FCFA</del></div>
                        <div class="promoCard" style="display: inline-flex;">20 %
                        </div>

                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="twoImge" id="sell-small-wrap" style="display: none;">
    <div class="twoImageContainer">
        <div class="twoImageWrapper">
            <a class="unImage imago" id="flyer9" href="marketplace-mail.html">
                <img class="lazy" src="image/placeholder_slide.jpg" data-src="image/oneImage.jpg">
            </a>
        </div>
    </div>
</div>
<div id="desc">
    <div id="desContainer">
        <h1>Achats en ligne sur Achetia.com - le plus grand centre commercial en ligne au Togo !</h1>
        <p>
            <strong class="bestText">Achetia</strong> est la première destination d’achat en ligne au Togo.
            Nous sommes fiers d’avoir tout ce dont
            vous pourriez avoir besoin pour vivre au meilleur prix que partout ailleurs.<br>Notre accès aux
            fabricants d'équipement
            d'origine et aux vendeurs haut de gamme nous donne une large gamme de produits à des prix très
            bas. Certaines de nos
            catégories populaires incluent l'électronique, les téléphones portables, les ordinateurs, la
            mode, les produits de beauté,
            la maison et la cuisine, les matériaux de construction et bien d'autres
            produits de marques haut
            de gamme.<br>Certaines de nos autres catégories comprennent la nourriture et les boissons,
            l'automobile
            et l'industrie, les livres, l'équipement musical, les articles pour bébés et enfants, le sport
            et le fitness, pour
            n'en citer que quelques-uns. Pour rendre votre expérience d’achat rapide et mémorable, il existe
            également des
            services supplémentaires tels que des chèques-cadeaux, des activités de promotion auprès des
            consommateurs
            dans différentes catégories et des achats en gros avec une livraison sans tracas. Profitez de
            tarifs de
            livraison gratuits pour certains produits et avec l'option d'achat en gros, vous pouvez profiter
            de tarifs d'expédition bas,
            de prix réduits et de paiement flexible.<br>Lorsque vous achetez sur notre plateforme, vous
            pouvez payer avec votre carte visa ,
            par flooz , t-money ou à la livraison. Obtenez le meilleur des services de style de vie en
            ligne. Ne manquez pas les plus grosses
            ventes en ligne qui ont lieu chaque année à des dates spéciales.
        </p>
    </div>
</div>
@endsection
