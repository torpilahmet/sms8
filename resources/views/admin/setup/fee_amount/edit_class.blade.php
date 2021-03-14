@extends('admin.layouts.master')
@section('title', 'Update Fee Category Amount')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Update Fee Category Amount</h4>
                            </div>
                            <!-- /.box-header -->
                            <form class="form" method="post" action="{{route('admin.fee.amounts.update', $id)}}">
                                @csrf
                                <div class="box-body">
                                    <div class="add_item">

                                        <div class="form-group">
                                            <label>Fee Category</label>
                                            <select class="form-control select2" name="fee_category_id" style="width: 100%;">
                                                @foreach($feeCategories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @foreach($editData as $row)
                                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Student Class</label>
                                                    <select class="form-control select2" name="class_id[]" style="width: 100%;">
                                                        <option selected="selected">Select Student Class</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}" {{ $class->id == $row->student_class_id ? 'selected' : '' }}>{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="amount">Fee Category Amount</label>
                                                    <input type="text" name="amount[]" class="form-control" value="{{ $row->amount }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="padding-top: 25px">
                                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                            </div>
                                        </div>
                                        </div>
                                        @endforeach
                                    </div><!-- /.add_item -->
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-rounded btn-primary btn-outline" name="UpdateFeeCategoryAmount" value="Update"/>
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
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Student Class</label>
                            <select class="form-control select2" name="class_id[]" style="width: 100%;">
                                <option selected="selected">Select Student Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="amount">Fee Category Amount</label>
                            <input type="text" id="amount" name="amount[]" class="form-control" placeholder="Add Fee Category Amount" value="{{ old('amount') }}">
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
