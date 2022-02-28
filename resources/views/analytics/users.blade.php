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
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">تحليلات المستخدمين</h2>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->

@endsection
@section('content')
                <div class="row row-sm">
					<div class="col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									التسجيلات
								</div>
								<p class="mg-b-20">عرض عدد تسجيلات المستخدمين في التطبيق</p>
								<div class="ht-200 ht-sm-300" id="flotLine3" style="padding: 0px; position: relative;"><canvas class="flot-base" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 19px; text-align: center;">0.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 109px; text-align: center;">1.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 199px; text-align: center;">2.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 289px; text-align: center;">3.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 379px; text-align: center;">4.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 469px; text-align: center;">5.0</div><div style="position: absolute; max-width: 82px; top: 287px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 559px; text-align: center;">6.0</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 276px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">0.0</div><div style="position: absolute; top: 230px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">2.5</div><div style="position: absolute; top: 185px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">5.0</div><div style="position: absolute; top: 139px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">7.5</div><div style="position: absolute; top: 93px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">10.0</div><div style="position: absolute; top: 48px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font: 400 10px / 12px Roboto, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="717" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 121.425px; height: 38.975px; top: 13px; left: 31px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;left:31px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #007bff;overflow:hidden"></div></div></td><td class="legendLabel">New Customer</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #f7557a;overflow:hidden"></div></div></td><td class="legendLabel">الأمس</td></tr></tbody></table></div></div>
							</div>
						</div>
					</div><!-- col-6 -->

				</div>
                <!-- Chart -->
                <div class="row row-sm">
					<div class="col-md-6">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									التفاعل
								</div>
								<p class="mg-b-20">عرض تفاعلات المستخدمين في التطبيق</p>
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
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
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

    var newCust3 = [
		[0, 20],
		[1, 50],
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
 //___________________

     var plot = $.plot($('#flotLine3'), [{
		data: newCust3,
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
