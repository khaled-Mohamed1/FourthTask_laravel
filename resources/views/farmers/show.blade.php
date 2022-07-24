@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>بيانات المزارع</title>
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
            <h3>بيانات المزارع <span class="badge bg-secondary">{{ $farmer->firstname }}
                    {{ $farmer->secondname }} {{ $farmer->thirdname }}
                    {{ $farmer->fourthname }}</span></h3>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('farmers') }}">المزارعين</a>
            </div>
        </nav>
        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">بيانات أساسية</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="card-text">الأسم: <span class="fw-bolder"> {{ $farmer->firstname }}
                                    {{ $farmer->secondname }} {{ $farmer->thirdname }}
                                    {{ $farmer->fourthname }} </span></p>
                            <p class="card-text">رقم الهوية: <span class="fw-bolder">{{ $farmer->id_NO }}</span>
                            <p class="card-text">الجنس: <span class="fw-bolder">{{ $farmer->gender }}</span>
                            <p class="card-text">رقم البطاقة: <span class="fw-bolder">{{ $farmer->card_id }}</span>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="card-text">رقم الجوال: <span class="fw-bolder">{{ $farmer->phone_NO }}</span>
                            </p>
                            <p class="card-text">بريد الإلكتروني: <span class="fw-bolder">{{ $farmer->email }}</span>
                            </p>
                            <p class="card-text">الحالة الإجتماعية: <span
                                    class="fw-bolder">{{ $farmer->status }}</span></p>
                            <p class="card-text">المؤهل العلمي: <span
                                    class="fw-bolder">{{ $farmer->qualification }}</span>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="card-text">المدينة: <span class="fw-bolder">{{ $farmer->city }}</span>
                            </p>
                            <p class="card-text">المنطقة: <span class="fw-bolder">{{ $farmer->region }}</span>
                            </p>
                            <p class="card-text">اقرب معلم: <span class="fw-bolder">{{ $farmer->nearest_place }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">ألات والمعدات
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addEquipment">اضافة </button>
                        </span>
                    </h5>
                    <div class="row equipment_table">
                        @if ($farmer->equipments->isEmpty())
                            لا يوجد معدات
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">نوع الآلة</th>
                                        <th scope="col">نوع الملكية</th>
                                        <th scope="col">العدد</th>
                                        <th scope="col">ملاحظات</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farmer->equipments as $key => $equipment)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $equipment->machine_type }}</td>
                                            <td>{{ $equipment->property_type }}</td>
                                            <td>{{ $equipment->quantity }}</td>
                                            <td>{{ $equipment->notes }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#editEquipment"
                                                    data-id="{{ $equipment->id }}"
                                                    data-machine_type="{{ $equipment->machine_type }}"
                                                    data-property_type="{{ $equipment->property_type }}"
                                                    data-quantity="{{ $equipment->quantity }}"
                                                    data-notes="{{ $equipment->notes }}"
                                                    class="btn btn-primary editequipment"><i
                                                        class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_equipment"
                                                    data-id="{{ $equipment->id }}"><i class="las la-times"></i></a>
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

        {{-- modal --}}

        @extends('modals.equipments.addequipment')
        @extends('modals.equipments.editequipment')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.equipment_js')

        {{-- end ajax --}}

        <br>

        <div class="row">
            <div class="card bg-light" style="width: full">
                <div class="card-body">
                    <h5 class="card-title">اراضي الزراعية
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addLand">اضافة </button>
                        </span>
                    </h5>
                    <div class="row land_table">
                        @if ($farmer->lands->isEmpty())
                            لا يوجد اراضي زراعية
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">رقم القطعة</th>
                                        <th scope="col">رقم القسيمة</th>
                                        <th scope="col">نوع التعاقد</th>
                                        <th scope="col">نوع المالك</th>
                                        <th scope="col">اسم المالك</th>
                                        <th scope="col">المساحة</th>
                                        <th scope="col">#</th>
                                        <th scope="col">عرض</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farmer->lands as $key => $land)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $land->piece_number }}</td>
                                            <td>{{ $land->coupon_number }}</td>
                                            <td>{{ $land->contract_type }}</td>
                                            <td>{{ $land->owner_type }}</td>
                                            @if ($land->individuals->isEmpty())
                                                @foreach ($land->enterprises as $enterprise)
                                                    <td>{{ $enterprise->enterprise_owner_name }}</td>
                                                @endforeach
                                            @else
                                                @foreach ($land->individuals as $individual)
                                                    <td>{{ $individual->owner_firstname }}
                                                        {{ $individual->owner_secondname }}
                                                        {{ $individual->owner_thirdname }}
                                                        {{ $individual->owner_fourthname }}</td>
                                                @endforeach
                                            @endif

                                            <td>{{ $land->total_land_area_number }}</td>
                                            <td><a href="" data-toggle="modal" data-target="#editLand"
                                                    data-land_id="{{ $land->id }}"
                                                    data-individual_id="{{ $land->individuals->isEmpty() ? null : $individual->id }}"
                                                    data-enterprise_id="{{ $land->enterprises->isEmpty() ? null : $enterprise->id }}"
                                                    data-piece_number="{{ $land->piece_number }}"
                                                    data-coupon_number="{{ $land->coupon_number }}"
                                                    data-area_number_for_tenure_purposes="{{ $land->area_number_for_tenure_purposes }}"
                                                    data-area_number_for_non_acquisition_purposes="{{ $land->area_number_for_non_acquisition_purposes }}"
                                                    data-permanent_fallow_area_number="{{ $land->permanent_fallow_area_number }}"
                                                    data-temporary_fallow_area_number="{{ $land->temporary_fallow_area_number }}"
                                                    data-cultivated_land_area_number="{{ $land->cultivated_land_area_number }}"
                                                    data-forest_trees_area_number="{{ $land->forest_trees_area_number }}"
                                                    data-total_land_area_number="{{ $land->total_land_area_number }}"
                                                    data-far_from_armistice_line_number="{{ $land->far_from_armistice_line_number }}"
                                                    data-contract_type="{{ $land->contract_type }}"
                                                    data-holding_type="{{ $land->holding_type }}"
                                                    data-owner_type="{{ $land->owner_type }}"
                                                    data-owner_id_number="{{ $land->individuals->isEmpty() ? null : $individual->owner_ID_number }}"
                                                    data-owner_firstname="{{ $land->individuals->isEmpty() ? null : $individual->owner_firstname }}"
                                                    data-owner_secondname="{{ $land->individuals->isEmpty() ? null : $individual->owner_secondname }}"
                                                    data-owner_thirdname="{{ $land->individuals->isEmpty() ? null : $individual->owner_thirdname }}"
                                                    data-owner_fourthname="{{ $land->individuals->isEmpty() ? null : $individual->owner_fourthname }}"
                                                    data-enterprise_type="{{ $land->enterprises->isEmpty() ? null : $enterprise->enterprise_type }}"
                                                    data-enterprise_number="{{ $land->enterprises->isEmpty() ? null : $enterprise->enterprise_number }}"
                                                    data-enterprise_name="{{ $land->enterprises->isEmpty() ? null : $enterprise->enterprise_name }}"
                                                    data-enterprise_owner_id_number="{{ $land->enterprises->isEmpty() ? null : $enterprise->enterprise_owner_ID_number }}"
                                                    data-enterprise_owner_name="{{ $land->enterprises->isEmpty() ? null : $enterprise->enterprise_owner_name }}"
                                                    data-city="{{ $land->city }}"
                                                    data-region="{{ $land->region }}"
                                                    data-nearest_place="{{ $land->nearest_place }}"
                                                    data-notes="{{ $land->notes }}"
                                                    data-latitude="{{ $land->latitude }}"
                                                    data-longitude="{{ $land->longitude }}"
                                                    class="btn btn-primary editland"><i class="las la-edit"></i></a>
                                                <a href="" class="btn btn-danger delete_land"
                                                    data-id="{{ $land->id }}"><i class="las la-times"></i></a>
                                            </td>
                                            <td><a href="{{ route('land.show', $land->id) }}"
                                                    class="btn btn-success"><i class="las la-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- modal --}}

        @extends('modals.lands.addland')
        @extends('modals.lands.editland')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.land_js')

        {{-- end ajax --}}

        <br>

        <div class="row">
            <div class="card bg-light" style="width: full">
                <div class="card-body">
                    <h4 class="card-title">القوة العاملة</h4>

                    <div class="row">
                        <h6 class="card-title">القوة العاملة المؤقتة
                                <span id="temporaryWorkforces_add">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#addTemporaryWorkforce">اضافة </button>
                                </span>
                        </h6>

                        <div class="temporaryWorkforces_table">
                            @if ($farmer->temporaryWorkforces->isEmpty())
                                لا يوجد قوة عاملة مؤقتة
                            @else
                                <table class="table table-success table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">عدد الذكور</th>
                                            <th scope="col">عدد الذكور من الأسرة</th>
                                            <th scope="col">عدد الإناث</th>
                                            <th scope="col">عدد الإناث من الأسرة</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($farmer->temporaryWorkforces as $key => $temporaryWorkforce)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $temporaryWorkforce->males_number }}</td>
                                                <td>{{ $temporaryWorkforce->males_number_family }}</td>
                                                <td>{{ $temporaryWorkforce->females_number }}</td>
                                                <td>{{ $temporaryWorkforce->females_number_family }}</td>
                                                <td>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#editTemporaryWorkforce"
                                                        data-id="{{ $temporaryWorkforce->id }}"
                                                        data-males_number="{{ $temporaryWorkforce->males_number }}"
                                                        data-males_number_family="{{ $temporaryWorkforce->males_number_family }}"
                                                        data-females_number="{{ $temporaryWorkforce->females_number }}"
                                                        data-females_number_family="{{ $temporaryWorkforce->females_number_family }}"
                                                        class="btn btn-primary edittemporaryWorkforce"><i
                                                            class="las la-edit"></i></a>

                                                    <a href="" class="btn btn-danger delete_temporaryWorkforce"
                                                        data-id="{{ $temporaryWorkforce->id }}"><i
                                                            class="las la-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <h6 class="card-title">القوة العاملة الدائمة<span>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#addPermanentWorkforce">اضافة </button>
                            </span>
                        </h6>

                        <div class="permanentWorkforces_table">
                            @if ($farmer->permanentWorkforces->isEmpty())
                                لا يوجد قوة عاملة دائمة
                            @else
                                <table class="table table-success table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">رقم الهوية</th>
                                            <th scope="col">الاسم رباعي</th>
                                            <th scope="col">الجنس</th>
                                            <th scope="col">الجوال</th>
                                            <th scope="col">العنوان</th>
                                            <th scope="col">من الأسرة</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($farmer->permanentWorkforces as $key => $permanentWorkforce)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $permanentWorkforce->id_NO }}</td>
                                                <td>{{ $permanentWorkforce->firstname }}
                                                    {{ $permanentWorkforce->secondname }}
                                                    {{ $permanentWorkforce->thirdname }}
                                                    {{ $permanentWorkforce->fourthname }}</td>
                                                <td>{{ $permanentWorkforce->gender }}</td>
                                                <td>{{ $permanentWorkforce->phone_NO }}</td>
                                                <td>{{ $permanentWorkforce->address }}</td>
                                                <td>{{ $permanentWorkforce->from_family }}</td>
                                                <td>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#editPermanentWorkforce"
                                                        data-id="{{ $permanentWorkforce->id }}"
                                                        data-id_no="{{ $permanentWorkforce->id_NO }}"
                                                        data-firstname="{{ $permanentWorkforce->firstname }}"
                                                        data-secondname="{{ $permanentWorkforce->secondname }}"
                                                        data-thirdname="{{ $permanentWorkforce->thirdname }}"
                                                        data-fourthname="{{ $permanentWorkforce->fourthname }}"
                                                        data-gender="{{ $permanentWorkforce->gender }}"
                                                        data-phone_no="{{ $permanentWorkforce->phone_NO }}"
                                                        data-address="{{ $permanentWorkforce->address }}"
                                                        data-from_family="{{ $permanentWorkforce->from_family }}"
                                                        class="btn btn-primary editpermanentWorkforce"><i
                                                            class="las la-edit"></i></a>

                                                    <a href="" class="btn btn-danger delete_permanentWorkforce"
                                                        data-id="{{ $permanentWorkforce->id }}"><i
                                                            class="las la-times"></i></a>
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
        </div>

        <br>

        {{-- modal --}}

        @extends('modals.workforces.addTemporaryWorkforce')
        @extends('modals.workforces.editTemporaryWorkforce')
        @extends('modals.workforces.addPermanentWorkforce')
        @extends('modals.workforces.editPermanentWorkforce')


        {{-- end modal --}}

        {{-- ajax --}}

        @extends('ajax.workforce_js')

        {{-- end ajax --}}

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">التطبيقات
                        @if ($farmer->apps->isEmpty())
                            <span>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#addApp">اضافة </button>
                            </span>
                        @else
                            <a href="" data-toggle="modal" data-target="#editApp"
                                class="btn btn-primary btn-sm editapp">تعديل الإجابات</a>
                        @endif

                    </h5>
                    <div class="row app_table"
                        style="width: 70%;   margin-left: auto;
                            margin-right: auto;">
                        @if ($farmer->apps->isEmpty())
                            لا يوجد تطبيقات
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">التطبيق</th>
                                        <th scope="col">القيمة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>هل تستخدم اصول محسنة (بذور, أبصال, درنات, أشتال)</td>
                                        <td>{{ $app->q1 }}</td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>هل تستخدم اسمدة عضوية؟</td>
                                        <td>{{ $app->q2 }}</td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>هل تستخدم اسمدة كيماوية؟</td>
                                        <td>{{ $app->q3 }}</td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>هل تستخدم مبيدات زراعية؟</td>
                                        <td>{{ $app->q4 }}</td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>هل تستخدم المكافحة المتكاملة؟</td>
                                        <td>{{ $app->q5 }}</td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>هل تقوم بتطعيم حيواناتك ضد الأمراض الوبائية؟</td>
                                        <td>{{ $app->q6 }}</td>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>هل تتلقى خدمات حكومية؟</td>
                                        <td>{{ $app->q7 }}</td>
                                    </tr>

                                    <tr>
                                        <td>8</td>
                                        <td>حدد مصدر الإرشاد الزراعي الرئيسي؟</td>
                                        <td>{{ $app->q8 }}</td>
                                    </tr>

                                    <tr>
                                        <td>9</td>
                                        <td>هل يوجد فقاسة؟'</td>
                                        <td>{{ $app->q9 }}</td>
                                    </tr>

                                    <tr id="qten">
                                        <td>10</td>
                                        <td>الطافة الإنتاجية (بيضة\دورة)؟</td>
                                        <td>{{ $app->q10 }}</td>
                                    </tr>

                                    <tr>
                                        <td>11</td>
                                        <td>هل يشكل الحيازة 50% من إجمالي دخل الأسرة؟</td>
                                        <td>{{ $app->q11 }}</td>
                                    </tr>

                                    <tr>
                                        <td>12</td>
                                        <td>هل استفدت من مشاريع استصلاحات الأراضي او شق الطرق الزراعية او
                                            أي مشاريع زراعية أخرى؟</td>
                                        <td>{{ $app->q12 }}</td>
                                    </tr>

                                    <tr>
                                        <td>13</td>
                                        <td>هل تنصع منتجات الحيازة؟</td>
                                        <td>{{ $app->q13 }}</td>
                                    </tr>

                                    <tr>
                                        <td>14</td>
                                        <td>هل يوجد لديك بئر مياه؟</td>
                                        <td>{{ $app->q14 }}</td>
                                    </tr>

                                    <tr>
                                        <td>15</td>
                                        <td>حالة البئر؟</td>
                                        <td>{{ $app->q15 }}</td>
                                    </tr>

                                    <tr>
                                        <td>16</td>
                                        <td>ما هو النشاط الاقتصادي الرئيسي للحيازة؟</td>
                                        <td>{{ $app->q16 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        {{-- modal --}}

        @extends('modals.apps.addapp')
        @if ($farmer->apps->isEmpty())
        @else
            @include('modals.apps.editapp')
        @endif


        {{-- end modal --}}

        {{-- ajax --}}

        @extends('ajax.app_js')

        {{-- end ajax --}}


        <br>


    </div>




</body>

</html>
