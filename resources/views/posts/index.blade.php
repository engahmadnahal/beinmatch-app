@extends('layouts.master')
@section('css')
    <style>
        tbody tr {
            height: 80px;
        }

        table {
            position: relative;
        }

        .loadData {
            width: 100%;
            height: 100%;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            z-index: 99;
        }

    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">المنشورات</h2>
                <p class="mg-b-0">عرض كل المنشورات</p>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-success btn-icon ml-2" onclick="performGetPost('done')">نُشر</button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning btn-icon ml-2" onclick="performGetPost('wite')">يُراجع</button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger  btn-icon ml-2" onclick="performGetPost('cancel')">رُفض</button>
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
                        <h4 class="card-title mg-b-0">كل المنشورات</h4>
                        <div class="btn-group">
                            <button class="btn btn-light"><i class="bx bx-refresh"></i></button>
                            @can('Delete-Post')
                            <a class="btn btn-light " href="{{ route('posts.trush') }}"><i class="bx bx-archive"></i></a>
                            <button class="btn btn-light disabled" onclick="preformDeleteAll()"><i
                                    class="bx bx-trash"></i></button>
                            @endcan

                        </div>
                        <div class="pr-1 mb-3 mb-xl-0">
                            @can('Create-Post')
                            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-icon ml-2"><i
                                    class="typcn typcn-edit"></i></a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>

                                <tr>
                                    <th class="wd-lg-20p"><span><label class="ckbox"><input id="checkAll"
                                                    type="checkbox"> <span></span></label></span></th>
                                    <th class="wd-lg-8p"><span>المباراة وعنوانها</span></th>
                                    <th class="wd-lg-20p"><span></th>
                                    <th class="wd-lg-20p"><span>تاريخ النشر</span></th>
                                    <th class="wd-lg-20p"><span>الحالة</span></th>
                                    <th class="wd-lg-20p"><span>الناشر</span></th>
                                    <th class="wd-lg-20p">الحدث</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td><label class="ckbox"><input type="checkbox" class="checkDelete"
                                                    value="{{ $post->id }}"> <span></span></label></td>
                                        <td colspan="2" class="title-post">
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            {{ $post->created_at->format('Y/m/d') }}
                                        </td>
                                        <td class="text-center">
                                            @if (is_null($post->publish_at))
                                                <span class="label text-muted d-flex">
                                                    <div class="label text-muted d-flex"></div>
                                                    تحت التعديل
                                                </span>
                                            @elseif ($post->status == 'wite')
                                                <span class="label text-warning d-flex">
                                                    <div class="dot-label bg-warning ml-1"></div>
                                                    تحت المراجعة
                                                </span>
                                            @elseif ($post->status == 'done')
                                                <span class="label text-success d-flex">
                                                    <div class="dot-label bg-success ml-1"></div>
                                                    تم النشر
                                                </span>
                                            @elseif ($post->status == 'cancel')
                                                <span class="label text-danger d-flex">
                                                    <div class="dot-label bg-danger ml-1"></div>
                                                    تم الرفض
                                                </span>
                                            @endif

                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('employees.show', $post->employee->id) }}">{{ $post->employee->full_name }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-info">
                                                <i class="las la-pen"></i>
                                            </a>
                                            @can('Delete-Post')
                                            <form action="{{ route('posts.destroy', $post->id) }}"
                                                class="btn btn-sm btn-danger" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-empty"><i
                                                        class="las la-trash"></i></button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <ul class="pagination mt-4 mb-0 float-left">
									<li class="page-item page-prev disabled">
										<a class="page-link" href="#" tabindex="-1">Prev</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">4</a></li>
									<li class="page-item"><a class="page-link" href="#">5</a></li>
									<li class="page-item page-next">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul> --}}
                    {{ $posts->links('pagination::bootstrap-4') }}
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
                    $(this).attr('checked', true);
                    $(this).closest('tr').addClass('selected');
                    $('.btn-group .btn:last-child').removeClass('disabled');

                });
            } else {
                $('tbody .ckbox input').each(function() {
                    $(this).closest('tr').removeClass('selected');
                    $(this).attr('checked', false);
                });
                $('.btn-group .btn:last-child').addClass('disabled');
                $(this).attr('checked', false);
            }
        });
        $('tbody td input').on('click', function() {
            if ($(this).is(':checked')) {
                console.log(true);
                $(this).attr('checked', true);
                $(this).closest('tr').addClass('selected');
                $('.btn-group .btn:last-child').removeClass('disabled');
            } else {
                $(this).attr('checked', false);
                $(this).closest('tr').removeClass('selected');
                if (!$('tbody .selected').length) {
                    $('.btn-group .btn:last-child').addClass('disabled');
                }
            }
        });

        function preformDeleteAll() {
            let selectedItem = [];
            if (!$('.btn-group .btn:last-child').hasClass('disabled')) {
                $('.checkDelete').each(function(e) {
                    if (this.checked) {
                        selectedItem.push(this.value);
                    }
                });
            } else {
                alert('يجب عليك تحديد بعض المقالات')
            }

            axios.post('/posts/delete-all', {
                items: selectedItem
            }).then(function(response) {
                toastr.success(response.data.msg);
                $('.checkDelete').each(function(e) {
                    if (this.checked) {
                        $(this).closest('tr').remove();
                    }
                });
            }).catch(function(error) {
                toastr.error(error.response.data.msg);
            });

        }


        function performGetPost(status) {
            let getUrl;
            let loading =
                `<div class="loadData"><div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div></div>`;
            let statusElemnt = {
                'done': '<span class="label text-success d-flex"> <div class="dot-label bg-success ml-1"></div> تم النشر </span>',
                'wite': '<span class="label text-warning d-flex"> <div class="dot-label bg-warning ml-1"></div> تحت المراجعة </span>',
                'cancel': '<span class="label text-danger d-flex"> <div class="dot-label bg-danger ml-1"></div> تم الرفض </span>',
                'edit': '<span class="label text-muted d-flex"> <div class="label text-muted d-flex"></div> تحت التعديل </span>'
            };



            if (status == 'done') {
                getUrl = "/posts/publish";
            } else if (status == 'wite') {
                getUrl = "/posts/wait";
            } else if (status == 'cancel') {
                getUrl = "/posts/cancel";
            } else {
                toastr.error("Error Url get Data !");
            }
            $('table tbody').prepend(loading);
            axios.get(getUrl).then(function(response) {
                $('table tbody').html('');
                for(let i = 0 ; i < response.data.posts.data.length; i++){
                    let getStatusEle;
                    let token = '@csrf';
                    let method = '@method("delete")';
                    let full_name_emp = response.data.posts.data[i].employee.fname +" "+response.data.posts.data[i].employee.lname
                    if(response.data.posts.data[i].publish_at == null){
                        getStatusEle = statusElemnt.edit;
                    }else if(response.data.posts.data[i].status == "wite"){
                        getStatusEle = statusElemnt.wite;
                    }else if(response.data.posts.data[i].status == "done"){
                        getStatusEle = statusElemnt.done;
                    }else if(response.data.posts.data[i].status == "cancel"){
                        getStatusEle = statusElemnt.cancel;
                    }
                    let tableRow = `
                        <tr>
                            <td><label class="ckbox"><input type="checkbox" class="checkDelete" value="43"> <span></span></label></td>
                            <td colspan="2" class="title-post">
                                `+response.data.posts.data[i].title+`
                            </td>
                            <td>
                                `+response.data.posts.data[i].created_at+`
                            </td>
                            <td class="text-center">
                                `+getStatusEle+`
                            </td>
                            <td>
                                <a href="/employees/`+response.data.posts.data[i].employee_id+`">`+full_name_emp+`</a>
                            </td>
                            <td>
                                <a href="/posts/`+response.data.posts.data[i].id+`" class="btn btn-sm btn-primary">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="/posts/`+response.data.posts.data[i].id+`/edit" class="btn btn-sm btn-info">
                                    <i class="las la-pen"></i>
                                </a>
                                <form action="/posts/`+response.data.posts.data[i].id+`" class="btn btn-sm btn-danger" method="post">
                                    `+token+`
                                    `+method+`
                                    <button type="submit" class="btn-empty"><i class="las la-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    `;

                        $('table tbody').prepend(tableRow);
                }
                $('.loadData').remove();
                console.log(response.data.posts.data);
                toastr.success("Get Data is Success");
            }).catch(function(error) {
                $('.loadData').remove();
                toastr.error("Get Data Error , data is empty or error !");
            });

        }
    </script>
@endsection
