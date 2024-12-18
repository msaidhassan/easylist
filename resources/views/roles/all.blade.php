<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

<!-- Add SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


<style>
    .wrapper{
  padding: 40px;
  text-align:center;
}
.wrapper h2{
  padding-bottom: 20px;
}
.wrapper #file-input{
  display:none;
}

.wrapper label[for='file-input'] *{
  vertical-align:middle;
  cursor:pointer;
}

.wrapper label[for='file-input'] span{
  margin-left: 10px
}

.wrapper i.remove{
  vertical-align:middle;
  margin-left: 5px;
  cursor:pointer;
  display:none;
}
</style>
@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="container-fluid mt-4">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>{{ trans('menu.roles') }}</h4>
            {{-- إذا كنت بحاجة لإضافة زر أو إجراء آخر --}}
            {{-- <a href="#" class="add-role-btn">{{ trans('menu.add_role') }}</a> --}}
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>الرتبة</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="userDatatable-inline-title">
                                    <h6>{{ $role->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('roles.edit', [app()->getLocale(), $role->id]) }}" class="edit" title="تعديل">
                                    <i class="uil uil-edit"></i>
                                </a>
                                <a href="javascript:void(0);" class="remove" title="حذف" onclick="confirmDelete('{{ route('roles.destroy', [app()->getLocale(), $role->id]) }}')">
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
