<style>

.main {
    margin-top: 2%;
    margin-left: 29%;
    font-size: 28px;
    padding: 0 10px;
    width: 100%;
}

.main h2 {
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 24px;
    margin-bottom: 10px;
}

.main .card {
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: auto;
    margin-bottom: 20px;
    padding: 20px 0 20px 50px;
}

.main .card table {
    border: none;
    font-size: 16px;
    height: 270px;
    width: 80%;
}

.edit {
    position: absolute;
    color: #e7e7e8;
    right: 14%;
}

.social-media {
    text-align: center;
    width: 90%;
}

.social-media span {
    margin: 0 10px;
}

.fa-facebook:hover {
    color: #4267b3 !important;
}

.fa-twitter:hover {
    color: #1da1f2 !important;
}

.fa-instagram:hover {
    color: #ce2b94 !important;
}

.fa-invision:hover {
    color: #f83263 !important;
}

.fa-github:hover {
    color: #161414 !important;
}

.fa-whatsapp:hover {
    color: #25d366 !important;
}

.fa-snapchat:hover {
    color: #fffb01 !important;
}

</style>

@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title"></h4>
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
                    <h6>{{ $freelancer->name }}</h6>
                </div>
                <div class="card-body py-md-30">


                    <div class="main">
                        <div class="card">
                            <div class="card-body">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>الاسم</td>
                                        <td>:</td>
                                        <td>{{ $freelancer->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>البريد الإلكتروني</td>
                                        <td>:</td>
                                        <td>
    <span>
                <span id="email-{{ $freelancer->id }}">{{ $freelancer->email }}</span>

        <i class="fas fa-copy" style="cursor: pointer; margin-right: 5px;" onclick="copyToClipboard('email-{{ $freelancer->id }}')"></i>
    </span>
</td>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    function copyToClipboard(elementId) {
        const text = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(text).then(() => {
            alert("تم نسخ النص: " + text);
        }).catch(err => {
            console.error("فشل النسخ: ", err);
        });
    }
</script>
                                    </tr>
                                    <tr>
                                        <td>الدولة</td>
                                        <td>:</td>
                                        <td>{{ $freelancer->country }}</td>
                                    </tr>
                                    <tr>
                                        <td>الواتس </td>
                                        <td>:</td>
                                        <td>
    <a href="https://wa.me/{{ $freelancer->wphone }}" target="_blank">
        {{ $freelancer->wphone }}
    </a>
</td>

                                    </tr>
                                    <tr>
                                        <td>رقم فودافون كاش</td>
                                        <td>:</td>
<td><a href="tel:{{ $freelancer->vphone }}">{{ $freelancer->vphone }}</a></td>
                                    </tr>
                                    <tr>
                                        <td>انستاباي</td>
                                        <td>:</td>
                                                        <td>
    <span>
                <span id="instapay-{{ $freelancer->id }}">{{ $freelancer->instapay }}</span>

        <i class="fas fa-copy" style="cursor: pointer; margin-right: 5px;" onclick="copyToClipboard('instapay-{{ $freelancer->id }}')"></i>
    </span>
</td>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    function copyToClipboard(elementId) {
        const text = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(text).then(() => {
            alert("تم نسخ النص: " + text);
        }).catch(err => {
            console.error("فشل النسخ: ", err);
        });
    }
</script>
                                    </tr>
                                    <tr>
                                        <td>العمر</td>
                                        <td>:</td>
                                        <td>{{ $freelancer->age }}</td>
                                    </tr>
                                    <tr>
                                        <td>سنين الخبرة</td>
                                        <td>:</td>
                                        <td>{{ $freelancer->exp }}</td>
                                    </tr>

                                    <tr>
                                        <td>مجال العمل الرئيسي  </td>
                                        <td>:</td>
                                        <td>{{ $freelancer->main_field->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>مجال العمل الفرعي  </td>
                                        <td>:</td>
                                        <td>{{ $freelancer->sub_field->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>النوع</td>
                                        <td>:</td>
                                        <td>{{ $freelancer->type }}</td>
                                    </tr>
                                    <tr>
                                        <td>اللغة</td>
                                        <td>:</td>
                                        <td>{{ $freelancer->languages }}</td>
                                    </tr>
                                    <tr>
                                        <td>المنتجات أو الخدمات</td>
                                        <td>:</td>
                                        <td>{{ $freelancer->products }}</td>
                                    </tr>

                                    <tr>
                                        <td>السيرة الذاتية أو نماذج الاعمال</td>
                                        <td>:</td>
                                        <td><a href="{{ $freelancer->cv }}">{{ $freelancer->cv }}</a></td>
                                    </tr>
                                @if ($freelancer->ratings)

                                    <tr>

                                        <td> إجمالي التقييم</td>

                                        <td>:</td>

{{--                                            {{ $rate->rating }}--}}
                                        <td> {{$total_value_of_rating}}</td>
                                    </tr>

                                            @else
                                            <tr>
                                                <td>التقييم</td>
                                                <td>:</td>
                                                <td>لايوجد تقييم</td>
                                            </tr>
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card card-Vertical card-default card-md mb-4">
                                    <div class="card-header">
                                        <h6>{{ trans('menu.add_rating') }}</h6>
                                    </div>
                                    <div class="card-body py-md-30">

                                        @include('partials._errors')

                                        <form action="{{route('store_rating' , app()->getLocale() )}}" method="POST">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-6 mb-25">
                                                    <div class="dm-select">

                                                        <select name="freelancer_id"  class="form-control ">
                                                                <option value="{{$freelancer->id}}">{{$freelancer->name}}</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-25">
                                                    <input type="number" name="rating" max="10" min="1" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="التقييم" name="title" required>
                                                </div>

                                                <div class="col-md-12 mb-25">
                                                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" placeholder="التعليق" rows="3"></textarea>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="layout-button mt-0">
                                                        <button type="submit" class="btn btn-primary btn-default btn-squared px-30">حفظ</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
<div class="rating-list">
    @foreach($freelancer->ratings as $rate)
        <div class="rating-item">
            <div class="rating-header">
                <p class="rating-value"><strong>التقييم:</strong> {{$rate->rating}}</p>
                <p class="rating-date"><strong>تاريخ الإضافة:</strong> {{ $rate->created_at->format('d-m-Y H:i') }}</p>
            </div>
            <p class="rating-comment"><strong>التعليق:</strong> {{$rate->comment ?? 'لا يوجد تعليق'}}</p>
            <div class="user-info">

                <p class="user-name"><strong>اسم المستخدم:</strong> {{$rate->user->name}}</p>
            </div>
        </div>
    @endforeach
</div>

<!-- Example CSS to make the design more attractive -->
<style>
    .rating-list {
        width: 100%;
        padding: 20px;
        background-color: #f4f6f8;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .rating-item {
        background-color: #ffffff;
        margin-bottom: 20px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .rating-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .rating-value {
        font-size: 18px;
        font-weight: bold;
        color: #2d3b44;
    }

    .rating-date {
        font-size: 14px;
        color: #888888;
    }

    .rating-comment {
        font-size: 16px;
        color: #555;
        margin-top: 10px;
        line-height: 1.5;
    }

    .user-info {
        display: flex;
        align-items: center;
        margin-top: 15px;
        justify-content: flex-start;
    }

    .user-avatar img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }

    .user-name {
        font-size: 15px;
        color: #333;
    }

    /* Add a hover effect to the rating item for better interactivity */
    .rating-item:hover {
        background-color: #f9f9f9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
        transition: all 0.3s ease-in-out;
    }
</style>


                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card">
                            <div class="card-body">
                                <i class="fa fa-pen fa-xs edit"></i>
                                <div class="social-media">
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-invision fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                            </div>
                        </div> --}}
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
