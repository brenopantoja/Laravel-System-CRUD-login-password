@extends('layouts.main')
@section('title',  'Dashboard')
@section('content')

    <br>
<div class ="col-md-10 offset-md-1">

    <h2> Meus Eventos</h2>

</div>

    <div class= "col-md-10 offset-md-1 dashboard-title-container">
    <div class="row">

        @if(count([$event])>=0)
        <table class="table">
            <thead>
                <tr>
                    <th scop="col">#</th>
                    <th scop="col">Nome</th>
                    <th scop="col">Participantes</th>
                    <th scop="col">Ações</th>

                </tr>

            </thead>
            <tbody>

        @foreach($event as  $event)
            <tr>
            <td scopt = "row"> {{$loop->index + 1}}</td>
            <td> <a href="/events/{{$event->id}}"> {{$event->title}}</a></td>
            <td>{{count($event->users)}}</td>
           
            <td><a href="/events/edit/{{$event->id}}" class="btn btn-primary"> <ion-icon name="create-outline"></icon-icon>Editar </a> </td>
                <form action ="/events/{{$event->id}}" method="POST">
                    @csrf 
                    @method('DELETE')

              <td>      <button type="submit" class="btn btn-danger delete-btn"> <icon-icon name="trash-outline"></icon-icon>Deletar</button>
            </td>
                </form>
            </tr>
            {{-- class="btn btn-primary"
                <a href="events/edit/{{$event->id}" class="btn btn-infor edit-btn"> <ion-icon name="create-outline"></icon-icon>Editar </a> 
                
                --}}
        @endforeach
        </tbody>
        </table>

        @elseif(count([$event])<=0)
        <p> Você não tem eventos <a href="/events/create"> Criar Evento</p>

        {{-- It has taking data of database (Column 'items') as list form  --}}
  

        @endif

    </div>
  
 
    </div>
        <br>

        <div class ="col-md-10 offset-md-1 dashboard-title-container">

                <h1> Eventos que estou participando: <h1>

         @if(count([$eventasparticipant]) > 0)
                <table class="table">
            <thead>
                <tr>
                    <th scop="col">#</th>
                    <th scop="col">Nome</th>
                    <th scop="col">Participantes</th>
                    <th scop="col">Ações</th>

                </tr>

            </thead>
            <tbody>
                
        @foreach($eventasparticipant as  $event)
            <tr>
          

            <td scopt = "row"> {{$loop->index + 1}}</td>
            <td> <a href="/events/{{$event->id}}"> {{$event->title}}</a></td>
            <td>{{count($event->users)}}</td>
            <td>
            <form action= "/events/leave/{{$event->id}}" method="POST">
            @csrf 

            @method("DELETE")            
            <button type="submit" class= "btn btn-danger delete-btn">  
            <ion-icon name="trash-outline"> Sair do Eventos</ion-icon>
            </button>
          
          </form>
            <td>

            </td>
            </tr>
            
        @endforeach 

        {{-- 

            {{print_r($eventasparticipant->title)}}


            @foreach([$event->items] as [$item])

            @foreach($event->items as $event-> items)

            --}}

        </tbody>
        </table>

        @else
        <p> Você ainda não está participando de nenhum evento,<a href="/"> Veja todos os Evento</a></p>
         @endif
    </div>
        <br>
        



    <a href="/events/showcopy" classe="nav-link"> Ver todas as Informações Cadastradas </a><br>
 
    <a href="/" classe="nav-link"> Voltar para Página Inicial</a><br>

    {{-- It has taking data of database (Column 'title' and description)   --}}

   



<!-- Comentario em HTML-->

{{-- Comentario do blade    --}}


@endsection