<div class="modal fade" id="addPermanentWorkforce" tabindex="-1" role="dialog" aria-
    labelledby="addPermanentWorkforceLabel" aria-hidden="true">


    <form action="" method="POST" id="addPermanentWorkforce_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPermanentWorkforceLabel">اضافة قوة عاملة دائمة</h5>
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
                        <input name="id_NO" id="id_NO" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">رقم الجوال</label>
                        <input name="phone_NO" id="phone_NO" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الأول</label>
                        <input name="firstname" id="firstname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الثاني</label>
                        <input name="secondname" id="secondname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الثالث</label>
                        <input name="thirdname" id="thirdname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الرابع</label>
                        <input name="fourthname" id="fourthname" type="text" class="form-control">
                    </div>


                    <div class="col-md-4">
                        <label class="form-label required">الجنس</label>
                        <select name="gender" id="gender" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ذكر">ذكر</option>
                            <option value="انثى">انثى</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">عنوان السكن</label>
                        <input name="address" id="address" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">من الأسرة</label>
                        <select name="from_family" id="from_family" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="نعم">نعم</option>
                            <option value="لا">لا</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_permanentWorkforce">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
