@extends('layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href=""><img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>مرحباً بك !</h2>

												<h5 class="font-weight-semibold mb-4">تسجيل الدخول .</h5>
												<form action="{{route('auth.login')}}" method="post">
                                                    @csrf
													<div class="form-group">
														<label>الايميل</label> <input class="form-control" name="email" placeholder="الايميل" type="text" value="{{old('email')}}">
                                                        @error('email') {{$message}} @enderror
													</div>
													<div class="form-group">
														<label>كلمة المرور</label> <input class="form-control" name="password" placeholder="كلمة المرور" type="password" value="{{old('password')}}">
                                                        @error('password') {{$message}} @enderror
													</div><button class="btn btn-main-primary btn-block">دخول</button>
                                                    {{-- <div class="row mg-t-10">
                                                        <div class="col-lg-6">
                                                            <label class="rdiobox"><input name="user" type="radio" value="doctor" @if(old('user') == 'doctor') checked @endif> <span>{{__('cms.sign_in_doctor')}}</span></label>
                                                        </div>
                                                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                                            <label class="rdiobox"><input  name="user" type="radio" value="pateint" @if(old('user') == 'pateint') checked @endif> <span>{{__('cms.sign_in_pateint')}}</span></label>
                                                        </div>
                                                        @error('user') {{$message}} @enderror

                                                    </div> --}}
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="{{route('auth.forgot')}}">هل نسيت كلمة المرور</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection
