@extends('dashboard.app')

@section('content')
    <div>
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            <a href="{{ route('user.posts',$post->id) }}"
                                               class="btn btn-success" target="_blank">Show</a>
                                            <a href="{{ route('posts.edit',$post->id) }}"
                                               class="btn btn-warning">Edit</a>
                                            <form method="POST" style="display: inline-block;" action="{{ route('posts.destroy',$post->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-danger delete-post" value="Delete">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Posts added yet!!</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                @endforelse

                            </table>
                            {{ $posts->links() }}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('js')
    <script>
        $('.delete-post').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
@endsection