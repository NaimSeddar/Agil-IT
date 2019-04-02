@extends('layouts.master')

@section('content')


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Les entreprises</h1>
            </div>
        </div>


        <div class="row" id="btnEntrepriseAdmin">
            @foreach($entreprises as $entreprise)
                <div class="card text-center col-12 col-md-3">
                    <div class="card-body">
                        <strong><p class="card-title text-center"> {{$entreprise->nom}}</p></strong>
                        <strong><p class="card-title text-center"> {{$entreprise->siret}}</p> </strong>
                        <strong><p class="card-title text-center"> {{$entreprise->siteP}}</p> </strong>
                        <strong><p class="card-title text-center"> {{$entreprise->batimentP}}</p> </strong>


                        @if($entreprise->valider == 0)
                            <p> En attente de validation</p>
                            @auth
                                <a href="{{route('validerEntreprise',[$entreprise->id])}}"><button class="btn-success mb-2">Valider</button></a><br>
                            @endauth
                        @else
                            @auth
                                <a href="{{route('devaliderEntreprise',[$entreprise->id])}}"><button class="btn-danger mb-2">Supprimer</button></a><br>
                            @endauth
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>






@endsection
