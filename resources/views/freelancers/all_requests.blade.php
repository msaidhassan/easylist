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
        background-color: #2da9f7;
        color: white;
        font-weight: 600;
        text-align: center;
    }

    .table tbody tr {
        color: #666;
        border-bottom: 1px solid #ddd;
    }

    .table tbody tr:hover {
        background-color: #e1f0ff;
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: center;
        padding: 12px;
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

    .add-btn {
        background-color: #2da9f7;
        color: white;
        font-weight: 600;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
        transition: background 0.3s, color 0.3s;
    }

    .add-btn:hover {
        background-color: #1a8cd8;
    }
</style>

@section('title', $title)
@section('description', $description)
@extends('layout.app')
@section('content')

<div class="container-fluid mt-4">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>{{ trans('menu.orders') }}</h4>
            <a href="{{ route('request_freelancer', app()->getLocale()) }}" class="add-btn">
                {{ trans('menu.add') }}
            </a>
        </div>

        <div class="table-responsive">
            <table class="table" id="example2">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>المجال الرئيسي</th>
                        <th>المجال الفرعي</th>
                        <th>الوصف</th>
                        <th>حالة المستقل</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests_freelancers as $request_freelancer)
                    <tr>
                        <td>{{ $request_freelancer->id }}</td>
                        <td>{{ $request_freelancer->main_field->title }}</td>
                        <td>{{ $request_freelancer->sub_field->title }}</td>
                        <td>{{ $request_freelancer->desc }}</td>
                        <td>{{ $request_freelancer->freelancer_status }}</td>
                        <td>
                            <span class="bg-opacity-success color-success rounded-pill userDatatable-content-status active">
                                {{ $request_freelancer->status }}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                @if($request_freelancer->freelancer_status != 'موجود')
                                <a href="{{ route('freelance_status', [app()->getLocale(), $request_freelancer->id]) }}" title="تغيير حالة المستقل">
                                    <img src="{{ asset('assets/img/svg/status.jpg') }}" style="width:16px;" alt="status">
                                </a>
                                @endif
                                <a href="{{ route('edit_request_freelancer', [app()->getLocale(), $request_freelancer->id]) }}" class="edit" title="Edit">
                                    <i class="uil uil-edit"></i>
                                </a>
                                <a href="javascript:void(0);" class="remove" title="Delete" onclick="confirmDelete('{{ route('delete_request_freelancer', [app()->getLocale(), $request_freelancer->id]) }}')">
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
    });
}
</script>

@endsection
