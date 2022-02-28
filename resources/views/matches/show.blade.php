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
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">التفاصيل</h2>
						  <p class="mg-b-0">عرض جميع تفاصيل المفالة</p>
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
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="pic-1"><img src="http://localhost/assets/img/ecommerce/shirt-5.png" alt="image"></div>
										</div>

									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<h4 class="product-title mb-1">عاجل انتقال رونالدو لفريق ليفربول الانجليزي</h4>
										<p class="text-muted tx-13 mb-1">الدوري الاسباني,الدوري الانجليزي,رونالدو , اخبار الرياضة</p>
										<br>
                                        <h6 class="h4 views">المشاهدات : <span class="h5 ml-2">30,562</span></h6>
                                        <h6 class="h4 likes">عدد المعجبين : <span class=" h5 ml-2">30,562</span></h6>
                                        <h6 class="h4 comments">عدد التعليقات : <span class="h5 ml-2">30,562</span></h6>
                                        <h6 class="h4 writer">اسم الناشر :<span class="h5 ml-2">سعيد خالدي</span></h6>
                                        <h6 class="h4 publishAt">تاريخ النشر :<span class="h5 ml-2">20-3-2022</span></h6>
                                        <h6 class="h4 status">حالة المقال :<span class="h5 ml-2 ">نُشرت</span></h6>


										<div class="action">
											<button class="add-to-cart btn btn-primary" type="button">تعديل</button>
											<button class="add-to-cart btn btn-danger" type="button">حذف</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <!-- Chart -->
                <div class="row row-sm">
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									الاعجابات
								</div>
								<p class="mg-b-20">مخطط المعجبين في المشاركة كل يوم</p>
								<div class="ht-200 ht-sm-300" id="flotLine1" style="padding: 0px; position: relative;"><canvas class="flot-base" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 19px; text-align: center;">0.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 109px; text-align: center;">1.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 199px; text-align: center;">2.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 289px; text-align: center;">3.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 379px; text-align: center;">4.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 469px; text-align: center;">5.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 559px; text-align: center;">6.0</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 276px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">0.0</div><div style="position: absolute; top: 230px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">2.5</div><div style="position: absolute; top: 185px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">5.0</div><div style="position: absolute; top: 139px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">7.5</div><div style="position: absolute; top: 93px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">10.0</div><div style="position: absolute; top: 48px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 121.425px; height: 38.975px; top: 13px; left: 31px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;left:31px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #007bff;overflow:hidden"></div></div></td><td class="legendLabel">New Customer</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #f7557a;overflow:hidden"></div></div></td><td class="legendLabel">الأمس</td></tr></tbody></table></div></div>
							</div>
						</div>
					</div><!-- col-6 -->
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									المشاهدات
								</div>
								<p class="mg-b-20">مخطط المشاهدات اليومي</p>
								<div class="ht-200 ht-sm-300" id="flotLine2" style="padding: 0px; position: relative;"><canvas class="flot-base" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 19px; text-align: center;">0.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 109px; text-align: center;">1.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 199px; text-align: center;">2.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 289px; text-align: center;">3.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 379px; text-align: center;">4.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 469px; text-align: center;">5.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 559px; text-align: center;">6.0</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 276px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">0.0</div><div style="position: absolute; top: 230px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">2.5</div><div style="position: absolute; top: 185px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">5.0</div><div style="position: absolute; top: 139px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">7.5</div><div style="position: absolute; top: 93px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">10.0</div><div style="position: absolute; top: 48px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 121.425px; height: 38.975px; top: 13px; left: 31px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;left:31px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #007bff;overflow:hidden"></div></div></td><td class="legendLabel">New Customer</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #f7557a;overflow:hidden"></div></div></td><td class="legendLabel">الأمس</td></tr></tbody></table></div></div>
							</div>
						</div>
					</div><!-- col-6 -->
				</div>
            </div>
		<!-- Container closed -->

        @endsection
@section('js')
<script src="http://localhost/assets/plugins/jquery.flot/jquery.flot.js"></script>
<script src="http://localhost/assets/plugins/jquery.flot/jquery.flot.pie.js"></script>
<script src="http://localhost/assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
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
</script>
@endsection
