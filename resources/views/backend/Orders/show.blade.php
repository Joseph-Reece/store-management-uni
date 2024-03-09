@extends('layouts.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Request</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Request {{$gear->name}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                </div>

            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th>Gear</th>
                                            <th>Brand</th>
                                            <th>Category</th>
                                            <th>Sport</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="product-img d-flex align-items-center">
                                                    <img class="img-fluid" src="../../../app-assets/images/gallery/38.png" alt="Card image cap">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-title"> <strong>Name:</strong> {{$gear->name}}</div>
                                                <div class="product-color"> <strong>Brand:</strong> {{$gear->brand}}</div>
                                            </td>
                                            <td>
                                                <div class="product-price">{{$categories[$gear->category]}}</div>
                                            </td>
                                            <td>
                                                {{$sports[$gear->sport]}}
                                            </td>
                                            <td>
                                                <div class="total-price">Ksh: {{$gear->price}}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Terms and Conditions</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ol class="list-group">
                                        <li  class="list-group-item">Gear Must be returned before One week After issue</li>
                                        <li class="list-group-item">Gear must be in good condition when retured i.e no damages</li>
                                        <li class="list-group-item">Client will incurr damage costs if any damage is done to gear</li>
                                        <li class="list-group-item">Collect Gear form Store manager after request has been approved</li>
                                        <li class="list-group-item">Payable Price applies only to this item</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Price Details</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ol class="list-group">
                                        <li class="list-group-item">Once Due date has reached without returning gear:</li>
                                        <li class="list-group-item">Client will incurr a payable fine of ksh. 20 per each overdue day</li>
                                        <li class="list-group-item">If gear is lost contact Store manager immediately. Failure to notify admin will lead to additional charges</li>
                                        <li class="list-group-item">Total payable ammount will be calculated upon return of Gear</li>
                                        <li class="list-group-item">Payable Amount for lost Gear is <span class="float-right">Ksh. {{$gear->price}}</span> </li>
                                        <li class="list-group-item">Payable only via M-pesa Paybill: 1000001</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('request.store')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="text-right">
                                            <a href="{{route('request.create')}}" class="btn btn-info mr-2">Find Gear</a>

                                            <input type="hidden" name="id" id="id" value="{{$gear->id}}">
                                            <button type="submit" class="btn btn-warning"><i class="la la-check-square-o"></i> Make Request</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection


<script src="/app-assets/js/core/libraries/jquery.min.js"></script>
