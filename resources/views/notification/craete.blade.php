@extends('layouts.master')
@section('css')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/quill/quill.snow.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/quill/quill.bubble.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<style>
    .ql-tooltip {
    display: none;
}
</style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">انشاء اشعار جديد</h2>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- Row Content -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <form action="" method="get">
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">الاعدادات</div>
                <div class="card-body pb-0">
                    <div class="form-group">
                        <label class="form-label">التصنيفات</label>
                        <select name="beast" id="select-beast" class="form-control nice-select custom-select"
                            style="display: none;" >
                            <option value="0">--تحديد--</option>
                            <option value="1">اشعار</option>
                            <option value="2">صندوق المستخدم</option>
                        </select>


                    </div>
                </div>

                <div class="py-2 px-3">
                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">نشر الأن</button>
                </div>
            </div>
            </form>

        </div>
        <div class="col-xl-9 col-lg-9 col-md-12">
         <div class="card">
            <div class="card-body">

                <div class="wd-xl-100p ht-350">
                    <div class="ql-scrolling-demo bg-gray-100 ps" id="scrolling-container">
                        <input type="text" name="post_title" placeholder="عنوان المقال" style=" font-size: 25px; width: 100%; padding: 7px; outline: 0; background: transparent; border: 0; ">
                        <textarea name="post_content" cols="30" rows="10" class="ql-container ql-bubble rtl" placeholder="أكتب الأن.." style="font-family: inherit; background: transparent; width: 100%; height: 100%; outline: 0;font-size: 19px; "></textarea>
                    </div>

            </div>
             <h3 style=" margin: 20px 0; ">صورة المقالة: </h3>
             <input type="file" class="dropify" data-height="200" />

        </div>
    </div>

    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <!-- For Upload Inputs -->


    <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            // ______________Nice Select
            $('select.nice-select').niceSelect();
        })(jQuery);

        // Custom Upload inputs
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

    $('.nofication').on('click', function() {
		$(this).toggleClass('on');
        let attr = $("#sendNotfi").attr('checked');

        if(attr == undefined){
            console.log(true);
            $("#sendNotfi").attr('checked','checked');
        }else{

            $("#sendNotfi").removeAttr('checked');
            console.log(false);


        }
	})



    </script>
@endsection
