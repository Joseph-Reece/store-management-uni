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
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Gear Management
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right col-md-3 col-12">
                        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                            <a href="{{ route('gear.index') }}">
                                <button class="btn btn-info   box-shadow-2 px-2 mb-1"><i
                                        class="ft-arrow-left icon-left"></i> Back</button>
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
                                    <h4 class="card-title">Add Gear</h4>
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
                                    <div class="card-body card-dashboard ">
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form class="form" method="POST" action="{{ route('gear.store') }}"
                                            enctype="multipart/form-data">
                                            <input type="hidden" id="add_location_method" name="_method" value="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="col-md-12">
                                                    <img class="dropzone" src="/app-assets/thumbnail.png" alt="" id="previewImg">

                                                    <input type="file" name="file" class="form-control-file" id="exampleInputFile"
                                                        onchange="previewFile(this);">
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" id="name" class="form-control round"
                                                                name="name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="quantity">Quantity</label>
                                                            <input type="number" id="quantity" class="form-control round"
                                                                name="quantity">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="sport">Sport Name</label>
                                                            <select class="select2 form-control block" id="sport"
                                                                name="sport" required>
                                                                <option disabled selected>Choose one
                                                                </option>
                                                                <optgroup label="Sports List">
                                                                    @foreach ($sports as $key => $sport)
                                                                        <option value={{ $key }}>
                                                                            {{ $sport }} </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="brand">Brand</label>
                                                            <input type="text" id="brand" class="form-control round"
                                                                name="brand">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="price">Price</label>
                                                            <input type="number" id="price" class="form-control round"
                                                                name="price">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="category">Category</label>
                                                            <select class="select2 select form-control block" id="category"
                                                                name="category" required>
                                                                <option disabled selected>Choose one
                                                                </option>
                                                                <optgroup label="Categories">
                                                                    @foreach ($categories as $key => $category)
                                                                        <option value={{ $key }}>
                                                                            {{ $category }} </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                                        <i class="ft-x"></i> Cancel
                                                    </button>
                                                    <button type="submit" id="submit_btn" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="/app-assets/js/core/libraries/jquery.min.js"></script>

    <script>

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>


@endsection
