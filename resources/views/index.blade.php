@extends('layouts.master')
@section('css')
<link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بك مجدداً , {{auth()->user()->full_name}}</h2>
						  <p class="mg-b-0">نتمنى لك يوماً مليئ بالنشاط والابداع .</p>
						</div>
					</div>
					<div class="main-dashboard-header-right">

						<div>
							<label class="tx-13">نشط الأن</label>
							<h5>{{$users->where('is_online',true)->count()}}</h5>
						</div>
						<div>
							<label class="tx-13">غير نشط</label>
							<h5>{{$users->where('is_online',false)->count()}}</h5>
						</div>
					</div>
				</div>
			
				<!-- /breadcrumb -->
@endsection
@section('content')
@if(auth()->user()->jop_title == "Admin")

<div>



				<!-- row -->
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-primary-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon">
										<i class="icon icon-people"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">كل المستخدمين</h5>
										<h2 class="counter mb-0 text-white">{{$users->count()}}</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-danger-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-warning">
										<i class="far fa-eye"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">مشاهدات اليوم</h5>
										<h2 class="counter mb-0 text-white">{{$views}}</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-success-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-primary">
                                        <i class="far fa-futbol"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3"> مباريات اليوم</h5>
										<h2 class="counter mb-0 text-white">{{$mobara->count()}}</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-warning-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-success">
                                        <i class="far fa-user"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">جميع الموظفين</h5>
										<h2 class="counter mb-0 text-white">{{$employees->count()}}</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-md-12 col-lg-12 col-xl-7">
                        <div class="card overflow-hidden">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									مخطط الزوار اليومي
								</div>
								<p class="mg-b-20">عدد الزوار اليوم للموقع مقارنة باليوم السابق</p>
								<div class="chartjs-wrapper-demo"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
									<canvas id="chartStacked1" width="717" height="375" style="display: block; height: 300px; width: 574px;" class="chartjs-render-monitor"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-xl-5">
						<div class="card">
							<div class="card-header pb-1">
								<h3 class="card-title mb-2">أخر التسجيلات</h3>
								<p class="tx-12 mb-0 text-muted">عرض لأخل عمليات التسجيل في التطبيق .</p>
							</div>
							<div class="card-body p-0 customers mt-1">
								<div class="list-group list-lg-group list-group-flush">
									@foreach($users->take(5) as $user)
									<a class="list-group-item list-group-item-action" href="{{route('users.show',$user->id)}}">
										<div class="media mt-0">
											{{-- <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{Storage::url($user->avater)}}" alt="Image description"> --}}
											<div class="media-body">
												<div class="d-flex align-items-center">
													<div class="mt-0">
														<h5 class="mb-1 tx-15">{{$user->full_name}}</h5>
														<p class="mb-0 tx-13 text-muted">{{$user->created_at->diffForHumans()}}</p>
													</div>
													<span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark1" class="wd-100p"></div>
													</span>
												</div>
											</div>
										</div>
									</a>
									@endforeach
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->



				<!-- row opened -->
				<div class="row row-sm row-deck">
					<div class="col-md-12 col-lg-4 col-xl-4">
						<div class="card card-dashboard-eight pb-2">
							<h6 class="card-title">أكثر المستخدمين المتفاعلين</h6><span class="d-block mg-b-10 text-muted tx-12">عرض اكثر المستخدمين تفاعلاً على التطبيق</span>
							<div class="list-group">
								@foreach ($users->skip(5)->take(5) as $user)
									
								<div class="list-group-item border-top-0">
									{{-- <i class="flag-icon flag-icon-us flag-icon-squared"></i> --}}
									<p>{{$user->full_name}}</p><span><a href="{{route('users.show',$user->id)}}"><i class="far fa-eye"></i></a></span>
								</div>

								@endforeach
	
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-8 col-xl-8">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">أخر عمليات بحث</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">عرض أخر عمليات بحث على التطبيق .</span>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">التاريخ</th>
											<th class="wd-lg-25p tx-right">توقيت البحث</th>
											<th class="wd-lg-25p tx-right">عملية البحث</th>
											<th class="wd-lg-25p tx-right">المستخدم</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($search  as $s)
										<tr>
											<td>{{$s->created_at->format('Y/m/d')}}</td>
											<td class="tx-right tx-medium tx-inverse">{{$s->created_at->diffForhumans()}}</td>
											<td class="tx-right tx-medium tx-inverse">{{$s->content}}</td>
											<td class="tx-right tx-medium tx-inverse">{{$s->user->full_name}}({{$s->user->id}})</td>
										</tr>
										@endforeach
										
                                
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>

</div>


				@else
				<div>

					<div >
						<p class=" bg-success text-center" style="font-size: 17px;color : #fff;padding: 7px;">اللوحة ما وزالت تحت التطوير</p>
					</div>

					<!-- row -->
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="card  bg-primary-gradient">
								<div class="card-body">
									<div class="counter-status d-flex md-mb-0">
										<div class="counter-icon">
											<i class="icon icon-people"></i>
										</div>
										<div class="mr-auto">
											<h5 class="tx-13 tx-white-8 mb-3">كل مشاركاتك</h5>
											<h2 class="counter mb-0 text-white">{{$postUser}}</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="card  bg-danger-gradient">
								<div class="card-body">
									<div class="counter-status d-flex md-mb-0">
										<div class="counter-icon text-warning">
											<i class="far fa-eye"></i>
										</div>
										<div class="mr-auto">
											<h5 class="tx-13 tx-white-8 mb-3">مشاهدات اليوم</h5>
											<h2 class="counter mb-0 text-white">{{$views}}</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="card  bg-success-gradient">
								<div class="card-body">
									<div class="counter-status d-flex md-mb-0">
										<div class="counter-icon text-primary">
											<i class="far fa-futbol"></i>
										</div>
										<div class="mr-auto">
											<h5 class="tx-13 tx-white-8 mb-3"> مباريات اليوم</h5>
											<h2 class="counter mb-0 text-white">{{$mobara->count()}}</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="card  bg-warning-gradient">
								<div class="card-body">
									<div class="counter-status d-flex md-mb-0">
										<div class="counter-icon text-success">
											<i class="far fa-user"></i>
										</div>
										<div class="mr-auto">
											<h5 class="tx-13 tx-white-8 mb-3">جميع الموظفين</h5>
											<h2 class="counter mb-0 text-white">{{$employees->count()}}</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- row closed -->
	
	
					<!-- row opened -->
					<div class="row row-sm row-deck">
					
						<div class="col-md-12 col-lg-12 col-xl-12">
							<div class="card card-table-two">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-1">أخر عمليات بحث</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<span class="tx-12 tx-muted mb-3 ">عرض أخر عمليات بحث على التطبيق .</span>
								<div class="table-responsive country-table">
									<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
										<thead>
											<tr>
												<th class="wd-lg-25p">التاريخ</th>
												<th class="wd-lg-25p tx-right">توقيت البحث</th>
												<th class="wd-lg-25p tx-right">عملية البحث</th>
												<th class="wd-lg-25p tx-right">المستخدم</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($search  as $s)
											<tr>
												<td>{{$s->created_at->format('Y/m/d')}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$s->created_at->diffForhumans()}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$s->content}}</td>
												<td class="tx-right tx-medium tx-inverse">{{$s->user->full_name}}</td>
											</tr>
											@endforeach
											
									
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
	
	</div>
				@endif
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>

