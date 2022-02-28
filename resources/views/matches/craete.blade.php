@extends('layouts.master')
@section('css')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
<!---Internal Fancy uploader css-->
<link href="http://bein.test/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
<link href="http://bein.test/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
<link href="http://bein.test/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
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
            <form action="/" method="get">
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">الاعدادات</div>
                <div class="card-body pb-0">
                    <div class="form-group">
                        <label class="form-label">التصنيفات</label>
                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
											<option label="Choose one" data-select2-id="3">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>


                        <label class="form-label">نشر المقال</label>
                        <div class="publish main-toggle main-toggle-secondary">
                            <input type="checkbox" name="publish_post" id="publish" style="display: none">
                            <span></span>
                        </div>



                    </div>
                </div>

                <div class="py-2 px-3">
                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">حفظ الأن</button>
                </div>
            </div>
            </form>

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
                                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="2" tabindex="-1" aria-hidden="true">
											<option label="Choose one" data-select2-id="3">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">اسم الفريق الثاني: </label>
                                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="3" tabindex="-1" aria-hidden="true">
											<option label="Choose one" data-select2-id="3">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">البطولة: </label>
                                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
											<option label="Choose one" data-select2-id="4">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
                                </div>
                            </div>
                            {{-- {{dd(date('Y-m-d H:i:s', strtotime("14:05")))}} --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">القناة الناقلة: </label>
                                        <select class="form-control select2 select2-hidden-accessible" data-select2-id="5" tabindex="-1" aria-hidden="true">
											<option label="Choose one" data-select2-id="1">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
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
										</div><input class="form-control" id="datetimepicker2" type="text" value="2022-01-01 21:05">
									</div>
                                </div>
                            </div>
                            {{-- {{dd(date('Y-m-d H:i:s', strtotime("14:05")))}} --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">المعلق: </label>
                                    <input class="form-control" type="text" placeholder="اسم المعلق..">
                                </div>
                            </div>
                        </div>
                </div>
            </div>


        </div>
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
