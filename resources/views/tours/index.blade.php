@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tours</title>
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
            <h3>صفحة الرئيسية لجولات الإرشاد</h3>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" class="btn btn-primary" id="button_search_visit">بحث عن زيارة</button>
                <button type="button" class="btn btn-primary" id="button_search_tour">بحث عن جولة</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTour">اضافة جولة
                    زيارة
                </button>
            </div>
        </nav>

        <br>

        <div>

            <div class="row" id="search_form_visit" style="display: none">
                <div class="card bg-light" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title">بحث عن الزيارات</h5>

                        <form action="{{ route('visit.search') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <label class="form-label ">نوع الزيارة</label>
                                    <select name="search_visitType" id="search_visitType" class="form-select">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="زراعة">زراعة</option>
                                        <option value="بيطرة">بيطرة</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label ">صنف</label>
                                    <select name="search_class" class="form-select" id="search_class">
                                        <option value="">صنف...</option>

                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label class="form-label ">نوع</label>
                                    <select name="search_type" class="form-select" id="search_type">
                                        <option value="">نوع...</option>

                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label ">المحافظة</label>
                                    <select name="search_city" id="search_city" class="form-select">
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->city_name }}">{{ $city->city_name }}
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label ">المنطقة</label>
                                    <select name="search_region" id="search_region" class="form-select">
                                        <option selected disabled value="">Choose...</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label ">تاريخ من</label>
                                    <input name="search_datefrom" id="search_datefrom" type="date"
                                        class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label ">تاريخ إلى</label>
                                    <input name="search_dateto" id="search_dateto" type="date" class="form-control">

                                </div>

                                <br><br><br><br>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">بحث</button>

                                </div>


                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row" id="search_form_tour" style="display: none">
                <div class="card bg-light" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title">بحث عن جولات</h5>

                        <form action="{{ route('tours.search') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="form-label">رقم الجولة</label>
                                    <input type="text" name="tour_number" id="tour_number" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label ">نوع الزيارة</label>
                                    <select name="tour_search_visitType" id="tour_search_visitType"
                                        class="form-select">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="زراعة">زراعة</option>
                                        <option value="بيطرة">بيطرة</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label ">المحافظة</label>
                                    <select name="tour_search_city" id="tour_search_city" class="form-select">
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->city_name }}">{{ $city->city_name }}
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label ">المنطقة</label>
                                    <select name="tour_search_region" id="tour_search_region" class="form-select">
                                        <option selected disabled value="">Choose...</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label ">تاريخ من</label>
                                    <input name="tour_search_datefrom" id="tour_search_datefrom" type="date"
                                        class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label ">تاريخ إلى</label>
                                    <input name="tour_search_dateto" id="tour_search_dateto" type="date"
                                        class="form-control">

                                </div>

                                <br><br><br><br>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">بحث</button>

                                </div>


                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <br>

        <div class="row tour_table">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">رقم الجولة</th>
                        <th scope="col">المحافظة</th>
                        <th scope="col">المنطقة</th>
                        <th scope="col">الفترة</th>
                        <th scope="col">ملاحظات</th>
                        <th scope="col">اجمالي الزيارات</th>
                        <th scope="col">الزيارات المنتهية</th>
                        <th scope="col">الزيارات غير منتهية</th>
                        <th scope="col">عمليات</th>
                        <th scope="col">عرض</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($tours as $key => $tour)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $tour->id }}</td>
                            <td>{{ $tour->city }}</td>
                            <td>{{ $tour->region }}</td>
                            <td>{{ $tour->required_date }}</td>
                            <td>{{ $tour->note }}</td>
                            <td>{{ $tour->visits->count() }}</td>
                            <td>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($tour->visits as $key => $visit)
                                    @if ($visit->visit_status == 'منتهية')
                                        @php
                                            $count++;
                                        @endphp
                                    @endif
                                @endforeach
                                {{ $count }}
                            </td>
                            <td>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($tour->visits as $key => $visit)
                                    @if ($visit->visit_status == 'غير منتهية')
                                        @php
                                            $count++;
                                        @endphp
                                    @endif
                                @endforeach
                                {{ $count }}
                            </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#editTour"
                                    class="btn btn-primary edittour" data-id="{{ $tour->id }}"
                                    data-city="{{ $tour->city }}" data-region="{{ $tour->region }}"
                                    data-required_date="{{ $tour->required_date }}"
                                    data-visit_type="{{ $tour->visit_type }}"
                                    data-farmer_data="{{ $tour->vFarmers }}"
                                    data-employee_data="{{ $tour->vEmployees }}" data-note="{{ $tour->note }}"><i
                                        class="las la-edit"></i></a>
                                <a href="" data-id="{{ $tour->id }}"
                                    class="btn btn-danger delete_tour"><i class="las la-times"></i></a>
                            </td>
                            <td><a href="{{ route('tour.show', $tour->id) }}" class="btn btn-success"><i
                                        class="las la-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $tours->links() !!}
        </div>


        {{-- modal --}}

        @extends('modals.tours.addtour')
        @extends('modals.tours.edittour')

        {{-- end modal --}}

        {{-- ajax --}}

        @extends('ajax.tours.tour_js')

        {{-- end ajax --}}


        {!! Toastr::message() !!}

</body>

</html>
