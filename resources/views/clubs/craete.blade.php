@extends('layouts.master')
@section('css')
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <style>
        .ql-tooltip {
            display: none;
        }

        span.select2 {
            width: 100% !important;
        }

        .input-group {

            width: 100% !important;
            padding: 0;
        }

    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">اضافة فريق</h2>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- Row Content -->
    <div class="row row-sm">
        <form action="{{route('clubs.show')}}" method="post">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
                @csrf
                <div class="card">
                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">الاعدادات</div>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label class="form-label">الدوري التابع له</label>

                                <select class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" name="dawry">
											<option label="Choose one" data-select2-id="3">
											</option>
											@foreach ($dawrys as $dawry)
                                                <option value="{{$dawry->id}}">
                                                    {{$dawry->name}}
                                                </option>
                                            @endforeach
										</select>


                            <p class="tx-19 tx-gray-500 mb-2">يتم ملئ باقي معلومات الفريق بالسكرابينج</a></p>


                        </div>
                    </div>

                    <div class="py-2 px-3">
                        <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">حفظ الأن</button>
                    </div>
                </div>

        </div>

        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            معلومات الفريق
                        </div>
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">اسم الفريق : </label>
                                    <input class="form-control" type="text" name="name" placeholder="اسم الفريق ">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">صورة الفريق : </label>
                                    <input class="form-control" type="text" name="logo_url" placeholder="صورة الفريق">
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">دولة الفريق : </label>
                                    <input type="text" name="country" class="form-control" placeholder="دولة الفريق">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </form>


    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
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
