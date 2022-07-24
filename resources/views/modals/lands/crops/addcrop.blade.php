<div class="modal fade" id="addCrop" tabindex="-1" role="dialog" aria- labelledby="addCropLabel" aria-hidden="true">

    <form action="" method="POST" id="addCrop_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCropLabel">اضافة محاصيل حقلية</h5>
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
                        <select name="crop_name" id="crop_name" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ذرة">ذرة</option>
                            <option value="ارز">ارز</option>
                            <option value="قمح">قمح</option>
                            <option value="شوفان">شوفان</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">تاريخ الزراعة</label>
                        <input name="crop_history" id="crop_history" type="date" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">مساحة المحصول</label>
                        <input name="crop_area" id="crop_area" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">وضع المحصول</label>
                        <select name="crop_status" id="crop_status" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="منفرد">منفرد</option>
                            <option value="مقترن">مقترن</option>
                            <option value="مختلط">مختلط</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">نوع الري</label>
                        <select name="crop_irrigation" id="crop_irrigation" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بئر">بئر</option>
                            <option value="خزان علوي">خزان علوي</option>
                            <option value="مياه الأرض">مياه الأرض</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">كساد؟</label>
                        <select name="crop_recession" id="crop_recession" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="نعم">نعم</option>
                            <option value="لا">لا</option>
                        </select>
                    </div>

                    <div class="col-md-6" style="display: none" id="recessionCrop">
                        <label class="form-label">سبب الكساد</label>
                        <input name="crop_recession_reason" id="crop_recession_reason" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">تاريخ انتهاء المحصول</label>
                        <input name="crop_endDate" id="crop_endDate" type="date" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_crop">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
