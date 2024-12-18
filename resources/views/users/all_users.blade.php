<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

<!-- Add SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>



    <style>


        .table-container {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table-container h4 {
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .table thead th {
                    background-color: #137dc7 !important;

            color: white;
            font-weight: 600;
            text-align: center;
        }

        .table tbody tr {
            color: #666; /* Softer gray for client data */
            border-bottom: 1px solid #ddd; /* Divider between clients */
        }

        .table tbody tr:hover {
            background-color: #e1f0ff;
        }

        .table td, .table th {
            vertical-align: middle;
            text-align: center;
            padding: 12px;
            white-space: nowrap; /* Ensure the date remains in one row */
        }

        .table .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .table .actions a {
            color: #333;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .table .actions a:hover {
            color: #2da9f7;
        }

        /* Button for adding new clients */
        .add-user-btn {
            background-color: #2da9f7;
            color: white;
            font-weight: 600;
            border-radius: 5px;
            padding: 10px 20px;
            display: inline-block;
            text-decoration: none;
            transition: background 0.3s, color 0.3s;
        }

        .add-user-btn:hover {
            background-color: #1a8cd8;
            color: #fff; /* Make text white on hover */
        }

        /* Responsive Table */
        @media (max-width: 992px) {
            .table-responsive {
                overflow-x: auto;
            }
        }
        
        .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #2da9f7 !important;
    border-color: #2da9f7 !important;
}
    </style>


@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
 <div class="container-fluid mt-4">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>{{ trans('menu.users') }}</h4>
                <a href="{{ route('add_user', app()->getLocale()) }}" class="add-user-btn">
                    {{ trans('menu.user-add') }}
                </a>
            </div>

            <div class="table-responsive">
                <table class="table" id="example2">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>اللقب</th>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>الرتبة</th>
                            <th>مسؤول المبيعات</th>
                            <th>رقم الموبايل</th>
                            <th>نبذة</th>
                            <th>واتساب</th>
                            <th>فيسبوك</th>
                            <th>بيانات الدفع</th>
                            <th>فودافون كاش</th>
                            <!--<th>كلمة المرور</th>-->
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span>{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($user->hasRole('وكيل مبيعات') && $user->manager)
                                    {{ $user->manager->name }}
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->about }}</td>
                            <td>{{ $user->wphone }}</td>
                            <td>{{ $user->facebook }}</td>
                            <td>{{ $user->pay }}</td>
                            <td>{{ $user->vcashe }}</td>
                            <!--<td>-->
                            <!--    <div class="userDatatable-content">-->
                            <!--        @php-->
                            <!--        try {-->
                            <!--            $decryptedPassword = Crypt::decryptString($user->password);-->
                            <!--            echo $decryptedPassword;-->
                            <!--        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {-->
                            <!--            echo $user->password;-->
                            <!--        }-->
                            <!--        @endphp-->
                            <!--    </div>-->
                            <!--</td>-->
                            <td>
                                <div class="actions">
                                    <a href="{{ route('edit_user', [app()->getLocale(), $user->id]) }}" class="edit" title="Edit"><i class="uil uil-edit"></i></a>
                                    <a href="javascript:void(0);" class="remove" title="Delete" onclick="confirmDelete('{{ route('delete_users', [app()->getLocale(), $user->id]) }}')">
                                        <i class="uil uil-trash-alt text-danger"></i>
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