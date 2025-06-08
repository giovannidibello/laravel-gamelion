@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">        
        <h1 class="display-6 fw-bold">
            Benvenuto nel sito di amministrazione di <strong>Gamelion</strong><i class="bi bi-box"></i>
        </h1>

        <p class="col-md-8 fs-4">
            Questa è la pagina pubblica di benvenuto del sito di amministrazione di Gamelion.
            Qui puoi accedere a informazioni generali sull’ambiente di gestione, ma non si tratta della vera e propria area riservata agli amministratori.
            Per visualizzare e modificare i contenuti del sito, è necessario effettuare il login e accedere alla dashboard dedicata, dove potrai gestire giochi, generi, piattaforme e tutte le funzionalità avanzate del sistema.
        </p>        
    </div>
</div>

@endsection