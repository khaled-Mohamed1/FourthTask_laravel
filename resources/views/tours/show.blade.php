@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>بيانات الجولة</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>
    .required:after {
        content: " *";
        color: red;
    }

    .ui-autocomplete {
        position: absolute;
        cursor: default;
        z-index: 30 !important;
    }

    .modal-dialog {
        pointer-events: auto !important;
    }
</style>

<body style="font-family: Cairo; direction: rtl;">
    <br>
    <div class="container">
        <div class="row">
            <h3>بيانات الجولة</h3>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('tours') }}">الجولات</a>
            </div>
        </nav>
        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">بيانات أساسية</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="card-text">رقم الجولة: <span class="fw-bolder">{{ $tour->id }}</p>
                            <p class="card-text">تاريخ الأدخال: <span class="fw-bolder">{{ $tour->created_at }}</span>
                            </p>
                            <p class="card-text">تاريخ الزيارة: <span
                                    class="fw-bolder">{{ $tour->required_date }}</span></p>
                        </div>
                        <div class="col-md-4">
                            <p class="card-text">نوع الزيارة: <span class="fw-bolder">{{ $tour->visit_type }}</span>
                            </p>
                            <p class="card-text">المحافظة: <span class="fw-bolder">{{ $tour->city }}</span>
                            </p>
                            <p class="card-text">المنطقة: <span class="fw-bolder">{{ $tour->region }}</span></p>
                        </div>
                        <div class="col-md-4">
                            <p class="card-text">ملاحظات: <span class="fw-bolder">{{ $tour->note }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="container px-4">

            <div class="row gx-6">
                <div class="col">
                    <h5>المكلفين</h5>
                    <div class="p-2">
                        <table class="table table-light table-bordered" id="tableEmployee">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tour->vEmployees as $key => $vEmployee)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <th>{{ $vEmployee->employee_name }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="col">
                    <h5>المستهدفين</h5>

                    <div class="p-2">
                        <table class="table table-light table-bordered" id="tableFarmer">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tour->vFarmers as $key => $vFarmer)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <th>{{ $vFarmer->farmer_name }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">الزيارات
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addVisit">اضافة </button>
                        </span>
                    </h5>
                    <div class="row visit_table">
                        @if ($tour->visits->isEmpty())
                            لا يوجد زيارات
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">اسم المزارع</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">تاريخ الزيارة</th>
                                        <th scope="col">الوصف</th>
                                        <th scope="col">الارشاد</th>
                                        <th scope="col">ملاحظات</th>
                                        <th scope="col">حالة الزيارة</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                @foreach ($tour->visits as $key => $visit)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $visit->id }}</td>
                                        <td>{{ $visit->FarmerVisit->firstname }} {{ $visit->FarmerVisit->secondname }}
                                            {{ $visit->FarmerVisit->thirdname }} {{ $visit->FarmerVisit->fourthname }}
                                        </td>
                                        <td>{{ $visit->visit_date }}</td>
                                        <td>{{ $visit->visit_description }}</td>
                                        <td>{{ $visit->guidance_description }}</td>
                                        <td>{{ $visit->note }}</td>
                                        <td>{{ $visit->visit_status }}</td>
                                        <td>
                                            <a href="" class="btn btn-danger delete_visit"
                                                data-id="{{ $visit->id }}"><i class="las la-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br>

        {{-- modal --}}

        @extends('modals.tours.visits.addvisit')

        {{-- end modal --}}

        {{-- ajax --}}

        @extends('ajax.tours.visits.visit_js')

        {{-- end ajax --}}

    </div>




</body>

</html>
