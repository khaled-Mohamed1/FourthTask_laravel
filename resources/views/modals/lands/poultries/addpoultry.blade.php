<div class="modal fade" id="addPoultry" tabindex="-1" role="dialog" aria- labelledby="addPoultryLabel" aria-hidden="true">

    <form action="" method="POST" id="addPoultry_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPoultryLabel">اضافة دواجن</h5>
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
                        <select name="poultry_type" id="poultry_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="حبش">حبش</option>
                            <option value="لاحم">لاحم</option>
                            <option value="بياض">بياض</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">العدد</label>
                        <input name="poultry_number" id="poultry_number" type="text" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required">العمر بالأيام</label>
                        <input name="poultry_ageD" id="poultry_ageD" type="text" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required">العمر بالأشهر</label>
                        <input name="poultry_ageM" id="poultry_ageM" type="text" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">ملاحظات</label>
                        <input name="poultry_notes" id="poultry_notes" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_poultry">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
