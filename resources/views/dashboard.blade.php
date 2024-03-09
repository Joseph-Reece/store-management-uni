@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- eCommerce statistic -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{$students}}</h3>
                                        <h6>Total Students</h6>
                                    </div>
                                    <div>
                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">{{$gearRequests}}</h3>
                                        <h6>Gear Requests</h6>
                                    </div>
                                    <div>
                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$newStudents}}</h3>
                                        <h6>Student Requests</h6>
                                    </div>
                                    <div>
                                        <i class="icon-user-follow success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="danger">{{$issuedRequests}}</h3>
                                        <h6>Gear Issues</h6>
                                    </div>
                                    <div>
                                        <i class="icon-heart danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ eCommerce statistic -->
             <!-- Recent Transactions -->
             <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Requests</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="{{route('request.adminIndex')}}" target="_blank">Manage Requests</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body table-responsive card-dashboard dataTables_wrapper dt-bootstrap">

                                <table id="recent-orders" class="table table-hover table-xl mb-0 responsive dataex-res-configuration">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Requests#</th>
                                            <th class="border-top-0">Student Name</th>
                                            <th class="border-top-0">Gear</th>
                                            <th class="border-top-0">Sport</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentRequests as $item)

                                        <tr>
                                            <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> {{$status[$item->status]}}</td>
                                            <td class="text-truncate"><a href="#">#GR{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</a></td>
                                            <td class="text-truncate">
                                                <span>{{$item->user->name}}</span>
                                            </td>
                                            <td class="text-truncate">
                                                <span class="avatar avatar-xs">
                                                    <img class="box-shadow-2" src="../../../app-assets/images/portrait/small/avatar-s-4.png" alt="avatar">
                                                </span>
                                                <span>{{$item->gear->name}}</span>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-secondary round">{{$sports[$item->gear->sport]}}</button>
                                            </td>
                                            <td>
                                                <form action="{{route('request.changeStatus')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="1">
                                                    <input type="hidden" name="requestID" value="{{$item->id}}">
                                                    <button type="submit" data-id="{{$item->id}}" class="btn btn-sm btn-outline-primary approve">Approve</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection

