@extends('admin.layouts.master')
@section('title', 'Add Student Group')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Add Student Group</h4>
                            </div>
                            <!-- /.box-header -->
                            <form class="form" method="post" action="{{route('admin.groups.store')}}">
                                @csrf
                                <div class="box-body">
                                    <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Class Info</h4>
                                    <hr class="my-15">

                                        <div class="form-group">
                                            <label for="name">Student Group Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Add Group Name" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="reset" class="btn btn-rounded btn-warning btn-outline mr-1" value="Reset"/>
                                    <input type="submit" class="btn btn-rounded btn-primary btn-outline" name="addGroup" value="Add Group"/>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>

                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('style')
@endsection

@section('script')
@endsection
