<div class="modal fade" id="editPartner" tabindex="-1" role="dialog" aria- labelledby="editPartnerLabel" aria-hidden="true">

    <form action="" method="POST" id="editPartner_form">
        @csrf

        <input type="hidden" id="edit_id">


        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPartnerLabel">تعديل شريك</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="land_id" id="land_id" type="hidden" value="{{ $land->id }}"
                        class="form-control">

                    <div class="col-md-6">
                        <label class="form-label required">رقم هوية الشريك</label>
                        <input name="edit_partner_idnumber" id="edit_partner_idnumber" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">اسم الشريك</label>
                        <input name="edit_partner_name" id="edit_partner_name" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نوع الشراكة</label>
                        <select name="edit_partner_type" id="edit_partner_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="حيازة">حيازة</option>
                            <option value="أرض">أرض</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نسبة الشراكة</label>
                        <input name="edit_partner_ratio" id="edit_partner_ratio" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_partner">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
