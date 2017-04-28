@extends('main')

@section('title', "| $post->title")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted In: {{ ($post->category)?$post->category->name:'Nincs kategória kiválasztva' }}</p>
            <p>Tags:</p>
            @if(!$post->tags->isEmpty())
                <ul>
                    @foreach($post->tags as $tag)
                        <li> {{ $tag->name }} </li>
                    @endforeach
                </ul>
            @else
                <p>Nincs tag beállítva</p>
            @endif
        </div>
    </div>
@endsection