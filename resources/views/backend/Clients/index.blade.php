@extends('layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-light col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title">Client management</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Client management
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

                <div id="details_panel" class="" style="display: none" >
                    <div class="row match-height">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Student Details <span id="client_status" class="badge badge-striped border-left-success"></span></h4>

                                    <input type="text" disabled class="form-control" id='client_name' />
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_regNo">Registration Number</label>
                                                    <input type="text" disabled id="client_regNo" class="form-control " placeholder="" aria-describedby="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="client_course">Course</label>
                                                    <input type="text" disabled id="client_course" class="form-control " placeholder="" aria-describedby="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_email">Email</label>
                                                    <input type="text" disabled id="client_email" class="form-control " placeholder="" aria-describedby="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="client_contact">Contact</label>
                                                    <input type="text" disabled id="client_contact" class="form-control " placeholder="" aria-describedby="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Request History</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="price-detail">Total Requests<span class="float-right" id="total_requests">$2800</span></div>
                                        <div class="price-detail">Pending Requests<span class="float-right" id="pending_requests">$2800</span></div>
                                        <div class="price-detail">Approved Requests <span class="float-right" id="approved_requests">$100</span></div>
                                        <div class="price-detail">Denied Requests <span class="float-right" id="denied_requests">$0</span></div>
                                        <hr>
                                        <div class="price-detail">Issued Gear <span class="float-right" id="issued_gear">$2900</span></div>
                                        <div class="price-detail">Pending Return <span class="float-right" id="pending_return">$2900</span></div>
                                        <div class="price-detail">Returned Gear <span class="float-right" id="returned_gear">$2900</span></div>
                                        <div class="total-savings">Lost Gear<span class="float-right" id="lost_gear">$2900</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('clientUser.updateStatus')}}" class="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <input type="hidden" name="id" id="id">

                                            <div class="col-md-6">
                                                <label for="changing_status"><strong>Change Status:</strong>  </label>
                                                <select name="status" id="changing_status" class="select2 form-control select">

                                                    @foreach ($status as $key => $value)
                                                        <option value="{{$key}}">{{$value}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="">
                                                <a href="#" id="closePanel" class="btn btn-info mr-2">Close Panel</a>
                                                <button type="submit" class="btn btn-warning">Submit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Store Manager Users </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <table class="table table-striped table-bordered file-export responsive dataex-res-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $user)
                                                <tr>
                                                  <td>{{ $user->user->name }} <span class="badge badge-striped border-left-primary">{{$status[$user->status]}}</span></td>
                                                  <td>{{ $user->user->email }}</td>
                                                  <td>
                                                        <a class="btn btn-info openPanel"
                                                            href="#"
                                                            id="showUser"
                                                            title="show"
                                                            data-id="{{$user->user->id}}"
                                                            data-client_status = "{{$user->status}}"
                                                            data-client_id = "{{$user->id}}"

                                                        >
                                                            Show
                                                        </a>

                                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                                                        <form class="form" method="POST" action="{{ route('users.destroy', $user->id)}}" style="display: inline">
                                                            @method('delete')
                                                            @csrf
                                                                <button type="submit" class="btn btn-danger" >Delete</button>
                                                        </form>
                                                  </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>





@endsection
<script src="/app-assets/js/core/libraries/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $('.openPanel').on('click', function () {
            let id = $(this).attr('data-id'),
            client_status = $(this).attr('data-client_status'),
            client_id = $(this).attr('data-client_id');

            console.log(id)

            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "GET",
                url: "/clients/show",
                data: {
                    "_token": _token,
                    "id": id,
                },
                beforeSend: function(){
                    console.log("First Clear Old Inputs");

                    $('#client_name').val('');
                    $('#client_regNo').val('');
                    $('#client_course').val('');
                    $('#client_email').val('');
                    $('#client_contact').val('');

                    $('#pending_requests').text('');
                    $('#approved_requests').text('');
                    $('#denied_requests').text('');
                    $('#pending_retrun').text('');
                    $('#total_fines').text('');

                },
                success: function (res) {
                    console.log(res.issued_gear)

                    $('#total_requests').text(res.total_requests);
                    $('#id').val(client_id);
                    $('#changing_status').val(client_status).change();


                    $('#client_name').val(res.client.name);
                    $('#client_regNo').val(res.client.client.reg_no);
                    $('#client_course').val(res.client.client.course);
                    $('#client_email').val(res.client.email);
                    $('#client_contact').val(`+254${res.client.client.phone}`);
                    $('#client_status').text(res.client.client.status);

                    $('#pending_requests').text(res.pendingRequests);
                    $('#approved_requests').text(res.approvedRequests);
                    $('#denied_requests').text(res.deniedRequests);

                    $('#issued_gear').text(res.issued_gear);
                    $('#pending_return').text(res.pending_return);
                    $('#returned_gear').text(res.returned_gear);
                    $('#lost_gear').text(res.lost_gear);

                    $('#details_panel').fadeIn(500);
                },
                error: function (err) {
                    console.log(err)
                }
            });


        })

        $('#closePanel').on('click', function () {
            let id = $(this).attr('data-id');

            $('#details_panel').slideUp(500);

        })



    })
</script>
