@extends('dashboard.app')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('posts.update',$post->id) }}" method="post">
                        {{ method_field('put') }}
                        {{ csrf_field() }}

                        <div class="box-body">
                            <div class="form-group col-md-6 @if($errors->has('title')) has-error @endif">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" value="{{ $post->title }}" required class="form-control" id="exampleInputEmail1" placeholder="Ex : New Post">
                            </div>
                            <div class="form-group col-md-6 @if($errors->has('category')) has-error @endif">
                                <label for="category">Category</label>
                                <select name="category" id="category" required class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option @if($category->id == $post->category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 @if($errors->has('author')) has-error @endif">
                                <label for="author">Author</label>
                                <select name="author" id="author" required class="form-control">
                                    <option value="">Select Author</option>
                                    @foreach($authors as $author)
                                        <option @if($author->id == $post->author->id) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12 @if($errors->has('description')) has-error @endif">
                                <label for="description">Description</label>
                                <textarea  name="description" required class="form-control" id="description" placeholder="Ex : Here We Go!!">{{ $post->description }}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
        </div>
    </section>
@endsection