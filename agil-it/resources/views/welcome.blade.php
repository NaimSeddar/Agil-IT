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
                    <button type="button" class="btn btn-lg">Je m'inscris !</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
        <div class="container">
            <h2 class="font-weight-light">Notre espace de CoopWorking</h2>
        </div>
    </section>

@endsection
