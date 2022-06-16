@extends('layouts.master2')
@section('css')

@endsection

@section('content')
<div id="global-loader" style="display: none;">
			<img src="http://localhost/assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>

       <div class="main-error-wrapper  page page-h ">
			<img src="http://localhost/assets/img/media/404.png" class="error-page" alt="error">
			<h2>Oopps. The page you were looking for doesn't exist.</h2>
			<h6>You may have mistyped the address or the page may have moved.</h6><a class="btn btn-outline-danger" href="http://localhost/index">Back to Home</a>
		</div>
        <a href="#top" id="back-to-top" style="display: none;"><i class="las la-angle-double-up"></i></a>
@endsection

@section('js')
@endsection
