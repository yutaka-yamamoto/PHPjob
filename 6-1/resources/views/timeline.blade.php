@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        {!! Form::open(['route' => 'timeline', 'method' => 'POST']) !!}
            {{ csrf_field() }}
                <div class="row mb-4">
                        {{ Form::text('body', null, ["placeholder"=>"今どうしてる？", 'class' => 'form-control w-50 mx-auto']) }}
                </div>
                <div class="row mb-4">
                        {{ Form::submit('つぶやく', ['class' => 'btn btn-primary btn-xs mx-auto']) }}
                </div>
            
                @if ($errors->has('body'))
                    <p class="alert alert-danger 'form-control w-50 mr-auto'">{{ $errors->first('body') }}</p>
                @endif
        {!! Form::close() !!}

        @foreach ($posts as $post)
            <div class="mb-1 border-bottom w-25">
                <strong>{{ $post->name }}</strong> {{ $post->created_at }}
            </div>
            <div class="pt-xl-2">
                {{ $post->body }}
            </div>
            @if (Auth::user()->id == $post->user_id)
            <form action="/posts/destroy/{{$post->id}}" method="POST">
                {{ csrf_field() }}
                <a class="btn btn-warning btn-sm" href="{{ action('TimelineController@delete', ['user_id' => $post->id]) }}">削除</a>
            </form>
            @endif
            <hr>
        @endforeach
    </div>
@endsection