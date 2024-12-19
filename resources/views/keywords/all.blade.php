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
                                <h4>الكلمات المفتاحية</h4>
                                <div class="adv-table-table__button">
                                    <a href="{{ route('add_keywords', app()->getLocale()) }}" class="btn text-white" style="background-color: #2da9f7 !important;font-weight: 600 !important;font-size: 15px !important;">
                                        إضافة كلمات مفتاحية
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table text-md-nowrap mt-2" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">ID</th>
                                            <th class="wd-15p border-bottom-0">الاسم</th>
                                            <th class="wd-15p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keywords as $keyword)
                                        <tr>
                                            <td>{{ $keyword->id }}</td>
                                            <td>{{ $keyword->name }}</td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex">
                                                    <li>
                                                        <a href="{{ route('edit_keywords', [app()->getLocale(), $keyword->id]) }}" class="edit" title="تعديل">
                                                            <i class="uil uil-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="remove" title="حذف" onclick="confirmDelete('{{ route('delete_keywords', [app()->getLocale(), $keyword->id]) }}')">
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
                <h5 class="modal-title" id="exampleModalLabel">إضافة كلمات مفتاحية</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store_keywords', app()->getLocale()) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-25">
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="الكلمة المفتاحية" name="name" required>
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
        title: 'هل أنت متأكد؟',
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

@endsection
