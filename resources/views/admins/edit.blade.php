@extends('layouts.layout')

@section('content')

<div class="col-md-8 blog-main">
  
  <h3 class="pb-3 mb-4 font-italic border-bottom">
    Редактирование максимального количества чек-листов
  </h3>

  <form method="post" action="{{ route('admin.update', $user->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="max_checks">Макс. количество чек-листов</label>
      <input type="text" name="max_checks" value="{{ old('max_checks') ?? $user->max_checks }}" id="max_checks" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Изменить</button>
  </form>
</div>

@endsection