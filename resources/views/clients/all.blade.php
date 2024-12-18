<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

<!-- Add SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>




<style>
    .table-container {
        padding: 20px !important;
        background-color: #f9f9f9 !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important;
    }

    .table-container h4 {
        font-weight: 600 !important;
        color: #333 !important;
        margin-bottom: 20px !important;
    }

    .table thead th {
        background-color: #137dc7 !important;
        color: white !important;
        font-weight: 600 !important;
        text-align: center !important;
    }

    .table tbody tr {
        color: #666 !important;
        border-bottom: 1px solid #ddd !important;
    }

    .table tbody tr:hover {
        background-color: #e1f0ff !important;
    }

    .table td, .table th {
        vertical-align: middle !important;
        text-align: center !important;
        padding: 12px !important;
        white-space: nowrap !important;
    }

    .table .actions {
        display: flex !important;
        justify-content: center !important;
        gap: 10px !important;
    }

    .table .actions a {
        color: #333 !important;
        font-size: 1.2rem !important;
        transition: color 0.3s !important;
    }

    .table .actions a:hover {
        color: #2da9f7 !important;
    }

    /* Button for adding new orders */
    .add-order-btn {
        background-color: #2da9f7 !important;
        color: white !important;
        font-weight: 600 !important;
        border-radius: 5px !important;
        padding: 10px 20px !important;
        display: inline-block !important;
        text-decoration: none !important;
        transition: background 0.3s, color 0.3s !important;
    }

    .add-order-btn:hover {
        background-color: #1a8cd8 !important;
        color: #fff !important;
    }

    /* Responsive Table */
    @media (max-width: 992px) {
        .table-responsive {
            overflow-x: auto !important;
        }
    }
    
        .table-responsive {
    overflow-x: hidden !important;
}
</style>    
@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card mt-30">
                <div class="card-body">
                    <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                        <div class="table-responsive">
                            <div class="adv-table-table__header">
                                <h4>{{ trans('menu.clients') }}</h4>
                                <div class="adv-table-table__button">
                                    <a href="{{ route('add_clients', app()->getLocale()) }}" class="btn text-white" style="background-color: #2da9f7 !important;font-weight: 600 !important;            font-size: 15px !important;

">
                                        {{ trans('menu.add_clients') }}
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table text-md-nowrap mt-2" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">ID</th>
                                            <th class="wd-15p border-bottom-0">الاعتماد</th>
                                            <th class="wd-15p border-bottom-0">الاسم</th>
                                            <th class="wd-15p border-bottom-0">الدولة</th>
                                            <th class="wd-15p border-bottom-0">الأهمية</th>
                                            <th class="wd-15p border-bottom-0">الماهية</th>
                                            <th class="wd-15p border-bottom-0">المجال</th>






                                            <th class="wd-15p border-bottom-0">وكيل المبيعات</th>
                                            <th class="wd-15p border-bottom-0">مسؤول المبيعات</th>
                                            <th class="wd-15p border-bottom-0">المصدر</th>

                                            <th class="wd-15p border-bottom-0">الجنس</th>
                                            <th class="wd-15p border-bottom-0">الجوال</th>
                                            <th class="wd-15p border-bottom-0">الإيميل</th>
                                            <th class="wd-15p border-bottom-0">الملاحظات</th>
                                            <th class="wd-15p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $client->id }}</td>
                                            <td>{{ date('m-d', strtotime($client->created_at)) }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->country }}</td>
                                            <td>{{ $client->important }}</td>
                                            <td>{{ $client->what }}</td>
                                            <td>{{ $client->mainField->title }}</td>






                                            <td>{{ $client->user->name }}</td>
                                            <td>{{ \App\Models\User::where('id', $client->user->manager_id)->pluck('name')->first() }}</td>
                                            <td>{{ $client->source }}</td>

                                            <td>{{ $client->gender }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->notes ?? 'لا يوجد ملاحظات' }}</td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex">
                                                    <li>
                                                        <a href="{{ route('edit_client', [app()->getLocale(), $client->id]) }}" class="edit" title="تعديل">
                                                            <i class="uil uil-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="remove" title="حذف" onclick="confirmDelete('{{ route('delete_client', [app()->getLocale(), $client->id]) }}')">
                                                            <i class="uil uil-trash-alt text-danger"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
        title: 'هل أنت متأكد',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText:'نعم،احذفه',
        cancelButtonText: 'إلغاء',

    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

</script>


@endsection
