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
                <h4 class="content-title mb-0 my-auto">القنوات الرياضية</h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">البحث في القنوات</div>
                <div class="card-body pb-0">


                    <div class="form-group mt-2">
                        <label class="form-label">الترتيب</label>
                        <input type="text" name="search_channel" class="form-control" id="inputName"
                            placeholder="أبحث في القنوات...">
                    </div>

                </div>

                <div class="py-2 px-3">

                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">تصفية</button>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12">

            <div class="row row-sm">
                @foreach ($channels as $item)
                    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-img-box">
                                <div class="d-flex product-sale">
                                </div>
                                <p></p>
                                <a href="{{route('channels.show',$item->id)}}" class="adtocart"> <i class="las la-pen"></i>
                                </a>
                            </div>
                            <div class="text-center pt-3">

                                <h4 class="h5 mb-0 mt-2 text-center font-weight-bold ">{{$item->name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            {{$channels->links('pagination::bootstrap-4')}}
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
