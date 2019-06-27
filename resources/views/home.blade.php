@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading">Hello to our Simple Blog!!</h3>

                <div class="panel-body">
                    @foreach($posts as $post)
                        <div class="col-md-12">
                            <div>
                                <h4 class="pull-left">
                                    <a href="{{ route('user.posts',$post->id) }}"><h4>{{ $post->title }}</h4></a><br>
                                </h4>
                                <span class="pull-right">{{ $post->created_at->format('d-M-Y') }}</span><br>

                            </div>


                            <p class="col-md-12"> {{ \Illuminate\Support\Str::words($post->description,15)  }}</p>
                            <div class="col-xs-12">
                                <h5>From : <a href="{{ route('user.categories',$post->category->id) }}">{{ $post->category->name }}</a></h5>
                                <h5>Author : {{ $post->author->name }}</h5>
                            </div>
                        </div>
                        <div class='row'><div class='span12'></div></div>
                    @endforeach
                    {{ $posts->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
