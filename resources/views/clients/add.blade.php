@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<style>
    /* اجعل العنصر الحاوي نسبي */
    .position-relative {
        position: relative;
    }

.select2-container{
    direction:ltr !important;
}

.required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 110px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.waqil-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 115px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.dawla-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 55px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.phone-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 113px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.field-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 200px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}


</style>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.add_clients') }}</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>العملاء</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('menu.add_clients') }}</li>
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
                    <h6>{{ trans('menu.add_clients') }}</h6>
                </div>
                <div class="card-body py-md-30">

                    @include('partials._errors')
<form action="{{route('store_clients', app()->getLocale())}}" method="POST">
    @csrf
    <div class="row">
<div class="col-md-6 mb-25 position-relative">
    <input type="text" name="name" class="form-control ih-medium ip-gray radius-xs b-light px-15" required placeholder="اسم العميل" value="{{ old('name') }}">
    <span class="required-star">*</span>
</div>




        <div class="col-md-6 mb-25">
            <input type="text" name="email" class="form-control ih-medium ip-gray radius-xs b-light px-15"  placeholder="البريد الإلكتروني" value="{{ old('email') }}">
        </div>

        <div class="col-md-6 mb-25 position-relative">
            <select name="user_id" id="countryOption7" required class="form-control px-15">
                <option value=""></option>
                @foreach ($sellers as $seller)
                <option value="{{$seller->id}}" {{ old('user_id') == $seller->id ? 'selected' : '' }}>{{$seller->name}}</option>
                @endforeach
            </select>
                <span class="waqil-required-star">*</span>

        </div>

        <div class="col-md-6 mb-25 position-relative">
            <div class="dm-select position-relative">
                <select name="country" id="select-alerts2" required class="country form-control">
                    <option value="">الدولة</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->name_ar }}" {{ old('country') == $country->name_ar ? 'selected' : '' }}>
                        {{ $country->name_ar }} / {{ $country->name_en }}
                    </option>
                    @endforeach
                </select>
                                <span class="dawla-required-star">*</span>

            </div>
        </div>

        <div class="col-md-6 mb-25 position-relative">
            <input type="text" id="phone" name="phone" required class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="رقم الموبايل" value="{{ old('phone') }}">
                                            <span class="phone-required-star">*</span>

        </div>

        <div class="col-md-6 mb-25">
            <select class="form-control text-end" id="select-alerts611"  class="country form-control">
                <option value="">الجنس</option>
                <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                <option value="أنثى" {{ old('gender') == 'أنثي' ? 'selected' : '' }}>أنثى</option>
            </select>
        </div>

        <div class="col-md-6 mb-25">
            <select name="what" id="countryOption2" class="form-control" >
                <option value="">الماهية</option>
                <option value="فرد" {{ old('what') == 'فرد' ? 'selected' : '' }}>فرد</option>
                <option value="شركة" {{ old('what') == 'شركة' ? 'selected' : '' }}>شركة</option>
                <option value="وسيط" {{ old('what') == 'وسيط' ? 'selected' : '' }}>وسيط</option>
            </select>
        </div>

        <div class="col-md-6 mb-25">
            <select name="source" id="countryOption3" class="form-control px-15" >
                <option value="">المصدر</option>
                <option value="الفرانشيز" {{ old('source') == 'الفرانشيز' ? 'selected' : '' }}>الفرانشيز</option>
                <option value="المسؤول" {{ old('source') == 'المسؤول' ? 'selected' : '' }}>المسؤول</option>
                <option value="الوكيل" {{ old('source') == 'الوكيل' ? 'selected' : '' }}>الوكيل</option>
                <option value="التسويق بالعمولة" {{ old('source') == 'التسويق بالعمولة' ? 'selected' : '' }}>التسويق بالعمولة</option>
            </select>
        </div>

        <div class="col-md-6 mb-25">
            <select name="important" id="countryOption4" class="form-control px-15" >
                <option value="">الأهمية</option>
                @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}" {{ old('important') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="col-md-6 mb-25 position-relative">
            <select name="main_field_id" id="countryOption5" class="form-control px-15" required>
                <option value="">المجال الابتدائي لطلب العميل</option>
                @foreach ($main_fields as $field)
                <option value="{{$field->id}}" {{ old('main_field_id') == $field->id ? 'selected' : '' }}>{{$field->title}}</option>
                @endforeach
            </select>
                                                        <span class="field-required-star">*</span>

        </div>

        <div class="col-md-6 mb-25">
            <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" placeholder="الملاحظات" rows="3">{{ old('notes') }}</textarea>
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
