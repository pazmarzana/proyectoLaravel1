<h2>Listado de Frutas (accion del controlador)</h2>

<!-- <a href="{{ action('FrutasController@getNaranjas')}}">Ir a naranjas</a>  -->
<a href="{{ route('naranjitas')}}">Ir a naranjas</a>
<a href="{{ action('FrutasController@anyPeras')}}">Ir a peras</a>

<ul>
@foreach($frutas as $fruta)
	<li>{{$fruta}}</li>
@endforeach
</ul> 

<h1>Formulario de Laravel</h1>
<form action="{{ url('/recibir') }}" method="POST">
	<!-- @csrf  -->
    <!-- {‌{ csrf_field() }} -->
<!-- 	"{‌{ url('/notas') }}"
Cambia esto:
<form action="{‌{ url('/recibir') }}" method="POST">
por esto:
<form action="/recibir" method="POST">
 -->

	<p>
	<label for "nombre">Nombre de la fruta:</label>
	<input type="text" name="nombre">
	</p>
	<p>	
	<label for "descripcion">Descripcion de la fruta:</label>
	<textarea name="descripcion"></textarea>
	</p>
	<p>	
	<input type="submit" value="Enviar">
	</p>
</form>	