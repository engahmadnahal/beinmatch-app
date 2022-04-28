@extends('layouts.master')
@section('css')
<style>
    tbody tr {
    height: 80px;
}
.action {
    display: flex;
}
form {
    margin-right: 10px;
}
</style>
@endsection
@section('page-header')
				<!-- breadcrum
                    b -->


				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">التفاصيل</h2>
						  <p class="mg-b-0">عرض جميع تفاصيل المقالة</p>
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
										  <div class="tab-pane active" id="pic-1"><img src="{{Storage::url($post->thumnail)}}" alt="image"></div>
										</div>

									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<h4 class="product-title mb-1">{{$post->title}}</h4>
										<p class="text-muted tx-13 mb-1">{{$post->dawry->name}}</p>
										<br>
                                        <h6 class="h4 views">المشاهدات : <span class="h5 ml-2">{{$post->user_view_count}}</span></h6>
                                        <h6 class="h4 likes">عدد المعجبين : <span class=" h5 ml-2">{{$post->user_like_count}}</span></h6>
                                        <h6 class="h4 comments">عدد التعليقات : <span class="h5 ml-2">{{$post->user_comment_count}}</span></h6>
                                        <h6 class="h4 writer">اسم الناشر : <a href="{{route('employees.show',$post->employee_id)}}"><span class="h5 ml-2">{{$post->employee->full_name}}</span></a></h6>
                                        <h6 class="h4 publishAt">تاريخ النشر :<span class="h5 ml-2">{{$post->created_at->format('Y-m-d')}}</span></h6>
                                        <h6 class="h4 status">حالة المقال :<span class="h5 ml-2 ">{{$post->post_status}}</span></h6>


										<div class="action">
											<a class="add-to-cart btn btn-primary" href="{{route('posts.edit',$post->id)}}">تعديل</a>
											<form action="{{route('posts.destroy',$post->id)}}" method="post">@csrf @method('delete')
                                                <button class="add-to-cart btn btn-danger" type="button">حذف</button>
                                            </form>
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
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script>
    /*
        'likesYesterDay'
        'likesToDay'
    */
//    @php


//             $zeroToFiveLike = 0;
//             $SixToTwelveLike = 0;
//             $TwelveToEightteentLike = 0;
//             $EihtteenToTwentyFour = 0;

//                 foreach ($likesYesterDay as $like ){

//                     $houreOfLike = substr(explode(' ',$like->created_at)[1],0,2);
//                     if($houreOfLike < 6){
//                         $zeroToFiveLike++;
//                     }
//                     else if($houreOfLike < 12 && $houreOfLike >= 6){
//                         $SixToTwelveLike++;
//                     }else if($houreOfLike < 18 && $houreOfLike >= 12){
//                         $TwelveToEightteentLike++;
//                     }else if($houreOfLike <=  24 && $houreOfLike >= 18){
//                         $EihtteenToTwentyFour++;
//                     }

//             }


//    @endphp

    var yesterdayLikes = [
		[0, {{$likesYesterDay['zeroFive']}}],
		[6, {{$likesYesterDay['SixTwelve']}}],
		[12, {{$likesYesterDay['TwelveEightteent']}}],
		[18, {{$likesYesterDay['EihtteenTwenty']}}],


	];
        var todayLikes = [
		[0, {{$likesToDay['zeroFive']}}],
		[6, {{$likesToDay['SixTwelve']}}],
		[12, {{$likesToDay['TwelveEightteent']}}],
		[18, {{$likesToDay['EihtteenTwenty']}}],
	];


	var todayView = [
		[0, {{$viewToDay['zeroFive']}}],
		[6, {{$viewToDay['SixTwelve']}}],
		[12, {{$viewToDay['TwelveEightteent']}}],
		[18, {{$viewToDay['EihtteenTwenty']}}],
	];

    var yesterdayView = [
		[0, {{$viewYsterDay['zeroFive']}}],
		[6, {{$viewYsterDay['SixTwelve']}}],
		[12, {{$viewYsterDay['TwelveEightteent']}}],
		[18, {{$viewYsterDay['EihtteenTwenty']}}],

	];


	 var plot = $.plot($('#flotLine1'), [{
		data: todayLikes,
		label: 'اليوم',
		color: '#007bff'
	}, {
		data: yesterdayLikes,
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
			max: 500,
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
		data: todayView,
		label: 'اليوم',
		color: '#007bff'
	}, {
		data: yesterdayView,
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
			max: 1000,
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
            // min : 0,
            // max : 24
			font: {
				size: 10,
				color: '#999'
			}
		}
	});

</script>
@endsection
