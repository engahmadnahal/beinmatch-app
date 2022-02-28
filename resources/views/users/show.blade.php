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
								<h3 class="widget-user-username">فارس غازي</h3>
							</div>
							<div class="widget-user-image" >
								<img src="http://bein.test/assets/img/faces/17.jpg" class="brround" alt="User Avatar " id="avater">
							</div>
							<div class="user-wideget-footer">
								<div class="row">
									<div class="col-sm-4 border-left">
										<div class="description-block">
											<h5 class="description-header">نوع الجهاز</h5>
											<span class="description-text">Android</span>
										</div>
									</div>
									<div class="col-sm-4 border-left">
										<div class="description-block">
											<h5 class="description-header">اسم المستخدم </h5>
											<span class="description-text">ahmadnaha.12 - (USERID#123521)</span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="description-block">
											<h5 class="description-header">البلد</h5>
											<span class="description-text">فلسطين</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class='col-12'>
                        <input type="file" class="dropify" data-height="200" id="img_profile" >
						<div class="py-2 px-3">
                    <button class="saveImg btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit" style="display: none">حفظ الأن</button>
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
									<h4 class="card-title">الدوريات الرياضية</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
							</div>
							<p class="tx-12 tx-gray-500 mb-0 pl-3 pr-3">أخر الدوريات التي نالت على اعجاب المستخدم</p>
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
									<h4 class="card-title">الفرق الرياضية</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
							</div>
							<p class="tx-12 tx-gray-500 mb-0 pl-3 pr-3">أخر الفرق التي نالت على اعجاب المستخدم</p>
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
									<h4 class="card-title">الاعجابات</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
							</div>
							<p class="tx-12 tx-gray-500 mb-0 pl-3 pr-3">أخر الاعجابات التي قام بها المستخدم</p>
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
                <!-- Chart -->
                <div class="row row-sm">
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									نشاط المستخدم
								</div>
								<p class="mg-b-20">مخطط النشاط والتفاعلات اليومي</p>
								<div class="ht-200 ht-sm-300" id="flotLine1" style="padding: 0px; position: relative;"><canvas class="flot-base" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 19px; text-align: center;">0.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 109px; text-align: center;">1.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 199px; text-align: center;">2.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 289px; text-align: center;">3.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 379px; text-align: center;">4.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 469px; text-align: center;">5.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 559px; text-align: center;">6.0</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 276px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">0.0</div><div style="position: absolute; top: 230px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">2.5</div><div style="position: absolute; top: 185px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">5.0</div><div style="position: absolute; top: 139px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">7.5</div><div style="position: absolute; top: 93px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">10.0</div><div style="position: absolute; top: 48px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 121.425px; height: 38.975px; top: 13px; left: 31px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;left:31px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #007bff;overflow:hidden"></div></div></td><td class="legendLabel">New Customer</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #f7557a;overflow:hidden"></div></div></td><td class="legendLabel">الأمس</td></tr></tbody></table></div></div>
							</div>
						</div>
					</div><!-- col-6 -->
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									التفاعلات								</div>
								<p class="mg-b-20">التفاعل في التطبيق</p>
								<div class="ht-200 ht-sm-300" id="flotLine2" style="padding: 0px; position: relative;"><canvas class="flot-base" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 19px; text-align: center;">0.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 109px; text-align: center;">1.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 199px; text-align: center;">2.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 289px; text-align: center;">3.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 379px; text-align: center;">4.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 469px; text-align: center;">5.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 559px; text-align: center;">6.0</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 276px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">0.0</div><div style="position: absolute; top: 230px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">2.5</div><div style="position: absolute; top: 185px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">5.0</div><div style="position: absolute; top: 139px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">7.5</div><div style="position: absolute; top: 93px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">10.0</div><div style="position: absolute; top: 48px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 121.425px; height: 38.975px; top: 13px; left: 31px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;left:31px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #007bff;overflow:hidden"></div></div></td><td class="legendLabel">New Customer</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #f7557a;overflow:hidden"></div></div></td><td class="legendLabel">الأمس</td></tr></tbody></table></div></div>
							</div>
						</div>
					</div><!-- col-6 -->
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
