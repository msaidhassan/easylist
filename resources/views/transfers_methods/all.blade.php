<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

@section('title',$title)
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
                                <h4>{{ trans('menu.transfers_methods') }}</h4>
                                <div class="adv-table-table__button">
                                    <!-- Button to open the modal -->
                                    <a href="{{route('TransfersMethods.add', app()->getLocale())}}" class="btn text-white" style="background-color: #2da9f7 !important;font-weight: 600 !important;            font-size: 15px !important;

                                        ">                                        {{ trans('menu.add_transfer_method') }}
                                    </a>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table text-md-nowrap mt-2" id="transferMethodsTable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">id</th>
                                            <th class="wd-15p border-bottom-0">الاسم</th>
                                            <th class="wd-15p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transferMethods as $method)
                                        <tr>
                                            <td>{{ $method->id }}</td>
                                            <td>{{ $method->name }}</td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex justify-content-center">
                                                    <li>
                                                        <a href="{{ route('TransfersMethods.edit', [app()->getLocale(), $method->id]) }}" class="edit" title="تعديل">
                                                            <i class="uil uil-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="remove" title="حذف" onclick="confirmDelete('{{ route('TransfersMethods.delete', [app()->getLocale(), $method->id]) }}')">
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

<!-- Modal for Adding New Transfer Method -->
<div class="modal fade" id="addTransferMethodModal" tabindex="-1" aria-labelledby="addTransferMethodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTransferMethodModalLabel">{{ trans('menu.add_transfer_method') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('TransfersMethods', app()->getLocale()) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-25">
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="اسم طريقة التحويل" name="name" required>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-default btn-squared px-30">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert Confirmation Script -->
<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: 'لن تتمكن من التراجع عن هذا الإجراء!',
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

<!-- Custom Styles -->
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
@endsection
