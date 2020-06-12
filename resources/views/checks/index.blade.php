@extends('layouts.layout')

@section('content')

    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        Список чек-листов пользователя
      </h3>
      @foreach($checks as $check)
      	<div class="card">
        	<div class="card-header">

        		  <a href="{{route('checks.show', $check->id)}}"><h5>{{$check->title}}</h5></a>

        	</div>
        	<div class="card-body">
        		<p>{{ $check->description }}</p>

            <p>Создан: {{ $check->created_at->toFormattedDateString() }}</p> 
        	</div>
    	</div><br>
      @endforeach

    </div>

@endsection

