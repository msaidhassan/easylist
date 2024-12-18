<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

<!-- Add SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


<style>
    .wrapper{
  padding: 40px;
  text-align:center;
}
.wrapper h2{
  padding-bottom: 20px;
}
.wrapper #file-input{
  display:none;
}

.wrapper label[for='file-input'] *{
  vertical-align:middle;
  cursor:pointer;
}

.wrapper label[for='file-input'] span{
  margin-left: 10px
}

.wrapper i.remove{
  vertical-align:middle;
  margin-left: 5px;
  cursor:pointer;
  display:none;
}

    .table-responsive {
    overflow-x: hidden !important;
}



</style>
@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="container-fluid my-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center  text-white" style="background-color:#1183c9 !important;">
            <h4 class="mb-3 text-white">إدارة المستقلين</h4>
            <a href="{{ route('add_freelancer', app()->getLocale()) }}" class="btn btn-light btn-sm">
                <i class="fa-solid fa-plus"></i> إضافة مستقل
            </a>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <form action="{{ route('filter_free', app()->getLocale()) }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    <select name="filterB" class="form-select form-select-sm me-2" required>
                        <option value="">اختر الفئة</option>
                        <option value="all">الكل</option>
                        <option value="hot">القائمة الساخنة</option>
                        <option value="cold">القائمة الباردة</option>
                        <option value="archive">الأرشيف</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">فرز</button>
                </form>
                <button id="sortFreelancersBtn" class="btn btn-outline-primary btn-sm">
                    ترتيب حسب التقييم
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle" id="example2">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>السن</th>
                            <th>البلد</th>
                            <th> الرئيسي</th>
                            <th> الفرعي</th>
                            <th>المنتجات</th>
                            <th>الخبرة</th>
                            <th>التقييم</th>
                            <th>النوع</th>
                            <th>الشهادة</th>
                            <th>اللغات</th>
                            <th>الواتساب</th>
                            <th>البريد</th>
                            <th>السيرة الذاتية</th>
                            <th>طلبات جارية</th>
                            <th>طلبات مُسلمة</th>
                            <th>الإجازات</th>
                            <th>فودافون كاش</th>
                            <th>انستاباي</th>

                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($freelancers as $freelancer)
                        <tr>
                            <td>{{ $freelancer->id }}</td>
                            <td>{{ $freelancer->name }}</td>
                            <td>{{ $freelancer->age }}</td>
                            <td>{{ $freelancer->country }}</td>
                            <td>{{ $freelancer->main_field->title }}</td>
                            <td>{{ $freelancer->sub_field->title }}</td>
                            <td>{{ $freelancer->products }}</td>
                                                        <td>{{ $freelancer->exp ? $freelancer->exp : 0  }}</td>

                                                        <td>{{ $freelancer->ratings->count() ? round($freelancer->ratings->sum('rating') / $freelancer->ratings->count(), 1) : '0' }}</td>


                            <td>{{ $freelancer->type }}</td>
                            <td>{{ $freelancer->certificate }}</td>
                            <td>{{ $freelancer->languages }}</td>
<td>
    <a href="https://wa.me/{{ $freelancer->wphone }}" target="_blank">
        {{ $freelancer->wphone }}
    </a>
</td>
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
                            <td>{{ $freelancer->cv }}</td>
                                                        <td>{{ count(json_decode($freelancer->freelancer_current_orders) ?? []) }}</td>
                            <td>{{ count(json_decode($freelancer->freelancer_delivered_orders) ?? []) }}</td>
                            <td class="text-center">
                                @if (App\Models\Holiday::where('freelancer_id', $freelancer->id)->exists())
                                    <span class="badge bg-danger">إجازة</span>
                                @else
                                    <span class="badge bg-success">لا</span>
                                @endif
                            </td>
                                                        <td><a href="tel:{{ $freelancer->vphone }}">{{ $freelancer->vphone }}</a></td>

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



<td class="text-center">
    <div class="d-flex justify-content-center gap-2">
        <!-- عرض -->
        <a href="{{ route('show_freelancer', [app()->getLocale(), $freelancer->id]) }}" class="btn btn-sm btn-outline-info" title="عرض">
            <i class="uil uil-eye"></i>
        </a>
        <!-- تعديل -->
        <a href="{{ route('edit_freelancer', [app()->getLocale(), $freelancer->id]) }}" class="btn btn-sm btn-outline-warning" title="تعديل">
            <i class="uil uil-edit"></i>
        </a>
        <!-- حذف -->
        <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" onclick="confirmDelete('{{ route('delete_freelancer', [app()->getLocale(), $freelancer->id]) }}')" title="حذف">
            <i class="uil uil-trash-alt"></i>
        </a>
        <!-- إضافة إجازة -->
        <a href="{{ route('holiday', [app()->getLocale(), $freelancer->id]) }}" class="btn btn-sm btn-outline-secondary" title="إضافة إجازة">
            <i class="fa-solid fa-plane"></i>
        </a>
        <!-- عودة من الإجازة -->
        <a href="{{ route('return_holiday', [app()->getLocale(), $freelancer->id]) }}" class="btn btn-sm btn-outline-success" title="عودة من الإجازة">
            <i class="fa-solid fa-rotate-left"></i>
        </a>
    </div>
