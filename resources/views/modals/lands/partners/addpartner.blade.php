<div class="modal fade" id="addPartner" tabindex="-1" role="dialog" aria- labelledby="addPartnerLabel" aria-hidden="true">

    <form action="" method="POST" id="addPartner_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPartnerLabel">اضافة شريك</h5>
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
                        <input name="partner_idnumber" id="partner_idnumber" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">اسم الشريك</label>
                        <input name="partner_name" id="partner_name" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نوع الشراكة</label>
                        <select name="partner_type" id="partner_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="حيازة">حيازة</option>
                            <option value="أرض">أرض</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نسبة الشراكة</label>
                        <input name="partner_ratio" id="partner_ratio" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_partner">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
