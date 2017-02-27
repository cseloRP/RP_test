@extends('main')

@section('title', '| Home')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Welcome</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla aliquam vehicula ligula. Quisque tempor enim ipsum, in maximus felis finibus rhoncus. Duis fringilla lorem vitae velit ultrices, sit amet convallis metus placerat. Integer ultricies id turpis sit amet efficitur. Vestibulum interdum gravida risus, id viverra risus commodo a. Vestibulum fermentum sem turpis, lobortis porta arcu malesuada sit amet. Praesent fringilla commodo urna id lobortis.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        @foreach($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ substr($post->body, 0, 300)}}{{ strlen($post->body) > 300 ? '...' : '' }}</p>
                <a href="{{ url('blog/' . $post->slug) }}" class="btn btn-default btn-sm">Read more</a>
            </div>
        @endforeach
    </div>
</div>
@endsection