<div class="modal fade" id="editPermanentWorkforce" tabindex="-1" role="dialog" aria-
    labelledby="editPermanentWorkforceLabel" aria-hidden="true">


    <form action="" method="POST" id="editPermanentWorkforce_form">
        @csrf

        <input type="hidden" id="editPermanentWorkforce_id">


        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPermanentWorkforceLabel">تعديل القوة العاملة الدائمة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="farmer_id" id="farmer_id" type="hidden" value="{{ $farmer->id }}"
                        class="form-control">

                    <div class="col-md-6">
                        <label class="form-label required">رقم الهوية</label>
                        <input name="edit_id_NO" id="edit_id_NO" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">رقم الجوال</label>
                        <input name="edit_phone_NO" id="edit_phone_NO" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الأول</label>
                        <input name="edit_firstname" id="edit_firstname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الثاني</label>
                        <input name="edit_secondname" id="edit_secondname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الثالث</label>
                        <input name="edit_thirdname" id="edit_thirdname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الرابع</label>
                        <input name="edit_fourthname" id="edit_fourthname" type="text" class="form-control">
                    </div>


                    <div class="col-md-4">
                        <label class="form-label required">الجنس</label>
                        <select name="edit_gender" id="edit_gender" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ذكر">ذكر</option>
                            <option value="انثى">انثى</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">عنوان السكن</label>
                        <input name="edit_address" id="edit_address" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">من الأسرة</label>
                        <select name="edit_from_family" id="edit_from_family" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="نعم">نعم</option>
                            <option value="لا">لا</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_permanentWorkforce">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
