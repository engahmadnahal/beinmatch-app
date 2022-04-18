@extends('layouts.master')
@section('css')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />

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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">اضافة دوري جديد</h2>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- Row Content -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <form id="dawry_form">
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">الاعدادات</div>

                <div class="py-2 px-3">
                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="button" onclick="preformUpdate()">حفظ الأن</button>
                </div>
            </div>
            </form>

        </div>

        <div class="col-xl-9 col-lg-9 col-md-12">
         <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        معلومات الدوري
                    </div>
                    <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">اسم الدوري : </label>
                                    <input class="form-control" type="text" placeholder="اسم الدوري " name="dawry_name" id="dawry_name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">صورة الدوري : </label>
                                    <input class="form-control" type="text" placeholder="صورة الدوري" name="dawry_img" id='dawry_img'>
                                </div>
                            </div>
                    </div>






                </div>
            </div>


        </div>
    </div>

    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>

<script>
            (function($) {
            "use strict";

            // ______________Nice Select
            $('select.nice-select').niceSelect();
        })(jQuery);

        //* ****
        function preformUpdate(){
            axios.post('/dawries', {
                    dawry_name: document.getElementById('dawry_name').value,
                    dawry_img: document.getElementById('dawry_img').value,
                })
                .then(function(response) {
                    toastr.success(response.data.msg);
                    document.getElementById('dawry_form').reset();
                })
                .catch(function(error) {
                    toastr.error(error.response.data.msg);
                });
        }
</script>
@endsection
