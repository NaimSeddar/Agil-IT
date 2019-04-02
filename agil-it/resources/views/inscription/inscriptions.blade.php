@extends('layouts.master')

@section('content')


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Tableau de bord</h1>
            </div>
        </div>


        <div class="row" id="btnEntrepriseAdmin">
            @foreach($inscriptions as $inscription)
                <div class="card text-center col-12 col-md-3">
                    <div class="card-body">
                        <strong><p class="card-title text-center"> {{$inscription->nom}} {{$inscription->prenom}}</p></strong>
                        <strong><p class="card-title text-center"> {{$inscription->mailPro}}</p> </strong>
                        <strong><p class="card-title text-center"> Tél : {{$inscription->telephone}}</p> </strong>
                        <strong><p class="card-title text-center"> {{$inscription->typeContrat}}</p> </strong>
                        <strong><p class="card-title text-center"> Début Contrat : {{$inscription->dateDebutContrat}}</p> </strong>
                        <strong><p class="card-title text-center"> Fin Contrat : {{$inscription->dateFinContrat}}</p> </strong>
                        <strong><p class="card-title text-center"> {{$inscription->Bureau}}</p> </strong>

                        @auth
                        @if($inscription->valider == 0)

                            <p> En attente de validation</p>
                            <a href="{{route('validerContact',[$inscription->id])}}"><button class="btn-success mb-2">Valider</button></a><br>
                        @else

                        <a href="{{route('devaliderContact',[$inscription->id])}}"><button class="btn-danger mb-2">Supprimer</button></a><br>
                        @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>






@endsection
