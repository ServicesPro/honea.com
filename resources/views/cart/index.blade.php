@extends('layouts.master')

@section('css')
    <link href="{{ asset('styles/panier.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div id="mainContainer">
    {{-- <div id="sideMenu">
        <script>
            $("#sideMenu").load("pages/side-menu.html");
        </script>
    </div> --}}
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
        </div>
    </div>

    @if (Cart::instance('default')->count() > 0)
        <div style="display: flex" class="wrapperMain">
            <div style="width: 70%" class="productWrapper">
                <h2 style="padding: 2rem">Vous avez {{ Cart::instance('default')->count() }} article(s) dans le panier</h2>
                <hr>
                @foreach (Cart::instance('default')->content() as $item)
                    <div style="display: inline-flex; width: 100%; align-items: center;" class="product">
                        <div style="margin-left: 1rem; width: 15%">
                            <a href="{{ route('products.show', $item->model->id) }}">
                                <img src="{{ asset("storage/" . $item->model->cover_img) }}" alt="" width="100%">
                            </a>
                        </div>
                        <div style="margin-left: .5rem;" class="image">
                            <div style="margin-left: 1rem; margin-top: -.8rem; margin-right: 1rem; text-align: justify" class="name">
                                <h1>{{ $item->model->name }} </h1>
                                <div style="display: inline-flex">
                                    <h3 style="font-size: 23.5px; font-weight: bold; color: orangered">{{ $item->subtotal }} F CFA</h3>
                                    <input data-id="{{ $item->rowId }}" class="quantity" style="width: 3rem;" type="number" name="" id="" value="{{ $item->qty }}">
                                </div>
                                <div style="display: block; margin-top: 1rem;">
                                    <span style="margin-top: 1rem; margin-bottom: .8rem; font-size: 18px">Détails :</span>
                                    <p style="margin-top: .5rem;">{!!$item->model->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div style="width: 5%; margin-left: .5rem;">
                            <div class="icon">
                                <form action="{{ route('cart.destroy', $item->rowId) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="{{ asset('icon/delete_trash.svg') }}" alt="" height="20" width="20">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="margin-left: 5%; width: 25%" class="productWrapper">
                <div style="margin-left: .5rem; margin-top: 1rem; margin-right: .5rem;">
                    <div style="display: inline-flex; justify-content: end; align-items: center;">
                        <div style="font-size: 23.5px; font-weight: bold;">Sous-Total: </div>
                        <div style="margin-left: 1rem; font-size: 23.5px; font-weight: bold; color: orangered"> {{ Cart::subtotal() }}</div>
                    </div>
                    <div style="margin-top: 1rem; margin-bottom: .5rem; display: inline-flex; justify-content: end; align-items: center;">
                        <div style="font-size: 23.5px; font-weight: bold;">Tax (21%) : </div>
                        <div style="margin-left: 2rem; font-size: 23.5px; font-weight: bold; color: orangered"> {{ Cart::tax() }}</div>
                    </div>
                    <div style="margin-top: .5rem; margin-bottom: 2rem; display: inline-flex; justify-content: end; align-items: center;">
                        <div style="font-size: 23.5px; font-weight: bold;">Total: </div>
                        <div style="margin-left: 5rem; font-size: 23.5px; font-weight: bold; color: orangered"> {{ Cart::total() }}</div>
                    </div>

                    <div class="wrapperCart">
                        <a href="{{ route('cart.checkout') }}" id="send">Envoyer la commande</a>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="empty">
            <img src="{{ asset('icon/box.svg') }}">
            <h1>Le panier est vide</h1>
        </div>
    @endif
</div>

@endsection

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function () {
            const className = document.querySelectorAll('.quantity')

            Array.from(className).forEach (function (element) {
                const id = element.getAttribute('data-id')
                    alert(id)
                element.addEventListener('change', function () {
                    const id = element.getAttribute('data-id')
                    alert(this.value)
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                    })
                    .then(function (response) {
                        // console.log(response)
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error)
                        window.location.href = '{{ route('cart.index') }}'
                    })
                })
            })
        })()
    </script>
@endsection
