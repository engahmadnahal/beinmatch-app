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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">ادارة الصلاحيات للموظفين</h2>

            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- Row Content -->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">اعطاء الصلاحيات لـ {{$employee->full_name}}</h4>
                        <div class="btn-group">
                            <button class="btn btn-light" onclick="document.location.reload()"><i class="bx bx-refresh"></i>
                            </button>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>اسم الاذن</span></th>
                                    <th class="wd-lg-8p"><span>نوع المستخدم</span></th>
                                    <th class="wd-lg-8p"><span>الحدث</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td colspan="1">
                                            {{$permission->name}}
                                        </td>
                                        <td>
                                            {{$permission->guard_name}}
                                        </td>
                                        <td >
										<label class="ckbox">
                                            <input type="checkbox"
                                            @if($permission->assign)
                                            checked
                                            @endif
                                            onchange="updateUser('{{$permission->id}}')" ><span></span>
                                        </label>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- End Row Contetnt -->
    </div>
    <!-- Container closed -->
@endsection
@section('js')

    <script>

        function updateUser(permission) {

            axios.put('/employees/{{$employee->id}}/permission/update', {
                user_id: '{{$employee->id}}',
                permission_id: permission
            }).then(function(response) {
                toastr.success(response.data.msg);

            }).catch(function(error) {
                toastr.error(error.response.data.msg);
            });
        }
        //-----
        //-----
        // $('#checkAll').on('click', function() {
        // 	if ($(this).is(':checked')) {
        // 		$('.ckbox input').each(function() {
        // 			$(this).attr('checked', true);
        // 		});
        // 	} else {
        // 		$('.ckbox input').each(function() {
        // 			$(this).attr('checked', false);
        // 		});
        // 	}
        // });
        // $('input').on('click', function() {
        // 	if ($(this).is(':checked')) {
        // 		$(this).attr('checked', false);
        // 	} else {
        // 		$(this).attr('checked', true);
        // 	}
        // });


        $('#checkAll').on('click', function() {
            if ($(this).is(':checked')) {
                $('tr .ckbox input').each(function() {
                    $(this).closest('tr').addClass('selected');
                    $(this).attr('checked', true);
                });
                $('.btn-group .btn:last-child').removeClass('disabled');
            } else {
                $('tbody .ckbox input').each(function() {
                    $(this).closest('tr').removeClass('selected');
                    $(this).attr('checked', false);
                });
                $('.btn-group .btn:last-child').addClass('disabled');
            }
        });
        $('tbody td input').on('click', function() {
            if ($(this).is(':checked')) {
                $(this).attr('checked', false);
                $(this).closest('tr').addClass('selected');
                $('.btn-group .btn:last-child').removeClass('disabled');
            } else {
                $(this).attr('checked', true);
                $(this).closest('tr').removeClass('selected');
                if (!$('tbody .selected').length) {
                    $('.btn-group .btn:last-child').addClass('disabled');
                }
            }
        });
    </script>
@endsection
