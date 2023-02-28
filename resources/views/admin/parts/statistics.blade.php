@extends('admin.layouts.app')
@section('content')
@section('title')
    الرئيسية
@endsection

<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end fw-bold">الاحصائيات</h2>
            </div>
        </div> <!-- row -->

        <div class="row text-end mt-4 flex-row-reverse">
            <div class="col-xl-6">
                <div class="donut_chart">
                    <div class="card-body">
                        <h4 class="card-title text-black mb-4">احصائيات المنتجات خلال اخر شهر</h4>
                        <div id="donut_chart" data-colors='["--bs-success", "--bs-primary", "--bs-warning" ,"--bs-info", "--bs-danger"]' class="apex-charts"  dir="ltr"></div>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-xl-6 -->

            <div class="col-xl-6">
                <div class="spinners">
                    <div>
                        <h4 class="card-title text-black">الأكثر مبيعا</h4>
                    </div>

                <div class="row lastOffer d-flex justify-content-end">
                    <div class="card-body d-flex justify-content-end">

                        <div class="col-lg-1 col-md-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#FF0000" value="80" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#00008B" value="75" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#FF8C00" value="60" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>
                    </div> <!-- card-body -->
                    </div> <!-- row -->
                </div> <!-- card -->

                <div class="col-xl-12">
                    <div class="topRate mt-5">
                        <div class="card-body">
                            <h4 class="card-title text-black mb-4">الأعلى تقييما</h4>

                            <div class="d-flex flex-row-reverse justify-content-between">
                                <h5>اسم المنتج</h5>
                                <p>4.5<i class="fa fa-thin fa-star text-warning"></i></p>
                            </div> <!-- 1 -->

                            <div class="d-flex flex-row-reverse justify-content-between">
                                <h5>اسم المنتج</h5>
                                <p>3.4<i class="fa fa-thin fa-star text-warning"></i></p>
                            </div> <!-- 2 -->

                            <div class="d-flex flex-row-reverse justify-content-between">
                                <h5>اسم المنتج</h5>
                                <p>2.2<i class="fa fa-thin fa-star text-warning"></i></p>
                            </div> <!-- 3 -->

                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col-xl-6 -->
            </div> <!-- col-xl-6 -->
        </div> <!-- row -->

        <div class="last text-end mt-5">
            <div class="col-lg-12">
                <h4>العروض الاخيرة</h4>

                    <div class="row lastOffer d-flex justify-content-end">

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#00FFFF" value="80" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#000000" value="75" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#C71585" value="60" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#FF0000" value="55" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#4682B4" value="90" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#000000" value="35" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#FFFF00" value="77" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#6B8E23" value="80" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>اسم المنتج</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#FF0000" value="60" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>
                    </div> <!-- card-body -->
                </div>
            </div>
    </div> <!-- container -->
</section>

@endsection
