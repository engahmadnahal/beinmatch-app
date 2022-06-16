@extends('layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/media/reset.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-50p ht-xl-60p mx-auto" alt="logo">
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
									<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
									<div class="main-card-signin d-md-flex">
										<div class="wd-100p">
											<div class="main-signin-header">
												<div class="">
													<h2>! مرحبا مرة أخرى </h2>
													<h4 class="text-left">اعادة كلمة المرور</h4>
													<form>
														<div class="form-group text-left">
															<label>كلمة المرور</label>
															<input class="form-control" placeholder="أدخل كلمة المرور الجديدة" type="password" id='password'>
														</div>
														<div class="form-group text-left">
															<label>تأكيد كلمة المرور</label>
															<input class="form-control" placeholder="تأكيد كلمة المرور الجديدة" type="password" id="password_confirmation">
														</div>
														<button onclick="performResetPassword()" class="btn ripple btn-main-primary btn-block" type="button" >اعادة كلمة المرور</button>
													</form>
												</div>
											</div>
											<div class="main-signup-footer mg-t-20">
												<p>املك حساب? <a href="{{ route('auth.index') }}">سجل دخولك الأن</a></p>
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
<script>

    function performResetPassword(){
        axios.post('/auth/reset-poassword',{
            email:'{{$email}}',
            password:document.getElementById('password').value,
            password_confirmation:document.getElementById('password_confirmation').value,
            token : '{{$token}}'
        }).then(function(response){
            console.log(response);
            toastr.success(response.data.msg);
        }).catch(function(error){
            console.log("ssssssss");
            toastr.error(error.response.data.msg);
            console.log(error.response.data.msg);
        });
    }
</script>
@endsection
