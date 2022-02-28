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
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">سجل البحث</h2>
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
									<h4 class="card-title mg-b-0">عمليات البحث</h4>

								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>

											<tr>
												<th class="wd-lg-20p"><span>اسم المستخدم</span></th>
												<th class="wd-lg-20p"><span></th>
												<th class="wd-lg-20p"><span>تاريخ البحث</span></th>
												<th class="wd-lg-20p"><span>حالة البحث</span></th>
												<th class="wd-lg-8p"><span>عنوان البحث</span></th>
												<th class="wd-lg-20p"><span></th>

											</tr>
										</thead>
										<tbody>
                                            <tr>
                                                <td colspan="2">
													<a href="#">محمد سعيد - (TOKEN#65as61cas85)</a>
												</td>
												<td>

													08/06/2020
												</td>
												<td class="text-center">
													<span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>وجد</span>
												</td>
                                                <td colspan="2" class="title-post">

                                                   فريق برشلونة</td>


											</tr>
                                               <tr>
                                                <td colspan="2">
													<a href="#">محمد سعيد - (TOKEN#65as61cas85)</a>
												</td>
												<td>

													08/06/2020
												</td>
												<td class="text-center">
													<span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div>وجد</span>
												</td>
                                                <td colspan="2" class="title-post">

                                                   فريق برشلونة</td>


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

</script>
@endsection
