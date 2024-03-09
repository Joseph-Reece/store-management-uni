@extends('layouts.app')
@php

@endphp
@section('content')
<div class="app-content content ecommerce-cart content-head-image  fixed-navbar">
    <div class="content-header row">
        <div class="content-header-light col-12">
            <div class="row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <h3 class="content-header-title">Request Manager</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Request manager
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-3 col-12">
                    {{-- <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-primary round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu"><a class="dropdown-item" href="component-alerts.html"> Alerts</a><a class="dropdown-item" href="material-component-cards.html"> Cards</a><a class="dropdown-item" href="component-progress.html"> Progress</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="register-with-bg-image.html"> Register</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="shopping-cart">

                <div id="details_panel" class="" style="display: none">
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
                                        <div class="price-detail">Current Request<span class="float-right" id="request_id">$2800</span></div>
                                        <div class="price-detail">Pending Requests<span class="float-right" id="pending_requests">$2800</span></div>
                                        <div class="price-detail">Approved Requests <span class="float-right" id="approved_requests">$100</span></div>
                                        <div class="price-detail">Denied Requests <span class="float-right" id="denied_requests">$0</span></div>
                                        <hr>
                                        <div class="price-detail">Pending Return <span class="float-right" id="pending_return">$2900</span></div>
                                        <div class="total-savings">Total Fines<span class="float-right" id="total_fines">$2900</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('request.changeStatus')}}" class="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <input type="hidden" name="requestID" id="request_ID">
                                            <div class="col-md-6">
                                                <select name="status" id="request_status" class="select2 form-control select">

                                                    @foreach ($status as $key => $value)
                                                        <option value="{{$key}}">{{$value}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="text-right">
                                                <a href="#" id="closePanel" class="btn btn-info mr-2">Close Panel</a>
                                                <button type="submit" class="btn btn-warning">Approve Request</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" id="shopping-cart" data-toggle="tab" aria-controls="shop-cart-tab" href="#shop-cart-tab" aria-expanded="true">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="checkout" data-toggle="tab" aria-controls="checkout-tab" href="#checkout-tab" aria-expanded="false">Approved</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="complete-order" data-toggle="tab" aria-controls="comp-order-tab" href="#comp-order-tab" aria-expanded="false">Denied</a>
                    </li>
                </ul>
                <div class="tab-content pt-1">
                    <div role="tabpanel" class="tab-pane active" id="shop-cart-tab" aria-expanded="true" aria-labelledby="shopping-cart">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <table id="exampleTable" class="table table-striped table-borderless  file-export responsive dataex-res-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pendingRequests as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="product-img d-flex align-items-center">
                                                                <img class="img-fluid" src="/uploads/{{$item->gear->image}}" alt="Card image cap">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-title">{{$item->user->name}}</div>
                                                            <div class="product-color"><strong>Gear Name : </strong> {{$item->gear->name}}</div>
                                                            <div class="product-size"><strong>Sport : </strong>{{$sports[$item->gear->sport]}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">#GR{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">{{$item->created_at}}</div>
                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn btn-small btn-primary openPanel"
                                                                data-id="{{$item->user->id}}"
                                                                data-request_status= "{{$item->status}}"
                                                                data-request="{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}"
                                                            >
                                                                {{$status[$item->status]}}
                                                            </button>
                                                        </td>

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="tab-pane" id="checkout-tab" aria-labelledby="checkout">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <table class="table table-striped myTable table-borderless ">
                                            <thead>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($approvedRequests as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="product-img d-flex align-items-center">
                                                                <img class="img-fluid" src="/uploads/{{$item->gear->image}}" alt="Card image cap">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-title">{{$item->user->name}}</div>
                                                            <div class="product-color"><strong>Gear Name : </strong> {{$item->gear->name}}</div>
                                                            <div class="product-size"><strong>Sport : </strong>{{$sports[$item->gear->sport]}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">#GR{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">{{$item->created_at}}</div>
                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn btn-small btn-primary openPanel"
                                                                data-id="{{$item->user->id}}"
                                                                data-request_status= "{{$item->status}}"
                                                                data-request="{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}"
                                                            >
                                                                {{$status[$item->status]}}
                                                            </button>
                                                        </td>

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="comp-order-tab" aria-labelledby="complete-order">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <table class="table table-striped myTable table-borderless ">
                                            <thead>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deniedRequests as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="product-img d-flex align-items-center">
                                                                <img class="img-fluid" src="/uploads/{{$item->gear->image}}" alt="Card image cap">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-title">{{$item->user->name}}</div>
                                                            <div class="product-color"><strong>Gear Name : </strong> {{$item->gear->name}}</div>
                                                            <div class="product-size"><strong>Sport : </strong>{{$sports[$item->gear->sport]}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">#GR{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">{{$item->created_at}}</div>
                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn btn-small btn-primary openPanel"
                                                                data-id="{{$item->user->id}}"
                                                                data-request_status= "{{$item->status}}"
                                                                data-request="{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}"
                                                            >
                                                                {{$status[$item->status]}}
                                                            </button>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script src="/app-assets/js/core/libraries/jquery.min.js"></script>

<script>
    $(document).ready(function () {


        $('.myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

        $('.openPanel').on('click', function () {
            let id = $(this).attr('data-id'),
                requestID = $(this).attr('data-request'),
                request_status = $(this).attr('data-request_status');


            console.log()

            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "GET",
                url: "/request/showStatus",
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
                    $('#request_ID').val('');



                    $('#pending_requests').text('');
                    $('#approved_requests').text('');
                    $('#denied_requests').text('');
                    $('#pending_retrun').text('');
                    $('#total_fines').text('');

                },
                success: function (res) {
                    console.log(res)
                    // toastr.success(res.success, 'SUCCESS', { positionClass: 'toast-top-right', containerId: 'toast-bottom-right', "progressBar": true });

                    $('#request_id').text(`#GR${requestID}`);
                    $('#request_ID').val(requestID);
                    $('#request_status').val(request_status).change();


                    $('#client_name').val(res.client.name);
                    $('#client_regNo').val(res.client.client.reg_no);
                    $('#client_course').val(res.client.client.course);
                    $('#client_email').val(res.client.email);
                    $('#client_contact').val(`+254${res.client.client.phone}`);
                    $('#client_status').text(res.client.client.status);

                    $('#pending_requests').text(res.pendingRequests);
                    $('#approved_requests').text(res.approvedRequests);
                    $('#denied_requests').text(res.deniedRequests);
                    $('#pending_return').text('');
                    $('#total_fines').text('');

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
