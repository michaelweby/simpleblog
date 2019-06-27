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
                                    <th>No. Posts</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->posts()->count() }}</td>
                                    <td>
                                        <a href="{{ route('user.categories',$category->id) }}"
                                        class="btn btn-success" target="_blank">Show</a>
                                        <a href="{{ route('categories.edit',$category->id) }}"
                                        class="btn btn-warning">Edit</a>
                                        <form method="POST" style="display: inline-block;" action="{{ route('categories.destroy',$category->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger delete-category" value="Delete">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>No Categories added yet!!</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                @endforelse

                            </table>
                            {{ $categories->links() }}
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
        $('.delete-category').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
@endsection