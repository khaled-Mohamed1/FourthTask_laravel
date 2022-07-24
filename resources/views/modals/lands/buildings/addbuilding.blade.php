<div class="modal fade" id="addBuilding" tabindex="-1" role="dialog" aria- labelledby="addBuildingLabel" aria-hidden="true">

    <form action="" method="POST" id="addBuilding_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBuildingLabel">اضافة مبنى</h5>
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
                        <select name="building_type" id="building_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="مزرعة">مزرعة</option>
                            <option value="مخزن">مخزن</option>
                        </select>
                    </div>

                    <div class="row" style="display: none" id="مزرعة">
                        <div class="col-md-6">
                            <label class="form-label required">نوع المزرعة</label>
                            <select name="building_farm_type" id="building_farm_type" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="ابقار">ابقار</option>
                                <option value="اغنام">اغنام</option>
                                <option value="حبش">حبش</option>
                                <option value="دواجن">دواجن</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">نوع سقف المزرعة</label>
                            <select name="building_farm_roof_type" id="building_farm_roof_type" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="لا يوجد">لا يوجد</option>
                                <option value="خشب">خشب</option>
                                <option value="باطون">باطون</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المساحة</label>
                        <input name="building_area" id="building_area" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">الملكية</label>
                        <select name="building_ownership" id="building_ownership" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ملك">ملك</option>
                            <option value="عامة">عامة</option>
                            <option value="سلفة">سلفة</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">ملاحظات</label>
                        <input name="building_notes" id="building_notes" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_building">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
