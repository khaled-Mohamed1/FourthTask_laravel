<div class="modal fade" id="addVegetable" tabindex="-1" role="dialog" aria- labelledby="addVegetableLabel"
    aria-hidden="true">

    <form action="" method="POST" id="addVegetable_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVegetableLabel">اضافة خضراوات</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="land_id" id="land_id" type="hidden" value="{{ $land->id }}"
                        class="form-control">

                    <div class="col-md-4">
                        <label class="form-label required">نوع الصنف</label>
                        <select name="vegetable_name" id="vegetable_name" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="سبانخ">سبانخ</option>
                            <option value="ملفوف">ملفوف</option>
                            <option value="خس">خس</option>
                            <option value="الجرجير">الجرجير</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">تاريخ الزراعة</label>
                        <input name="vegetable_history" id="vegetable_history" type="date" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">مساحة المحصول</label>
                        <input name="vegetable_area" id="vegetable_area" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">وضع المحصول</label>
                        <select name="vegetable_status" id="vegetable_status" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="منفرد">منفرد</option>
                            <option value="مقترن">مقترن</option>
                            <option value="مختلط">مختلط</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">نوع الري</label>
                        <select name="vegetable_irrigation" id="vegetable_irrigation" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بئر">بئر</option>
                            <option value="خزان علوي">خزان علوي</option>
                            <option value="مياه الأرض">مياه الأرض</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">الحماية</label>
                        <select name="vegetable_protection" id="vegetable_protection" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بيوت محمية مكيفة">بيوت محمية مكيفة</option>
                            <option value="بيوت البلاستيكية">بيوت البلاستيكية</option>
                            <option value="انفاض ارضية">انفاق ارضية</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">نوع الحماية</label>
                        <select name="vegetable_protectionType" id="vegetable_protectionType" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بيوت محمية مكيفة">بيوت محمية مكيفة</option>
                            <option value="بيوت البلاستيكية">بيوت البلاستيكية</option>
                            <option value="انفاض ارضية">انفاق ارضية</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">كساد؟</label>
                        <select name="vegetable_recession" id="vegetable_recession" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="نعم">نعم</option>
                            <option value="لا">لا</option>
                        </select>
                    </div>

                    <div class="col-md-6" style="display: none" id="recessionVegetable">
                        <label class="form-label">سبب الكساد</label>
                        <input name="vegetable_recession_reason" id="vegetable_recession_reason" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">تاريخ انتهاء المحصول</label>
                        <input name="vegetable_endDate" id="vegetable_endDate" type="date" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_vegetable">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
