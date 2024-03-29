@extends('layouts.master')
@section('css')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
<!---Internal Fancy uploader css-->
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<style>
    .ql-tooltip {
    display: none;
}
span.select2 {
    width: 100% !important;
}
.input-group {

    width: 100% !important;
    padding: 0;
}
</style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">انشاء مقالة جديدة</h2>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- Row Content -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <form action="{{route('mobaras.update',$mobara->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">الاعدادات</div>
                <div class="card-body pb-0">
                    <div class="form-group">
                        {{-- <label class="form-label">التصنيفات</label>
                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" name="dawry">
											<option label="Choose one" data-select2-id="3">
											</option>
											@foreach ($dawrys as $dawry)

                                                <option value="{{$dawry->id}}"
                                                    @if($mobara->botola == $dawry->id)
                                                        selected
                                                    @endif
                                                    >
                                                    {{$dawry->name}}
                                                </option>
                                            @endforeach
										</select> --}}


                        <label class="form-label">نشر المقال</label>
                        <div class="publish main-toggle main-toggle-secondary {{!is_null($mobara->publish_at) ? "on" : ""}}">
                            <input type="checkbox" name="publish_match" id="publish" style="display: none" {{!is_null($mobara->publish_at) ? "checked=checked" : ""}}>
                            <span></span>
                        </div>



                    </div>
                </div>

                <div class="py-2 px-3">
                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">حفظ الأن</button>
                </div>
            </div>

        </div>

        <div class="col-xl-9 col-lg-9 col-md-12">
         <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        معلومات المباراة
                    </div>
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">اسم الفريق الاول: </label>
                                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="3" tabindex="-1" aria-hidden="true" name="club_one">
											<option label="Choose one" data-select2-id="3">
											</option>
											@foreach ( $clubs as $club)
                                                <option value="{{$club->id}}"
                                                        @if($mobara->club_one_id == $club->id)
                                                            selected
                                                        @endif
                                                    >
                                                    {{$club->name}}
                                                </option>
                                            @endforeach
										</select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">اسم الفريق الثاني: </label>
                                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="6" tabindex="-1" aria-hidden="true" name="club_two">
											<option label="Choose one" data-select2-id="3">
											</option>

											@foreach ( $clubs as $club)
                                                <option value="{{$club->id}}"
                                                    @if($mobara->club_two_id == $club->id)
                                                            selected
                                                        @endif
                                                    >
                                                    {{$club->name}}
                                                </option>
                                            @endforeach
										</select>
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">البطولة: </label>
                                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true" name="botola">
											<option label="Choose one" data-select2-id="4">
											</option>
											@foreach ($dawrys as $dawry)
                                                <option value="{{$dawry->id}}"
                                                    @if($mobara->botola == $dawry->id)
                                                            selected
                                                        @endif
                                                    >
                                                    {{$dawry->name}}
                                                </option>
                                            @endforeach
										</select>
                                </div>
                            </div>
                            {{-- {{dd(date('Y-m-d H:i:s', strtotime("14:05")))}} --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">القناة الناقلة: </label>
                                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="5" tabindex="-1" aria-hidden="true" name="channel">
											<option label="Choose one" data-select2-id="1">
											</option>
											@foreach ($channel as $item)
                                                <option value="{{$item->id}}"
                                                     @if($mobara->channel_id == $item->id)
                                                            selected
                                                        @endif
                                                    >
                                                    {{$item->name}}
                                                </option>
                                            @endforeach
										</select>
                                </div>
                            </div>
                        </div>


                    <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">توقيت المباراة : </label>
                                    <div class="input-group col-md-4 col-xl-12">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
											</div>
										</div><input class="form-control" id="datetimepicker2" type="text" value="{{$mobara->start}}" name="timeStart">
									</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">المعلق: </label>
                                    <input class="form-control" type="text" placeholder="اسم المعلق.." name="voice" value="{{$mobara->voice_over}}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">الملعب: </label>
                                    <input class="form-control" type="text" placeholder="الملعب .." name="stadium" value="{{$mobara->stadium}}" id="stadium">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">تاريخ المباراة: </label>
                                    <input class="form-control" type="date" placeholder=" تاريخ المباراة .." name="date_match" value="{{Carbon::parse($mobara->date_match)->format('Y-m-d')}}">
                                </div>
                            </div>
                        </div>
                </div>
            </div>


        </div>
        </form>
    </div>

    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>


<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>

    <script>


$('.publish').on('click', function() {
		$(this).toggleClass('on');
        let attr = $("#publish").attr('checked');

        if(attr == undefined){
            console.log(true);
            $("#publish").attr('checked','checked');
        }else{

            $("#publish").removeAttr('checked');
            console.log(false);


        }
	});

(function($) {
	var Defaults = $.fn.select2.amd.require('select2/defaults');
	$.extend(Defaults.defaults, {
		searchInputPlaceholder: ''
	});
	var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');
	var _renderSearchDropdown = SearchDropdown.prototype.render;
	SearchDropdown.prototype.render = function(decorated) {
		// invoke parent method
		var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));
		this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));
		return $rendered;
	};
})
$(document).ready(function() {
		$('.clubOne').select2({
			placeholder: 'Choose one',
			searchInputPlaceholder: 'Search'
		});

		$('.clubTwo').select2({
			placeholder: 'Choose one',
			searchInputPlaceholder: 'Search'
		});


		$('.select2').select2({
			placeholder: 'Choose one',
			searchInputPlaceholder: 'Search'
		});


		$('.select2-no-search').select2({
			minimumResultsForSearch: Infinity,
			placeholder: 'Choose one'
		});
	});

$('#datetimepicker2').appendDtpicker({
		closeOnSelected: true,
		onInit: function(handler) {
			var picker = handler.getPicker();
			$(picker).addClass('main-datetimepicker');
		}
	});
    </script>
@endsection
