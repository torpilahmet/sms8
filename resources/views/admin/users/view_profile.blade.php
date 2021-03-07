@extends('admin.layouts.master')
@section('title', 'View Profile')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black">
                            <h3 class="widget-user-username">{{ $profile->name }}</h3>
                            <a href="{{ route('admin.profiles.edit') }}" style="float: right" class="btn btn-md btn-rounded btn-success mb-5">Edit Profile</a>
                            <h6 class="widget-user-desc">{{ $profile->usertype }} - {{ $profile->status }}</h6>
                            <h6 class="widget-user-desc">{{ $profile->email }}</h6>
                        </div>
                        <div class="widget-user-image">
                            <img class="rounded-circle" src="{{ empty($profile->profile_photo_path) ? asset('storage/profile-photos/no_image.jpg') : Storage::url($profile->profile_photo_path) }}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Mobile Number</h5>
                                        <span class="description-text">{{ $profile->mobile }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">Address</h5>
                                        <span class="description-text">{{ $profile->address }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Gender</h5>
                                        <span class="description-text">{{ $profile->gender }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
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
@endsection
