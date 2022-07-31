@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>search tours</title>

</head>

<body style="font-family: Cairo; direction: rtl;">
    <br>
    <div class="container">

        <div class="row">
            <h3>صفحة البحث عن الجولات</h3>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('tours') }}">الجولات</a>
            </div>
        </nav>

        <br>

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
                            <td><a href="{{ route('tour.show', $tour->id) }}" class="btn btn-success"><i
                                        class="las la-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


</body>

</html>
