@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    tbody tr {
    height: 80px;
}

</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">الموضفين</h2>

						</div>
					</div>

				</div>
				<!-- /breadcrumb -->

@endsection
@section('content')
<!-- Row Content -->
<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">كل الموظفين</h4>
                                    <div class="btn-group">
										<button class="btn btn-light"><i class="bx bx-refresh"></i></button>
                                        <a href="{{route('employees.trush')}}">
                                            <button class="btn btn-light "><i class="bx bx-archive"></i></button>
                                        </a>

									</div>
                                    <div class="pr-1 mb-3 mb-xl-0">
                                        <a href="{{route('employees.create')}}">
                                            <button type="button" class="btn btn-primary btn-icon ml-2"><i class="typcn typcn-edit"></i></button>
                                        </a>
                                    </div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>

											<tr>

												<th class="wd-lg-8p"><span>اسم الموظف</span></th>
												<th class="wd-lg-20p"><span>تاريخ الانضمام</span></th>
												<th class="wd-lg-20p"><span>الحالة</span></th>
												<th class="wd-lg-20p"><span>الراتب</span></th>
												<th class="wd-lg-20p"><span>الرتبة</span></th>
												<th class="wd-lg-20p">الصلاحيات</th>
												<th class="wd-lg-20p">الحدث</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($employees as $emp)
                                                <tr>
                                                    <td colspan="1" class="title-post">

                                                        {{$emp->full_name}}
                                                    	</td>
                                                    <td>
                                                        {{$emp->toArray()['created_at']}}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="label @if($emp->status == 'active') text-success @else text-danger @endif d-flex"><div class="dot-label @if($emp->status == 'active') bg-success @else bg-danger @endif ml-1"></div>{{$emp->status_emp}}</span>
                                                    </td>
                                                    <td>
                                                        {{$emp->salary}}$
                                                    </td>
                                                    <td>
                                                        {{$emp->jop_title}}
                                                    </td>
                                                    <td>
                                                        {{$emp->permissions_count}}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('employees.show',$emp->id)}}" class="btn btn-sm btn-primary">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                        <a href="{{route('employees.edit',$emp->id)}}" class="btn btn-sm btn-info">
                                                            <i class="las la-pen"></i>
                                                        </a>
                                                        <a href="{{route('employees.permissions',$emp->id)}}" class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-gears"></i>
                                                        </a>
                                                        </a>
                                                    </td>
                                                </tr>

                                            @endforeach

										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div><!-- COL END -->
				</div>
<!-- End Row Contetnt -->
            </div>
		<!-- Container closed -->
@endsection
@section('js')
<script>
 	// $('#checkAll').on('click', function() {
 	// 	if ($(this).is(':checked')) {
 	// 		$('.ckbox input').each(function() {
 	// 			$(this).attr('checked', true);
 	// 		});
 	// 	} else {
 	// 		$('.ckbox input').each(function() {
 	// 			$(this).attr('checked', false);
 	// 		});
 	// 	}
 	// });
 	// $('input').on('click', function() {
 	// 	if ($(this).is(':checked')) {
 	// 		$(this).attr('checked', false);
 	// 	} else {
 	// 		$(this).attr('checked', true);
 	// 	}
 	// });


      	$('#checkAll').on('click', function() {
 		if ($(this).is(':checked')) {
 			$('tr .ckbox input').each(function() {
 				$(this).closest('tr').addClass('selected');
 				$(this).attr('checked', true);
 			});
 			$('.btn-group .btn:last-child').removeClass('disabled');
 		} else {
 			$('tbody .ckbox input').each(function() {
 				$(this).closest('tr').removeClass('selected');
 				$(this).attr('checked', false);
 			});
 			$('.btn-group .btn:last-child').addClass('disabled');
 		}
 	});
 	$('tbody td input').on('click', function() {
 		if ($(this).is(':checked')) {
 			$(this).attr('checked', false);
 			$(this).closest('tr').addClass('selected');
 			$('.btn-group .btn:last-child').removeClass('disabled');
 		} else {
 			$(this).attr('checked', true);
 			$(this).closest('tr').removeClass('selected');
 			if (!$('tbody .selected').length) {
 				$('.btn-group .btn:last-child').addClass('disabled');
 			}
 		}
 	});
</script>
@endsection
