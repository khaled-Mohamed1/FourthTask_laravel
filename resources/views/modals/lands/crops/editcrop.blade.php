<div class="modal fade" id="editCrop" tabindex="-1" role="dialog" aria- labelledby="editCropLabel" aria-hidden="true">

    <form action="" method="POST" id="editCrop_form">
        @csrf

        <input type="hidden" id="edit_id">


        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCropLabel">تعديل المحصول الحقلي</h5>
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
                        <select name="edit_crop_name" id="edit_crop_name" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ذرة">ذرة</option>
                            <option value="ارز">ارز</option>
                            <option value="قمح">قمح</option>
                            <option value="شوفان">شوفان</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">تاريخ الزراعة</label>
                        <input name="edit_crop_history" id="edit_crop_history" type="date" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">مساحة المحصول</label>
                        <input name="edit_crop_area" id="edit_crop_area" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">وضع المحصول</label>
                        <select name="edit_crop_status" id="edit_crop_status" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="منفرد">منفرد</option>
                            <option value="مقترن">مقترن</option>
                            <option value="مختلط">مختلط</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">نوع الري</label>
                        <select name="edit_crop_irrigation" id="edit_crop_irrigation" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بئر">بئر</option>
                            <option value="خزان علوي">خزان علوي</option>
                            <option value="مياه الأرض">مياه الأرض</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">كساد؟</label>
                        <select name="edit_crop_recession" id="edit_crop_recession" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="نعم">نعم</option>
                            <option value="لا">لا</option>
                        </select>
                    </div>

                    <div class="col-md-6" style="display: none" id="edit_recessionCrop">
                        <label class="form-label">سبب الكساد</label>
                        <input name="edit_crop_recession_reason" id="edit_crop_recession_reason" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">تاريخ انتهاء المحصول</label>
                        <input name="edit_crop_endDate" id="edit_crop_endDate" type="date" class="form-control"\>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_crop">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
