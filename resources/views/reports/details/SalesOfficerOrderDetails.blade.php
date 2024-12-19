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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-30">
                <div class="card mt-30">
                    <div class="card-body">
                        <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                            <div class="table-responsive">
                                <div class="adv-table-table__header">
                                    <h4>{{ trans('menu.sales_team') }}</h4>

                                </div>
                                <div id="filter-form-container"></div>
                                <table class="table mb-0 table-borderless adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                    <thead>
                                    <tr>
                                        <td> الاسم </td>
                                        <td>:</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr class="userDatatable-header">

                                      <th>
                                            <span class="userDatatable-title"> ID </span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title"> الوكيل </span>
                                        </th>
                                          <th>
                                            <span class="userDatatable-title"> الإيرادات  </span>
                                        </th>
                                          <th>
                                            <span class="userDatatable-title"> النسبة  </span>
                                        </th>
                                       
                                        <th>
                                            <span class="userDatatable-title">قيمة النسبة</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">  المصروفات</span>
                                        </th>
                                        
                                        <th>
                                            <span class="userDatatable-title">المرتب</span>
                                        </th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $order)

                                        <tr>

                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">

                                                        <h6>{{$order->id}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                             <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">

                                                        <h6>{{$order['salesAgent']}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">

                                                        <h6>{{$order['salesAgentTotal']}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">

                                                        <h6>{{$sales_team->sales_officer}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                           
                                             <td>
                                                <div class="userDatatable-content">
                                                    {{$order->salesOfficerTotal}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">

                                                        <h6>{{$order->fvalue}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">

                                                        <h6>{{$sales_team->sales_officer_salary}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                          
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td> مستحقاتك : {{ $totalOfficerValue }}</td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

    <script>
        //   @if(Session::has('message'))
        //   var type = "{{Session::get('alert-type' , 'info')}}"
        //   switch (type) {
        //     case 'info':
        //     toastr.info( "{{Session::get('message')}}" );
        //     break;

        //     case 'success':
        //     toastr.success( "{{Session::get('message')}}" );
        //     break;

        //     case 'warning':
        //     toastr.warning( "{{Session::get('message')}}" );
        //     break;

        //     case 'error':
        //     toastr.error( "{{Session::get('message')}}" );
        //     break;

        //   }

        //   @endif

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
