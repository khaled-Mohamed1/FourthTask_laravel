<div class="modal fade" id="addCattle" tabindex="-1" role="dialog" aria- labelledby="addCattleLabel" aria-hidden="true">

    <form action="" method="POST" id="addCattle_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCattleLabel">اضافة ماشية</h5>
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
                        <select name="cattle_type" id="cattle_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ابقار">ابقار</option>
                            <option value="خيل">خيل</option>
                            <option value="بغال">بغال</option>
                            <option value="حمير">حمير</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">الجنس</label>
                        <select name="cattle_gender" id="cattle_gender" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ذكر">ذكر</option>
                            <option value="انثى">انثى</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">العدد</label>
                        <input name="cattle_number" id="cattle_number" type="text" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required">العمر</label>
                        <input name="cattle_age" id="cattle_age" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">الحالة الصحية</label>
                        <select name="cattle_healthCondition" id="cattle_healthCondition" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="سليم">سليم</option>
                            <option value="مريض">مريض</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">ملاحظات</label>
                        <input name="cattle_notes" id="cattle_notes" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_cattle">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
