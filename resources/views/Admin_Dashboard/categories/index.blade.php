@extends('Admin_Dashboard.layouts.app')
@section('title')
    الفئات
@endsection

@section('content')

@if (session()->has('addCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اضافة الفئة بنجاح ',
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
                    <h4 class="mb-0">جميع الفئات ({{\App\Models\Category::count()}})</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-4">
                <div>
                    <a class="btn btn-success waves-effect waves-light mb-3" data-bs-toggle="modal" href="#addcategory" role="button"><i class="mdi mdi-plus me-1"></i>اضافة فئة</a>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive mb-4">
                    <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                        <thead>
                            <tr class="bg-transparent">
                                <th>#</th>
                                <th>اسم الفئة</th>
                                <th>القسم</th>
                                <th style="width: 120px;">التحكم</th>
                            </tr>
                        </thead>

                        @forelse ($categories as $category)
                        <tbody>
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td class="fw-bold">{{ $category->name}}</td>
                                <td class="fw-bold">{{ $category->department->name }}</td>
                                <td>
                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
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
                        {{ $categories->links("pagination::bootstrap-4") }}
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>



{{-- addcategory --}}
<div class="modal fade border-0" id="addcategory" aria-hidden="true" aria-labelledby="addcategoryLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <h2>اضافة فئة جديدة</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{route('addCategory')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="name">اسم الفئة</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>اسم القسم</label>
                    <select name="department_id" class="form-control">
                        <option value="">اختر القسم</option>
                        @foreach (\App\Models\Department::all() as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-around my-4">
                <button type="submit" class="btn btn-block btn-success btn-bordered px-5">اضافة</button>
                <a href="#" class="btn btn-block btn-secondary px-5 text-white" data-bs-dismiss="modal">الغاء</a>
            </div>
        </form>

        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
@endsection
