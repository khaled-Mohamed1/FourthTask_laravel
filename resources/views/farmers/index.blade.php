@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>farmers</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<style>
    .required:after {
        content: " *";
        color: red;
    }
</style>

<body style="font-family: Cairo; direction: rtl;">
    <br>
    <div class="container">

        <div class="row">
            <h3>صفحة الرئيسية</h3>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('farmers') }}">المزارعين</a>
                <button type="button" class="btn btn-success" id="button_search">بحث</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">اضافة مزارع
                </button>
            </div>
        </nav>

        <br>

        <div>

            <div class="row" id="search_form" style="display: none">
                <div class="card bg-light" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title">بحث عن المازرعين</h5>

                        <form action="{{ route('search') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-3">
                                    <label class="form-label required">رقم بطاقة المزارع</label>
                                    <input name="search_card_id" id="search_card_id" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">رقم هوية المزارع</label>
                                    <input name="search_number_id" id="search_number_id" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">رقم القطعة</label>
                                    <input name="search_land_piece" id="search_land_piece" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">رقم القسيمة</label>
                                    <input name="search_land_coupon" id="search_land_coupon" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">الاسم الأول</label>
                                    <input name="search_firstname" id="search_firstname" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">الاسم الثاني</label>
                                    <input name="search_secondname" id="search_secondname" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">الاسم الثالث</label>
                                    <input name="search_thirdname" id="search_thirdname" type="text"
                                        class="form-control">

                                </div>

                                <div class="col-md-3">
                                    <label class="form-label required">الاسم الرابع</label>
                                    <input name="search_fourthname" id="search_fourthname" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label required">المحافظة</label>
                                    <select name="search_city" id="search_city" class="form-select">
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->city_name }}">{{ $city->city_name }}
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label required">المنطقة</label>
                                    <select name="search_region" id="search_region" class="form-select">
                                        <option selected disabled value="">Choose...</option>
                                    </select>
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

        <br>

        <div class="row" id="table_data">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">رقم البطاقة</th>
                        <th scope="col">رقم الهوية</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">المحافظة </th>
                        <th scope="col">المنطقة</th>
                        <th scope="col">عمليات</th>
                        <th scope="col">عرض</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($farmers as $key => $farmer)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $farmer->card_id }}</td>
                            <td>{{ $farmer->id_NO }}</td>
                            <td>{{ $farmer->firstname }} {{ $farmer->secondname }} {{ $farmer->thirdname }}
                                {{ $farmer->fourthname }}</td>
                            <td>{{ $farmer->city }}</td>
                            <td>{{ $farmer->region }}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#editModal"
                                    class="btn btn-primary edit_farmer" data-id="{{ $farmer->id }}"
                                    data-card_id="{{ $farmer->card_id }}"
                                    data-entry_date="{{ $farmer->entry_date }}" data-idnumber="{{ $farmer->id_NO }}"
                                    data-date_of_birth="{{ $farmer->date_of_birth }}"
                                    data-firstname="{{ $farmer->firstname }}"
                                    data-secondname="{{ $farmer->secondname }}"
                                    data-thirdname="{{ $farmer->thirdname }}"
                                    data-fourthname="{{ $farmer->fourthname }}" data-phone="{{ $farmer->phone_NO }}"
                                    data-email="{{ $farmer->email }}" data-gender="{{ $farmer->gender }}"
                                    data-city="{{ $farmer->city }}" data-region="{{ $farmer->region }}"
                                    data-nearest_place="{{ $farmer->nearest_place }}"
                                    data-status="{{ $farmer->status }}"
                                    data-qualification="{{ $farmer->qualification }}"><i class="las la-edit"></i></a>
                                <a href="" data-id="{{ $farmer->id }}"
                                    class="btn btn-danger delete_farmer"><i class="las la-times"></i></a>
                            </td>
                            <td><a href="{{ route('farmer.show', $farmer->id) }}" class="btn btn-success"><i
                                        class="las la-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $farmers->links() !!}
        </div>


        {{-- modal --}}

        @extends('modals.farmers.addfarmer')
        @extends('modals.farmers.editfarmer')

        {{-- end modal --}}

        {{-- ajax --}}

        @extends('ajax.farmer_js')

        {{-- end ajax --}}


        {!! Toastr::message() !!}

</body>

</html>