<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>

<!--Internal Counters -->
<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
<!--Internal Time Counter -->
<script src="{{asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
<script src="{{asset('assets/plugins/counters/counter.js')}}"></script>

<script>
    var ctx6 = document.getElementById('chartStacked1');
	new Chart(ctx6, {
		type: 'bar',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
			datasets: [{
				data: [10, 24, 20, 25, 35, 50],
				backgroundColor: '#007bff',
				borderWidth: 1,
				fill: true
			}, {
				data: [10, 24, 20, 25, 35, 50],
				backgroundColor: '#58a2f1',
				borderWidth: 1,
				fill: true
			}, {
				data: [20, 30, 28, 33, 45, 65],
				backgroundColor: '#c9e1fb',
				borderWidth: 1,
				fill: true
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false,
				labels: {
					display: false
				}
			},
			scales: {
				yAxes: [{
					stacked: true,
					ticks: {
						beginAtZero: true,
						fontSize: 11,
						fontColor: "rgb(171, 167, 167,0.9)",
					},
					gridLines: {
						display: true,
						color: 'rgba(171, 167, 167,0.2)',
						drawBorder: false
					},
				}],
				xAxes: [{
					barPercentage: 0.5,
					stacked: true,
					ticks: {
						fontSize: 11,
						fontColor: "rgb(171, 167, 167,0.9)",
					},
					gridLines: {
						display: true,
						color: 'rgba(171, 167, 167,0.2)',
						drawBorder: false
					},
				}]
			}
		}
	});
</script>
@endsection
