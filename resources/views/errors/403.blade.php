@extends('layouts.master2')
@section('css')

@endsection

@section('content')
<div id="global-loader" style="display: none;">
			<img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>

        <div class="main-error-wrapper  page page-h ">
			<h2>Oopps 403 | {{$exception->getMessage()}}</h2>
			<a class="btn btn-outline-danger" href="{{route('home.index')}}">Back to Home</a>
		</div>

        <a href="#top" id="back-to-top" style="display: none;"><i class="las la-angle-double-up"></i></a>
@endsection

@section('js')
@endsection
