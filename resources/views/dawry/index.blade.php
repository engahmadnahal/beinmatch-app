@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الدوريات الرياضية</h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        {{-- <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">تخصيص التحديد</div>
                <div class="card-body pb-0">

                    <div class="form-group mt-2">
                        <label class="form-label">الاكثر متابعة</label>
                        <select name="beast" id="select-beast1" class="form-control  nice-select  custom-select">
                            <option value="0">--Select--</option>
                            <option value="1">Western wear</option>
                            <option value="2">Foot wear</option>
                            <option value="3">Top wear</option>
                            <option value="4">Bootom wear</option>
                            <option value="5">Beuty Groming</option>
                            <option value="6">Accessories</option>
                            <option value="7">jewellery</option>
                        </select>
                    </div>


                </div>

                <div class="py-2 px-3">

                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">تصفية</button>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-12 col-lg-12 col-md-12">

            <div class="row row-sm">
                @foreach ($dawry as $item)
                    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="pro-img-box">
                                    <div class="d-flex product-sale">

                                    </div>
                                    <img class="w-100"
                                        src="{{$item->avater}}"
                                        alt="product-image">
                                    <a href="{{route('dawries.show',$item->id)}}" class="adtocart"> <i class="fa-solid fa-futbol"></i></i>
                                    </a>
                                </div>
                                <div class="text-center pt-3">
                                    <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$item->name}}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            {{-- <ul class="pagination product-pagination mr-auto float-left">
                <li class="page-item page-prev disabled">
                    <a class="page-link" href="#" tabindex="-1">Prev</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item page-next">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
             --}}
             {{$dawry->links('pagination::bootstrap-4')}}
        </div>
    </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
@endsection
