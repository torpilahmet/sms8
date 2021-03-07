@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Edit User Named <b>{{ $editData->name }}</b></h4>
                            </div>
                            <!-- /.box-header -->
                            <form class="form" method="post" action="{{route('admin.users.update', $editData->id)}}">
                                @csrf
                                <div class="box-body">
                                    <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Info</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ old('name', $editData->name) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $editData->email) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="box-title text-info" style="margin-top: 20px;"><i class="ti-user mr-15"></i> Contact Info</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number" value="{{ old('mobile', $editData->mobile) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>User Gender</label>
                                                    <select class="form-control" name="gender">
                                                        <option value="" disabled {{empty($editData->gender) ? 'selected':''}}> Select Gender</option>
                                                        <option value="Male" {{$editData->gender == 'Male' ? 'selected':''}}>Male</option>
                                                        <option value="Female" {{$editData->gender == 'Female' ? 'selected':''}}>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" id="image" name="image" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea name="address" id="address" cols="30" rows="10" class="form-control">{{ old('address', $editData->address) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="reset" class="btn btn-rounded btn-warning btn-outline mr-1" value="Reset"/>
                                    <input type="submit" class="btn btn-rounded btn-primary btn-outline" name="addUser" value="Update User"/>
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
