@extends('layouts.app')
@section('content')
    <div class="app-content content ecommerce-cart content-head-image">
        <div class="content-header row">
            <div class="content-header-light col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title">Gear Requests</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Request Management
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
                <div class="row shopping-cart">
                    <div class="col-12 ">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0"><strong>My Requests</strong></h4>
                            </div>
                        </div>

                        @foreach ($gearRequests as $item)

                        <div class="card pull-up">
                            <div class="card-header">
                                <div class="float-left">
                                    <a href="#" class="btn btn-info">#GR{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</a>
                                </div>
                                <div class="float-right">
                                   @if ($item->status == 0)
                                    <form action="{{route('request.destroy', $item->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-info" ><i class="la la-map-marker"></i> Cancel Request</button>
                                    </form>

                                   @endif
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body py-0">
                                    <div class="d-flex justify-content-between lh-condensed">
                                        <div class="order-details text-center">
                                            <div class="product-img d-flex align-items-center">
                                                <img class="img-fluid"
                                                    src="/uploads/{{$item->gear->image}}"
                                                    alt="Card image cap">
                                            </div>
                                        </div>
                                        <div class="order-details">
                                            <h6 class="my-0">{{$item->gear->name}}</h6>
                                            <small class="text-muted">{{$item->gear->brand}}</small>
                                        </div>
                                        <div class="order-details">
                                            <div class="order-info">Ksh.{{$item->gear->price}}</div>
                                        </div>
                                        <div class="order-details">
                                            <h6 class="my-0">Issue Date {{$item->issue_date ? : ''}}</h6>
                                            <small class="text-muted">Due {{$item->issued_gear ? Carbon\Carbon::create($item->issued_gear->due_date)->diffForHumans() : ''}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                <span class="float-left">
                                    <span class="text-muted">Requested On</span>
                                    <strong>{{$item->created_at->diffForHumans()}}</strong>
                                </span>
                                <span class="float-right">
                                    <span class="text-muted">Request Status</span>
                                    <strong>{{$status[$item->status]}}</strong>
                                </span>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="card pull-up">
                            <div class="card-header">
                                <div class="float-left">
                                    <a href="#" class="btn btn-info">#CV45632</a>
                                </div>
                                <div class="float-right">
                                    <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
                                    <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body py-0">
                                    <div class="d-flex justify-content-between lh-condensed">
                                        <div class="order-details text-center">
                                            <div class="product-img d-flex align-items-center">
                                                <img class="img-fluid" src="../../../app-assets/images/gallery/38.png" alt="Card image cap">
                                            </div>
                                        </div>
                                        <div class="order-details">
                                            <h6 class="my-0">Taj Fort Aguada Resort & Spa, Goa</h6>
                                            <small class="text-muted">Brief description</small>
                                        </div>
                                        <div class="order-details">
                                            <div class="order-info">$250</div>
                                        </div>
                                        <div class="order-details">
                                            <h6 class="my-0">Offered on Sun, Oct 15th 2018</h6>
                                            <small class="text-muted">Brief description</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                <span class="float-left">
                                    <span class="text-muted">Ordered On</span>
                                    <strong>Wed, Oct 3rd 2018</strong>
                                </span>
                                <span class="float-right">
                                    <span class="text-muted">Ordered Amount</span>
                                    <strong>$250</strong>
                                </span>
                            </div>
                        </div> --}}

                            <!--  Pagination  -->
                            <div class="col-12">
                                {{ $gearRequests->onEachSide(2)->links() }}
                            </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
