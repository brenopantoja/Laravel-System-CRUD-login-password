@extends('layouts.main')
@section('title', 'P. Engenharia')
@section ('content')
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<header>
    <br>
    <div class ="col-md-10 offset-md-1">
<div class="row">
    <div id="image-container" class="col-md-6">

    </div>
    <div id="info-container" class= "col-md-6">

  
</div>
    <div id="info-container" class="col-md-6"></div>

</div>
</div>

    <a href="/events/create" classe="nav-link"> Criar Eventos </a><br>
    <a href="/events/delete" classe="nav-link"> Deletar Eventos </a><br>
    <a href="/events/update" classe="nav-link"> Atualizar Eventos </a><br>
    <a href="/" classe="nav-link"> Ir para/Página Inicial </a><br>

    {{-- It has taking data of database (all the Column  --}}


    
@foreach($event as $events)

<a>Matricula:{{$events-> id}}  Título:{{$events ->title}}   Cidade: {{$events -> city}}  Evento é privado: {{$events -> private}}  Descrição do Evento:{{$events -> description}} A Hora do Evento: {{$events->date	}} A imagem do Evento é: <img src="/img/events/{{$events   -> image}}"/></a><br>


<br> 
    
    @endforeach

   

       
        </header>

<!-- Comentario em HTML-->

{{-- Comentario do blade    --}}

</body>
<footer>

</footer>
 
@endsection