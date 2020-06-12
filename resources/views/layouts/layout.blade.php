<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Сервис чек-листов</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
	
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	  <h5 class="my-0 mr-md-auto font-weight-normal">Сервис чек-листов</h5>
	  <nav class="my-2 my-md-0 mr-md-3">
      
      @auth
        @if(\Auth::user()->role_id == 2)
          <a class="p-2 text-dark" href="{{ route('admin.index') }}">Админка</a>
        @endif
        @if(\Auth::user()->role_id !== 1)
          <a class="p-2 text-dark" href="{{ route('user.index') }}">Юзеры</a>
        @endif
      @endauth

	    <a class="p-2 text-dark" href="/">Главная</a>
	    <a class="p-2 text-dark" href="{{route('checks.index')}}">Чек-листы</a>
	    <a class="p-2 text-dark" href="{{route('checks.create')}}">Создать чек-лист</a>
	    <a class="p-2 text-dark" href="{{route('home')}}">Мой профиль</a>
	  </nav>
	 
                        <!-- Authentication Links -->
                        @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>                         
                            @endif
                        @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        @endguest
               
	</div>

	<div class="container">
    @auth
		  @if(\Auth::user()->banned)
      <p><b>Ваш профиль заблокирован вы не может создавать и изменять свои чек-листы (для админов - управлять пользователями)</b></p>
      @endif
    @endauth

   		@if(session('success'))
    		<div class="alert alert-success">
      			{{ session('success') }}
    		</div>
  		@endif
  		

  		@include('layouts.errors')


		@yield('content')
		
	</div>


</body>
</html>