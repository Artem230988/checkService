
@extends('layouts.layout')

@section('content')

<div class="col-md-8 blog-main">
  <div class="card">
    <h5>Информация о пользователе</h5>
          <div class="card-body">
            <p>Имя: {{ $user->name }} </p>
              <p>Email: {{ $user->email }}</p>
              <p>Роль: Пользователь</p>
              <p class="myP_max">Максимальное количество чек-листов: {{ $user->max_checks }}</p>
              
              <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary myBtn_max">Изменить</a><br>
                <p class="myP_banned">Пользователь заблокирован: {{$user->banned ? 'Да' : 'Нет' }}</p>

                @if($user->banned == 1)
                  <form method="post" action="{{ route('user.update', $user->id) }}" class="myForm_banned">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary myBtn_banned">Разблокировать</button>
          </form><br>
        @else
                  <form method="post" action="{{ route('user.update', $user->id) }}" class="myForm_banned">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary myBtn_banned">Заблокировать</button>
          </form><br>
          @endif

       
          </div>
      </div>
</div>
@endsection
