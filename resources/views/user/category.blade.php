@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{ $category->name }}</h3></div>

                    <div class="panel-body">
                        @foreach($posts as $post)
                            <div class="col-md-12">
                                <div>
                                    <h4 class="pull-left">
                                        <a href="{{ route('user.posts',$post->id) }}">{{ $post->title }}</a>

                                    </h4>
                                    <span class="pull-right">{{ $post->created_at->format('d-M-Y') }}</span>
                                </div>

                                <p class="col-md-12"> {{ \Illuminate\Support\Str::words($post->description,15)  }}</p>
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
