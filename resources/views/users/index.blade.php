@extends('layouts.layout')

@section('content')

    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        Список всех пользователей
      </h3>
      @foreach($users as $user)
      	<div class="card">
        	<div class="card-body">
        		<p class="myp_name">Имя: {{ $user->name }} </p>
            <a href="{{route('user.show', $user->id)}}" class="btn btn-primary mybtn_name">Редактировать</a><br>
            	<p>Email: {{ $user->email }}</p>
            	<p class="myP_max">Максимальное количество чек-листов: {{ $user->max_checks }}</p><br>
              <p class="myP_checks">Пользователь заблокирован: {{$user->banned ? 'Да' : 'Нет' }}</p>
              <a href="{{route('showCheck.index', $user->id)}}" class="btn btn-danger mybtn_checks">Чек-листы пользователя</a><br>
 
        	</div>
    	</div>

      @endforeach

    </div>
 {{ $users->links() }}
@endsection
