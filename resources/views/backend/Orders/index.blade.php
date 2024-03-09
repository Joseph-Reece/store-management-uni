@extends('layouts.app')
@php

@endphp
@section('content')

    <div class="app-content content  content-detached-left-sidebar">

        <div class="content-header row">
            <div class="content-header-light col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title">Request</h3>
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
            <div class="content-detached content-right">
                <div class="content-body">
                    <div class="product-shop">
                        <div class="card">
                            <div class="card-body">
                                <span class="shop-title">Gear</span>
                                <span class="float-right">
                                    <span class="result-text mr-1"> Showing {{$gears->count()}} of {{$results}} results</span>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($gears as $gear)
                                <div class="col-md-6 col-sm-12">
                                    <div class="card pull-up" style="height: 300px">
                                        <div class="card-content">
                                            <a href="{{route('request.show', $gear->slug)}}"
                                                id="showGear"
                                                data-slug="{{$gear->slug}}"
                                            >
                                                <div class="card-body p-0">
                                                    <div class="align-items-center">
                                                        <div class="badge badge-success position-absolute m-2 round">{{$categories[$gear->category]}}</div>
                                                        <img class="img-fluid rounded"
                                                            src="/uploads/{{$gear->image}}"
                                                            alt="Card image cap">
                                                    </div>
                                                    <div class="row p-1">
                                                        <div class="col-sm-9">
                                                            <h4 class="product-title">{{  $gear->name  }}</h4>
                                                            <span class="price">{{$sports[$gear->sport]}}</span>
                                                        </div>
                                                        <div class="col-sm-3 text-center">
                                                            <span
                                                                class="btn btn-float btn-round button-margin mb-1 {{($gear->quantity > 0) ? 'btn-success' : 'btn-danger'}}"><i
                                                                    class="ft-shopping-cart"></i></span>
                                                            <p class="danger">{{$gear->quantity}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            <!--  Pagination  -->
                            <div class="col-12">
                                {{ $gears->onEachSide(2)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-detached sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content d-none d-lg-block sidebar-shop">
                        <form  class="filter_form" id="formone">
                            <div class="card">
                                <div class="card-body">
                                    <div class="search">
                                        <input id="basic-search" type="text" placeholder="Search here..." value="{{$query_keyword ? $query_keyword : ''}}"
                                            class="basic-search" name="keyword">
                                        <i class="ficon ft-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <!-- Hotel Type -->
                                    <div class="hotel-type">
                                        <div class="category-title mt-3 pb-1">
                                            <h4 class="card-title mb-0">Category</h4>
                                            <hr>
                                        </div>
                                        <div class="sidebar-list">
                                            <ul class="skin-square skin">
                                                @foreach ($categories as $key => $item)
                                                    <li>
                                                        <input type="checkbox" value="{{ $key }}" {{($query_category!=null && $key == $query_category) ? 'checked' : ''}} name="category" class="hotel" id="hotel_{{ $key }}">
                                                        <label for="hotel">
                                                           {{ $item }}
                                                        </label>
                                                        <span class="pull-right">{{App\Models\Gear::where('category', $key)->count()}}</span>
                                                    </li>

                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Hotel Type -->

                                    <!-- Sport -->
                                    <div class="amenities">
                                        <div class="category-title mt-3 pb-1">
                                            <h4 class="card-title mb-0">Sports</h4>
                                            <hr>
                                        </div>
                                        <div class="sidebar-list">
                                            <ul class="skin-square skin">
                                                @foreach ($sports as $key => $item)
                                                    <li>
                                                        <input type="checkbox" class="hotel" value="{{$key}}" {{($query_sport !=null && $key == $query_sport) ? 'checked' : ''}} name="sport" id="business-services_{{  $key }}">
                                                        <label for="business-services">
                                                            {{$item}}
                                                        </label>
                                                        <span class="pull-right">{{App\Models\Gear::where('sport', $key)->count()}}</span>
                                                    </li>

                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Amenities -->
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary col-md-12 my-2">Submit</button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
