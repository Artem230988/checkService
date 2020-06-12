@extends('layouts.layout')

@section('content')

<div class="col-md-8 blog-main">
	
	<h3 class="pb-3 mb-4 font-italic border-bottom">
		Создание чек-листа
	</h3>

	<form method="post" action="{{route('checks.store')}}">
		@csrf
		<div class="form-group">
			<label for="inputTitle">Название чек-листа</label>
			<input type="text" name="title" placeholder="Введите название чек-листа" id="inputTitle" class="form-control">
		</div>
		<div class="form-group">
			<label for="inputBody">Описание чек-листа</label>
			<input type="text" name="description" placeholder="Введите описание чек-листа" id="inputBody" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Создать чек-лист</button>
	</form>
</div>

@endsection