@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.edit-freelancer') }}</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>المستقلين</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('menu.edit-freelancer') }}</li>
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
                    <h6>{{ trans('menu.edit-freelancer') }}</h6>
                </div>
                <div class="card-body py-md-30">

                    @include('partials._errors')
                    <form action="{{route('update_freelancer' , [app()->getLocale() , $freelancer->id])}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-25">
                                <input type="text" name="name" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="الاسم ثلاثي" value="{{$freelancer->name}}">
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="number" name="age" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="السن" value="{{$freelancer->age}}">
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="number" name="exp" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="سنين الخبرة" value="{{$freelancer->exp}}">
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="text" name="country" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="البلد" value="{{$freelancer->country}}">
                            </div>
<div class="col-md-6 mb-25">
<select id="select-alerts50" name="type" class="country form-control">
    <option value="">الجنس</option>
    <option value="ذكر" {{ $freelancer->gender == 'ذكر' ? 'selected' : '' }}>ذكر</option>
    <option value="أنثى" {{ $freelancer->gender == 'أنثى'? 'selected' : '' }}>أنثى</option>
</select>
</div>
<div class="col-md-4 mb-25">
<input type="text" name="certificate" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="الشهادة العلمية" value="{{$freelancer->certificate}}">

                            </div>
                            <div class="col-md-6 mb-25">
                                <div class="form-group select-px-15 text-end">

                                    <select class="form-control px-15 text-end" id="countryOption" name="main_field_id" required>
<option class="text-end" selected disabled>مجال العمل الأساسي</option>
                                        @foreach ($mainfields as $field )

                                    <option value="{{$field->id}}" {{$freelancer->main_field->title == $field->title ? 'selected' : ''}}>{{$field->title}}</option>


                                        @endforeach
                                   </select>

                                </div>
                            </div>

                            <div class="col-md-6 mb-25">
                                <div class="form-group select-px-15 text-end">

                                    <select class="form-control px-15 text-end" id="countryOption0909" name="sub_field_id" required>
<option class="text-end" selected disabled>مجال العمل الفرعي</option>
                                        @foreach ($subfields as $field )

                                    <option value="{{$field->id}}" {{$freelancer->sub_field->title == $field->title ? 'selected' : ''}}>{{$field->title}}</option>


                                        @endforeach
                                   </select>

                                </div>
                            </div>


<div class="col-md-6 mb-25 position-relative">
    <label for="products">اختر المنتجات أو الخدمات</label>
    <select name="products[]" id="products" class="form-control" multiple required>
        @foreach($keywords as $keyword)
            <option value="{{ $keyword->name }}" 
                @if(in_array($keyword->name, $freelancerServices)) selected @endif>
                {{ $keyword->name }}
            </option>
        @endforeach
    </select>
</div>




                            <div class="col-md-6 mb-25">
                                <input type="text" name="languages" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="اللغات" value="{{$freelancer->languages}}">
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="text" name="wphone" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="رقم الواتساب أو الفيسبوك" value="{{$freelancer->wphone}}">
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="text" name="vphone" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="رقم فودافون كاش" value="{{$freelancer->vphone}}">
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="text" name="instapay" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="انستاباي" value="{{$freelancer->instapay}}">
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="text" name="email" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="البريد الإلكتروني" value="{{$freelancer->email}}">
                            </div>
                            <div class="col-md-6 mb-25">
                                <input type="text" name="cv" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="نماذج الأعمال" value="{{$freelancer->cv}}">
                            </div>
                            <div class="col-md-6">
                                <div class="layout-button mt-0">
                                    <button type="submit" class="btn btn-primary btn-default btn-squared px-30">تعديل</button>
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
document.addEventListener('DOMContentLoaded', function() {
    const element = document.getElementById('products');
    const maxItems = 11; // الحد الأقصى لعدد العناصر

    const choices = new Choices(element, {
        removeItemButton: true,
        placeholderValue: "اختر المنتجات أو الخدمات (بحد أقصى 11)", // النص الافتراضي
        searchPlaceholderValue: "ابحث هنا...", // نص البحث
    });

    // التحقق من الحد الأقصى
    element.addEventListener('addItem', function(event) {
        // إذا تجاوز العدد المسموح به
        if (choices.getValue(true).length > maxItems) {
            // منع إضافة العنصر الجديد
            event.preventDefault();

            // إزالة العنصر المضاف
            choices.removeActiveItemsByValue(event.detail.value);

            // إظهار رسالة تنبيه
            alert("يمكنك اختيار 11 عنصرًا كحد أقصى فقط!");
        }
    });
});
</script>

@endsection
