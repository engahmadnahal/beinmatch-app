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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">ادارة الملفات</h2>
                <p class="mg-b-0">عرض كل الملفات المخزنة</p>
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
                        <h4 class="card-title mg-b-0">كل الرسائل والاشعارات</h4>
                        <div class="btn-group">
                            <button class="btn btn-light"><i class="bx bx-refresh"></i></button>
                             {{-- <button class="btn btn-light disabled"><i class="bx bx-trash"></i></button> --}}
                        </div>
                        <div class="pr-1 mb-3 mb-xl-0">
                            <a href="{{route('manger_files.create')}}" class="btn btn-primary btn-icon ml-2"><i
                                    class="typcn typcn-edit"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>

                                <tr>
                                    <th class="wd-lg-8p"><span>عنوان الملف</span></th>
                                    <th class="wd-lg-20p"><span></th>
                                    <th class="wd-lg-20p"><span>نوع الملف</span></th>
                                    <th class="wd-lg-20p"><span>تاريخ النشر</span></th>
                                    <th class="wd-lg-20p"><span> الحدث</span></th>
                                    {{-- <th class="wd-lg-20p">الحدث</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mangerfiles as $file)
                                <tr>
                                    <td colspan="2" class="title-post">

                                        {{$file->title}}
                                    </td>
                                    <td class="title-post">


                                        <span class="btn btn-sm bg-success" style="color:#fff">{{$file->type_file}}</span>
                                    </td>
                                    <td>
                                        {{$file->created_at->diffForHumans()}}
                                    </td>

                                    <td>

                                        <a href="{{Storage::url($file->file)}}"   target="_blank" class="btn btn-sm btn-info">
                                            <i class="las la-pen"></i>
                                        </a>
                                        <form action="{{route('manger_files.destroy',$file->id)}}" method="post" class="btn btn-sm btn-danger">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-empty">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                   {{-- {{$notifications->links('pagination::bootstrap-4')}} --}}
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
