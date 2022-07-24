<div class="modal fade" id="editLand" tabindex="-1" role="dialog" aria- labelledby="editLandLabel" aria-hidden="true">


    <form action="" method="POST" id="editLand_form">
        @csrf

        <input type="hidden" id="edit_land_id">
        <input type="hidden" id="edit_individual_id">
        <input type="hidden" id="edit_enterprise_id">

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLandLabel">تعديل ارض زراعية</h5>
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
                        <input name="edit_land_piece_number" id="edit_land_piece_number" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">رقم القسيمة</label>
                        <input name="edit_land_coupon_number" id="edit_land_coupon_number" type="text"
                            class="form-control">
                    </div>

                    <div id="edit_area" class="row">
                        <div class="col-md-4">
                            <label class="form-label ">مساحة المباني لإغراض الحيازة</label>
                            <input name="edit_land_area_number_for_tenure_purposes"
                                id="edit_land_area_number_for_tenure_purposes" type="text"
                                class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة المباني لغير أغراض الحيازة</label>
                            <input name="edit_land_area_number_for_non_acquisition_purposes"
                                id="edit_land_area_number_for_non_acquisition_purposes" type="text"
                                class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة البور الدائم</label>
                            <input name="edit_land_permanent_fallow_area_number"
                                id="edit_land_permanent_fallow_area_number" type="text" class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة البور الموقت</label>
                            <input name="edit_land_temporary_fallow_area_number"
                                id="edit_land_temporary_fallow_area_number" type="text" class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة الأرض المزروعة</label>
                            <input name="edit_land_cultivated_land_area_number"
                                id="edit_land_cultivated_land_area_number" type="text" class="form-control texcal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ">مساحة الأشجار الحرجية</label>
                            <input name="edit_land_forest_trees_area_number" id="edit_land_forest_trees_area_number"
                                type="text" class="form-control texcal">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label class="form-label ">مساحة الأرض الاجمالية</label>
                        <input name="edit_land_total_land_area_number" id="edit_land_total_land_area_number"
                            type="text" class="form-control" disabled>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label ">البعد عن خطة الهدنة</label>
                        <input name="edit_land_far_from_armistice_line_number"
                            id="edit_land_far_from_armistice_line_number" type="text" class="form-control">
                    </div>


                    <div class="col-md-4">
                        <label class="form-label required">نوع التعاقد</label>
                        <select name="edit_land_contract_type" id="edit_land_contract_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="مكتوبة">مكتوبة</option>
                            <option value="اللفظية">اللفظية</option>
                            <option value="القياسية">القياسية</option>
                            <option value="الزمنية">الزمنية</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نوع الحياز</label>
                        <select name="edit_land_holding_type" id="edit_land_holding_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="الاستحقاقية">الاستحقاقية</option>
                            <option value="العرضية">العرضية</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نوع المالك</label>
                        <select name="edit_land_owner_type" id="edit_land_owner_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="فرد">فرد</option>
                            <option value="مؤسسة">مؤسسة</option>
                        </select>
                    </div>

                    <div class="row" style="display: none" id="فرد">
                        <div class="col-md-6">
                            <label class="form-label">رقم هوية المالك</label>
                            <input name="edit_land_owner_ID_number" id="edit_land_owner_ID_number" type="text"
                                class="form-control">
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">الاسم الأول للمالك</label>
                            <input name="edit_land_owner_firstname" id="edit_land_owner_firstname" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">الاسم الثاني للمالك</label>
                            <input name="edit_land_owner_secondname" id="edit_land_owner_secondname" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">الاسم الثالث للمالك</label>
                            <input name="edit_land_owner_thirdname" id="edit_land_owner_thirdname" type="text"
                                class="form-control">

                        </div>

                        <div class="col-md-4">
                            <label class="form-label">الاسم الرابع للمالك</label>
                            <input name="edit_land_owner_fourthname" id="edit_land_owner_fourthname" type="text"
                                class="form-control">
                        </div>
                    </div>



                    <div class="row" style="display: none" id="مؤسسة">

                        <div class="col-md-4">
                            <label class="form-label">نوع المؤسسة</label>
                            <select name="edit_land_enterprise_type" id="edit_land_enterprise_type"
                                class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="جمعية">جمعية</option>
                                <option value="حكومية">حكومية</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">رقم المؤسسة</label>
                            <input name="edit_land_enterprise_number" id="edit_land_enterprise_number" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">اسم المؤسسة</label>
                            <input name="edit_land_enterprise_name" id="edit_land_enterprise_name" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">رقم هوية ممثل المؤسسة</label>
                            <input name="edit_land_enterprise_owner_ID_number"
                                id="edit_land_enterprise_owner_ID_number" type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">اسم ممثل المؤسسة</label>
                            <input name="edit_land_enterprise_owner_name" id="edit_land_enterprise_owner_name"
                                type="text" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المحافظة</label>
                        <select name="edit_land_city" id="edit_land_city" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_name }}">{{ $city->city_name }}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المنطقة</label>
                        <select name="edit_land_region" id="edit_land_region" class="form-select">
                        </select>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">اقرب معلم</label>
                        <input name="edit_land_nearest_place" id="edit_land_nearest_place" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label class="form-label">ملاحظات</label>
                        <input name="edit_land_notes" id="edit_land_notes" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_land">اعتماد</button>
                </div>

            </div>
        </div>




    </form>
</div>
