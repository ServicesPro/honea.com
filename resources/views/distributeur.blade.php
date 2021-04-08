@extends('layouts.master')

@section('content')
    <div class="navWrapper">
        <div class="navImage">
            <img src="/image/distributeur.jpg">
        </div>
        <div id="desc">
            <div id="desContainer">
                <h1>Travailez et gagnez de l'argent depuis votre domicile</h1>
                <p>
                    Grâce à notre application BEST DISTRIBUTEURS, vendez facilement sur internet
                    depuis votre domicile sans avoir à vous déplacer, sans aucun stock à gérer et
                    gagnez de l'argent.
                </p>
                <h2>Comment ça marche ?</h2>
                <p>
                    Partagez les images des produits disponibles dans l'application sur vos différents comptes sur les réseaux
                    sociaux. Dès que vous trouvez un client, passez la commande et la société se chargera de la livraison.
                    Dès que le client est livré,
                    vous recevrez votre commission par mobile money au plus tard dans les 24h qui suivent la livraison.

                </p>
                <h2>Fonctionnalités</h2>
                <div class="fonct">
                    <img src="../icon/star.svg" width="20">
                    <span>
                        Vous recevrez des notifications directes lorsque nous ajoutons de nouveaux produits
                    </span>
                </div>
                <div class="fonct">
                    <img src="../icon/star.svg" width="20">
                    <span>
                        Vous pouvez voir l'état de vos commandes et toutes les étapes de livraison
                    </span>
                </div>
                <div class="fonct">
                    <img src="../icon/star.svg" width="20">
                    <span>
                        Visualisez tous les produits en stock en un click
                    </span>
                </div>
                <div class="fonct">
                    <img src="../icon/star.svg" width="20">
                    <span>
                        Suivez vos ventes et vos commissions via mobile money
                    </span>
                </div>
                <div class="downloadSec" style="margin-top: 30px;">
                    <div class="downWrapper">
                        <a href="https://play.google.com/store/apps/details?id=com.bestdistributeur"><img src="../image/playstore.png" width="200"></a>
                        <img src="../image/apple.png" width="200">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