</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{trans('menu.add-freelancers')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            <form class="form-container" action="{{route('saveFreelancers',app()->getLocale())}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="wrapper">
                    <h2>{{trans('menu.Custom_File_Input')}}</h2>
                    <input type="file" name="file" id="file-input">
                    <label for="file-input">
                      <i class="fa fa-paperclip fa-2x"></i>
                      <span></span>
                    </label>
                    <i class="fa fa-times-circle remove"></i>
                  </div>
                  <button type="submit" class="btn btn-primary">رفع</button>
            </form>




        </div>

      </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<script>


$("document").ready(function () {
  var $file = $("#file-input"),
    $label = $file.next("label"),
    $labelText = $label.find("span"),
    $labelRemove = $("i.remove"),
    labelDefault = $labelText.text();

  // on file change
  $file.on("change", function (event) {
    var fileName = $file.val().split("\\").pop();
    if (fileName) {
      console.log($file);
      $labelText.text(fileName);
      $labelRemove.show();
    } else {
      $labelText.text(labelDefault);
      $labelRemove.hide();
    }
  });

  // Remove file
  $labelRemove.on("click", function (event) {
    $file.val("");
    $labelText.text(labelDefault);
    $labelRemove.hide();
    console.log($file);
  });
});


</script>


<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'ةل انت متأكد؟',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم ، احذفة',
        cancelButtonText: 'لا',

    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}
</script>





<script>
    document.getElementById('sortFreelancersBtn').addEventListener('click', function() {
    // طلب Ajax لترتيب المستقلين بناءً على التقييم
    $.ajax({
        url: '{{ route('sort_freelancers' , app()->getLocale()) }}',
        type: 'GET',
        success: function(response) {
    let tableBody = $('#example2 tbody'); 
    tableBody.empty(); // تفريغ الجدول قبل إعادة ملء البيانات

    response.forEach(function(freelancer) {
        let row = `
            <tr>
                <td>${freelancer.id}</td>
                <td>${freelancer.name}</td>
                <td>${freelancer.main_field ? freelancer.main_field.title : ''}</td>
                <td>${freelancer.sub_field ? freelancer.sub_field.title : ''}</td>
                <td>${freelancer.products}</td>
                <td>${freelancer.languages}</td>
                <td>${freelancer.holiday ? 'إجازة' : 'لا يوجد'}</td>
                <td>${freelancer.current_orders ? freelancer.current_orders.length : 0}</td>
                <td>${freelancer.delivered_orders ? freelancer.delivered_orders.length : 0}</td>
                <td>${freelancer.average_rating.toFixed(1)}</td>
                <td>
                    <ul class="orderDatatable_actions mb-0 d-flex">
                        <li>
                            <a href="/freelancer/${freelancer.id}" title="عرض" class="view">
                                <i class="uil uil-eye"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/holiday/${freelancer.id}" title="إجازة" class="view">
                                <i class="fa-solid fa-house"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/return_holiday/${freelancer.id}" title="عودة من الإجازة" class="view">
                                <i class="fa-solid fa-rotate-left"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/edit_freelancer/${freelancer.id}" title="تعديل" class="edit">
                                <i class="uil uil-edit"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="remove" onclick="confirmDelete('/delete_freelancer/${freelancer.id}')">
                                <img src="{{ asset('assets/img/svg/trash-2.svg') }}" alt="trash-2" class="svg">
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        `;
        tableBody.append(row);
    });
},

        error: function(xhr) {
            console.error(xhr);
        }
    });
});

</script>


<script>
// دالة لترتيب الجدول حسب ID من الأكبر إلى الأصغر
function sortTableById() {
    // الحصول على الجدول والصفوف
    let table = document.getElementById('example2');
    let rows = Array.from(table.rows).slice(1); // استبعاد صف العناوين

    // ترتيب الصفوف بناءً على العمود الأول (ID)
    rows.sort((a, b) => {
        let idA = parseInt(a.cells[0].innerText); // استخراج الـ ID من الصف الأول
        let idB = parseInt(b.cells[0].innerText);
        return idB - idA; // ترتيب تنازلي
    });

    // إعادة ترتيب الصفوف داخل الجدول
    rows.forEach(row => table.tBodies[0].appendChild(row));
}

// تشغيل الدالة تلقائيًا عند تحميل الصفحة
window.onload = sortTableById;


</script>










@endsection
