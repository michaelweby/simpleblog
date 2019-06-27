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
                    <form role="form" action="{{ route('categories.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="box-body">
                            <div class="form-group col-md-6 @if($errors->has('name')) has-error @endif">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" value="" required class="form-control" id="exampleInputEmail1" placeholder="Ex : News">
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