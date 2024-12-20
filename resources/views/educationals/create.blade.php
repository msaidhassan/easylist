@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')

<style>
    .cke_notifications_area{
        display:none !important;
    }
</style>
<div class="container-fluid">

        <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.add_educational') }}</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>المكتبة التعليمية</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md mb-4">
                                <div class="card-header">
                </div>
                <div class="card-body py-md-30">

                    @include('partials._errors')
                    <form action="{{route('store.educational', app()->getLocale())}}" method="POST">
                        @csrf
                        <div class="row">
                            @if(isset($educational))

                            <div class="col-md-12 mb-25">
                                        <textarea name="text" id="text" class="form-control">{{$educational->text}}</textarea>

                            </div>
                            @else
                                <div class="col-md-12 mb-25">
                                    <textarea name="text" id="text" class="form-control"></textarea>

                                </div>
                            @endif


                            <div class="col-md-6">
                                <div class="layout-button mt-0">
                                    @if($educational)
                                        <button type="submit" class="btn btn-primary btn-default btn-squared px-30">تعديل</button>

                                    @else
                                        <button type="submit" class="btn btn-primary btn-default btn-squared px-30">حفظ</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('text');
</script>





<script src="{{asset('js/country_code.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
        $(document).ready(function() {
        $('#select-alerts2').change(function() {
            let selectedCountry = $(this).val();
            let countryCode = countryCodes[selectedCountry] || '';
            $('#phone').val(countryCode);
        });
    });
</script>


@endsection
