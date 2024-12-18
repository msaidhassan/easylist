@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--                <div class="breadcrumb-main">-->
<!--                    <h4 class="text-capitalize breadcrumb-title">{{ trans('menu.inventory_updates') }}</h4>-->
<!--                    <div class="breadcrumb-action justify-content-center flex-wrap">-->

<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->

<!--            <div class="col-lg-12">-->
<!--                <div class="card card-Vertical card-default card-md mb-4">-->
<!--                    <div class="card-header d-flex align-items-center">-->
<!--                        <h6>{{ trans('menu.inventory_settings') }}-->
<!--                            {{-- <a class="btn btn-primary" href="">إضافة مجال عمل</a>  --}}-->
<!--                        </h6>-->

<!--{{--                        <a href="{{route('add_fields' , app()->getLocale())}}" class="btn btn-primary" >--}}-->
<!--{{--                            {{trans('menu.add_setting')}}--}}-->
<!--{{--                        </a>--}}-->
<!--                    </div>-->
<!--                    <div class="card-body py-md-30">-->

<!--                        <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">-->
<!--                            <div class="table-responsive">-->
<!--                                <div class="adv-table-table__header">-->
<!--                                    {{-- <h4>{{ trans('menu.freelancers') }} </h4> --}}-->

<!--                                    <div class="adv-table-table__button">-->
<!--                                        {{-- <div class="dropdown">-->
<!--                                            <a class="btn btn-primary dropdown-toggle dm-select" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                                Export-->
<!--                                            </a>-->
<!--                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">-->
<!--                                                <a class="dropdown-item" href="#">copy</a>-->
<!--                                                <a class="dropdown-item" href="#">csv</a>-->
<!--                                                <a class="dropdown-item" href="#">print</a>-->
<!--                                            </div>-->
<!--                                        </div> --}}-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div id="filter-form-container"></div>-->
<!--                                <table class="table mb-0 table-borderless adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">-->
<!--                                    <thead>-->
<!--                                    <tr class="userDatatable-header">-->
<!--                                        <th>-->
<!--                                            <span class="userDatatable-title">id</span>-->
<!--                                        </th>-->
<!--                                        <th>-->
<!--                                            <span class="userDatatable-title">الطلب</span>-->
<!--                                        </th>-->
<!--                                        <th>-->
<!--                                            <span class="userDatatable-title"> قيمة الطلب</span>-->
<!--                                        </th>-->

<!--                                        <th>-->
<!--                                            <span class="userDatatable-title"> حالة الطلب</span>-->
<!--                                        </th>-->

<!--                                        <th>-->
<!--                                            <span class="userDatatable-title"> تاريخ الجرد</span>-->
<!--                                        </th>-->
<!--                                         <th data-type="html" data-name='status'>-->
<!--                                            <span class="userDatatable-title"></span>-->
<!--                                        </th>-->
<!--                                        <th>-->
<!--                                            <span class="userDatatable-title float-start">العمليات</span>-->
<!--                                        </th>-->
<!--                                    </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->

<!--                                    {{-- @foreach ($settings as $setting ) --}}-->

<!--                                    @if (isset($inventory))-->
<!--                                        @foreach($inventory as $inv)-->

<!--                                            <tr>-->

<!--                                                <td>-->
<!--                                                    <div class="userDatatable-content">{{$inv->id}}</div>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <div class="d-flex">-->
<!--                                                        <div class="userDatatable-inline-title">-->
<!--                                                            <a href="#" class="text-dark fw-500">-->
<!--                                                                <h6>{{$inv->order_id}}</h6>-->
<!--                                                            </a>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <div class="d-flex">-->
<!--                                                        <div class="userDatatable-inline-title">-->
<!--                                                            <a href="#" class="text-dark fw-500">-->
<!--                                                                <h6>{{$inv->cost}}</h6>-->
<!--                                                            </a>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <div class="d-flex">-->
<!--                                                        <div class="userDatatable-inline-title">-->
<!--                                                            <a href="#" class="text-dark fw-500">-->
<!--                                                                <h6>{{$inv->status}}</h6>-->
<!--                                                            </a>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <div class="d-flex">-->
<!--                                                        <div class="userDatatable-inline-title">-->
<!--                                                            <a href="#" class="text-dark fw-500">-->
<!--                                                                <h6>{{date_format($inv->created_at,'Y-m-d')}}</h6>-->
<!--                                                            </a>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <ul class="orderDatatable_actions mb-0 d-flex ">-->

<!--{{--                                                        <li>--}}-->
<!--{{--                                                            <a href="{{route('edit_setting', [app()->getLocale(), $inv->id])}}" class="edit">--}}-->
<!--{{--                                                                <i class="uil uil-edit"></i></a>--}}-->
<!--{{--                                                        </li>--}}-->
<!--                                                        <li>-->
<!--                                                            <a href="{{route('delete.inventory.updates', [app()->getLocale(), $inv->id])}}" class="remove">-->
<!--                                                                <img src="{{ asset('assets/img/svg/trash-2.svg') }}" alt="trash-2" class="svg"></a>-->
<!--                                                        </li>-->
<!--                                                    </ul>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                        @endforeach-->

<!--                                    @endif-->

<!--                                    {{-- @endforeach --}}-->



<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                        </div>-->


<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<div class="container-fluid mt-4">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>{{ trans('menu.inventory_updates') }}</h4>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>الطلب</th>
                        <th>قيمة الطلب</th>
                        <th>حالة الطلب</th>
                        <th>تاريخ الجرد</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($inventory))
                        @foreach($inventory as $inv)
                        <tr>
                            <td>{{ $inv->id }}</td>
                            <td>{{ $inv->order_id }}</td>
                            <td>{{ $inv->cost }}</td>
                            <td>{{ $inv->status }}</td>
                            <td>{{ date_format($inv->created_at,'Y-m-d') }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{route('delete.inventory.updates', [app()->getLocale(), $inv->id])}}" class="remove" title="حذف">
                                        <i class="uil uil-trash-alt text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
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
                <form action="{{route('store_fields',app()->getLocale())}}" method="POST">
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
    white-space: nowrap;
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
