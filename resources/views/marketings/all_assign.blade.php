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
    .add-btn {
        background-color: #2da9f7 !important;
        color: white !important;
        font-weight: 600 !important;
        border-radius: 5px !important;
        padding: 10px 20px !important;
        display: inline-block !important;
        text-decoration: none !important;
        transition: background 0.3s, color 0.3s !important;
    }

    .add-btn:hover {
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

@section('title', $title)
@section('description', $description)
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
                                <h4>{{ trans('menu.marketing') }}</h4>
                                <div class="adv-table-table__button">
                                    <a href="{{ route('assign_client', app()->getLocale()) }}" class="add-btn">
                                        {{ trans('menu.assign_client') }}
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table text-md-nowrap mt-2" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">id</th>
                                            <th class="wd-15p border-bottom-0">العميل الأساسي</th>
                                            <th class="wd-15p border-bottom-0">العميل المضاف</th>
                                            <th class="wd-15p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assigns as $assign)
                                        <tr>
                                            <td>{{ $assign->id }}</td>
                                            <td> {{ $assign->previousClient->name}} </td>
                                            <td><a href= "{{route('all_previous_client_orders',[app()->getLocale(),$assign->id])}}">{{$assign->existingClient->name }} </a> </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex">
                                                    <li>
                                                        <a href="{{ route('tree', [app()->getLocale(), $assign->id]) }}" class="view" title="عرض">
                                                            <i class="uil uil-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('edit_assign_client', [app()->getLocale(), $assign->id]) }}" class="edit" title="تعديل">
                                                            <i class="uil uil-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="remove" title="حذف" onclick="confirmDelete('{{ route('delete_assign_client', [app()->getLocale(), $assign->id]) }}')">
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

<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'هل انت متأكد؟',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'إالغاء',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
</script>

@endsection
