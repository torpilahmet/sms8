@extends('admin.layouts.master')
@section('title', 'Add Assign Subject')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Add Assign Subject</h4>
                            </div>
                            <!-- /.box-header -->
                            <form class="form" method="post" action="{{route('admin.assign.subjects.store')}}">
                                @csrf
                                <div class="box-body">
                                    <div class="add_item">
                                        <div class="form-group">
                                            <label>Class Name</label>
                                            <select class="form-control select2" name="class_id" style="width: 100%;">
                                                <option selected="selected">Select Student Class</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Student Subject</label>
                                                    <select class="form-control select2" name="subject_id[]" style="width: 100%;">
                                                        <option selected="selected">Select Student Subject</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="full_mark[]">Full Mark</label>
                                                    <input type="text" name="full_mark[]" class="form-control" placeholder="Add Assign Subject Amount">
                                                    @error('full_mark')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="pass_mark[]">Pass Mark</label>
                                                    <input type="text" name="pass_mark[]" class="form-control" placeholder="Add Assign Subject Amount">
                                                    @error('pass_mark')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="subjective_mark[]">Subjective Mark</label>
                                                    <input type="text" name="subjective_mark[]" class="form-control" placeholder="Add Assign Subject Amount">
                                                    @error('subjective_mark')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="padding-top: 25px">
                                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                            </div>
                                        </div>
                                    </div><!-- /.add_item -->
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="reset" class="btn btn-rounded btn-warning btn-outline mr-1" value="Reset"/>
                                    <input type="submit" class="btn btn-rounded btn-primary btn-outline" name="addFeeCategoryAmount" value="Add Assign Subject Amount"/>
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

    <div class="" style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Student Subject</label>
                            <select class="form-control select2" name="subject_id[]" style="width: 100%;">
                                <option selected="selected">Select Student Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="full_mark">Full Mark</label>
                            <input type="text" name="full_mark[]" class="form-control" placeholder="Add Assign Subject Amount">
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="pass_mark">Pass Mark</label>
                            <input type="text" name="pass_mark[]" class="form-control" placeholder="Add Assign Subject Amount">
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="subjective_mark">Subjective Mark</label>
                            <input type="text" name="subjective_mark[]" class="form-control" placeholder="Add Assign Subject Amount">
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 25px">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('style')
@endsection

@section('script')
    <script>
        // $(function () {
        //     //Initialize Select2 Elements
        //     $('.select2').select2();
        // });
        $(document).ready(function () {
            var counter = 0;
            $(document).on("click", ".addeventmore", function () {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function (event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1;
            });
        });
    </script>
@endsection
