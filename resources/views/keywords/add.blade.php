@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">إضافة كلمات مفتاحية</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>الكلمات المفتاحية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">إضافة كلمات مفتاحية</li>
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
                    <h6>إضافة كلمات مفتاحية</h6>
                </div>
                <div class="card-body py-md-30">

                    @include('partials._errors')
                    
<form action="{{route('store_keywords', app()->getLocale())}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-25">
            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="الكلمة المفتاحية" name="name" required>
        </div>
        <div class="col-md-6">
            <div class="layout-button mt-0">
                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">حفظ</button>
            </div>
        </div>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection