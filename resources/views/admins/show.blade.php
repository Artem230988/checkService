
@extends('layouts.layout')

@section('content')

<div class="col-md-8 blog-main">
	<div class="card">
        	<div class="card-body">
        		<p>Имя: <b>{{ $user->name }} </b></p>
            	<p>Email: {{ $user->email }}</p>
            	<p>Роль: Администратор</p>
            	<p class="myP_max">Максимальное количество чек-листов: <b>{{ $user->max_checks }}</b></p>
            	<a href="{{route('admin.edit', $user->id)}}" class="btn btn-primary myBtn_max">Изменить</a><br>
              	<p class="myP_banned">Пользователь заблокирован: <b>{{$user->banned ? 'Да' : 'Нет' }}</b></p>

              	@if($user->banned == 1)
              		<form method="post" action="{{ route('admin.update', $user->id) }}" class="myForm_banned">
    				@csrf
    				@method('PATCH')
    				<button type="submit" class="btn btn-primary myBtn_banned">Разблокировать</button>
  				</form><br>
				@else
              		<form method="post" action="{{ route('admin.update', $user->id) }}" class="myForm_banned">
    				@csrf
    				@method('PATCH')
    				<button type="submit" class="btn btn-primary myBtn_banned">Заблокировать</button>
  				</form><br>
  				@endif

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
		<p>Права адмиистратора:</p>
         <p class="myp_perm1">Блокировать пользователей: <b>{{$check1 ? 'Да' : 'Нет' }}</b></p> 
         @if($check1)
            <form method="post" action="{{ route('permission.destroy', ['user' => $user->id, 'permission' => $permission_id1]) }}" class="myForm_perm1">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary mybtn_perm1">Убрать право</button>
          </form><br>
          @else
            <form method="post" action="{{ route('permission.store', ['user' => $user->id, 'name' => 'Блокировать пользователей']) }}" class="myForm_perm1">
            @csrf
            <button type="submit" class="btn btn-primary mybtn_perm1">Дать право</button>
          </form><br>
          @endif

          <p class="myp_perm3">Изменять макс. количество чек-листов: <b>{{$check3 ? 'Да' : 'Нет' }}</b></p>
          @if($check3)
            <form method="post" action="{{ route('permission.destroy', ['user' => $user->id, 'permission' => $permission_id3]) }}" class="myForm_perm3">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary mybtn_perm3">Убрать право</button>
          </form><br>
          @else
            <form method="post" action="{{ route('permission.store', ['user' => $user->id, 'name' => 'Изменять макс. количество чек-листов']) }}" class="myForm_perm3">
            @csrf
            <button type="submit" class="btn btn-primary mybtn_perm3">Дать право</button>
          </form><br>
          @endif



        	</div>
    	</div>
</div>
@endsection