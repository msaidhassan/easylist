<!-- Add SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<!--<div class="container-fluid">-->
<!--    <div class="row">-->
<!--        <div class="col-lg-12">-->
<!--            <div class="breadcrumb-main">-->
<!--                <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.sub_fields') }}</h4>-->
<!--                <div class="breadcrumb-action justify-content-center flex-wrap">-->
<!--                    <nav aria-label="breadcrumb">-->
<!--                        <ol class="breadcrumb">-->
<!--                            <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i>{{ trans('menu.work_fields') }}</a></li>-->
<!--                            <li class="breadcrumb-item active" aria-current="page">{{ trans('menu.sub_fields') }}</li>-->
<!--                        </ol>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row">-->

<!--        <div class="col-lg-12">-->
<!--            <div class="card card-Vertical card-default card-md mb-4">-->
<!--                <div class="card-header d-flex align-items-center">-->
<!--                    <h6>{{ trans('menu.work_fields') }}-->
<!--                    {{-- <a class="btn btn-primary" href="">إضافة مجال عمل</a>  --}}-->
<!--                </h6>-->

<!--                <a href="{{route('add_sub_fields' , app()->getLocale())}}" class="btn btn-primary" >-->
<!--                    {{trans('menu.add_sub_field')}}-->
<!--                </a>-->
<!--                </div>-->
<!--                <div class="card-body py-md-30">-->

<!--                    <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">-->
<!--                        <div class="table-responsive">-->
<!--                            <div class="adv-table-table__header">-->
<!--                                {{-- <h4>{{ trans('menu.freelancers') }} </h4> --}}-->

<!--                                  <div class="adv-table-table__button">-->
<!--                                    {{-- <div class="dropdown">-->
<!--                                        <a class="btn btn-primary dropdown-toggle dm-select" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                            Export-->
<!--                                        </a>-->
<!--                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">-->
<!--                                            <a class="dropdown-item" href="#">copy</a>-->
<!--                                            <a class="dropdown-item" href="#">csv</a>-->
<!--                                            <a class="dropdown-item" href="#">print</a>-->
<!--                                        </div>-->
<!--                                    </div> --}}-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div id="filter-form-container"></div>-->
<!--                            <table class="table mb-0 table-borderless adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">-->
<!--                                <thead>-->
<!--                                    <tr class="userDatatable-header">-->
<!--                                        <th>-->
<!--                                            <span class="userDatatable-title">id</span>-->
<!--                                        </th>-->
<!--                                        <th>-->
<!--                                            <span class="userDatatable-title">الاسم</span>-->
<!--                                        </th>-->
<!--                                        <th>-->
<!--                                            <span class="userDatatable-title">المجال الرئيسي</span>-->
<!--                                        </th>-->


<!--                                        {{-- <th data-type="html" data-name='status'>-->
<!--                                            <span class="userDatatable-title"></span>-->
<!--                                        </th> --}}-->
<!--                                        <th>-->
<!--                                            <span class="userDatatable-title float-start">العمليات</span>-->
<!--                                        </th>-->
<!--                                    </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->

<!--                                    @foreach ($subfields as $sub )-->


<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            <div class="userDatatable-content">{{$sub->id}}</div>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <div class="d-flex">-->
<!--                                                <div class="userDatatable-inline-title">-->
<!--                                                    <a href="#" class="text-dark fw-500">-->
<!--                                                        <h6>{{$sub->title}}</h6>-->
<!--                                                    </a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <div class="d-flex">-->
<!--                                                <div class="userDatatable-inline-title">-->
<!--                                                    <a href="#" class="text-dark fw-500">-->
<!--                                                        <h6>{{$sub->mainField->title}}</h6>-->
<!--                                                    </a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </td>-->

<!--                                            <td>-->
<!--                                            <ul class="orderDatatable_actions mb-0 d-flex ">-->

<!--                                                <li>-->
<!--                                                    <a href="{{route('edit_sub_fields', [app()->getLocale(), $sub->id])}}" class="edit">-->
<!--                                                        <i class="uil uil-edit"></i></a>-->
<!--                                                </li>-->

<!--<li>-->
<!--    <a href="javascript:void(0);" class="remove" onclick="confirmDelete('{{route('delete_sub_fields', [app()->getLocale(), $sub->id])}}')">-->
<!--        <img src="{{ asset('assets/img/svg/trash-2.svg') }}" alt="trash-2" class="svg">-->
<!--    </a>-->
<!--</li>-->
<!--                                            </ul>-->
<!--                                        </td>-->
<!--                                    </tr>-->

<!--                                    @endforeach-->



<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                    </div>-->


<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card mt-30">
                <div class="card-body">
                    <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                        <div class="table-responsive">
                            <div class="adv-table-table__header">
                                <h4>{{ trans('menu.sub_fields') }}</h4>
                                <div class="adv-table-table__button">
                                    <a href="{{route('add_sub_fields', app()->getLocale())}}" class="btn text-white" style="background-color: #2da9f7 !important;font-weight: 600 !important;            font-size: 15px !important;

">
                                        {{ trans('menu.add_sub_field') }}
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table text-md-nowrap mt-2" id="example3">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">id</th>
                                            <th class="wd-15p border-bottom-0">الاسم</th>
                                            <th class="wd-15p border-bottom-0">المجال الرئيسي</th>
                                            <th class="wd-15p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subfields as $sub)
                                        <tr>
                                            <td>{{ $sub->id }}</td>
                                            <td>{{ $sub->title }}</td>
                                            <td>{{ $sub->mainField->title }}</td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex">
                                                    <li>
                                                        <a href="{{route('edit_sub_fields', [app()->getLocale(), $sub->id])}}" class="edit" title="تعديل">
                                                            <i class="uil uil-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="remove" title="حذف" onclick="confirmDelete('{{route('delete_sub_fields', [app()->getLocale(), $sub->id])}}')">
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
                <h5 class="modal-title" id="exampleModalLabel">{{trans('menu.add-field')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store_fields', app()->getLocale())}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-25">
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="مجال العمل" name="title" required>
                        </div>
                        <div class="col-md-6 mb-25">
                            <div class="form-group select-px-15 text-end">
                                <select class="form-control px-15 text-end" id="countryOption" name="type" required>
                                    <option class="text-end">النوع</option>
                                    <option value="رئيسي">رئيسي</option>
                                    <option value="فرعي">فرعي</option>
                                </select>
                            </div>
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

<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'هل انت متأكد؟',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم، احذفه',
        cancelButtonText: 'لا'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
</script>

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
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{trans('menu.add-field')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="{{route('store_fields',app()->getLocale())}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-25">
                        <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="مجال العمل" name="title" required>
                    </div>
                    <div class="col-md-6 mb-25">
                        {{-- <input type="" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="النوع"> --}}
                        <div class="form-group select-px-15 text-end">

                            <select class="form-control px-15 text-end" id="countryOption" name="type" required>
                                <option class="text-end">النوع</option>
                                <option value="رئيسي">رئيسي</option>
                                <option value="فرعي">فرعي</option>
                            </select>
                        </div>
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
