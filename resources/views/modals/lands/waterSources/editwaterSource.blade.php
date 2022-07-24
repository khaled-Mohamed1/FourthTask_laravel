<div class="modal fade" id="editWaterSource" tabindex="-1" role="dialog" aria- labelledby="editWaterSourceLabel"
    aria-hidden="true">

    <form action="" method="POST" id="editWaterSource_form">
        @csrf

        <input type="hidden" id="edit_id">

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editWaterSourceLabel">تعديل مصدر الري</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="land_id" id="land_id" type="hidden" value="{{ $land->id }}"
                        class="form-control">

                    <div class="col-md-12">
                        <label class="form-label required">نوع الري</label>
                        <select name="edit_sources_type" id="edit_sources_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بئر">بئر</option>
                            <option value="خزان علوي">خزان علوي</option>
                            <option value="مياه الأرض">مياه الأرض</option>
                        </select>
                    </div>

                    <div class="row" style="display: none" id="بئر">

                        <div class="col-md-6">
                            <label class="form-label required">رقم البئر</label>
                            <input name="edit_well_number" id="edit_well_number" type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">عمق البئر</label>
                            <input name="edit_well_depth" id="edit_well_depth" type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">قوة دفع</label>
                            <input name="edit_well_impetus" id="edit_well_impetus" type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">الكهرباء</label>
                            <input name="edit_well_electro" id="edit_well_electro" type="text" class="form-control">
                        </div>

                    </div>

                    <div class="row" style="display: none" id="خزان">

                        <div class="col-md-6">
                            <label class="form-label required">السعة التخزينية</label>
                            <input name="edit_tank_storage_capacity" id="edit_tank_storage_capacity" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">الارتفاع</label>
                            <input name="edit_tank_Height" id="edit_tank_Height" type="text" class="form-control">
                        </div>

                    </div>

                    <div class="row" style="display: none" id="مياه">

                        <div class="col-md-4">
                            <label class="form-label required">العمق</label>
                            <input name="edit_groundWater_depth" id="edit_groundWater_depth" type="text" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label required">السعة التخزينية</label>
                            <input name="edit_groundWater_storage_capacity" id="edit_groundWater_storage_capacity" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label required">نوع البركة</label>
                            <select name="edit_groundWater_pond_type" id="edit_groundWater_pond_type" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نهرية">نهرية</option>
                                <option value="ثقبية">ثقبية</option>
                                <option value="مستنقعية">مستنقعية</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_waterSource">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
