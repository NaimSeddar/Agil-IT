@extends('layouts.master')

@section('content')

    <link href="{{ asset('css/accueil.css') }}" rel="stylesheet">
    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center title">
                    <h1 class="font-weight-light">Bienvenue sur notre plateau de Coopwork !</h1>
                    <p class="lead">Un espace de travail partagé, ouvert à tous pour développer des projets et emplois.</p>
                    <a role="button" class="btn btn-lg" href="{{ route('formulaire') }}">Je m'inscris !</a>
                    <a role="button" class="btn btn-lg chevron_down" href="#EnSavoirPlus">En savoir plus</a>
                </div>

            </div>
        </div>
    </header>

    <!-- Page Content -->
    <section class="py-5" id="EnSavoirPlus">
        <div class="container">
            <h2>En savoir plus sur le CoopWorking.</h2> <br>
            <h4><u>Présentation :</u> </h4> <br>
            <p class="rawText">
                Depuis quelques années, les pouvoirs publics souhaitent encourager et développer l’esprit d’entreprise auprès des jeunes. Cet esprit d’entreprise se développe, notamment à la faveur du développement des nouvelles technologies. Mais pour leur vie au travail, les jeunes sont aussi en recherche d’autonomie, d’équilibre entre vie professionnelle et personnelle, de reconnaissance, de projets qui fassent sens dans un monde en mutation. D’où leur attirance croissante pour l’entrepreneuriat coopératif fondé sur la mise en commun des énergies pour vivre un projet partagé.
            </p>
            <p class="rawText">
                Le coopworking permet à des petites entreprises (TPE/PME) de se regrouper pour pouvoir bénéficier d'un environnement bénéfique à leur développement : haut débit, bar à sieste, véhicules décarbonés et une animation permanente orientée sur le développement durable et la RSE (responsabilité sociétale). Installée dans un quartier prioritaire dans l'agglomération nantaise, au Sillon de Bretagne, à Saint-Herblain, elle intégrera aussi des projets de proximité du quartier pour mieux les faire émerger.
            </p>
            <img src="/public/images/teamworking.jpg">
        </div>
    </section>

@endsection
