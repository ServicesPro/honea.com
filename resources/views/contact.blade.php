@extends('layouts.master')

@section('css')
    <link href="styles/distributeur.css" rel="stylesheet" type="text/css">
	<link href="styles/marketplace-mail.css" rel="stylesheet" type="text/css">
    <link href="styles/contact.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="navWrapper">
    <div class="navImage">
        <div><img src="image/contact2.jpg"></div>
    </div>
    <div id="desc">
        <div id="desContainer">
            <h1>Comment pouvons-nous vous aider ?</h1>
            <div class="avantage-container">
                <div class="avantage-item" id="item1">
                    <span>Ecrivez-nous</span>
                </div>
                <div class="avantage-item" id="item2">
                    <span>Appelez-nous</span>
                </div>
            </div>
            <h1>Besoin d'aide pour passer une commande</h1>
            <div class="fonct">
                <span style="text-align: center; line-height: 1.4;">
                    Si vous rencontrez des difficultés à passer votre commande merci de nous appeler sur le
                    numéro suivant:
                </span>
                <h2 style="font-size: 1.2rem;">+22890650505</h2>
            </div>
            <h1 style="margin-top: 20px;">Ou contactez nous directement</h1>
            <div style="display: flex; justify-content: center;">
                <form action="https://formspree.io/f/meqpwgbw" id="my-form" method="POST"
                    class="formContact">
                    <label>
                        Votre nom
                        <input type="text" name="Nom">
                    </label>
                    <label>
                        Votre email:
                        <input type="email" name="Email">
                    </label>
                    <label>
                        Votre message:
                        <textarea name="Message"></textarea>
                    </label>

                    <!-- your other form fields go here -->

                    <div style="display: flex; justify-content: center;"><button id="my-form-button"
                            type="submit">Envoyer</button></div>
                    <p id="my-form-status"></p>
                </form>
            </div>

            <script>

                window.addEventListener("DOMContentLoaded", function () {

                    // get the form elements defined in your form HTML above

                    var form = document.getElementById("my-form");
                    var button = document.getElementById("my-form-button");
                    var status = document.getElementById("my-form-status");

                    // Success and Error functions for after the form is submitted

                    function success() {
                        form.reset();
                        button.style = "display: none ";
                        status.textContent = "Votre méssage a été envoyé";
                    }

                    function error() {
                        status.textContent = "Une erreur s'est produite, merci de réesayer";
                    }

                    // handle the form submission event

                    form.addEventListener("submit", function (ev) {
                        ev.preventDefault();
                        var data = new FormData(form);
                        ajax(form.method, form.action, data, success, error);
                    });
                });

                // helper function for sending an AJAX request

                function ajax(method, url, data, success, error) {
                    var xhr = new XMLHttpRequest();
                    xhr.open(method, url);
                    xhr.setRequestHeader("Accept", "application/json");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState !== XMLHttpRequest.DONE) return;
                        if (xhr.status === 200) {
                            success(xhr.response, xhr.responseType);
                        } else {
                            error(xhr.status, xhr.response, xhr.responseType);
                        }
                    };
                    xhr.send(data);
                }
            </script>
        </div>
    </div>
    <div id="topCategorie">
        <div id="categorieContainer">
            <h2 class="collectionH2">Nos collections</h2>
            <section>
                <div id="categorieWrapper">
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat1.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat1">Corps de rêve</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat2.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat2">Made in Togo</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat3.3.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat3">Bling Bling</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat4.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat4">Allons jouer</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat5.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat5">Décoration</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat11.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat11">Cinéma</p>
                    </a>
                </div>
                <div id="categorieWrapper2">
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat7.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat7">Robes et combinaisons</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat8.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat8">Courses du quotidien</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat9.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat9">L'art du rangement</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat10.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat10">Cuisine 5 étoiles</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat6.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat6">Sapé comme jamais</p>
                    </a>
                    <a class="categorieItem">
                        <img class="lazy" src="image/placeholder_cat.jpg"
                            data-src="https://firebasestorage.googleapis.com/v0/b/bestdistribution-169c9.appspot.com/o/WebAssets%2Fcat12.jpg?alt=media&token=b0e31113-bd01-4af3-b576-73fdcf4102f2">
                        <p class="sCat12">Gadget électronique</p>
                    </a>
                </div>
            </section>
        </div>
    </div>
    <script>
        //les categorie du categorie special
        for (i = 1; i <= 12; i++) {
                    const categorieItem = document.querySelector(".sCat" + i);
                    categorieItem.parentNode.addEventListener("click", function () {
                        let categorie = categorieItem.textContent;
                        var myCustomLink = "categorie79ee.html?categorie=" + categorie;
                        window.location.href = myCustomLink;
                    })
                };
    </script>
</div>

@endsection
