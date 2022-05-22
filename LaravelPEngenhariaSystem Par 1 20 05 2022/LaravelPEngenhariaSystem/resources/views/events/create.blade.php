@extends('layouts.main')
@section('title',  'Criar Evento')
@section ('content')
<hmtl>
<div id="event-create-container" class="col-md-6 offset-md-3"> 

<h1> Esta é página criar evento </h1>

<h1> Crie o seu evento </h1>
<body>
<header>
<br>
@if(session ('msg'))
<p class ="msg">{{session('msg')}}</p>
@endif

<form action ="/event" method ="POST" enctype ="multipart/form-data">  
@csrf {{--  diretive of the Laravel   --}}

<div class="form-group"> 

<label for = "image"> Imagem do Evento: </label>
{{--   It is be able to creat file in html enctype ="multipart/form-data"   --}}
<input type = "file" name ="image" id= "image" class = "form-control -file" >
</div>

    
<div class="form-group"> 

<label for = "title"> Eventos: </label>
<input type = "text" class = "form-control" name ="title" id="title" placeholder ="Nome do Evento">
</div>

<br>

<div class="form-group"> 

<label for = "date"> Data do Evento </label>
<input type = "date" class = "form-control" name ="date" id="date" >
</div>

<br>


<div class="form-group"> 

<label for = "title"> Descrição: </label>
<textarea name= "description" id="description" class="form-control" placeholder="Qual a descrição do Evento"></textarea>

</div> 

<div class="form-group">  
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



<div class="form-group"> 
<label for = "title"> Cidade: </label>
<input type = "text" class = "form-control" name ="city" id="city" placeholder ="Nome da cidade">
</div>
<br>

<div class="form-group"> 

<label for = "title"> Evento é privado: </label>
<select name="private" id="private" class="form-control">
<option value="0"> Não</option>
<option value="1">Sim </option>

</div>

<br>
<br>

<br>

<input type="submit" class="btn btn-primary" value = "Criar Evento">

</form>
<br>
<header>

</body>

</html>
@yield ('content')
<a href="/"> Voltar para Home</a>
<footer>

</footer>
@endsection