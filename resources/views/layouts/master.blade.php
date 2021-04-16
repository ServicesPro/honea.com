<!DOCTYPE html>
<html>


<!-- Mirrored from www.Honea.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 17:39:35 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Honea">
    <meta property="og:title" content="Honea - Faites vous livrer en un click">
    <meta property="og:url" content="www.Honea.com">
    <meta property="og:description"
        content="Honea est la première destination d’achat en ligne. Nous sommes fiers d’avoir tout ce dont vous pourriez avoir besoin pour vivre au meilleur prix que partout ailleurs.">
    <meta name="description"
        content="Honea est la première destination d’achat en ligne. Nous sommes fiers d’avoir tout ce dont vous pourriez avoir besoin pour vivre au meilleur prix que partout ailleurs.">
    <meta property="og:image"
        content="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/best_market_logo.jpg?alt=media&amp;token=c0148202-04b2-439b-b113-7c9331399ec7">
    <meta name="title" content="Honea - Faites vous livrer en un click">
    <link rel="icon" type="icon/png" href="favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('styles/reset.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('styles/common.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('styles/popup.css') }}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="styles/login.css" rel="stylesheet" type="text/css"> --}}
    @yield('css')
</head>

<body>
    <div class="mobile-search">
        <div id="search-form2">
            <div id="find3">
                <div id="btn-back" onclick="hideMobileSearch()">
                    <img src="{{ asset('icon/icon_back.svg') }}" height="24" width="24" alt="image"
                        style="padding-left: 14px; padding-top: 3px; padding-right: 5px;">
                </div>
                <input id="editTextM" type="text" name="qsearch" placeholder="Recherchez sur Honea..."
                    autocomplete="false" onkeypress="advanceSearchMobile(this.value)">
                <div class="search-line"></div>
                <img id="ic_search" src="{{ asset('icon/search_filled.svg') }}" height="20" width="20" alt="image"
                    onclick="startMobileSearch()">
            </div>
        </div>
        <div class="mobile-search-container"></div>
    </div>
    <div class="popupLoadingClose">
        <div class="modalContent">
            <div class="loading">
            </div>
            <h1>Chargement en cours...</h1>
        </div>
    </div>
    <div class="popupCart1" id="paysDialog">
        <div class="container1">
            <div class="cont1">
                <h1>Changer de pays !</h1>
                <img id="closePays" src="{{ asset('icon/ic_detele.svg') }}" width="20" height="20">
            </div>
            <div class="cont2">
                <a href="index.html" class="option" id="togoM">
                    <img src="{{ asset('image/ic_togo.jpg') }}" width="22" height="15">
                    <h3>Togo</h3>
                </a>
            </div>
        </div>
    </div>
    <div id="drawerMenu">
        <div class="drawer-content">
            <div class="drawer_wrapper">
                <div class="drawerLogo">
                    <img class="close" src="{{ asset('icon/ic_detele.svg') }}" alt="logoDistribution" />
                    <img class="logo" src="{{ asset('image/honea.png') }}" width="110px" alt="logo" />
                    <img class="paysDrawer" src="{{ asset('image/ic_togo.jpg') }}" alt="logoDistribution" />
                </div>
                <h1>Menu</h1>
                <a href="{{ url('/') }}" class="categorie">
                    <img src="{{ asset('icon/home.svg') }}" height="28" width="28" alt="icon">
                    <span>Accueil</span>
                </a>
                <div class="categorie" id="drawerOrder">
                    <img src="{{ asset('icon/icon_cart.svg') }}" height="28" width="28" alt="icon">
                    <span>Commandes</span>
                </div>
                <div class="categorie" id="drawerBuy">
                    <img src="{{ asset('icon/ic_achat.svg') }}" height="28" width="28" alt="icon">
                    <span>Vos achats</span>
                </div>
                <div class="categorie" id="drawerSave">
                    <img src="{{ asset('icon/ic_coeur.svg') }}" height="28" width="28" alt="icon">
                    <span>Produits enrégistés</span>
                </div>
                <div class="categorie" id="drawerRecent">
                    <img src="{{ asset('icon/ic_save_recent.svg') }}" height="28" width="28" alt="icon">
                    <span>Vu récements</span>
                </div>
                <div class="categorie" id="logout">
                    <img src="{{ asset('icon/logout.svg') }}" height="28" width="28" alt="icon">
                    <span>Se deconnecter</span>
                </div>
                <h1>Categories</h1>
                @foreach ($categories as $category)
                    <a href="{{ route('products.index', ['category_id' => $category->id]) }}" class="categorie">
                        {{-- <img src="icon/ic_supermaket.svg" height="20" width="20" alt="icon"> --}}
                        <span id="cat1">{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <header style="margin-bottom: 20px" class="header">
        {{-- bande d'annonce --}}
        <div
            style="width:100%;display:flex;flex-wrap:wrap; align-items:center; background-color: black; padding-top: .8rem; padding-bottom: .8rem; z-index: 1000; position: absolute;">
            <div class="" style="display: inline-flex; flex-grow:1; width:auto;">
                <a href="#" style="color: #c9aa3d;" class="" target="_blank" rel="noopener">
                    <svg viewBox="0 0 24 24" class="" width="16" height="16">
                        <use xlink:href="https://www.jumia.ci/assets_he/images/i-icons.e6412588.svg#cat-services"></use>
                    </svg>
                    Vendez sur Honea
                </a>
                <a href="tel:+9022554" style="color: #f5da75;">
                    <svg viewBox="0 0 24 24" class="" width="16" height="16">
                        <use xlink:href="https://www.jumia.ci/assets_he/images/i-icons.e6412588.svg#cat-services"></use>
                    </svg>
                    Appelez-Nous Maintenant
                </a>
            </div>
        </div>
        <div style="margin-top: 25px" class="h-wrap">
            <div class="h_content">
                <div id="drawer-icon">
                    <div>
                        <img src="{{ asset('image/toggle.png') }}" width="24px" alt="logoDistribution" />
                    </div>
                </div>
                <div id="logo">
                    <div>
                        <a href="{{ url('/') }}"><img src="{{ asset('image/honea.png') }}" width="140px"
                                alt="logoDistribution" /></a>
                    </div>
                </div>
                <div id="search">
                    <div id="search-content">
                        <div id="search-form">
                            <div id="ic-search">
                                <img src="{{ asset('icon/search_filled.svg') }}" height="20" width="20" alt="image">
                            </div>
                            <input id="search-input" type="text" name="qsearch"
                                placeholder="Rechercher un produit ou une catégorie..." autocomplete="false"
                                onkeypress="advanceSearch(this.value)">
                            <img id="ic_detete" src="{{ asset('icon/ic_detele.svg') }}" height="20" width="20"
                                alt="image" style="visibility: hidden">
                            <div class="sug"></div>
                        </div>
                        <div id="btn-search">Recherche</div>
                    </div>
                    <div style="display: none;" class="search-drag">
                    </div>
                </div>
                <div id="mainMenu">
                    <div class="menuItem">
                        @auth
                            <a href="{{ route('login') }}" class="btn_connect">
                                <img src="{{ asset('icon/icon_user.svg') }}" height="20" width="20" alt="">
                                <span
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">
                                    {{ Auth::user()->name }}
                                </span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn_connect">
                                <img src="{{ asset('icon/icon_user.svg') }}" height="20" width="20" alt="">
                                <span
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">
                                    Connexion
                                </span>
                            </a>
                        @endauth

                        <div class="notification-new">
                            {{-- <h5>1</h5> --}}
                        </div>
                        <script>
                            var notification = localStorage.getItem("notification");
                            if (notification != undefined && notification == "oui") {
                                document.querySelector(".notification-new").style.display = "flex";
                            }

                        </script>
                    </div>
                    <div class="menuItemM" id="paysButtonM">
                        <a>
                            <img height="16" width="22" alt="" style="padding-left: 4px; padding-right: 16px;">
                        </a>
                    </div>
                    <div class="menuItem" id="paysButton">
                        <a>
                            <img id="paysIcone">
                            <span>Pays</span>
                            <img src="{{ asset('icon/expand_arrow.svg') }}" height="14" width="20" alt="icon"
                                style="margin-left: 2px; margin-top: 2px;">
                        </a>
                        <div class="paysDrop">
                            <a href="#index.html" target="_blank" style="height: 50px;" id="togo">
                                <img src="{{ asset('image/ic_togo.jpg') }}" height="14" width="20" alt="icon"
                                    style="padding-left: 8px;">
                                <span style="padding-left: 6px;">Togo</span>
                            </a>
                        </div>
                    </div>
                    <div id="menuCart">
                        <a href="{{ route('cart.index') }}">
                            <img src="{{ asset('icon/ic_cart.svg') }}" height="21" width="21" alt="icon">
                            <span>Panier</span>
                            <h3 class="count">
                                @auth
                                    {{ Cart::session(auth()->id())->getContent()->count() }}
                                @else
                                    0
                                @endauth
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div id="wrapper_main">
            @yield('content')
        </div>

        @yield('content-second')
    </main>

    <footer>
        <div class="footer_wrapper">
            <div class="footer1">
                <div class="col1" style="display: flex; flex-direction: column;">
                    <a href="{{ url('/') }}"><img src="{{ asset('image/honea.png') }}"
                            alt="logoDistribution" /></a>
                    <span>Faites vous livrer en un click</span>
                </div>
                <div class="col2">
                    <div>
                        <div class="text1">Nouveau sur Honea?</div>
                        Abonner vous à notre newsletter pour être informer de nos offres!
                    </div>
                    <form class="">
                        <div class="div1">
                            <div style="display: none;">
                                <input id="emailInput" type="email" name="email"
                                    placeholder="Entrer votre adresse e-mail" required="">
                            </div>
                            <div class="genreWrapper">
                                <div class="genreButton"><a href="newsletter.html" target="_blank">S'inscrire à la
                                        Newsletter</a></div>
                                <div class="genreButton"><a href="contact.html" target="_blank">Contactez-nous</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="col1" id="appSection">
                    <div class="appHeader">
                        <img src="{{ asset('icon/app_icon.svg') }}">
                        <div class="down1">
                            <div class="down2">TELECHARGER Honea</div>
                            Consommation très reduite !
                        </div>
                    </div>
                    <div class="appDownload">
                        <a href="http://play.google.com/store/apps/details?id=com.bestdistribution" class="store"
                            id="storeFirst" target="_blank">
                            <img src="{{ asset('icon/play_store.svg') }}">
                        </a>
                        <a href="https://apps.apple.com/us/app/Honea/id1550813129#?platform=iphone" class="store"
                            target="_blank">
                            <img src="{{ asset('icon/btn-app_store.svg') }}">
                        </a>
                    </div>
                </div> --}}
            </div>
            <div class="footer2">
                <div class="footer2Container">
                    <a id="socialMedia1" href="https://web.facebook.com/Honeatg/" target="_blank">
                        <img src="{{ asset('icon/fb.svg') }}" width="24">
                    </a>
                    <a id="socialMedia2" href="https://www.instagram.com/Honeatg/" target="_blank">
                        <img src="{{ asset('icon/instagram.svg') }}" width="24">
                    </a>
                    <a id="socialMedia3" href="https://api.whatsapp.com/send?phone=+22890650505" target="_blank">
                        <img src="{{ asset('icon/whatsapp.svg') }}" width="24">
                    </a>
                    <a href="https://www.youtube.com/channel/UCMHdgHAGZ69Suh-fx-ovcow" target="_blank">
                        <img src="{{ asset('icon/yt.svg') }}" width="24">
                    </a>
                </div>
            </div>
            <div class="footer3">
                Honea - Tous droits reservés
            </div>
        </div>
    </footer>
    <script src="https://www.gstatic.com/firebasejs/5.8.1/firebase-app.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/firebasejs/7.0.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.1/firebase-firestore.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"
        integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js"></script>
    <script type="application/javascript" src="{{ asset('js/userCountry.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/testSlide.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/database.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('') }}js/login.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    @yield('js')
</body>

</html>
