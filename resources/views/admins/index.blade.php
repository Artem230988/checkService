
@extends('layouts.layout')

@section('content')

    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        Список всех администраторов
      </h3>
      @foreach($users as $user)

      	<div class="card">
        	<div class="card-body">
        		<p class="myp_name">Имя: {{ $user->name }} </p>
            <a href="{{route('admin.show', $user->id)}}" class="btn btn-primary mybtn_name">Редактировать</a><br>
            	<p>Email: {{ $user->email }}</p>
            	<p>Роль: Администратор</p>
            	<p class="myP_max">Максимальное количество чек-листов: {{ $user->max_checks }}</p><br>
              <p class="myP_banned">Пользователь заблокирован: {{$user->banned ? 'Да' : 'Нет' }}</p><br>

          <?php
            $check1 = 0;
            $check2 = 0;
            $check3 = 0;
          ?>

          @if($user->permissions->isNotEmpty())                
                @foreach($user->permissions as $permission)
                  @if($permission->permission_name == 'Блокировать пользователей')
                    <?php $check1 = 1;
                      $permission_id1 = $permission->id; ?>
                  @elseif($permission->permission_name == 'Изменять макс. количество чек-листов')
                    <?php $check3 = 1;
                    $permission_id3 = $permission->id; ?>
                  @endif
                @endforeach
          @endif
          <p>Права администратора:</p>
          <p class="myp_perm1">Блокировать пользователей: <b>{{$check1 ? 'Да' : 'Нет' }}</b></p><br>
          <p class="myp_perm3">Изменять макс. количество чек-листов: <b>{{$check3 ? 'Да' : 'Нет' }}</b></p>
 
        	</div>
    	</div>

      @endforeach

    </div>

@endsection


