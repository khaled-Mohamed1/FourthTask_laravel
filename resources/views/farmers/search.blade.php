@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>search</title>

</head>

<body style="font-family: Cairo; direction: rtl;">
    <br>
    <div class="container">

        <div class="row">
            <h3>صفحة البحث</h3>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('farmers') }}">المزارعين</a>
            </div>
        </nav>

        <br>

        <div>



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
                        <th>
                            <table class="table">
                                <h4>اراضي الزراعية</h4>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>القطعة</th>
                                        <th>القسيمة</th>
                                        <th>المنطقة</th>
                                    </tr>
                                </thead>

                            </table>
                        </th>
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
                            @if ($farmer->lands->isEmpty())
                                <td colspan="4" style="text-align: center">لا يوجد اراضي</td>
                            @else
                                <td>
                                    <table class="table">
                                        @foreach ($farmer->lands as $key => $land)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $land->piece_number }}</td>
                                                    <td>{{ $land->coupon_number }}</td>
                                                    <td>{{ $land->region }}</td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </td>
                            @endif

                            <td><a href="{{ route('farmer.show', $farmer->id) }}" class="btn btn-success"><i
                                        class="las la-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


</body>

</html>
