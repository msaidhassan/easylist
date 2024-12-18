<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')

<style>
    .select2-container{
    direction:ltr !important;
}

    .position-relative {
        position: relative;
    }


.client-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 85px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.field-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 180px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.value-required-star{
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 80px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.add_order') }}</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>الطلبات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('menu.add_order') }}</li>
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
                    <h6>{{ trans('menu.add_order') }}</h6>
                </div>
                <div class="card-body py-md-30">

                    @include('partials._errors')
<!--                    <form action="{{ route('store_order', app()->getLocale()) }}" method="POST">-->
<!--                        @csrf-->
<!--                        <div class="row">-->

<!--                            <div class="col-md-6 mb-25">-->

<!--                                    <div class="dm-select">-->

<!--                                        <select name="client_id" class="form-control select2"  required data-placeholder="اختر عميل...">-->
<!--                                            <option value="">العميل</option>-->
<!--                                            @foreach ($clients as $client )-->
<!--                                            <option value="{{$client->id}}">{{$client->name}}</option>-->
<!--                                            @endforeach-->
<!--                                        </select>-->

<!--                                    </div>-->


<!--                            </div>-->

<!--                            <div class="col-md-6 mb-25">-->

<!--                                <input placeholder="وقت التسليم" name="deadline" class="textbox-n form-control ih-medium ip-gray radius-xs b-light px-15" type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='datetime-local')" id="date" />-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-25">-->
<!--                                <select name="main_field_id" class="form-control px-15 select2" required data-placeholder="اختر مجال العمل الرئيسي...">-->
<!--                                    <option value=""></option>-->
<!--                                    @foreach ($main_fields as $field )-->

<!--                                    <option value="{{$field->id}}">{{$field->title}}</option>-->


<!--                                    @endforeach-->

<!--                                </select>-->
<!--                            </div>-->

<!--                            <div class="col-md-6 mb-25">-->
<!--                                <select name="sub_field_id" class="form-control px-15 select2 "  required  data-placeholder="اختر مجال العمل الفرعي...">-->
<!--                                    <option value=""></option>-->
<!--                                    @foreach ($sub_fields as $sub_field )-->

<!--                                    <option value="{{$sub_field->id}}">{{$sub_field->title}}</option>-->


<!--                                    @endforeach-->

<!--                                </select>-->
<!--                            </div>-->

<!--                            <div class="col-md-12 mb-25">-->
<!--                                <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" required placeholder="وصف الطلب" rows="3"></textarea>-->
<!--                            </div>-->


<!--                            <p style="color:#000;font-weight: bolder;">قيمة الطلب:</p>-->

<!--                            <div class="col-md-6 mb-25">-->
<!--                                <input type="text" required name="cvalue" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="للعميل" value="">-->
<!--                            </div>-->
<!--{{--                            <div class="col-md-6 mb-25">--}}-->
<!--{{--                                <input type="text" name="fvalue" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="للمستقل" value="">--}}-->
<!--{{--                            </div>--}}-->

<!--                            <p style="color:#000;font-weight: bolder;"> بيانات التحويل:</p>-->

<!--                            <div class="col-md-6 mb-25">-->

<!--                                <div class="dm-select">-->

<!--                                    <select name="method" class="form-control select2 " data-placeholder="..اختر بيانات التحويل">-->
<!--                                        <option value=""></option>-->
<!--                                        <option value="لم يحول بعد">لم يحول بعد</option>-->
<!--                                        <option value="ويسترن يونيون">ويسترن يونيون</option>-->
<!--                                        <option value="انستا باي">انستا باي</option>-->
<!--                                        <option value="ماني جرام">ماني جرام </option>-->
<!--                                        <option value="حوالة مجمعة">حوالة مجمعة</option>-->
<!--                                        <option value="محلية سعودية">محلية سعودية</option>-->
<!--                                        <option value="فودافون كاش">فودافون كاش</option>-->
<!--                                        <option value="حوالة بنكية">حوالة بنكية</option>-->
<!--                                        <option value="باي بال">باي بال</option>-->
<!--                                        <option value="مقابلة شخصية">مقابلة شخصية</option>-->
<!--                                    </select>-->

<!--                                </div>-->

<!--                            </div>-->


