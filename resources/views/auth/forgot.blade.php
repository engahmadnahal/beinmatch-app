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
							<img src="{{URL::asset('assets/img/media/forgot.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
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
								<div class="mb-5 d-flex"> <a href="{{route('home.index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a></div>
									<div class="main-card-signin d-md-flex bg-white">
										<div class="wd-100p">
											<div class="main-signin-header">
												<h2>هل نسيت كملة المرور!</h2>
												<h4>الرجاء قم بادخال الايميل</h4>
												<form >
													<div class="form-group">
														<label>الاميل</label> <input class="form-control" placeholder="أدخل ايميلك" type="text" id="email">
													</div>
													<button class="btn btn-main-primary btn-block" type="button" onclick="performForgotPassword()">ارسال</button>
												</form>
											</div>
											<div class="main-signup-footer mg-t-20">
												<p>لقد تذكرت, <a href="{{route('auth.index')}}">ارجعني</a> لصفحة تسجيل الدخول .</p>
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
    function performForgotPassword(){
        axios.post('/auth/reset',{
            email:document.getElementById('email').value
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
