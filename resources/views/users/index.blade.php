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
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">المستخدمين</h2>

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
									<h4 class="card-title mg-b-0">كل المستخدمين</h4>
                                    <div class="btn-group">
										<button class="btn btn-light"><i class="bx bx-refresh"></i></button> <button class="btn btn-light "><i class="bx bx-archive"></i></button>  <button class="btn btn-light disabled"><i class="bx bx-trash"></i></button>
									</div>

								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>

											<tr>
                                               <th class="wd-lg-20p"><span><label class="ckbox"><input id="checkAll" type="checkbox"> <span></span></label></span></th>
												<th class="wd-lg-8p"><span>اسم المستخدم</span></th>
												<th class="wd-lg-20p"><span>تاريخ الانضمام</span></th>
												<th class="wd-lg-20p"><span>حالة الايميل</span></th>
												<th class="wd-lg-20p"><span>النشاط</span></th>
												<th class="wd-lg-20p"><span>نوع الهاتف</span></th>
												<th class="wd-lg-20p">الحدث</th>
											</tr>
										</thead>
										<tbody>
                                            <tr>
                                                <td><label class="ckbox"><input type="checkbox"> <span></span></label></td>
												<td colspan="1" class="title-post">

                                                    محمد سعيد	</td>
												<td>
													08/06/2020
												</td>
												<td class="text-center">
													<span class="label text-warning d-flex"><div class="dot-label bg-warning ml-1"></div>غير مفعل</span>
												</td>
												<td>
													<span class="label text-muted d-flex"><div class="dot-label bg-gray-300 ml-1"></div>غير نشط</span>
												</td>
                                                <td>
													Android
												</td>
												<td>
                                                    <a href="#" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="far fa-eye"></i>
													</a>
													<a href="#" class="btn btn-sm btn-danger">
														<i class="las la-lock"></i>
													</a>
												</td>
											</tr>

                                            <tr>
                                                <td><label class="ckbox"><input type="checkbox"> <span></span></label></td>
												<td colspan="1" class="title-post">

                                                    محمد نادر	</td>
												<td>
													08/09/2020
												</td>
												<td class="text-center">
													<span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div> مفعل</span>
												</td>
												<td>
													<span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>نشط</span>
												</td>
                                                <td>
													Android
												</td>
												<td>
                                                    <a href="#" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="far fa-eye"></i>
													</a>
													<a href="#" class="btn btn-sm btn-danger">
														<i class="las la-lock"></i>
													</a>
												</td>
											</tr>

                                             <tr>
                                                <td><label class="ckbox"><input type="checkbox"> <span></span></label></td>
												<td colspan="1" class="title-post">

                                                    محمد نادر	</td>
												<td>
													08/09/2020
												</td>
												<td class="text-center">
													<span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div> مفعل</span>
												</td>
												<td>
													<span class="label text-muted d-flex"><div class="dot-label bg-gray-300 ml-1"></div>غير نشط</span>
												</td>
                                                <td>
                                                    iPhone
												</td>
												<td>
                                                    <a href="#" class="btn btn-sm btn-danger">
														<i class="las la-trash"></i>
													</a>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="far fa-eye"></i>
													</a>
													<a href="#" class="btn btn-sm btn-danger">
														<i class="las la-lock"></i>
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
