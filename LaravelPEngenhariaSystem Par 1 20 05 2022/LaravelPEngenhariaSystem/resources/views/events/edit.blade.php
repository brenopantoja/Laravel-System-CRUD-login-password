@extends('layouts.main')
@section('title',  'Editando: '.$event->title)
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">

<h1> Editando: {{$event->title}}</h1>

<h1> Crie o seu evento </h1>
<br>
@if(session ('msg'))
<p class ="msg">{{session('msg')}}</p>
@endif

<form action ="/events/update/{{$event->id}}" method ="POST" enctype ="multipart/form-data">  
@csrf {{--  diretive of the Laravel   --}}
@method('PUT')

<div class= "form - group">
<br>
<label for = "image"> Imagem do Evento: </label>
{{--   It is be able to creat file in html enctype ="multipart/form-data"   --}}

<input type = "file" name ="image" id= "image" class = "form-control -file" ></input>

</div>

<img src= "/img/events/{{$event->image}}"  alt="{{$event->title}}" class=" img-preview">

<div class= "form - group"> </div>

<label for = "title"> Eventos: </label>
<input type = "text" class = "form-control" name ="title" id="title" placeholder ="Nome do Evento" value="{{$event->title}}">
</div>
<br>

<div class= "form - group"> </div>

<label for = "date"> Data do Evento </label>
<input  class = "form-control" name ="date" id="date"  value="{{   date('Y-m-d', strtotime($event->date)) }}" >
</div>
<br>
{{-- 
    
    {{ date('Y-m-d', strtotime($event->date)) }}
    
    'date_format:d/m/Y'--}}

<div class= "form - group"> </div>

<label for = "title"> Descrição: </label>
<input type ="text" name= "description" id="description" class="form-control" value="{{$event->description}}"></input>

</div> 

<div class= "form - group"> 
    <label for = "title"> Adicione itens de infraestrutura: </label>
<div class="form-group">
    <input type="checkbox" name="items[]" id="items[]" value="Cadeiras"> Cadeiras
</div>


<br>

<div class= "form - group"> 
    <input type="checkbox" name="items[]"  id="items[]" value="Palco"> Palco
</div>


<br>

<div class="form-group">
    <input type="checkbox" name="items[]"  id="items[]" value="Cerveja Gratis"> Cervejas Grátis
</div>


<br>

<div class= "form-group"> 

    <input type="checkbox" name="items[]"  id="items[]" value="Open Bar" > Open Bar
</div>


<br>


<div class= "form-group"> 
    <input type="checkbox" name="items[]"  id="items[]" value="Brides"> Brindes
</div>

</div>
<br>



<div class= "form - group"> </div>
<label for = "title"> Cidade: </label>
<input type = "text" class = "form-control" name ="city" id="city" placeholder ="Nome da cidade" value="{{$event->city}}">
</div>
<br>

<div class= "form - group"> </div>

<label for = "title"> Evento é privado: </label>
<select name="private" id="private" class="form-control" value="{{$event->private}}">
<option value="0"> Não</option>
<option value="1"{{$event->private == 1? "selected='select'" : ""}}> Sim  </option>

</div>
<br>
<br>

<br>
<input type="submit" class="btn btn-primary" value = " Editar Evento">

</form>
<br>

@yield ('content')
<a href="/"> Voltar para Home</a>
</div>
@endsection