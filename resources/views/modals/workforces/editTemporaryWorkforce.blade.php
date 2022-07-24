<div class="modal fade" id="editTemporaryWorkforce" tabindex="-1" role="dialog" aria-
    labelledby="editTemporaryWorkforceLabel" aria-hidden="true">


    <form action="" method="POST" id="editTemporaryWorkforce_form">
        @csrf

        <input type="hidden" id="editTemporaryWorkforce_id">


        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTemporaryWorkforceLabel">تعديل القوة العاملة المؤقتة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="farmer_id" id="farmer_id" type="hidden" value="{{ $farmer->id }}"
                        class="form-control">

                    <div class="col-md-6">
                        <label class="form-label required">عدد الذكور</label>
                        <input name="edit_males_number" id="edit_males_number" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">عدد الذكور من الأسرة</label>
                        <input name="edit_males_number_family" id="edit_males_number_family" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">عدد الإناث</label>
                        <input name="edit_females_number" id="edit_females_number" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">عدد الإناث من الأسرة</label>
                        <input name="edit_females_number_family" id="edit_females_number_family" type="text"
                            class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_temporaryWorkforce">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
