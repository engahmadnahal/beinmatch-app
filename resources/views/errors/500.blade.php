@extends('layouts.master2')
@section('css')

@endsection

@section('content')
<div id="global-loader" style="display: none;">
			<img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>

       <div class="main-error-wrapper  page page-h ">
			<img src="{{asset('assets/img/media/500.png')}}" class="error-page" alt="error">
			<h2>Oopps. The page you were looking for doesn't exist.</h2>
			<h6>You may have mistyped the address or the page may have moved.</h6><a class="btn btn-outline-danger" href="{{route('home.index')}}">Back to Home</a>
			<h6>Error | {{$exception->getMessage()}}</h6>
		
		</div>
        <a href="#top" id="back-to-top" style="display: none;"><i class="las la-angle-double-up"></i></a>
@endsection

@section('js')
@endsection
