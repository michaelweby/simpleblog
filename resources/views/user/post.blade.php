@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{ $post->title }}</h3></div>

                    <div class="panel-body">
                        {{ $post->description }}
                        <div class="pull-right">
                            <strong>
                                Published At : {{ $post->created_at->format('d M Y') }}<br>
                                Author : {{ $post->author->name }}
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
