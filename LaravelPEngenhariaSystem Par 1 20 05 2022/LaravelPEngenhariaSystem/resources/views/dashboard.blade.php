@extends('layouts.main')
@section('title',  'Dashboard')
@section('content')

    <br>
<div class ="col-md-10 offset-md-1">

    <h2> Meus Eventos</h2>

</div>

    <div class= "col-md-10 offset-md-1 dashboard-events-container">
    <div class="row">

        @if(count([$event])>0)
        
        @else
        <p> Você não tem eventos <a href="/events/create"> Criar Evento</p>

        {{-- It has taking data of database (Column 'items') as list form  --}}
  

        @endif

    </div>
  
 
    </div>

    <a href="/events/create" classe="nav-link"> Criar Eventos </a><br>
    <a href="/events/delete" classe="nav-link"> Deletar Eventos </a><br>
    <a href="/events/update" classe="nav-link"> Atualizar Eventos </a><br>
    <a href="/" classe="nav-link"> Voltar para Página Inicial</a><br>

    {{-- It has taking data of database (Column 'title' and description)   --}}

   



<!-- Comentario em HTML-->

{{-- Comentario do blade    --}}


@endsection