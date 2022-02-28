@extends('layouts.master')
@section('css')
    <style>
        tbody tr {
            height: 80px;
        }

    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">الاعدادات</h2>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <form action="">

        <!-- Row Content -->
        <div class="row row-sm">

            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                    </div>
                    <div class="card-body pt-0">

                        <div class="form-group mb-0 justify-content-end">
                            <div class="checkbox">
                                <div class="custom-checkbox custom-control">
                                    <p class="mb-2">عند تفعيل هذا الخيار سيتم ايقاف السلايدر في التطبيق ، وسيتوجب
                                        عليك
                                        تفعيل جدول المباريات .</p>
                                    <div class=" main-toggle main-toggle-secondary" id="stop_slider">
                                        <input type="checkbox" name="stop_slider" id="stop_slider_input"
                                            style="display: none">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                    </div>
                    <div class="card-body pt-0">

                        <div class="form-group mb-0 justify-content-end">
                            <div class="checkbox">
                                <div class="custom-checkbox custom-control">
                                    <p class="mb-2">عند تفعيل هذا الخيار سيتم ايقاف جدول المباريات ، وسيتعين عليك
                                        تفعيل السلايدر</p>
                                    <div class=" main-toggle main-toggle-secondary" id="stop_match">
                                        <input type="checkbox" name="stop_match" id="stop_match_input"
                                            style="display: none">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                    </div>
                    <div class="card-body pt-0">

                        <div class="form-group mb-0 justify-content-end">
                            <div class="checkbox">
                                <div class="custom-checkbox custom-control">
                                    <p class="mb-2">عند تفعيل هذه الخيار سيتم تفعيل الاعلانات في التطبيق .</p>
                                    <div class=" main-toggle main-toggle-secondary" id="active_ads">
                                        <input type="checkbox" name="active_ads" id="active_ads_input"
                                            style="display: none">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                        </div>
                    </div>

                </div>
            </div>
            <hr>


        </div>
        <div class="py-2 px-3">
            <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">حفظ الأن</button>
        </div>
    </form>
    <!-- End Row Contetnt -->
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <script>
        $('#stop_match').on('click', function() {
            $(this).toggleClass('on');
            let attr = $("#stop_match_input").attr('checked');

            if (attr == undefined) {
                console.log(true);
                $("#stop_match_input").attr('checked', 'checked');
            } else {

                $("#stop_match_input").removeAttr('checked');
                console.log(false);


            }
        });

        $('#stop_slider').on('click', function() {
            $(this).toggleClass('on');
            let attr = $("#stop_slider_input").attr('checked');

            if (attr == undefined) {
                console.log(true);
                $("#stop_slider_input").attr('checked', 'checked');
            } else {

                $("#stop_slider_input").removeAttr('checked');
                console.log(false);


            }
        });
        $('#active_ads').on('click', function() {
            $(this).toggleClass('on');
            let attr = $("#active_ads_input").attr('checked');

            if (attr == undefined) {
                console.log(true);
                $("#active_ads_input").attr('checked', 'checked');
            } else {

                $("#active_ads_input").removeAttr('checked');
                console.log(false);


            }
        });
    </script>
@endsection
