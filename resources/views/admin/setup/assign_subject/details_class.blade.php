@extends('admin.layouts.master')
@section('title', 'Assign Subject Details')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Details :  {{ $class->student_class->name }}</h3>
                                <a href="{{ route('admin.assign.subjects.edit', $class->class_id) }}" style="float: right" class="btn btn-md btn-rounded btn-success mb-5">Add Fee Amount</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Student Subject</th>
                                            <th>Full Mark</th>
                                            <th>Pass Mark</th>
                                            <th>Subjective Mark</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subjects as $key => $row)
                                            <tr>
                                                <td class="text-center" > {{$key+1}}</td>
                                                <td>{{ $row->school_subject->name }}</td>
                                                <td>{{ $row->full_mark }}</td>
                                                <td>{{ $row->pass_mark }}</td>
                                                <td>{{ $row->subjective_mark }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Student Subject</th>
                                            <th>Full Mark</th>
                                            <th>Pass Mark</th>
                                            <th>Subjective Mark</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
    </div>
@endsection

@section('css')
@endsection

@section('style')
@endsection

@section('script')
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>

@endsection
