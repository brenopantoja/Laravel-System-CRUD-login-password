<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <body class="antialiased">
    <h1> Hello World</h1>
    @if(10>15)
    <p> A condição é true</p>
    @endif
<p>{{$nome}}</p>

@if($nome =="Breno")
<p>O nome é Breno</p>
<p>{{$nome}} e ele tem {{$idade}} anos, ele é {{$profissao}}</p>
@elseif($nome == "Breno")

<p> O nome não é Jane</p>
@endif

@for ($i=0; $i < count($vetor);$i++)
<p> {{$vetor[$i]}} - {{$i}}</p> 
@if($i== 2)
<p> o i é igual a 2</p>
@endif
@endfor

@foreach($nomes as $x)
<p> {{$loop -> index}}</p>
<p> {{$x}}</p>

@endforeach

@php
$name = "Pantoja";
echo $name;
@endphp

<!-- Comentario em HTML-->

{{-- Comentario do blade --}}
    </body>
</html>
