<div class="modal fade" id="addTemporaryWorkforce" tabindex="-1" role="dialog" aria-
    labelledby="addTemporaryWorkforceLabel" aria-hidden="true">


    <form action="" method="POST" id="addTemporaryWorkforce_form">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTemporaryWorkforceLabel">اضافة قوة عاملة مؤقتة</h5>
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
                        <input name="males_number" id="males_number" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">عدد الذكور من الأسرة</label>
                        <input name="males_number_family" id="males_number_family" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">عدد الإناث</label>
                        <input name="females_number" id="females_number" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">عدد الإناث من الأسرة</label>
                        <input name="females_number_family" id="females_number_family" type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_temporaryWorkforce">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
