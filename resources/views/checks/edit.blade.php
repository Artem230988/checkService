@extends('layouts.layout')

@section('content')

<div class="col-md-8 blog-main">
	
	<h3 class="pb-3 mb-4 font-italic border-bottom">
		Редактирование чек-листа
	</h3>

	<form method="post" action="{{ route('checks.update', $check->id) }}">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="inputTitle">Название чек-листа</label>
			<input type="text" name="title" value="{{ old('title') ?? $check->title }}" id="inputTitle" class="form-control">
		</div>
		<div class="form-group">
			<label for="inputBody">Описание чек-листа</label>
			<input type="text" name="description" value="{{ old('title') ?? $check->description }}" id="inputBody" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Редактировать чек-лист</button>
	</form>
</div>

@endsection