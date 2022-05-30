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
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">المقالات المحذوفة</h2>
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
									<h4 class="card-title mg-b-0">المحذوفات</h4>


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
												<th class="wd-lg-20p"><span>تاريخ الحذف</span></th>
												<th class="wd-lg-20p"><span>الحالة</span></th>
												<th class="wd-lg-20p"><span>الناشر</span></th>
												<th class="wd-lg-20p">الحدث</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($mobara as $item)
                                                <tr>
                                                    {{-- <td><label class="ckbox"><input type="checkbox"> <span></span></label></td> --}}
                                                    <td colspan="2" class="title-post">

                                                        {{$item->title}}
                                                    </td>
                                                    <td>
                                                        {{$item->deleted_at->format('Y-m-d')}}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div>حُذفت</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('employees.show',$item->employee->id)}}">{{$item->employee->full_name}}</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{route('mobaras.restor',$item->id)}}" method="post" class="btn btn-sm btn-info">
                                                            @csrf
                                                            <button type="submit" class="btn-empty"><i class="icon ion-ios-share-alt"></i></button>
                                                        </form>
                                                        {{-- <a href="#" class="btn btn-sm btn-danger">
                                                            <i class="las la-trash"></i>
                                                        </a> --}}
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