<!--                        <div class="col-md-6 mb-25">-->
<!--                            <input type="text" name="proof" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="إثبات التحويل" value="">-->
<!--                        </div>-->
<!--                            <p style="color:#000;font-weight: bolder;"> الرقم التعريفي لحوالة مجمعة :</p>-->

<!--                            <div class="col-md-4 mb-25">-->
<!--                            <input type="number"  id="randomNumber" name="number" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="الرقم التعريفي للحوالة" value="">-->
<!--                        </div>-->
<!--                        <p style="color:#000;font-weight: bolder;"> مستقل/مستقلين الطلب:</p>-->


<!--                        <div class="container mt-3" id="freelancer-container">-->
<!--                            <div class="row freelancer-row">-->
<!--                                <div class="col-md-6 mb-25">-->
<!--                                    <div class="form-group select-px-15 tagSelect-rtl">-->
<!--                                        <div class="dm-select">-->
<!--                                            <select class="select2 form-control" name="freelancers[]" required data-placeholder="اختر مستقل...">-->
<!--                                                <option value="">اختر</option>-->
<!--                                                @foreach ($freelancers as $freelancer)-->
<!--                                                <option value="{{$freelancer->name}}-{{$freelancer->id}}">{{$freelancer->name}}</option>-->
<!--                                                @endforeach-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6 mb-25">-->
<!--                                    <input type="text" name="recieve[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="القيمة بالدولار" value="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="text-center" style="margin-top: -30px;">-->
<!--                            <button type="button" class="btn btn-primary" id="add-freelancer-btn">+</button>-->
<!--                        </div>-->

<!--                        <script>-->
<!--                            $(document).ready(function() {-->
<!--                                function initializeSelect2() {-->
<!--                                    $('.select2').select2();-->
<!--                                }-->

<!--                                initializeSelect2();-->

<!--                                $('#add-freelancer-btn').on('click', function() {-->
<!--                                    var container = $('#freelancer-container');-->
<!--                                    var originalRow = $('.freelancer-row').first();-->
<!--                                    var newRow = originalRow.clone();-->
<!--                                    newRow.find('input').val('');-->
<!--                                    newRow.find('.select2').remove();-->
<!--                                    var selectHTML = `-->
<!--                                        <select class="select2 form-control" name="freelancers[]" data-placeholder="اختر ...">-->
<!--                                            <option value="">اختر</option>-->
<!--                                            @foreach ($freelancers as $freelancer)-->
<!--                                            <option value="{{$freelancer->name}}-{{$freelancer->id}}">{{ $freelancer->name }}</option>-->
<!--                                            @endforeach-->
<!--                                        </select>-->
<!--                                    `;-->
<!--                                    newRow.find('.dm-select').html(selectHTML);-->
<!--                                    container.append(newRow);-->
<!--                                    initializeSelect2();-->
<!--                                });-->
<!--                            });-->
<!--                        </script>-->


