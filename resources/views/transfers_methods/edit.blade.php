@section('title', $title)
@section('description', $description)
@extends('layout.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card mt-30">
                <div class="card-body">
                    <div class="userDatatable global-shadow border-0 bg-white w-100">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>{{ trans('menu.edit_transfer_method') }}</h4>
                                <a href="{{ route('TransfersMethods.all', app()->getLocale()) }}" class="btn text-white add-order-btn">
                                    {{ trans('menu.back_to_list') }}
                                </a>
                            </div>

                            <!-- Edit Transfer Method Form -->
                            <form action="{{ route('TransfersMethods.update', [app()->getLocale(), $transferMethods->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-25">
                                        <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="اسم طريقة التحويل" name="name" value="{{ $transferMethods->name }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-default btn-squared px-30">
                                            {{ trans('menu.update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
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

    .form-control {
        border: 1px solid #ddd !important;
        border-radius: 5px !important;
        padding: 10px 15px !important;
        font-size: 16px !important;
    }

    .form-control:focus {
        border-color: #2da9f7 !important;
        box-shadow: 0 0 5px rgba(45, 169, 247, 0.5) !important;
    }
</style>
@endsection
