@extends('admin.layouts.master')
@section('title', 'User List')
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
                                <h3 class="box-title">@if(Session::has('message')) All User List @endif</h3>
                                <a href="{{ route('admin.users.add') }}" style="float: right" class="btn btn-md btn-rounded btn-success mb-5">Add User</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td class="text-center" > {{$key+1}}</td>
                                            <td> {{ $user->usertype }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->id != Auth::id())
                                                <form id="delete-user-form" action="{{ route('admin.users.delete', $user->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-md btn-rounded btn-info mb-5">Edit</a>
                                                    <input type="submit" class="btn btn-md btn-rounded btn-danger mb-5" value="Delete">
                                                </form>
                                                @else
                                                    <a href="{{ route('admin.profiles.profile') }}" class="btn btn-md btn-rounded btn-info mb-5">View Profile</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Email</th>
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
