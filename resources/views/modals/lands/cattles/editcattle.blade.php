<div class="modal fade" id="editCattle" tabindex="-1" role="dialog" aria- labelledby="editCattleLabel" aria-hidden="true">

    <form action="" method="POST" id="editCattle_form">
        @csrf

        <input type="hidden" id="edit_id">


        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCattleLabel">تعديل ماشية</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="land_id" id="land_id" type="hidden" value="{{ $land->id }}"
                        class="form-control">

                    <div class="col-md-6">
                        <label class="form-label required">نوع الصنف</label>
                        <select name="edit_cattle_type" id="edit_cattle_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ابقار">ابقار</option>
                            <option value="خيل">خيل</option>
                            <option value="بغال">بغال</option>
                            <option value="حمير">حمير</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">الجنس</label>
                        <select name="edit_cattle_gender" id="edit_cattle_gender" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ذكر">ذكر</option>
                            <option value="انثى">انثى</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">العدد</label>
                        <input name="edit_cattle_number" id="edit_cattle_number" type="text" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required">العمر</label>
                        <input name="edit_cattle_age" id="edit_cattle_age" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">الحالة الصحية</label>
                        <select name="edit_cattle_healthCondition" id="edit_cattle_healthCondition" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="سليم">سليم</option>
                            <option value="مريض">مريض</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">ملاحظات</label>
                        <input name="edit_cattle_notes" id="edit_cattle_notes" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_cattle">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
