{{--

    ستكون صفحة فارغة تحوي على مشغلات لعرض البث لاختبار البث المباشر

    --}}

@extends('layouts.master')
@section('css')
 <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<style>
    tbody tr {
    height: 80px;
}
.dropify-wrapper{
    display: none;
}
</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->

@endsection
@section('content')
                <div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body h-100">
								<div class="row row-sm ">
									<div class="col-sm-12 col-xl-12 col-lg-12">
						<div class="card user-wideget user-wideget-widget widget-user">
							<div class="widget-user-header bg-primary">
								<h3 class="widget-user-username">ريال مدريد</h3>
							</div>
							<div class="widget-user-image" >
								<img src="http://bein.test/assets/img/faces/17.jpg" class="brround" alt="User Avatar " id="avater">
							</div>
							<div class="user-wideget-footer">
								<div class="row">
									<div class="col-sm-4 border-left">
										<div class="description-block">
											<h5 class="description-header">الدوري</h5>
											<span class="description-text">الاسباني</span>
										</div>
									</div>
									<div class="col-sm-4 border-left">
										<div class="description-block">
											<h5 class="description-header">عدد المتابعين </h5>
											<span class="description-text">3319</span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="description-block">
											<h5 class="description-header">الدولة</h5>
											<span class="description-text">اسبانيا</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>

                </div>
                </div>
                </div>
                </div>
                <!-- favorits -->
                <div class="row row-sm">
                    <div class="col-md-12 col-lg-6 col-xl-4 col-sm-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title">الترتيب</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
							</div>
							<p class="tx-12 tx-gray-500 mb-0 pl-3 pr-3">ترتيب الفرق في الدوري التابع له الفريق</p>
							<div class="rating-scroll ps ps--active-y">
								<div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>


							</div>
						</div>
					</div>

                    <!-- dawry favorits -->
                    <div class="col-md-12 col-lg-6 col-xl-4 col-sm-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title">أخر المقالات</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
							</div>
							<p class="tx-12 tx-gray-500 mb-0 pl-3 pr-3">أخر المقالات التابعة للفريق</p>
							<div class="rating-scroll ps ps--active-y">
								<div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>


							</div>
						</div>
					</div>
                    <!-- last likes user -->
                    <div class="col-md-12 col-lg-6 col-xl-4 col-sm-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title">مباريات الفريق</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
							</div>
							<p class="tx-12 tx-gray-500 mb-0 pl-3 pr-3">مباريات الفريق ضمن الدوريات</p>
							<div class="rating-scroll ps ps--active-y">
								<div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>
                                <div class="pl-3 pr-3 py-3 border-bottom">
									<div class="media mt-0">
										<div class="d-flex ml-3">
											<a href="#">
												<img class="media-object avatar brround w-7 h-7" alt="64x64" src="http://bein.test/assets/img/faces/5.jpg">
											</a>
										</div>
										<div class="media-body">
											<div class="d-flex">
												<h6 class="mt-0 mb-0 font-weight-semibold ">Joanne Scott</h6>

											</div>
											<div class="d-flex">
												<p class="tx-12 text-muted mb-0">long established fact..</p>
											</div>

										</div>
									</div>
								</div>


							</div>
						</div>
					</div>
                    <!-- end row -->
                </div>

            </div>
		<!-- Container closed -->
        @endsection
@section('js')
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
                <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
                <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
                <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
                <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
                <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var newCust = [
		[0, 2],
		[1, 3],
		[2, 6],
		[3, 5],
		[4, 7],
		[5, 8],
		[6, 10]
	];
        var newCust2 = [
		[0, 20],
		[1, 5],
		[2, 1],
		[3, 9],
		[4, 7],
		[5, 8],
		[6, 10]
	];
	var retCust = [
		[0, 1],
		[1, 2],
		[2, 5],
		[3, 3],
		[4, 5],
		[5, 6],
		[6, 9]
	];

	 var plot = $.plot($('#flotLine1'), [{
		data: newCust2,
		label: 'اليوم',
		color: '#007bff'
	}, {
		data: retCust,
		label: 'الامس',
		color: '#f7557a'
	}], {
		series: {
			lines: {
				show: true,
				lineWidth: 2
			},
			shadowSize: 0
		},
		points: {
			show: false,
		},
		legend: {
			noColumns: 1,
			position: 'nw'
		},
		grid: {
			borderWidth: 1,
			borderColor: 'rgba(171, 167, 167,0.2)',
			hoverable: true
		},
		yaxis: {
			min: 0,
			max: 15,
			color: '#eee',
			tickColor: 'rgba(171, 167, 167,0.2)',
			font: {
				size: 10,
				color: '#999'
			}
		},
		xaxis: {
			color: '#eee',
			tickColor: 'rgba(171, 167, 167,0.2)',
			font: {
				size: 10,
				color: '#999'
			}
		}
	});

    //___________________

     var plot = $.plot($('#flotLine2'), [{
		data: newCust,
		label: 'اليوم',
		color: '#007bff'
	}, {
		data: retCust,
		label: 'الامس',
		color: '#f7557a'
	}], {
		series: {
			lines: {
				show: true,
				lineWidth: 2
			},
			shadowSize: 0
		},
		points: {
			show: false,
		},
		legend: {
			noColumns: 1,
			position: 'nw'
		},
		grid: {
			borderWidth: 1,
			borderColor: 'rgba(171, 167, 167,0.2)',
			hoverable: true
		},
		yaxis: {
			min: 0,
			max: 15,
			color: '#eee',
			tickColor: 'rgba(171, 167, 167,0.2)',
			font: {
				size: 10,
				color: '#999'
			}
		},
		xaxis: {
			color: '#eee',
			tickColor: 'rgba(171, 167, 167,0.2)',
			font: {
				size: 10,
				color: '#999'
			}
		}
	});
                    $('.dropify').dropify({
        messages: {
            'default': 'ارفع صورة المقالة هنا',
            'replace': 'ارفع صورة المقالة هنا',
            'remove': 'حذف',
            'error': 'اوو , حدث خطأ ما !'
        },
        error: {
            'fileSize': 'حجم الصورة كبير اقصى حجم 2 ميجا.'
        }
    });

    // Update avater user
    	$("#avater").click(function(){

		$(".dropify-wrapper,.saveImg").show();

	});
</script>
@endsection
