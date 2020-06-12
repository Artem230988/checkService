@extends('layouts.layout')

@section('content')

<div class="col-md-8 blog-main">
	
	<h3 class="pb-3 mb-4 font-italic border-bottom">
		Редактирование шага чек-листа
	</h3>

	<form method="post" action="{{ route('step.update',  ['check' => $step->check_id, 'step' => $step->id]) }}">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="inputTitle">Шаг чек-листа</label>
			<input type="text" name="body" value="{{ old('step') ?? $step->body }}" id="inputTitle" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Редактировать шаг чек-листа</button>
	</form>
</div>

@endsection