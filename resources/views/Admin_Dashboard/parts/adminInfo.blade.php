@extends('Admin_Dashboard.layouts.app')
@section('title')
    المعلومات الشخصية
@endsection

@section('content')

@if (session()->has('editAdmin'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم تعديل المعلومات الشخصية',
                type: "success"
            })
        }
    </script>
@endif


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">المعلومات الشخصية</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        </ol>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('editAdminInfo') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label fw-bold" for="validationTooltip01">الاسم</label>
                                            <input type="text" name="name" class="form-control" id="validationTooltip01" value="{{ $admin->name }}" required>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{ $department->nameLpcale('ar') }}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label fw-bold" for="validationTooltipUsername">الايميل</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                                </div>
                                                <input type="text" name="email" class="form-control" id="validationTooltipUsername" value="{{ $admin->email }}" aria-describedby="validationTooltipUsernamePrepend" required>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Please choose a unique and valid Email.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label fw-bold" for="validationTooltip03">رقم الجوال</label>
                                            <input type="text" name="phone" class="form-control" id="validationTooltip03" value="{{ $admin->phone }}" required>
                                            <div class="invalid-tooltip">
                                                Please provide a valid Phone.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">تعديل</button>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->
@endsection
