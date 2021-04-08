<div>
    <div id="mainContainer">
        <div id="sideMenu">
            <script>
                $("#sideMenu").load("pages/side-menu.html");
            </script>
        </div>
        <div class="navText">
            <a href="{{ url('/') }}" class="navHome">Accueil</a>
            <a>></a>
            <a href="{{ route('products.index') }}" class="navProduit">Produit</a>
            <a>></a>
            <a class="navSelect">Panier</a>
        </div>
        <div class="cartFooter">
            <div class="wrapperCart">
                <a href="{{ route('products.index') }}" id="buyMore">Continuer vos achats</a>
                <a id="send">Envoyer la commande</a>
            </div>
        </div>
        <div class="wrapperMain">
            <div class="productWrapper">
                @foreach ($cartItems as $item)
                    <div class="product">
                        <div class="image">
                            @php
                                $img = $item['associatedModel']['cover_img'];
                            @endphp
                            <img src="{{ asset("storage/$img") }}" alt="" height="60" width="60">
                            <div class="name">
                                <h1>{{ $item['associatedModel']['name'] }}</h1>
                                <h2>Détails: {!! $item['associatedModel']['description'] !!}</h2>
                                <div class="quantity">
                                    <img src="{{ asset('icon/minus.svg') }}" alt="" height="20" width="20">
                                    <span>1</span>
                                    <img src="{{ asset('icon/add.svg') }}" alt="" height="20" width="20">
                                </div>
                                <div class="myPrix">
                                    <h3>{{ $item['associatedModel']['price'] }} F CFA</h3>
                                </div>
                            </div>
                        </div>
                        <div class="icon">
                            <img src="{{ asset('icon/delete_trash.svg') }}" alt="" height="20" width="20">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="empty">
            <img src="{{ asset('icon/box.svg') }}">
            <h1>Le panier est vide</h1>
        </div>
    </div>
</div>
