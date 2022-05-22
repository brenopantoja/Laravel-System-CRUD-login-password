@extends('layouts.main')
@section('title', 'P. Engenharia')
@section ('content')
<!DOCTYPE html>

<html>
    <title> P. Pantoja Engenharia</title>
    <body>
<div id="search-container" class="col-md-12">


    <h1> Busque um Evento:</h1>

    <form action="/" method="GET">
    <input type ="text" id="search" name="search" class="Form-control" placeholder="Procure um Evento">



</form>
<div id="events-container" class="col-md-12">
@if($search)
<h2><b> Buscando por: {{$search}}<b></h2>
<a href="/" classe="nav-link"> Clique aqui </a>para retornar a página inicial<br>

@else

<h1> Próximos Eventos</h1>
@endif

</div>
    <p class="subtitle"> Veja os eventos dos próximos dias</p>



<div id="cards-containder" class="row">
{{-- It has taking data of database (Column 'title' and description)   --}}
    @foreach($event as $event)
    <div class="card col-md-3">
    <img src="/img/events/{{$event-> image}}" alt="{{$event-> title}}"/> 
    <div class="card-body">
    <p class= "card-date">{{date('d/m/y', strtotime($event->date)) }}</p>
    <h5 class="card-title">  Matrícula:{{$event-> id}} Título do Evento: {{$event ->title}}</h5>
    <p class="card-participants">{{count($event->users)}} x Participantes</p>
    <a href="/events/{{$event->id}}" class="btn btn-primary">Clique para saber mais</a>

      <a>    A descrição do Evento: {{$event -> description}}</a><br>
</div>
    </div>
          @endforeach

     @if(  $search)

    <p>Não foi possivel encontrar nenhum evento com {{$search}}!<a href="/"> Ver todos </a></p>
    @elseif (count([$event])==0 )
    <p> Não existem eventos disponíveis</p>
    @endif 

    {{-- 
        @if(count([$event])==0 && $search)

        @if(count($event)==0)
    <p><b> Não há evento disponíveis<b></p>

    @endif
        --}}
    
    <br>
    <a href="/events/create" classe="nav-link"> Criar Eventos </a><br>
    <a href="dashboard" classe="nav-link"> Deletar Eventos </a><br>
    <a href="dashboard" classe="nav-link"> Atualizar Eventos </a><br>
    <a href="/events/showcopy" classe="nav-link"> Ver Todos os Eventos </a><br>
    <a href="/events/show" classe="nav-link"> Ver Itens do Evento </a><br>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class ="collapse navbar-collpase" id="navbar">

</div>
        </header>
<!-- Comentario em HTML-->

{{-- Comentario do blade    --}}

</body>
<footer>

</footer>

</html>
@endsection