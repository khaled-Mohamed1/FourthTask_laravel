<div class="modal fade" id="addEquipment" tabindex="-1" role="dialog" aria- labelledby="addEquipmentLabel"
    aria-hidden="true">


    <form action="" method="POST" id="addEquipment_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel">اضافة آلات و معدات</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="farmer_id" id="farmer_id" type="hidden" value="{{ $farmer->id }}"
                        class="form-control">

                    <div class="col-md-4">
                        <label class="form-label required">نوع الآلة</label>
                        <select name="machine_type" id="machine_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="الجرار الزراعي">الجرار الزراعي</option>
                            <option value="المحاريث الزراعية">المحاريث الزراعية</option>
                            <option value="الأمشاط الزراعية">الأمشاط الزراعية</option>
                            <option value="آلات التسوية">آلات التسوية</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">نوع الملكية</label>
                        <select name="property_type" id="property_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="عامة">عامة</option>
                            <option value="خاصة">خاصة</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">العدد</label>
                        <input name="quantity" id="quantity" type="number" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label class="form-label required">ملاحظات</label>
                        <input name="notes" id="notes" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
