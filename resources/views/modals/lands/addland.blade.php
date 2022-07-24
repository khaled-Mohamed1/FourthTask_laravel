<div class="modal fade" id="addLand" tabindex="-1" role="dialog" aria- labelledby="addLandLabel" aria-hidden="true">


    <form action="" method="POST" id="addLand_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLandLabel">اضافة ارض زراعية</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="farmer_id" id="farmer_id" type="hidden" value="{{ $farmer->id }}"
                        class="form-control">

                    <div class="col-md-6">
                        <label class="form-label required">رقم القطعة</label>
                        <input name="land_piece_number" id="land_piece_number" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">رقم القسيمة</label>
                        <input name="land_coupon_number" id="land_coupon_number" type="text" class="form-control">
                    </div>

                    <div id="area" class="row">
                        <div class="col-md-4">
                            <label class="form-label ">مساحة المباني لإغراض الحيازة</label>
                            <input name="land_area_number_for_tenure_purposes" id="land_area_number_for_tenure_purposes"
                                type="text" class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة المباني لغير أغراض الحيازة</label>
                            <input name="land_area_number_for_non_acquisition_purposes"
                                id="land_area_number_for_non_acquisition_purposes" type="text"
                                class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة البور الدائم</label>
                            <input name="land_permanent_fallow_area_number" id="land_permanent_fallow_area_number"
                                type="text" class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة البور الموقت</label>
                            <input name="land_temporary_fallow_area_number" id="land_temporary_fallow_area_number"
                                type="text" class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة الأرض المزروعة</label>
                            <input name="land_cultivated_land_area_number" id="land_cultivated_land_area_number"
                                type="text" class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة الأشجار الحرجية</label>
                            <input name="land_forest_trees_area_number" id="land_forest_trees_area_number"
                                type="text" class="form-control texcal">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label class="form-label ">مساحة الأرض الاجمالية</label>
                        <input name="land_total_land_area_number" id="land_total_land_area_number" type="text"
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label ">البعد عن خطة الهدنة</label>
                        <input name="land_far_from_armistice_line_number" id="land_far_from_armistice_line_number"
                            type="text" class="form-control">
                    </div>


                    <div class="col-md-4">
                        <label class="form-label required">نوع التعاقد</label>
                        <select name="land_contract_type" id="land_contract_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="مكتوبة">مكتوبة</option>
                            <option value="اللفظية">اللفظية</option>
                            <option value="القياسية">القياسية</option>
                            <option value="الزمنية">الزمنية</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نوع الحياز</label>
                        <select name="land_holding_type" id="land_holding_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="الاستحقاقية">الاستحقاقية</option>
                            <option value="العرضية">العرضية</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نوع المالك</label>
                        <select name="land_owner_type" id="land_owner_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="فرد">فرد</option>
                            <option value="مؤسسة">مؤسسة</option>
                        </select>
                    </div>

                    <div class="row" style="display: none" id="فرد">
                        <div class="col-md-6">
                            <label class="form-label">رقم هوية المالك</label>
                            <input name="land_owner_ID_number" id="land_owner_ID_number" type="text"
                                class="form-control">
                        </div>



                        <div class="col-md-6">
                            <label class="form-label">الاسم الأول للمالك</label>
                            <input name="land_owner_firstname" id="land_owner_firstname" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">الاسم الثاني للمالك</label>
                            <input name="land_owner_secondname" id="land_owner_secondname" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">الاسم الثالث للمالك</label>
                            <input name="land_owner_thirdname" id="land_owner_thirdname" type="text"
                                class="form-control">

                        </div>

                        <div class="col-md-4">
                            <label class="form-label">الاسم الرابع للمالك</label>
                            <input name="land_owner_fourthname" id="land_owner_fourthname" type="text"
                                class="form-control">
                        </div>
                    </div>


                    <div class="row" style="display: none" id="مؤسسة">

                        <div class="col-md-4">
                            <label class="form-label">نوع المؤسسة</label>
                            <select name="land_enterprise_type" id="land_enterprise_type" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="جمعية">جمعية</option>
                                <option value="حكومية">حكومية</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">رقم المؤسسة</label>
                            <input name="land_enterprise_number" id="land_enterprise_number" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">اسم المؤسسة</label>
                            <input name="land_enterprise_name" id="land_enterprise_name" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">رقم هوية ممثل المؤسسة</label>
                            <input name="land_enterprise_owner_ID_number" id="land_enterprise_owner_ID_number"
                                type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">اسم ممثل المؤسسة</label>
                            <input name="land_enterprise_owner_name" id="land_enterprise_owner_name" type="text"
                                class="form-control">
                        </div>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المحافظة</label>
                        <select name="land_city" id="land_city" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_name }}">{{ $city->city_name }}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المنطقة</label>
                        <select name="land_region" id="land_region" class="form-select">
                            <option selected disabled value="">Choose...</option>

                        </select>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">اقرب معلم</label>
                        <input name="land_nearest_place" id="land_nearest_place" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label class="form-label">ملاحظات</label>
                        <input name="land_notes" id="land_notes" type="text" class="form-control">
                    </div>

                    {{-- <div class="col-md-6">
                        <input name="lat" id="lat" type="hidden" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <input name="lng" id="lng" type="hidden" class="form-control">
                    </div> --}}

                </div>

                {{-- <div class="col-md-12">
                    <div id="map" style="height:200px; width: 100%;" class="my-3"></div>
                </div> --}}

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_land">اعتماد</button>
                </div>

            </div>
        </div>


        {{-- <script>
            let map;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 31.354,
                        lng: 34.3222
                    },
                    zoom: 11,
                    scrollwheel: true,
                });

                const uluru = {
                    lat: 31.354,
                    lng: 34.322
                };
                let marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: true
                });

                google.maps.event.addListener(marker, 'position_changed',
                    function() {
                        let lat = marker.position.lat()
                        let lng = marker.position.lng()
                        $('#lat').val(lat)
                        $('#lng').val(lng)
                    });

                google.maps.event.addListener(map, 'click',
                    function(event) {
                        pos = event.latLng
                        marker.setPosition(pos)
                    })
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script> --}}

    </form>
</div>
