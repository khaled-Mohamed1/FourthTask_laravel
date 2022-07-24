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
            <h3>بيانات الأرض الزراعية للمالك <span class="badge bg-secondary">
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
                </span></h3>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('farmers') }}">المزارعين</a>
                <a class="btn btn-primary" href="{{ route('farmer.show', $land->farmer_id) }}">رجوع للمزارع</a>

            </div>
        </nav>

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">بيانات أساسية </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="card-text">نوع المالك : <span class="fw-bolder">{{ $land->owner_type }}</span>
                            </p>
                            @if ($land->owner_type == 'مؤسسة')
                                @foreach ($land->enterprises as $enterprise)
                                    <p class="card-text">اسم المالك: <span
                                            class="fw-bolder">{{ $enterprise->enterprise_owner_name }}</span></p>
                                    <p class="card-text">رقم هوية المالك :<span
                                            class="fw-bolder">{{ $enterprise->enterprise_owner_ID_number }}</span>
                                @endforeach
                            @else
                                @foreach ($land->individuals as $individual)
                                    <p class="card-text">اسم المالك: <span
                                            class="fw-bolder">{{ $individual->owner_firstname }}
                                            {{ $individual->owner_secondname }}
                                            {{ $individual->owner_thirdname }}
                                            {{ $individual->owner_fourthname }}</span></p>
                                    <p class="card-text">رقم هوية المالك :<span
                                            class="fw-bolder">{{ $individual->owner_ID_number }}</span>
                                @endforeach
                            @endif
                            <p class="card-text">نوع التعاقد :<span class="fw-bolder">{{ $land->contract_type }}</span>
                            <p class="card-text">نوع الحياز :<span class="fw-bolder">{{ $land->holding_type }}</span>
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="card-text">رقم القطعة :<span class="fw-bolder">{{ $land->piece_number }}</span>
                            </p>
                            <p class="card-text">رقم القسيمة :<span class="fw-bolder">{{ $land->coupon_number }}</span>
                            </p>
                            <p class="card-text">المحافظة :<span class="fw-bolder">{{ $land->city }}</span></p>
                            <p class="card-text">المنطقة :<span class="fw-bolder">{{ $land->region }}</span></p>
                            <p class="card-text">اقرب معلم :<span class="fw-bolder">{{ $land->nearest_place }}</span>
                            </p>

                        </div>
                        <div class="col-md-3">
                            <p class="card-text">مساحة المباني لأغراض الحيازة: <span
                                    class="fw-bolder">{{ $land->area_number_for_tenure_purposes }}</span></p>
                            <p class="card-text">مساحة المباني لغير أغراض الحيازة: <span
                                    class="fw-bolder">{{ $land->area_number_for_non_acquisition_purposes }}</span>
                            </p>
                            <p class="card-text">مساحة البور الدائم :<span
                                    class="fw-bolder">{{ $land->permanent_fallow_area_number }}</span></p>
                            <p class="card-text">مساحة البور المؤقت :<span
                                    class="fw-bolder">{{ $land->temporary_fallow_area_number }}</span></p>
                            <p class="card-text">مساحة الأرض المزوعة :<span
                                    class="fw-bolder">{{ $land->cultivated_land_area_number }}</span></p>
                        </div>
                        <div class="col-md-3">
                            <p class="card-text">مساحة الأشجار الحرجية :<span
                                    class="fw-bolder">{{ $land->forest_trees_area_number }}</span></p>
                            <p class="card-text">المساحة الإجمالية :<span
                                    class="fw-bolder">{{ $land->total_land_area_number }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">الشركاء
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addPartner">اضافة </button>
                        </span>
                    </h5>
                    <div class="row partner_table">
                        @if ($land->partners->isEmpty())
                            لا يوجد شركاء
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">رقم الهوية</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">نوع الشراكة</th>
                                        <th scope="col">نسبة الشراكة %</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($land->partners as $key => $partner)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $partner->partner_idnumber }}</td>
                                            <td>{{ $partner->partner_name }}</td>
                                            <td>{{ $partner->partner_type }}</td>
                                            <td>{{ $partner->partner_ratio }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#editPartner"
                                                    data-id="{{ $partner->id }}"
                                                    data-partner_idnumber="{{ $partner->partner_idnumber }}"
                                                    data-partner_name="{{ $partner->partner_name }}"
                                                    data-partner_type="{{ $partner->partner_type }}"
                                                    data-partner_ratio="{{ $partner->partner_ratio }}"
                                                    class="btn btn-primary editpartner"><i class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_partner"
                                                    data-id="{{ $partner->id }}"><i class="las la-times"></i></a>
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

        @extends('modals.lands.partners.addpartner')
        @extends('modals.lands.partners.editpartner')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.lands.partner_js')

        {{-- end ajax --}}

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">المباني
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addBuilding">اضافة </button>
                        </span>
                    </h5>
                    <div class="row building_table">
                        @if ($land->buildings->isEmpty())
                            لا يوجد مباني
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">نوع المبنى</th>
                                        <th scope="col">المساحة</th>
                                        <th scope="col">الملكية</th>
                                        <th scope="col">ملاحظات</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($land->buildings as $key => $building)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $building->building_type }}</td>
                                            <td>{{ $building->building_area }}-دونم</td>
                                            <td>{{ $building->building_ownership }}</td>
                                            <td>{{ $building->building_notes }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#editBuilding"
                                                    data-id="{{ $building->id }}"
                                                    data-building_type="{{ $building->building_type }}"
                                                    data-building_area="{{ $building->building_area }}"
                                                    data-building_ownership="{{ $building->building_ownership }}"
                                                    data-building_notes="{{ $building->building_notes }}"
                                                    data-building_farm_type="{{ $building->building_farm_type }}"
                                                    data-building_farm_roof_type="{{ $building->building_farm_roof_type }}"
                                                    class="btn btn-primary editbuilding"><i
                                                        class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_building"
                                                    data-id="{{ $building->id }}"><i class="las la-times"></i></a>
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

        @extends('modals.lands.buildings.addbuilding')
        @extends('modals.lands.buildings.editbuilding')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.lands.building_js')

        {{-- end ajax --}}

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">مصادر الري
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addWaterSource">اضافة </button>
                        </span>
                    </h5>
                    <div class="row waterSources_table">
                        @if ($land->waterSources->isEmpty())
                            لا يوجد مصادر للري
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th rowspan="3" scope="col">مصدر الري</th>
                                        <th rowspan="3" scope="col">القيمة</th>
                                        <th rowspan="3" scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($land->waterSources as $key => $waterSource)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td class="text-center">{{ $waterSource->sources_type }}</td>
                                            <td class="text-center">
                                                @if ($waterSource->sources_type == 'بئر')
                                                    <p>العمق: {{ $waterSource->well_depth }}م</p>
                                                    <p>قوة الدفع: {{ $waterSource->well_impetus }}حصان</p>
                                                    <p>الكهرباء: {{ $waterSource->well_electro }}فاز</p>
                                                @elseif($waterSource->sources_type == 'خزان علوي')
                                                    <p>سعة تخزينية: {{ $waterSource->tank_storage_capacity }}لتر</p>
                                                    <p>ارتفاع: {{ $waterSource->tank_Height }}م</p>
                                                @else
                                                    <p>العمق: {{ $waterSource->groundWater_depth }}م</p>
                                                    <p>سعة التخزينية:
                                                        {{ $waterSource->groundWater_storage_capacity }}لتر</p>
                                                    <p>نوع البركة: {{ $waterSource->groundWater_pond_type }}</p>
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                <a href="" data-toggle="modal" data-target="#editWaterSource"
                                                    data-id="{{ $waterSource->id }}"
                                                    data-sources_type="{{ $waterSource->sources_type }}"
                                                    data-well_number="{{ $waterSource->well_number }}"
                                                    data-well_depth="{{ $waterSource->well_depth }}"
                                                    data-well_impetus="{{ $waterSource->well_impetus }}"
                                                    data-well_electro="{{ $waterSource->well_electro }}"
                                                    data-tank_storage_capacity="{{ $waterSource->tank_storage_capacity }}"
                                                    data-tank_Height="{{ $waterSource->tank_Height }}"
                                                    data-groundWater_depth="{{ $waterSource->groundWater_depth }}"
                                                    data-groundWater_pond_type="{{ $waterSource->groundWater_pond_type }}"
                                                    class="btn btn-primary editwaterSource"><i
                                                        class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_waterSource"
                                                    data-id="{{ $waterSource->id }}"><i class="las la-times"></i></a>
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

        @extends('modals.lands.waterSources.addwaterSource')
        @extends('modals.lands.waterSources.editwaterSource')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.lands.waterSource_js')

        {{-- end ajax --}}

        <br>


        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">المحاصيل الحقلية
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addCrop">اضافة </button>
                        </span>
                    </h5>
                    <div class="row crop_table">
                        @if ($land->crops->isEmpty())
                            لا يوجد محاصيل حقلية
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الصنف</th>
                                        <th scope="col">تاريخ الزراعة</th>
                                        <th scope="col">المساحة</th>
                                        <th scope="col">وضع المحصول</th>
                                        <th scope="col">طريقة الري</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($land->crops as $key => $crop)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $crop->crop_name }}</td>
                                            <td>{{ $crop->crop_history }}</td>
                                            <td>{{ $crop->crop_area }}</td>
                                            <td>{{ $crop->crop_status }}</td>
                                            <td>{{ $crop->crop_irrigation }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#editCrop"
                                                    data-id="{{ $crop->id }}"
                                                    data-crop_name="{{ $crop->crop_name }}"
                                                    data-crop_history="{{ $crop->crop_history }}"
                                                    data-crop_area="{{ $crop->crop_area }}"
                                                    data-crop_status="{{ $crop->crop_status }}"
                                                    data-crop_irrigation="{{ $crop->crop_irrigation }}"
                                                    data-crop_recession="{{ $crop->crop_recession }}"
                                                    data-crop_recession_reason="{{ $crop->crop_recession_reason }}"
                                                    data-crop_enddate="{{ $crop->crop_endDate }}"
                                                    class="btn btn-primary editcrop"><i class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_crop"
                                                    data-id="{{ $crop->id }}"><i class="las la-times"></i></a>
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

        @extends('modals.lands.crops.addcrop')
        @extends('modals.lands.crops.editcrop')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.lands.crop_js')

        {{-- end ajax --}}

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">الخضراوات
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addVegetable">اضافة </button>
                        </span>
                    </h5>
                    <div class="row vegetable_table">
                        @if ($land->vegetables->isEmpty())
                            لا يوجد حضروات
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الصنف</th>
                                        <th scope="col">تاريخ الزراعة</th>
                                        <th scope="col">المساحة</th>
                                        <th scope="col">وضع المحصول</th>
                                        <th scope="col">طريقة الري</th>
                                        <th scope="col">الحماية</th>
                                        <th scope="col">نوع الحماية </th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($land->vegetables as $key => $vegetable)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $vegetable->vegetable_name }}</td>
                                            <td>{{ $vegetable->vegetable_history }}</td>
                                            <td>{{ $vegetable->vegetable_area }}</td>
                                            <td>{{ $vegetable->vegetable_status }}</td>
                                            <td>{{ $vegetable->vegetable_irrigation }}</td>
                                            <td>{{ $vegetable->vegetable_protection }}</td>
                                            <td>{{ $vegetable->vegetable_protectionType }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#editVegetable"
                                                    data-id="{{ $vegetable->id }}"
                                                    data-vegetable_name="{{ $vegetable->vegetable_name }}"
                                                    data-vegetable_history="{{ $vegetable->vegetable_history }}"
                                                    data-vegetable_area="{{ $vegetable->vegetable_area }}"
                                                    data-vegetable_status="{{ $vegetable->vegetable_status }}"
                                                    data-vegetable_irrigation="{{ $vegetable->vegetable_irrigation }}"
                                                    data-vegetable_recession="{{ $vegetable->vegetable_recession }}"
                                                    data-vegetable_recession_reason="{{ $vegetable->vegetable_recession_reason }}"
                                                    data-vegetable_enddate="{{ $vegetable->vegetable_endDate }}"
                                                    data-vegetable_protection="{{ $vegetable->vegetable_protection }}"
                                                    data-vegetable_protectiontype="{{ $vegetable->vegetable_protectionType }}"
                                                    class="btn btn-primary editvegetable"><i
                                                        class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_vegetable"
                                                    data-id="{{ $vegetable->id }}"><i class="las la-times"></i></a>
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

        @extends('modals.lands.vegetables.addvegetable')
        @extends('modals.lands.vegetables.editvegetable')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.lands.vegetable_js')

        {{-- end ajax --}}

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">الأشجار
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addTree">اضافة </button>
                        </span>
                    </h5>
                    <div class="row tree_table">
                        @if ($land->trees->isEmpty())
                            لا يوجد اشجار
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الصنف</th>
                                        <th scope="col">تاريخ الزراعة</th>
                                        <th scope="col">المساحة</th>
                                        <th scope="col">عدد الأشجار</th>
                                        <th scope="col">طريقة الري</th>
                                        <th scope="col">الحماية</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($land->trees as $key => $tree)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $tree->tree_name }}</td>
                                            <td>{{ $tree->tree_history }}</td>
                                            <td>{{ $tree->tree_area }}</td>
                                            <td>{{ $tree->tree_number }}</td>
                                            <td>{{ $tree->tree_irrigation }}</td>
                                            <td>{{ $tree->tree_protection }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#editTree"
                                                    data-id="{{ $tree->id }}"
                                                    data-tree_name="{{ $tree->tree_name }}"
                                                    data-tree_history="{{ $tree->tree_history }}"
                                                    data-tree_area="{{ $tree->tree_area }}"
                                                    data-tree_number="{{ $tree->tree_number }}"
                                                    data-tree_irrigation="{{ $tree->tree_irrigation }}"
                                                    data-tree_recession="{{ $tree->tree_recession }}"
                                                    data-tree_recession_reason="{{ $tree->tree_recession_reason }}"
                                                    data-tree_enddate="{{ $tree->tree_endDate }}"
                                                    data-tree_protection="{{ $tree->tree_protection }}"
                                                    class="btn btn-primary edittree"><i class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_tree"
                                                    data-id="{{ $tree->id }}"><i class="las la-times"></i></a>
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

        @extends('modals.lands.trees.addtree')
        @extends('modals.lands.trees.edittree')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.lands.tree_js')

        {{-- end ajax --}}

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">الماشية
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addCattle">اضافة </button>
                        </span>
                    </h5>
                    <div class="row cattle_table">
                        @if ($land->cattles->isEmpty())
                            لا يوجد ماشية
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الصنف</th>
                                        <th scope="col">الجنس</th>
                                        <th scope="col">العدد</th>
                                        <th scope="col">العمر</th>
                                        <th scope="col">حالة الصحية</th>
                                        <th scope="col">ملاحظات</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($land->cattles as $key => $cattle)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $cattle->cattle_type }}</td>
                                            <td>{{ $cattle->cattle_gender }}</td>
                                            <td>{{ $cattle->cattle_number }}</td>
                                            <td>{{ $cattle->cattle_age }}</td>
                                            <td>{{ $cattle->cattle_healthCondition }}</td>
                                            <td>{{ $cattle->cattle_notes }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#editCattle"
                                                    data-id="{{ $cattle->id }}"
                                                    data-cattle_type="{{ $cattle->cattle_type }}"
                                                    data-cattle_gender="{{ $cattle->cattle_gender }}"
                                                    data-cattle_number="{{ $cattle->cattle_number }}"
                                                    data-cattle_age="{{ $cattle->cattle_age }}"
                                                    data-cattle_healthcondition="{{ $cattle->cattle_healthCondition }}"
                                                    data-cattle_notes="{{ $cattle->cattle_notes }}"
                                                    class="btn btn-primary editcattle"><i class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_cattle"
                                                    data-id="{{ $cattle->id }}"><i class="las la-times"></i></a>
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

        @extends('modals.lands.cattles.addcattle')
        @extends('modals.lands.cattles.editcattle')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.lands.cattle_js')

        {{-- end ajax --}}

        <br>


        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">دواجن
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addPoultry">اضافة </button>
                        </span>
                    </h5>
                    <div class="row poultry_table">
                        @if ($land->poultries->isEmpty())
                            لا يوجد دواجن
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الصنف</th>
                                        <th scope="col">العدد</th>
                                        <th scope="col">العمر بالأيام</th>
                                        <th scope="col">العمر بالأشهر</th>
                                        <th scope="col">ملاحظات</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($land->poultries as $key => $poultry)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $poultry->poultry_type }}</td>
                                            <td>{{ $poultry->poultry_number }}</td>
                                            <td>{{ $poultry->poultry_ageD }}</td>
                                            <td>{{ $poultry->poultry_ageM }}</td>
                                            <td>{{ $poultry->poultry_notes }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#editPoultry"
                                                    data-id="{{ $poultry->id }}"
                                                    data-poultry_type="{{ $poultry->poultry_type }}"
                                                    data-poultry_number="{{ $poultry->poultry_number }}"
                                                    data-poultry_aged="{{ $poultry->poultry_ageD }}"
                                                    data-poultry_agem="{{ $poultry->poultry_ageM }}"
                                                    data-poultry_notes="{{ $poultry->poultry_notes }}"
                                                    class="btn btn-primary editpoultry"><i
                                                        class="las la-edit"></i></a>

                                                <a href="" class="btn btn-danger delete_poultry"
                                                    data-id="{{ $poultry->id }}"><i class="las la-times"></i></a>
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

        @extends('modals.lands.poultries.addpoultry')
        @extends('modals.lands.poultries.editpoultry')


        {{-- end modal --}}


        {{-- ajax --}}

        @extends('ajax.lands.poultry_js')

        {{-- end ajax --}}

        <br>

    </div>

</body>

</html>
