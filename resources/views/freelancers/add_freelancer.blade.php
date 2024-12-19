@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>



<style>
        .position-relative {
        position: relative;
    }

.select2-container{
    direction:ltr !important;
}


.name-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 105px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}

.dawla-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 62px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.asasy-required-star {
    color: #1183c9;
    position: absolute;
    top: 40%;
    left: calc(100% - 168px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.fry-required-star {
    color: #1183c9;
    position: absolute;
    top: 40%;
    left: calc(100% - 155px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.products-required-star {
    color: #1183c9;
    position: absolute;
    top: 30%;
    left: calc(100% - 262px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
    z-index: 9999999999;
}
.languages-required-star {
    color: #1183c9;
    position: absolute;
    top: 33%;
    left: calc(100% - 75px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}
.wphone-required-star {
    color: #1183c9;
    position: absolute;
    top: 50%;
    left: calc(100% - 119px);
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
}

.choices {
    z-index: 1000; /* لضمان ظهور القائمة فوق العناصر الأخرى */
}

.choices__inner {
    border: 1px solid #ddd; /* ضبط الحدود لتتناسب مع التصميم */
    border-radius: 5px; /* تحسين شكل الزوايا */
}

.choices__list--dropdown {
    max-height: 200px; /* تحديد أقصى ارتفاع للقائمة */
    overflow-y: auto; /* تمكين التمرير إذا كانت القائمة طويلة */
}

.choices__list--multiple {
    display: flex;
    flex-wrap: wrap;
}



</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.add-freelancer') }}</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>المستقلين</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('menu.add-freelancer') }}</li>
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
                    <h6>{{ trans('menu.add-freelancer') }}</h6>
                </div>
                <div class="card-body py-md-30">

                    @include('partials._errors')
                    
                    

<form action="{{ route('store_freelancer', app()->getLocale()) }}" method="POST">
    @csrf
    <div class="row">
        <!-- الاسم والسن -->
        <div class="col-md-6 mb-25 position-relative">
            <input type="text" required name="name" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="الاسم ثلاثي" value="{{ old('name') }}">
            <span class="name-required-star">*</span>
        </div>
        <div class="col-md-6 mb-25">
            <input type="number" name="age" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="السن " value="{{ old('age') }} " style="direction:rtl;">
        </div>
    </div>
    <div class="row">
        <!-- الخبرة والدولة -->
        <div class="col-md-6 mb-25">
            <input type="number" name="exp" min="0" max="50" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="سنين الخبرة" value="{{ old('exp') }}"  style="direction:rtl;">
        </div>
        <div class="col-md-6 mb-25 position-relative">
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
    <div class="row">
        <!-- النوع والشهادة -->

        
        <div class="col-md-6 mb-25">
            <select id="select-alerts50" name="type" class="country form-control">
                <option value="">الجنس</option>
                <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                <option value="أنثى" {{ old('gender') == 'أنثي' ? 'selected' : '' }}>أنثى</option>
            </select>
        </div>
        
        <div class="col-md-6 mb-25">
            <input type="text" name="certificate" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="الشهادة العلمية" value="{{ old('certificate') }}">
        </div>
    </div>
    <div class="row">
        <!-- مجال العمل الأساسي والفرعي -->
        <div class="col-md-6 mb-25 position-relative">
            <select class="form-control px-15" id="countryOption" name="main_field_id" required>
                <option disabled {{ old('main_field_id') ? '' : 'selected' }}>مجال العمل الأساسي</option>
                @foreach ($mainfields as $field)
                    <option value="{{ $field->id }}" {{ old('main_field_id') == $field->id ? 'selected' : '' }}>{{ $field->title }}</option>
                @endforeach
            </select>
            <span class="asasy-required-star">*</span>
        </div>
        <div class="col-md-6 mb-25 position-relative">
            <select class="form-control px-15" id="countryOption0909" name="sub_field_id" required>
                <option disabled {{ old('sub_field_id') ? '' : 'selected' }}>مجال العمل الفرعي</option>
                @foreach ($subfields as $field)
                    <option value="{{ $field->id }}" {{ old('sub_field_id') == $field->id ? 'selected' : '' }}>{{ $field->title }}</option>
                @endforeach
            </select>
            <span class="fry-required-star">*</span>
        </div>
    </div>
    <div class="row">
        <!-- المنتجات واللغات -->
        <!--<div class="col-md-6 mb-25 position-relative">-->
        <!--    <input type="text" required name="products" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="المنتجات أو الخدمات" value="{{ old('products') }}">-->
        <!--    <span class="products-required-star">*</span>-->
        <!--</div>-->
        
<div class="col-md-6 mb-25 position-relative">
    <select name="products[]" id="products" class="form-control" multiple required>
        @foreach($keywords as $keyword)
            <option value="{{ $keyword->name }}">{{ $keyword->name }}</option>
        @endforeach
    </select>
    <span class="products-required-star">*</span>
    <div id="products-error" style="color: red; display: none;">يمكنك اختيار 11 عنصرًا كحد أقصى فقط.</div>
</div>






        
        <div class="col-md-6 mb-25 position-relative">
            <input type="text" required name="languages" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="اللغات" value="{{ old('languages') }}">
            <span class="languages-required-star">*</span>
        </div>
    </div>
    <div class="row">
        <!-- رقم الواتساب وفودافون كاش -->
        <div class="col-md-6 mb-25 position-relative">
            <input type="text" required name="wphone" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder=" رقم الواتساب " value="{{ old('wphone') }}">
            <span class="wphone-required-star">*</span>
        </div>
        <div class="col-md-6 mb-25">
            <input type="text" name="vphone" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="رقم فودافون كاش" value="{{ old('vphone') }}">
        </div>
    </div>
    <div class="row">
        <!-- انستا باي والبريد الإلكتروني -->
        <div class="col-md-6 mb-25">
            <input type="text" name="instapay" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="انستا باي" value="{{ old('instapay') }}">
        </div>
        <div class="col-md-6 mb-25">
            <input type="text" name="email" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="البريد الإلكتروني" value="{{ old('email') }}">
        </div>
    </div>
    <div class="row">
        <!-- نماذج الأعمال وزر الحفظ -->
        <div class="col-md-6 mb-25">
            <input type="text" name="cv" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="نماذج الأعمال" value="{{ old('cv') }}">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-default btn-squared px-30">حفظ</button>
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
