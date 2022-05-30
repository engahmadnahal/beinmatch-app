@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        span.select2 {
            width: 100% !important;
        }

    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفرق الرياضية</h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">تخصيص التحديد</div>
                <div class="card-body pb-0">
                    <div class="form-group">
                        <label class="form-label">الدوري </label>
                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1"
                            aria-hidden="true" name="dawry">
                            <option label="Choose one" data-select2-id="3">
                            </option>
                            @foreach ($dawrys as $dawry)
                                <option value="{{ $dawry->id }}">
                                    {{ $dawry->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group mt-2">
									<label class="form-label">الترتيب</label>
									<select name="beast" id="select-beast2" class="form-control  nice-select  custom-select">
										<option value="0">--Select--</option>
										<option value="1">Boys clothing</option>
										<option value="2">girls Clothing</option>
										<option value="3">Toys</option>
										<option value="4">Baby Care</option>
										<option value="5">Kids footwear</option>
									</select>
								</div> --}}

                </div>

                <div class="py-2 px-3">

                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">تصفية</button>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12">

            <div class="row row-sm">
                @foreach ($clubs as $club)
                    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="pro-img-box">
                                    <div class="d-flex product-sale">

                                    </div>
                                    <img class="w-100"
                                        src="{{$club->avater}}"
                                        alt="product-image">
                                    <a href="{{route('clubs.show',$club->id)}}" class="adtocart"> <i class="las la-shopping-cart "></i>
                                    </a>
                                </div>
                                <div class="text-center pt-3">
                                    <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$club->name}}</h3>
                                    <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">{{$club->dawry->name}}</h4>
                                    <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase"><a href="{{route('clubs.edit',$club->id)}}">تعديل</a></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $clubs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            // ______________Nice Select
            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });
        })(jQuery);
    </script>
@endsection
