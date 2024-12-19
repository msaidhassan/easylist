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
        background-color: #2da9f7 !important;
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
    
    
        .add-btnn {
        background-color: #2da9f7 !important;
        color: white !important;
        font-weight: 600 !important;
        border-radius: 5px !important;
        padding: 10px 20px !important;
        display: inline-block !important;
        text-decoration: none !important;
        transition: background 0.3s, color 0.3s !important;
        border:none;
        font-size:12px;
                    min-width: 93px;
    height: 40px;
    }

    .add-btnn:hover {
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
                                <h4>{{ trans('menu.transfers') }}</h4>
                                <div class="adv-table-table__button">
                                    <a href="{{ route('add_transfer', app()->getLocale()) }}" class="add-btn">
                                        {{ trans('menu.add_transfer') }}
                                    </a>
                                    <button id="set-completed" class="add-btnn">اجعل الكل تم</button>
                                    <button id="set-not-completed" class="add-btnn">اجعل الكل لم يتم</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table text-md-nowrap mt-2" id="example2">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" id="select-all" />
                                            </th>
                                            <th class="wd-15p border-bottom-0">الرقم التعريفي للحوالة</th>
                                            <th class="wd-15p border-bottom-0">قيمة الحوالة الإجمالية</th>
                                            <th class="wd-15p border-bottom-0">وسيلة التحويل</th>
                                            <th class="wd-15p border-bottom-0">مسؤول المبيعات</th>
                                            <th class="wd-15p border-bottom-0">وكيل المبيعات</th>
                                            <th class="wd-15p border-bottom-0">إثبات التحويل</th>
                                            <th class="wd-15p border-bottom-0">الاستلام</th>
                                            <th class="wd-15p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transfers as $transfer)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="row-checkbox" value="{{ $transfer->id }}" />
                                            </td>
                                            <td>
                                                <a href="{{route('all_transfer_orders',$transfer->number)}}">
                                                {{ $transfer->number }}
                                                </a>
                                            </td>
                                            <td>{{ $transfer->value }}</td>
                                            <td>{{ $transfer->method }}</td>
                                            <td>{{ $transfer->officer }}</td>
                                            <td>{{ $transfer->agent }}</td>
                                            <td>{{ $transfer->proof }}</td>
                                            <td>
                                            <span class="{{ $transfer->status === 'تم' ? 'text-success' : 'text-danger' }}">
                                                {{ $transfer->status }}
                                            </span>
                                            </td>

                                        </td> <!-- عرض حالة الحوالة -->
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex">
                                                    <li>
                                                        <a href="{{ route('edit_transfer', [app()->getLocale(), $transfer->id]) }}" class="edit" title="تعديل">
                                                            <i class="uil uil-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="remove" title="حذف" onclick="confirmDelete('{{ route('delete_transfer', [app()->getLocale(), $transfer->id]) }}')">
                                                            <i class="uil uil-trash-alt text-danger"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form method="POST" action="{{ route('transfers.toggle_status', [$transfer->id, app()->getLocale()]) }}" style="display:inline-block;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm {{ $transfer->status === 'تم' ? 'btn-danger' : 'btn-success' }}">
                                                                <i class="uil {{ $transfer->status === 'تم' ? 'uil-times-circle' : 'uil-check-circle' }}"></i>
                                                                {{ $transfer->status === 'تم' ? 'لم يتم' : 'تم' }}
                                                            </button>
                                                        </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<script>
document.getElementById('select-all').addEventListener('click', function () {
    const checkboxes = document.querySelectorAll('.row-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

document.getElementById('set-completed').addEventListener('click', function () {
    updateStatus('تم');
});

document.getElementById('set-not-completed').addEventListener('click', function () {
    updateStatus('لا يتم');
});

function updateStatus(status) {
    const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked'))
        .map(checkbox => checkbox.value);

    if (selectedIds.length === 0) {
        Swal.fire('خطأ', 'لم يتم تحديد أي عناصر!', 'error');
        return;
    }

    fetch('{{ route("transfers.bulk_update", app()->getLocale()) }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ ids: selectedIds, status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('نجاح', 'تم تحديث الحالة بنجاح!', 'success').then(() => location.reload());
        } else {
            Swal.fire('خطأ', 'حدث خطأ أثناء تحديث الحالة.', 'error');
        }
    });
}
</script>





@endsection
