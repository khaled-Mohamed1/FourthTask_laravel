@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>search visits</title>

</head>

<body style="font-family: Cairo; direction: rtl;">
    <br>
    <div class="container">

        <div class="row">
            <h3>صفحة البحث عن الزيارات</h3>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('tours') }}">الجولات</a>
            </div>
        </nav>

        <br>

        <br>

        <div class="row" id="table_data">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم المزارع</th>
                        <th scope="col">رقم الجوال</th>
                        <th scope="col">المحافظة </th>
                        <th scope="col">المنطقة</th>
                        <th>
                            <table class="table">
                                <h4>انواع</h4>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col">الصنف</th>
                                        <th scope="col">نوع المرض</th>
                                    </tr>
                                </thead>
                            </table>
                        </th>
                        <th scope="col">عرض</th>
                    </tr>

                </thead>
                <tbody>

                    @forelse ($visits as $keys => $visit)
                        <tr>
                            <th scope="row">{{ $keys + 1 }}</th>
                            <td>{{ $visit->FarmerVisit->firstname }} {{ $visit->FarmerVisit->secondname }}
                                {{ $visit->FarmerVisit->thirdname }} {{ $visit->FarmerVisit->fourthname }}</td>
                            <td>{{ $visit->FarmerVisit->phone_NO }}</td>
                            <td>{{ $visit->TourVisit->city }}</td>
                            <td>{{ $visit->TourVisit->region }}</td>
                            @if ($visit->pests->isEmpty())
                                <td style="text-align: center" class="text-danger">لا يوجد اصناف</td>
                            @else
                                <td>
                                    <table class="table">
                                        @foreach ($visit->pests as $key => $pest)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $pest->agricultural_class }}
                                                    </td>
                                                    <td>{{ $pest->pest_name }}</td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </td>
                            @endif
                            <td><a href="{{ route('tour.show', $visit->TourVisit->id) }}" class="btn btn-success"><i
                                        class="las la-eye"></i></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center fs-3 text-danger">لا يوجد</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>


</body>

</html>
