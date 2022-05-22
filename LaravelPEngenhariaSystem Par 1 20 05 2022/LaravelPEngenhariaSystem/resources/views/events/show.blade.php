@extends('layouts.main')
@section('title',  $event->title)
@section('content')

    
    <div class ="col-md-10 offset-md-1">
<div class="row">
    <div id="image-container" class="col-md-6">

        <img src="/img/events/{{ $event-> image }} " class="img-fluid" alt="{{$event->title}}">
    </div>
    <div id="info-container" class= "col-md-6">

    <h1> {{$event->title}}</h1>
    <p class ="event-city"><ion-icon class ="location-outline"> {{$event->city}}</ion-icon></p>
   
    <p class= "event-partipants"><ion-icon name="people-outline"></ion-icon> {{count($event->users)}} X Participantes</p>
   
    <p class="event-owner"> <ion-icon name="star-outline"></icon-icon>Dono do evento: {{$eventOwer['name']}} </p>


    {{-- If has objeting of know if the user is joining of the event--}}
    @if(!$hasUserJoined)
    <form action="/events/join/{{ $event->id }}" method="POST" >
    @csrf
    <a href="/events/join/{{$event->id}}"
    class="btn btn-primary" 
    id="event-submit"
    onclick="event.preventDefault();
    this.closest('form').submit();" > {{--It has cancelling  the normal event--}} 
    Confirmar Presença
    </a>
    <form>
    
    @else
    <p class="already-joined-mgs"> Você já está participando deste evento! </p>
    @endif


    
    {{-- <form action="/events/join/{{ $event->id }}" method="POST" >
    @csrf
    <a href="/events/join/{{$event->id}}"
    class="btn btn-primary" 
    id="event-submit"
    onclick="event.preventDefault();
    this.closest('form').submit();" > {{--It has cancelling  the normal event--}} 
    <!--Confirmar Presença
    </a>
    <form>--}} -->
    
    <h3> O evento conta com: </h3>
    
    <ul id="items-list">     {{--It has taking data of database (Column 'items') as list form --}}
  

    
    @foreach($event->items as $event-> items)
    <li><ion-icon name="play-outline"></ion-icon> <spam>  {{$event->items }}</spam></li>

    <br>
    @endforeach
    {{--
 
//It is work

{{print_r($event->items )}}
@for($i=0; $i<=(int)$event->items; $i++)
    <li><ion-icon name="play-outline"></ion-icon> <spam>{{$i}}</spam></li>

 
     

   

    @foreach([$event->items] as [$item])
    <li><ion-icon name="play-outline"></ion-icon> <spam>{{$item}}</spam></li>
    @endforeach
    <br>

        foreach($event as $events)

<a>Matricula:{{$events-> id}}  Título:{{$events ->title}}   Cidade: {{$events -> city}}  Evento é privado: {{$events -> private}}  Descrição do Evento:{{$events -> description}} A Hora do Evento: {{$events->updated_at	}} A imagem do Evento é: <img src="/img/events/{{$events   -> image}}"/></a><br>


<br> 
    
    @endforeach
    
      --}}

    </ul>
    </div>
  
  <div id="info-container" class="col-md-6"></div>
  <b>  Descrição do Projeto: {{$event->description}}
</div></b> 
</div>

    <a href="/events/create" classe="nav-link"> Criar Eventos </a><br>
    <a href="/dashboard" classe="nav-link"> Deletar Eventos </a><br>
    <a href="/dashboard" classe="nav-link"> Atualizar Eventos </a><br>
    <a href="/" classe="nav-link"> Voltar para Página Inicial</a><br>

    {{-- It has taking data of database (Column 'title' and description)   --}}

   

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class ="collapse navbar-collpase" id="navbar">

</div>
        </header>

<!-- Comentario em HTML-->

{{-- Comentario do blade    --}}


@endsection