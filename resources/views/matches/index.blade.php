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
									<h4 class="card-title mg-b-0">كل المقالات</h4>
                                    <div class="btn-group">
										<button class="btn btn-light"><i class="bx bx-refresh"></i></button> <button class="btn btn-light "><i class="bx bx-archive"></i></button>  <button class="btn btn-light disabled"><i class="bx bx-trash"></i></button>
									</div>
                                    <div class="pr-1 mb-3 mb-xl-0">
                                        <button type="button" class="btn btn-primary btn-icon ml-2"><i class="typcn typcn-edit"></i></button>
                                    </div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>

											<tr>
                                               <th class="wd-lg-20p"><span><label class="ckbox"><input id="checkAll" type="checkbox"> <span></span></label></span></th>
												<th class="wd-lg-8p"><span>المقالة وعنوانها</span></th>
												<th class="wd-lg-20p"><span></th>
												<th class="wd-lg-20p"><span>تاريخ النشر</span></th>
												<th class="wd-lg-20p"><span>الحالة</span></th>
												<th class="wd-lg-20p"><span>الناشر</span></th>
												<th class="wd-lg-20p">الحدث</th>
											</tr>
										</thead>
										<tbody>
                                            <tr>
                                                <td><label class="ckbox"><input type="checkbox"> <span></span></label></td>
												<td colspan="2" class="title-post">

                                                    عاجل الان انتقال رونالدو لفريق ليفربول الانجليزي بصفقة خيالية ..	</td>
												<td>
													08/06/2020
												</td>
												<td class="text-center">
													<span class="label text-warning d-flex"><div class="dot-label bg-warning ml-1"></div>تحت المراجعة</span>
												</td>
												<td>
													<a href="#">سامر سعدان</a>
												</td>
												<td>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="far fa-eye"></i>
													</a>
													<a href="#" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
													<a href="#" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
                                            <tr>
                                                <td><label class="ckbox"><input type="checkbox"> <span></span></label></td>
												<td colspan="2" class="title-post">

                                                    عاجل الان انتقال رونالدو لفريق ليفربول الانجليزي بصفقة خيالية ..	</td>
												<td>
													08/06/2020
												</td>
												<td class="text-center">
													<span class="label text-muted d-flex"><div class="dot-label bg-gray-300 ml-1"></div>تحت التعديل</span>
												</td>
												<td>
													<a href="#">سامر سعدان</a>
												</td>
												<td>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="far fa-eye"></i>
													</a>
													<a href="#" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
													<a href="#" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
                                            <tr>
                                                <td><label class="ckbox"><input type="checkbox"> <span></span></label></td>
												<td colspan="2" class="title-post">عاجل الان انتقال رونالدو لفريق ليفربول الانجليزي بصفقة خيالية ..	</td>
												<td>
													08/06/2020
												</td>
												<td class="text-center">
													<span class="label text-warning d-flex"><div class="dot-label bg-warning ml-1"></div>تحت المراجعة</span>
												</td>
												<td>
													<a href="#">سامر سعدان</a>
												</td>
												<td>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="far fa-eye"></i>
													</a>
													<a href="#" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
													<a href="#" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
                                            <tr>
                                                <td><label class="ckbox"><input type="checkbox"> <span></span></label></td>
												<td colspan="2" class="title-post">عاجل الان انتقال رونالدو لفريق ليفربول الانجليزي بصفقة خيالية ..	</td>
												<td>
													08/06/2020
												</td>
												<td class="text-center">
													<span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>تم النشر</span>
												</td>
												<td>
													<a href="#">سامر سعدان</a>
												</td>
												<td>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="far fa-eye"></i>
													</a>
													<a href="#" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
													<a href="#" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
                                            <tr>
                                                <td><label class="ckbox"><input type="checkbox"> <span></span></label></td>
												<td colspan="2" class="title-post">عاجل الان انتقال رونالدو لفريق ليفربول الانجليزي بصفقة خيالية ..	</td>
												<td>
													08/06/2020
												</td>
												<td class="text-center">
													<span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div> تم الرفض</span>
												</td>
												<td>
													<a href="#">سامر سعدان</a>
												</td>
												<td>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="far fa-eye"></i>
													</a>
													<a href="#" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
													<a href="#" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<ul class="pagination mt-4 mb-0 float-left">
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
								</ul>
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
