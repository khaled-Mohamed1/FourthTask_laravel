<div class="modal fade" id="editBuilding" tabindex="-1" role="dialog" aria- labelledby="editBuildingLabel"
    aria-hidden="true">

    <form action="" method="POST" id="editBuilding_form">
        @csrf

        <input type="hidden" id="edit_id">


        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBuildingLabel">تعديل مبنى</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="land_id" id="land_id" type="hidden" value="{{ $land->id }}"
                        class="form-control">

                    <div class="col-md-12">
                        <label class="form-label required">نوع المبنى</label>
                        <select name="edit_building_type" id="edit_building_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="مزرعة">مزرعة</option>
                            <option value="مخزن">مخزن</option>
                        </select>
                    </div>

                    <div class="row" style="display: none" id="مزرعة">
                        <div class="col-md-6">
                            <label class="form-label required">نوع المزرعة</label>
                            <select name="edit_building_farm_type" id="edit_building_farm_type" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="ابقار">ابقار</option>
                                <option value="اغنام">اغنام</option>
                                <option value="حبش">حبش</option>
                                <option value="دواجن">دواجن</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">نوع سقف المزرعة</label>
                            <select name="edit_building_farm_roof_type" id="edit_building_farm_roof_type" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="لا يوجد">لا يوجد</option>
                                <option value="خشب">خشب</option>
                                <option value="باطون">باطون</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المساحة</label>
                        <input name="edit_building_area" id="edit_building_area" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">الملكية</label>
                        <select name="edit_building_ownership" id="edit_building_ownership" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ملك">ملك</option>
                            <option value="عامة">عامة</option>
                            <option value="سلفة">سلفة</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">ملاحظات</label>
                        <input name="edit_building_notes" id="edit_building_notes" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_building">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
