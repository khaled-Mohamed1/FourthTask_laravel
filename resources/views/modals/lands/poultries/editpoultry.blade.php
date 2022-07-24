<div class="modal fade" id="editPoultry" tabindex="-1" role="dialog" aria- labelledby="editPoultryLabel" aria-hidden="true">

    <form action="" method="POST" id="editPoultry_form">
        @csrf

        <input type="hidden" id="edit_id">


        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPoultryLabel">اضافة دواجن</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="land_id" id="land_id" type="hidden" value="{{ $land->id }}"
                        class="form-control">

                    <div class="col-md-6">
                        <label class="form-label required">نوع الدواجن</label>
                        <select name="edit_poultry_type" id="edit_poultry_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="حبش">حبش</option>
                            <option value="لاحم">لاحم</option>
                            <option value="بياض">بياض</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">العدد</label>
                        <input name="edit_poultry_number" id="edit_poultry_number" type="text" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required">العمر بالأيام</label>
                        <input name="edit_poultry_ageD" id="edit_poultry_ageD" type="text" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required">العمر بالأشهر</label>
                        <input name="edit_poultry_ageM" id="edit_poultry_ageM" type="text" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">ملاحظات</label>
                        <input name="edit_poultry_notes" id="edit_poultry_notes" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_poultry">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
