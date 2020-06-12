@extends('layouts.layout')

@section('content')

    <div class="col-md-9 blog-main">
        <div class="blog-post">
        	<div class="title">
        		<div class="title-head">
        			<h3>{{$check->title}}</h3>
        		</div>
                <div class="block">
                    <a href="{{route('checks.edit', $check->id)}}" class="btn btn-primary ml-2">Редактировать</a>
                    <form method="post" class="myform" action="{{route('checks.destroy', $check->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить чек-лист</button>
                    </form>
                </div>
        	
        	<p>{{ $check->description }}</p>
        	@if($check->completed)
        		<p>Статус чек-листа: Выполнен</p>
        	@else
        		<p>Статус чек-листа: Не выполнен</p>
        	@endif
            </div>  
                
            @if($check->steps->isNotEmpty())
                <ul class="list-group">
                    @foreach($check->steps as $step)
                        <li class="list-group-item">
                            <form method="post" action="{{route('step.update', ['check' => $check->id, 'step' => $step->id])}}" class="myformcheck">
                            @csrf
                            @method('PATCH')
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="completed" 
                                            onclick="this.form.submit()" {{ $step->completed ? 'checked' : '' }} >
                                        {{ $step->body }}
                                    </label>
                                </div>
                            </form>
                            <div class="block">
                                <a href="{{route('step.update', ['check' => $check->id, 'step' => $step->id] )}}" class="btn btn-success min_success">Редактировать</a>
                                <form method="post" action="{{route('step.destroy', ['check' => $check->id, 'step' => $step->id])}}" class="formUpdateStep">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger min_danger">Удалить</button>
                                </form>
                            </div>                            
                        </li>
                    @endforeach
                </ul>
            @endif
            
            <form class="card card-body mb-4" method="post" action="{{ route('step.store', ['check' => $check->id] ) }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Шаг" placeholder="Добавить шаг" name="body">
                </div>
                <button type="submit" class="btn btn-primary">Добавить шаг</button>
            </form>

        </div>
    </div>






@endsection