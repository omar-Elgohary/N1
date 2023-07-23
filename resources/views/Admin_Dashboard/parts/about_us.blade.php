@extends('Admin_Dashboard.layouts.app')
@section('title')
    معلومات عن الموقع
@endsection

@section('content')
@if (session()->has('storeAboutUs'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اضافة معلومات الموقع بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('updateAboutUs'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم تعديل معلومات الموقع بنجاح ',
                type: "primary"
            })
        }
    </script>
@endif

@if (session()->has('deleteAboutUs'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم حذف معلومات الموقع بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

<div class="main-content">
<div class="page-content">

@if ($errors->any())
    <div class="alert alert-danger error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">معلومات عن موقعنا</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <div>
                    <a class="btn btn-success waves-effect waves-light mb-3" data-bs-toggle="modal" href="#addInfo" role="button"><i class="mdi mdi-plus me-1"></i>اضافة معلومات</a>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive mb-4">
                    <table class="table table-centered datatable dt-responsive nowrap table-card-list text-center" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                        <thead>
                            <tr class="bg-transparent">
                                <th>#</th>
                                <th>المعلومات عربي</th>
                                <th>المعلومات انجليزي</th>
                                <th style="width: 120px;">التحكم</th>
                            </tr>
                        </thead>

                        @forelse ($infos as $info)
                        <tbody>
                            <tr>
                                <td>{{ $info->id }}</td>
                                <td class="fw-bold">{{ $info->paragraph_ar}}</td>
                                <td class="fw-bold">{{ $info->paragraph_en }}</td>
                                <td>
                                    <a href="#editInfo" class="px-3 text-primary" data-bs-toggle="modal"><i class="uil uil-pen font-size-18"></i></a>
                                    <a href="#deleteInfo" class="px-3 text-danger" data-bs-toggle="modal"><i class="uil uil-trash-alt font-size-18"></i></a>
                                </td>
                            </tr>
                        </tbody>
                            @empty
                            <tr>
                                <th class="text-danger" colspan="10">
                                    لا يوجد بيانات
                                </th>
                            </tr>
                        @endforelse
                        </table>
                        {{ $infos->links("pagination::bootstrap-4") }}
                    </table>
                </div>
            </div>
        </div><!-- end row -->
    </div> <!-- container-fluid -->
</div>



{{-- Add Info --}}
<div class="modal fade" id="addInfo" tabindex="-1" aria-labelledby="addInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
            <h2 class="modal-title">اضافة معلومة</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <div class="modal-body">
                    <form action="{{ route('aboutUs.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <h4>معلومات الموقع بالعربية</h4>
                        <textarea name="paragraph_ar" id="paragraph" pattern="[A-Za-z]{3}"  class="form-control text-end" rows="5"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <h4>معلومات الموقع بالانجليزية</h4>
                        <textarea name="paragraph_en" id="paragraph" class="form-control text-end" rows="5"></textarea>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">اضافة</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- end-modal -->


{{-- Edit Info --}}
<div class="modal fade" id="editInfo" tabindex="-1" aria-labelledby="editInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
            <h5 class="modal-title">تعديل معلومات الموقع</h5>
            </div>

            <div class="modal-body">
                <form action="{{route('aboutUs.update', $info->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                <div class="form-group mb-3">
                    <label>معلومات الموقع بالعربية</label>
                    <textarea name="paragraph_ar" id="paragraph" class="form-control text-end" rows="5">{{ $info->paragraph_ar }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label>معلومات الموقع بالانجليزية</label>
                    <textarea name="paragraph_en" id="paragraph" class="form-control text-end" rows="5">{{ $info->paragraph_en }}</textarea>
                </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">تعديل</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- end-modal -->


{{-- Delete Info --}}
<div class="modal fade" id="deleteInfo" tabindex="-1" aria-labelledby="deleteInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
            <h5 class="modal-title">حذف معلومات الموقع</h5>
            </div>

            <div class="modal-body">
                <form action="{{ route('aboutUs.delete', $info->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body text-center">
                        <h5>هل انت متاكد من عملية الحذف ؟</h5><br>
                        <input type="hidden" name="id" id="id" value="">
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-danger">حذف</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- end-modal -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Hide the validation error messages after 5 seconds (adjust the delay as needed)
    $(document).ready(function() {
        setTimeout(function() {
            $('.error').hide();
        }, 3000);
    });
</script>
@endsection
