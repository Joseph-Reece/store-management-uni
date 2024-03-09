@extends('layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-light col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title">Account setting</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item active">Account setting
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right col-md-3 col-12">

                    </div>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="ft-globe mr-50"></i>
                                        General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="ft-lock mr-50"></i>
                                        Change Password
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                        <i class="ft-info mr-50"></i>
                                        Info
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <form novalidate method="POST" action="{{ route('clientUser.update', $user->id) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Username</label>
                                                                    <input type="text" class="form-control" name="name" id="account-username" placeholder="Username" value="{{$user->name}}" required data-validation-required-message="This username field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">E-mail</label>
                                                                    <input type="email" class="form-control" id="account-e-mail" placeholder="Email" value="{{$user->email}}" required data-validation-required-message="This email field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" id="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <form class="formPass"  novalidate >
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-old-password">Old Password</label>
                                                                    <input type="password" name="password"  class="form-control" id="account-old-password" required placeholder="Old Password" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">New Password</label>
                                                                    <input type="password" name="password" id="account-new-password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Retype New
                                                                        Password</label>
                                                                    <input type="password" name="confirm-password" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <input type="hidden" name="id" id="userID" value="{{$user->id}}">
                                                            <button type="submit" id="submitPassword" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                                <form novalidate id="infoForm">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-reg">Registration Number</label>
                                                                    <input type="text" class="form-control" id="account-reg" required placeholder="Registration number" value=" {{ $details->reg_no ?? '' }}" data-validation-required-message="This field is required">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Phone</label>
                                                                    <input type="number" class="form-control" id="account-phone" required placeholder="+254" value="{{ $details->phone ?? '' }}" data-validation-required-message="This phone number field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="musicselect2">Course Details</label>
                                                                <select class="form-control select2 block " id="musicselect2"  >
                                                                    <option selected disabled >Select Course</option>
                                                                    @foreach ($courses as $key => $course)
                                                                        @if (!$details)

                                                                            <option value="{{$key}}">{{$course}}</option>
                                                                        @else

                                                                            <option value="{{$key}}" {{ $key ==  $details->course  ? 'selected' : '' }}>{{$course}}</option>
                                                                        @endif
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->
            </div>
        </div>
    </div>

    @section('scripts')
    <script src="/app-assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript">

            $('.formPass').on('submit', function(e) {
                e.preventDefault()
                let oldPass = $('#account-old-password').val(),
                    newPass = $('#account-new-password').val(),
                    newCPass = $('#account-retype-new-password').val(),
                    id = $('#userID').val();

                if( newPass !== '' && newPass === newCPass) {
                    let _token   = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: "PUT",
                        url: "/clients/update" + id,
                        data: {
                            "_token": _token,
                            password:newPass,
                        },
                        success: function (res) {
                            toastr.success(res.success, 'SUCCESS', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                            $('.formPass')[0].reset()
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    });
                }else {
                    toastr.error("Passwords do not match", 'ERROR', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });
                }
            })


            $('#infoForm').on('submit', function(e) {
                e.preventDefault()
                console.log('this is the right form')
                let reg_no = $('#account-reg').val(),
                    phone = $('#account-phone').val(),
                    course = $('#musicselect2').val(),
                    id = $('#userID').val();

                    let _token   = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: "PUT",
                        url: "/clients/edit" + id,
                        data: {
                            "_token": _token,
                            reg_no:reg_no,
                            phone:phone,
                            course:course,
                        },
                        success: function (res) {
                            toastr.success(res.success, 'SUCCESS', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                            // $('.formPass')[0].reset()
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    });
            })
    </script>

    @endsection
@endsection