<!--                            <div class="col-md-6 mt-5">-->
<!--                                <div class="layout-button mt-0">-->
<!--                                    <button type="submit" class="btn btn-primary btn-default btn-squared px-30">حفظ</button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->

                    <form action="{{ route('store_order', app()->getLocale()) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-25 position-relative">
            <div class="dm-select position-relative">
                <select name="client_id" class="form-control select2" required data-placeholder="اختر عميل...">
                    <option value="">العميل</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
                                                                        <span class="client-required-star">*</span>

            </div>
        </div>

        <div class="col-md-6 mb-25">
            <input placeholder="وقت التسليم" name="deadline" class="textbox-n form-control ih-medium ip-gray radius-xs b-light px-15" type="datetime-local" value="{{ old('deadline') }}" />
        </div>

        <div class="col-md-6 mb-25 position-relative">
            <select name="main_field_id" class="form-control px-15 select2" required data-placeholder="اختر مجال العمل الرئيسي...">
                                <option value="" selected>مجال العمل الرئيسي</option>

                @foreach ($main_fields as $field)
                    <option value="{{ $field->id }}" {{ old('main_field_id') == $field->id ? 'selected' : '' }}>
                        {{ $field->title }}
                    </option>
                @endforeach
            </select>
                                                                                    <span class="field-required-star">*</span>

        </div>

        <div class="col-md-6 mb-25">
            <select name="sub_field_id" class="form-control px-15 select2"  data-placeholder="اختر مجال العمل الفرعي...">
                <option value="" selected>مجال العمل الفرعي</option>

                @foreach ($sub_fields as $sub_field)
                    <option value="{{ $sub_field->id }}" {{ old('sub_field_id') == $sub_field->id ? 'selected' : '' }}>
                        {{ $sub_field->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 mb-25">
            <textarea name="desc" class="form-control" id="exampleFormControlTextarea1"  placeholder="وصف الطلب" rows="3">{{ old('desc') }}</textarea>
        </div>

        <p style="color:#000;font-weight: bolder;">قيمة الطلب:</p>
        <div class="col-md-6 mb-25 position-relative">
            <input type="text" required name="cvalue" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="للعميل" value="{{ old('cvalue') }}">
                                                                                    <span class="value-required-star">*</span>

        </div>

        <p style="color:#000;font-weight: bolder;"> بيانات التحويل:</p>
        <div class="col-md-6 mb-25">
            <div class="dm-select">

                <select name="method" class="form-control select2" data-placeholder="..اختر بيانات التحويل">
                    <option value=""></option>

                    @foreach ($transferMethods as $method)
            <option value="{{ $method->name }}" {{ old('method') == $method->name ? 'selected' : '' }}>
                {{ $method->name }}
            </option>
        @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6 mb-25">
            <input type="text" name="proof" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="إثبات التحويل" value="{{ old('proof') }}">
        </div>

        <p style="color:#000;font-weight: bolder;"> الرقم التعريفي لحوالة مجمعة :</p>
        <div class="col-md-4 mb-25">
            <input type="text" id="randomNumber" name="number" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="الرقم التعريفي للحوالة" value="{{ old('number') }}">
        </div>

        <p style="color:#000;font-weight: bolder;"> مستقل/مستقلين الطلب:</p>
<div class="container mt-3" id="freelancer-container">
    <div class="row freelancer-row" style="margin-bottom: 15px;">
        <div class="col-md-5 mb-25">
            <div class="form-group select-px-15 tagSelect-rtl">
                <div class="dm-select">
                    <select class="select2 form-control" name="freelancers[]" required data-placeholder="اختر مستقل...">
                        <option value="">اختر</option>
                        @foreach ($freelancers as $freelancer)
                        <option value="{{ $freelancer->name }}-{{ $freelancer->id }}">{{ $freelancer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-25">
            <input type="text" name="recieve[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" required placeholder="القيمة بالدولار">
        </div>
    </div>
</div>

<div class="text-center">
    <button type="button" class="btn btn-primary btn-sm" id="add-freelancer-btn" style="margin-top: 15px;">+</button>
</div>


        <div class="col-md-6 mt-5">
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


<script>
    $(document).ready(function () {
    // دالة لتهيئة Select2
    function initializeSelect2() {
        $('.select2').select2(); // إعادة تهيئة جميع الحقول باستخدام مكتبة Select2
    }

    initializeSelect2(); // تهيئة الحقول عند تحميل الصفحة

    // عند الضغط على زر الإضافة "+"
    $('#add-freelancer-btn').on('click', function () {
        var container = $('#freelancer-container'); // حاوية الصفوف
        var originalRow = $('.freelancer-row').first(); // الصف الأول كقالب
        var newRow = originalRow.clone(); // استنساخ الصف الأول

        // إزالة القيم المدخلة في الحقول الجديدة
        newRow.find('input').val(''); // تفريغ الحقول النصية
        newRow.find('select').val(null).trigger('change'); // إعادة تعيين الحقول المحددة

        // إزالة زر الإزالة من الصف الأول إن وجد (لتجنب التكرار)
        newRow.find('.remove-freelancer-btn').remove();

        // إضافة زر الإزالة "-" للصف الجديد فقط
        newRow.append('<button type="button" class="btn btn-danger btn-sm remove-freelancer-btn" style="margin-top: 10px;">-</button>');

        // إضافة الصف الجديد إلى الحاوية
        container.append(newRow);

        // إعادة تهيئة Select2 للحقول الجديدة
        initializeSelect2();
    });

    // عند الضغط على زر الإزالة "-"
    $(document).on('click', '.remove-freelancer-btn', function () {
        $(this).closest('.freelancer-row').remove(); // حذف الصف المحدد
    });
});

</script>
@endsection

