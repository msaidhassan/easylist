<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

<!-- Add SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>



<style>
    /* New Style Adjustments */
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
            font-size: 15px !important;
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

.order-values {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.value-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.value-row .label {
  font-weight: bold;
  margin-left: 10px;
}

.value-row .amount {
  text-align: right;
}

</style>



@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card mt-30">
                <div class="card-body">
                    <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                        <div class="table-responsive">
                          <div class="adv-table-table__header">
                            <h4>{{ trans('menu.orders') }}</h4>
                            <div class="adv-table-table__button">
                                <a href="{{route('add_order' , app()->getLocale())}}"  class="add-order-btn" >
                            {{trans('menu.add_order')}}
                                </a>
                            </div>
                        </div>

                            <div class="table-responsive">
<table class="table text-md-nowrap mt-2" id="example2">
    <thead>
        <tr>
            <th class="wd-15p border-bottom-0">ID</th>
            <th class="wd-10p border-bottom-0">الحالة</th>
            <th class="wd-15p border-bottom-0"> التسليم</th>
            <th class="wd-15p border-bottom-0">العميل</th>
                        <th class="wd-10p border-bottom-0">المستقلين </th>
            <th class="wd-15p border-bottom-0">
                 للعميل
            </th>
            <th class="wd-15p border-bottom-0">
                 للمستقل
            </th>
            <th class="wd-15p border-bottom-0">
                 للوكيل
            </th>
            <th class="wd-10p border-bottom-0">الجرد</th>

            <th class="wd-15p border-bottom-0">مجالات الطلب</th>
                        <th class="wd-10p border-bottom-0">وصف الطلب</th>

            <th class="wd-15p border-bottom-0">تاريخ الاعتماد</th>

            <th class="wd-10p border-bottom-0">وسيلة التحويل</th>
            <th class="wd-10p border-bottom-0">اثبات التحويل</th>
            <th class="wd-10p border-bottom-0">العمليات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->status}}</td>
<td>{{ \Carbon\Carbon::parse($order->deadline)->locale('ar')->translatedFormat('d F - h:i') }}</td>
            <td>{{ $order->client ? $order->client->name : 'N/A' }}</td>

                        <td>
                @php
                    $freelancers = json_decode($order->freelancer_details, true);
                @endphp
                @if($freelancers)
                    @foreach($freelancers as $freelancer)
                        <p>{{preg_replace('/\d+$/', '', str_replace(" -","",$freelancer['name']))}}: {{$freelancer['compensation']}}</p>
                    @endforeach
                @endif
            </td>

                        <td>{{$order->cvalue}}</td>
                        <td>{{$order->fvalue}}</td>
                        <td>{{$order->avalue}}</td>
                        <td>
                @if(isset($order->status_inventory) && $order->status_inventory == 'تم')
                    {{$order->status_inventory}} - {{date_format(date_create($order->inventory_date),'Y-m-d')}}
                @else
                    لم يتم 
                @endif
            </td>
            
            <td>{{$order->mainField->title}} - {{$order->subField->title}}</td>
                        <td>{{$order->desc}}</td>

            <td>{{date_format($order->created_at,'Y-m-d')}}</td>

            <td>{{$order->method}}</td>
            <td>{{$order->proof}}</td>


            <td>
                <ul class="orderDatatable_actions mb-0 d-flex">
                    @if($order->status != 'مسلم')
                        <li>
                            <a href="{{route('update_order_status', [app()->getLocale(), $order->id])}}" title="تغيير حالة الطلب الي مسلم">
                                <img src="{{ asset('assets/img/svg/status.jpg') }}" alt="test" class="jpg">
                            </a>
                        </li>
                    @endif
                    <div class="actions">
                        <a href="{{route('edit_order', [app()->getLocale(), $order->id])}}" class="edit" title="Edit">
                            <i class="uil uil-edit"></i>
                        </a>
                        <a href="javascript:void(0);" class="remove" title="Delete" onclick="confirmDelete('{{route('delete_order', [app()->getLocale(), $order->id])}}')">
                            <i class="uil uil-trash-alt text-danger"></i>
                        </a>
                    </div>
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










@endsection
