@extends('layouts.layout')

@section('content')

    <div class="col-md-9 blog-main">
        <div class="blog-post">
        	<div class="title">
        		<div class="title-head">
        			<h3>{{$check->title}}</h3>
        		</div>        	
        	<p>{{ $check->description }}</p>
            </div>  
             <p>Пункты чек-листа:</p>   
            @if($check->steps->isNotEmpty())
                <ul class="list-group">
                    @foreach($check->steps as $step)
                        <li class="list-group-item">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="completed" 
                                            {{ $step->completed ? 'checked' : '' }} >
                                        {{ $step->body }}
                            </label>
                           
                        </li>
                    @endforeach
                </ul>
            @endif
            


        </div>
    </div>

@endsection