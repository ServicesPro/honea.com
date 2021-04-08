
<!DOCTYPE html>
<html>


<!-- Mirrored from www.achetia.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 17:39:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Achetia - Faites vous livrer en un click</title>
	<meta property="og:type" content="product">
	<meta property="og:site_name" content="Achetia">
	<meta property="og:title" content="Achetia - Faites vous livrer en un click">
	<meta property="og:url" content="www.achetia.com">
	<meta property="og:description"
		content="Achetia est la première destination d’achat en ligne. Nous sommes fiers d’avoir tout ce dont vous pourriez avoir besoin pour vivre au meilleur prix que partout ailleurs.">
	<meta name="description"
		content="Achetia est la première destination d’achat en ligne. Nous sommes fiers d’avoir tout ce dont vous pourriez avoir besoin pour vivre au meilleur prix que partout ailleurs.">
	<meta property="og:image"
		content="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/best_market_logo.jpg?alt=media&amp;token=c0148202-04b2-439b-b113-7c9331399ec7">
	<meta name="title" content="Achetia - Faites vous livrer en un click">
	<link rel="icon" type="icon/png" href="favicon.png">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&amp;display=swap" rel="stylesheet">
	<link href="styles/reset.css" rel="stylesheet" type="text/css">
	<link href="styles/common.css" rel="stylesheet" type="text/css">
	{{-- <link href="styles/popup.css" rel="stylesheet" type="text/css">
	<link href="styles/main.css" rel="stylesheet" type="text/css">
	<link href="styles/policy.css" rel="stylesheet" type="text/css"> --}}
	<link href="styles/login.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="popupLoadingClose">
		<div class="modalContent">
			<div class="loading">
			</div>
			<h1>Chargement en cours...</h1>
		</div>
	</div>
	<header class="header">
		<div class="h-wrap">
			<div class="h_content">
				<div id="drawer-icon">
					<div>
						<img src="image/toggle.png" width="24px" alt="logoDistribution" />
					</div>
				</div>
				<div id="logo">
					<div>
						<a href="{{ url('/') }}"><img src="image/honea.png" width="140px" alt="logoDistribution" /></a>
					</div>
				</div>
				<div id="search">
					<div id="search-content">
						<div id="search-form">
							<div id="ic-search">
								<img src="icon/search_filled.svg" height="20" width="20" alt="image">
							</div>
							<input id="search-input" type="text" name="qsearch"
								placeholder="Rechercher un produit ou une catégorie..." autocomplete="false"
								onkeypress="advanceSearch(this.value)">
							<img id="ic_detete" src="icon/ic_detele.svg" height="20" width="20" alt="image"
								style="visibility: hidden">
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
                                <img src="icon/icon_user.svg" height="20" width="20" alt="">
                                <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">
                                    {{ Auth::user()->name }}
                                </span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn_connect">
                                <img src="icon/icon_user.svg" height="20" width="20" alt="">
                                <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">
                                    Connexion
                                </span>
                            </a>
                        @endauth

						<div class="notification-new">
							<h5>1</h5>
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
							<img src="icon/expand_arrow.svg" height="14" width="20" alt="icon"
								style="margin-left: 2px; margin-top: 2px;">
						</a>
						<div class="paysDrop">
							<a href="#index.html" target="_blank" style="height: 50px;" id="togo">
								<img src="image/ic_togo.jpg" height="14" width="20" alt="icon"
									style="padding-left: 8px;">
								<span style="padding-left: 6px;">Togo</span>
							</a>
							{{-- <a href="https://www.ci.achetia.com/" target="_blank" style="height: 50px;"
								id="coteDivoire">
								<img src="image/ic_cote.png" height="14" width="20" alt="icon"
									style="padding-left: 8px;">
								<span style="padding-left: 6px;">Cote d'ivoire</span>
							</a>
							<a href="https://www.bj.achetia.com/" target="_blank" style="height: 50px;" id="benin">
								<img src="image/ic_benin.jpg" height="14" width="20" alt="icon"
									style="padding-left: 8px;">
								<span style="padding-left: 6px;">Benin</span>
							</a> --}}
						</div>
					</div>
					<div id="menuCart">
						<a href="#panier.html">
							<img src="icon/ic_cart.svg" height="21" width="21" alt="icon">
							<span>Panier</span>
							<h3 class="count">0</h3>
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
	</main>
	<footer>
		<div class="footer_wrapper">
			<div class="footer1">
				<div class="col1" style="display: flex; flex-direction: column;">
					<a href="{{ url('/') }}"><img src="image/honea.png" alt="logoDistribution" /></a>
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
				<div class="col1" id="appSection">
					<div class="appHeader">
						<img src="icon/app_icon.svg">
						<div class="down1">
							<div class="down2">TELECHARGER Honea</div>
							Consommation très reduite !
						</div>
					</div>
					<div class="appDownload">
						<a href="http://play.google.com/store/apps/details?id=com.bestdistribution" class="store"
							id="storeFirst" target="_blank">
							<img src="icon/play_store.svg">
						</a>
						<a href="https://apps.apple.com/us/app/achetia/id1550813129#?platform=iphone" class="store"
							target="_blank">
							<img src="icon/btn-app_store.svg">
						</a>
					</div>
				</div>
			</div>
			<div class="footer2">
				<div class="footer2Container">
					<a id="socialMedia1" href="https://web.facebook.com/achetiatg/" target="_blank">
						<img src="icon/fb.svg" width="24">
					</a>
					<a id="socialMedia2" href="https://www.instagram.com/achetiatg/" target="_blank">
						<img src="icon/instagram.svg" width="24">
					</a>
					<a id="socialMedia3" href="https://api.whatsapp.com/send?phone=+22890650505" target="_blank">
						<img src="icon/whatsapp.svg" width="24">
					</a>
					<a href="https://www.youtube.com/channel/UCMHdgHAGZ69Suh-fx-ovcow" target="_blank">
						<img src="icon/yt.svg" width="24">
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
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js"></script>
	{{-- <script type="application/javascript" src="js/userCountry.js"></script> --}}
	<script type="text/javascript" src="js/common.js"></script>
	{{-- <script type="text/javascript" src="js/testSlide.js"></script>
	<script type="text/javascript" src="js/database.js"></script> --}}
    <script src="/js/seachebar.js"></script>
</body>
</html>
