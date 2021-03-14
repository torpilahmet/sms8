@extends('admin.layouts.master')
@section('title', 'Edit School Subject')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Edit School Subject</h4>
                            </div>
                            <!-- /.box-header -->
                            <form class="form" method="post" action="{{route('admin.school.subjects.update', $schoolSubject->id)}}">
                                @csrf
                                <div class="box-body">

                                        <div class="form-group">
                                            <label for="name">Student Year Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Student Year" value="{{ old('name', $schoolSubject->name) }}">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="reset" class="btn btn-rounded btn-warning btn-outline mr-1" value="Reset"/>
                                    <input type="submit" class="btn btn-rounded btn-primary btn-outline" name="addSchoolSubject" value="Edit School Subject"/>
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
