@extends('layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-light col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title">Gear</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Gear Management
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right col-md-3 col-12">
                        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                            <a href="{{route('gear.create')}}">
                                <button class="btn btn-info round box-shadow-2 px-2 mb-1"  ><i class="ft-plus icon-left"></i> Add Gear</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Gear Manager  </h4>
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
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Brand</th>
                                                    <th>Category</th>
                                                    <th>Sport</th>
                                                    <th>Quantity</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gears as $gear)

                                                    <tr>
                                                        <td>
                                                            <div class="order-details text-center">
                                                                <div class="product-img d-flex align-items-center">
                                                                    <img class="img-fluid"
                                                                        src="/uploads/{{$gear->image}}"
                                                                        alt="Card image cap">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $gear->name }}</td>
                                                        <td>{{ $gear->brand }}</td>
                                                        <td>{{ $categories[$gear->category] }}</td>
                                                        <td>{{ $sports[$gear->sport] }}</td>
                                                        <td>{{ $gear->quantity }}</td>
                                                        <td>
                                                            <a class="btn btn-info" href="{{ route('gear.show',$gear->slug) }}">Show</a>
                                                            @can('gear-edit')
                                                                <a class="btn btn-primary" id="editGear" href="{{ route('gear.edit',$gear->slug) }}">Edit</a>
                                                            @endcan
                                                            @can('gear-delete')
                                                            <form class="form" method="POST" action="{{ route('gear.destroy', $gear->id)}}" style="display: inline">
                                                                @method('delete')
                                                                @csrf
                                                                    <button type="submit" class="btn btn-danger" >Delete</button>
                                                            </form>
                                                            @endcan
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Brand</th>
                                                    <th>Category</th>
                                                    <th>Sport</th>
                                                    <th>Quantity</th>
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
