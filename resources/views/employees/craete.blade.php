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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">اضافة موظف</h2>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- Row Content -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <form id='emp_form'>
                <div class="card">
                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">الاعدادات</div>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label class="form-label">المسى الوظيفي </label>
                            <select name="job_title" class="form-control nice-select custom-select" id="job_title"
                                style="display: none;">
                                <option>--تحديد--</option>
                                <option value="Admin">Admin</option>
                                <option value="Writer">Writer</option>
                            </select>
                            <br>
                            <br>

                            <label class="form-label">تفعيل</label>
                            <div class="active main-toggle main-toggle-secondary">
                                <input type="checkbox" name="status" id="status" style="display: none">
                                <span></span>
                            </div>


                        </div>
                    </div>

                    <div class="py-2 px-3">
                        <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="button" onclick="performStored()">حفظ
                            الأن</button>
                    </div>
                </div>

        </div>

        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            معلومات الموضف
                        </div>
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">الاسم الاول : </label>
                                    <input class="form-control" type="text" placeholder="الاسم الاول " name="first_name"
                                        id="first_name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">الاسم الثاني : </label>
                                    <input class="form-control" type="text" placeholder="الاسم الثاني" name="last_name"
                                        id="last_name">
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">الايميل : </label>
                                    <input class="form-control" type="text" placeholder="الايميل" name="email" id="email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">رقم الهاتف : </label>
                                    <input class="form-control" type="text" placeholder="رقم الهاتف " name="phone"
                                        id="phone">
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">الجنس : </label>
                                    <select name="gender_emp" id="gender" class="form-control nice-select custom-select"
                                        style="display: none;">
                                        <option value="0">--الجنس--</option>
                                        <option value="M">ذكر</option>
                                        <option value="F">انثى</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">مكان السكن : </label>
                                    <input class="form-control" type="text" placeholder="مكان السكن " name="address"
                                        id="address">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">مقدار الراتب : </label>
                                    <input class="form-control" type="text" placeholder="الراتب" name="salary"
                                        id="salary">
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
        $('.active').on('click', function() {
            $(this).toggleClass('on');
            let attr = $("#status").attr('checked');

            if (attr == undefined) {
                $("#status").attr('checked', 'checked');
            } else {

                $("#status").removeAttr('checked');


            }
        });

        // Axios Send Data

        function performStored() {
            axios.post('/employees', {
                    fname: document.getElementById('first_name').value,
                    lname: document.getElementById('last_name').value,
                    email: document.getElementById('email').value,
                    salary: document.getElementById('salary').value,
                    address: document.getElementById('address').value,
                    gender: document.getElementById('gender').value,
                    phone: document.getElementById('first_name').value,
                    status: document.getElementById('status').checked,
                    job_title: document.getElementById('job_title').value,
                })
                .then(function(response) {
                    toastr.success(response.data.msg);
                    document.getElementById('emp_form').reset();
                })
                .catch(function(error) {
                    toastr.error(error.response.data.msg);

                });
        }
    </script>
@endsection
