@extends('admin.layouts.master')
@section('title', 'Fee Amount')
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
                                <h3 class="box-title">All Fee Amount List </h3>
                                <a href="{{ route('admin.fee.amounts.add') }}" style="float: right" class="btn btn-md btn-rounded btn-success mb-5">Add Fee Amount</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Fee Category</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $row)
                                            <tr>
                                                <td class="text-center" > {{$key+1}}</td>
                                                <td>{{ $row->feeCategory->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.fee.amounts.edit', $row->fee_category_id) }}" class="btn btn-md btn-rounded btn-info mb-5">Edit</a>
                                                    <a href="{{ route('admin.fee.amounts.details', $row->fee_category_id) }}" class="btn btn-md btn-rounded btn-warning mb-5">Details</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Fee Category</th>
                                            <th>Action</th>
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
