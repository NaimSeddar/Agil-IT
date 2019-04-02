@extends('layouts.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger"  style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Inscrire mon entreprise</h1>
                </div>
                <div class="card-body">
                    <form method='POST' action="{{route('enregistrerEntreprise')}}">
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">
                                Nom de votre Entreprise :
                            </label>
                            <input type="text" id="nom" name="nom" value="{{old("nom")}}" class="form-control col-md-6" placeholder="Nom de l'entreprise" required>
                        </div>

                        <div class="form-group row">
                            <label for="siret" class="col-md-4 col-form-label text-md-right">
                                Votre numéro de SIRET :
                            </label>
                            <input type="text" id="siret" name="siret" value="{{old("siret")}}" class="form-control col-md-6" placeholder="Numero de SIRET">
                        </div>

                        <div class="form-group row">
                            <label for="nomPDG" class="col-md-4 col-form-label text-md-right">
                                Le nom de votre PDG :
                            </label>
                            <input type="text" id="nomPDG" name="nomPDG" value="{{old("nomPDG")}}" class="form-control col-md-6" placeholder="Nom du PDG">
                        </div>

                        <div class="form-group row">
                            <label for="siteP" class="col-md-4 col-form-label text-md-right">
                                Le lien de votre site :
                            </label>
                            <input type="text" id="siteP" name="siteP" value="{{old("siteP")}}" class="form-control col-md-6" placeholder="Votre lien">
                        </div>

                        <div class="form-group row">
                            <label for="batimentP" class="col-md-4 col-form-label text-md-right">
                                Le nom de votre pbatiment principal :
                            </label>
                            <input type="text" id="batimentP" name="batimentP" value="{{old("batimentP")}}" class="form-control col-md-6" placeholder="nom du batiment principal">
                        </div>

                        <div class="form-group row border border-success">
                            <div id="adresses">
                                <input type="hidden" name="nbAdresse" id="compteur">
                                <label class="mb-3 mt-3 ml-5">La localisation de votre entreprise</label>

                                <div id="block_adresse_0" class="form-group ml-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" id="adresse_0_rue" name="adresse_0_rue" placeholder="Rue">
                                            <input type="text" id="adresse_0_ville" name="adresse_0_ville" placeholder="Ville">
                                            <input type="text" id="adresse_0_codePostal" name="adresse_0_codePostal" placeholder="Code Postal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 offset-md-4">
                            <button class="btn btn-success" type="submit">Ajouter mon entreprise</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection


