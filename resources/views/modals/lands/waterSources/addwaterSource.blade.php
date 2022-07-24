<div class="modal fade" id="addWaterSource" tabindex="-1" role="dialog" aria- labelledby="addWaterSourceLabel"
    aria-hidden="true">

    <form action="" method="POST" id="addWaterSource_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWaterSourceLabel">اضافة مصدر ري</h5>
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
                        <select name="sources_type" id="sources_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بئر">بئر</option>
                            <option value="خزان علوي">خزان علوي</option>
                            <option value="مياه الأرض">مياه الأرض</option>
                        </select>
                    </div>

                    <div class="row" style="display: none" id="بئر">

                        <div class="col-md-6">
                            <label class="form-label required">رقم البئر</label>
                            <input name="well_number" id="well_number" type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">عمق البئر</label>
                            <input name="well_depth" id="well_depth" type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">قوة دفع</label>
                            <input name="well_impetus" id="well_impetus" type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">الكهرباء</label>
                            <input name="well_electro" id="well_electro" type="text" class="form-control">
                        </div>

                    </div>

                    <div class="row" style="display: none" id="خزان">

                        <div class="col-md-6">
                            <label class="form-label required">السعة التخزينية</label>
                            <input name="tank_storage_capacity" id="tank_storage_capacity" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">الارتفاع</label>
                            <input name="tank_Height" id="tank_Height" type="text" class="form-control">
                        </div>

                    </div>

                    <div class="row" style="display: none" id="مياه">

                        <div class="col-md-4">
                            <label class="form-label required">العمق</label>
                            <input name="groundWater_depth" id="groundWater_depth" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label required">السعة التخزينية</label>
                            <input name="groundWater_storage_capacity" id="groundWater_storage_capacity" type="text"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label required">نوع البركة</label>
                            <select name="groundWater_pond_type" id="groundWater_pond_type" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نهرية">نهرية</option>
                                <option value="ثقبية">ثقبية</option>
                                <option value="مستنقعية">مستنقعية</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_waterSource">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
