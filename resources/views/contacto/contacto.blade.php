@include('contacto.cabecera', array('nombre'=>$nombre))

<h1>Pagina de contacto {{$nombre}} {{isset($edad) && !is_null($edad) ? $edad : 'No existe la edad'}}</h1>
<h2>{{$nombre}}</h2>
<h2>{{$edad}}</h2>

@if(is_null($edad))
	No existe la edad
@else
	Si existe la edad: {{$edad}}
@endif
 

<?php $numero = 4; ?>

<p>
La Tabla del {{$numero}}
</p>	
@for ($i = 1; $i<=3; $i++)
	<p>
		{{$i ." x " . $numero . " = " . ($i*2)}}
	</p>

@endfor

<?php $i = 1; ?>
@while ($i <= 2)
<p>
	{{"Hola Mundo " . $i}}
	<?php $i++; ?>
</p>
@endwhile

<h2>Listado de Frutas</h2>
<ul>
@foreach($frutas as $fruta)
	<li>{{$fruta}}</li>
@endforeach
</ul> 
