<div class="modal fade" id="addTree" tabindex="-1" role="dialog" aria- labelledby="addTreeLabel"
    aria-hidden="true">

    <form action="" method="POST" id="addTree_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTreeLabel">اضافةاشجار</h5>
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
                        <select name="tree_name" id="tree_name" class="form-select">
                            <option selected disabled value="">Choose...</option>
                             <option value="تفاح">تفاح</option>
                            <option value="جوافة">جوافة</option>
                            <option value="مانجا">مانجا</option>
                            <option value="عنب">عنب</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">تاريخ الزراعة</label>
                        <input name="tree_history" id="tree_history" type="date" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">مساحة المزروعة</label>
                        <input name="tree_area" id="tree_area" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">عدد الأشجار</label>
                        <input name="tree_number" id="tree_number" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">نوع الري</label>
                        <select name="tree_irrigation" id="tree_irrigation" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بئر">بئر</option>
                            <option value="خزان علوي">خزان علوي</option>
                            <option value="مياه الأرض">مياه الأرض</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">الحماية</label>
                        <select name="tree_protection" id="tree_protection" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="بيوت محمية مكيفة">بيوت محمية مكيفة</option>
                            <option value="بيوت البلاستيكية">بيوت البلاستيكية</option>
                            <option value="انفاض ارضية">انفاق ارضية</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">كساد؟</label>
                        <select name="tree_recession" id="tree_recession" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="نعم">نعم</option>
                            <option value="لا">لا</option>
                        </select>
                    </div>

                    <div class="col-md-4" style="display: none" id="recessionTree">
                        <label class="form-label">سبب الكساد</label>
                        <input name="tree_recession_reason" id="tree_recession_reason" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label ">تاريخ انتهاء المحصول</label>
                        <input name="tree_endDate" id="tree_endDate" type="date" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_tree">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
