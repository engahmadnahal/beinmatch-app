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
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">المنشورات</h2>
						  <p class="mg-b-0">كل المقالات المنشورة</p>
						</div>
					</div>
<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-success btn-icon ml-2">نُشر</button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning btn-icon ml-2">يُراجع</button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger  btn-icon ml-2">رُفض</button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, 40px, 0px);">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
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
									<h4 class="card-title mg-b-0">كل المباريات</h4>
                                    <div class="btn-group">
										<button class="btn btn-light">
                                            {{-- <i class="bx bx-refresh"></i></button>  --}}
                                            <a class="btn btn-light " href="{{route('mobaras.trush')}}"><i class="bx bx-archive"></i></a>
                                             {{-- <button class="btn btn-light disabled">
                                                 <i class="bx bx-trash"></i>
                                            </button> --}}
									</div>
                                    <div class="pr-1 mb-3 mb-xl-0">
                                        <a href="{{route('mobaras.create')}}" class="btn btn-primary btn-icon ml-2"><i class="typcn typcn-edit"></i></a>
                                    </div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>

											<tr>
                                               {{-- <th class="wd-lg-20p"><span><label class="ckbox"><input id="checkAll" type="checkbox"> <span></span></label></span></th> --}}
												<th class="wd-lg-8p"><span>المباراة وعنوانها</span></th>
												<th class="wd-lg-20p"><span></th>
												<th class="wd-lg-20p"><span>تاريخ النشر</span></th>
												<th class="wd-lg-20p"><span>الحالة</span></th>
												<th class="wd-lg-20p"><span>الناشر</span></th>
												<th class="wd-lg-20p">الحدث</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($mobara as $item)
                                                <tr>
                                                    {{-- <td><label class="ckbox"><input type="checkbox"> <span></span></label></td> --}}
                                                    <td colspan="2" class="title-post">

                                                        {{$item->title}}
                                                    	</td>
                                                    <td>
                                                        {{$item->created_at->format('Y-m-d')}}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="label {{!is_null($item->publish_at) ? "text-success" :"text-warning" }} d-flex"><div class="dot-label {{!is_null($item->publish_at) ? "bg-success" :"bg-warning" }}  ml-1">

                                                        </div>
                                                            {{$item->status}}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('employees.show',$item->employee->id)}}">{{$item->employee->full_name}}</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('mobaras.show',$item->id)}}" class="btn btn-sm btn-primary">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                        <a href="{{route('mobaras.edit',$item->id)}}" class="btn btn-sm btn-info">
                                                            <i class="las la-pen"></i>
                                                        </a>
                                                        <form action="{{route('mobaras.destroy',$item->id)}}" method='post' class="btn btn-sm btn-danger">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-empty"><i class="las la-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

										</tbody>
									</table>
								</div>
								{{$mobara->links('pagination::bootstrap-4')}}
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
