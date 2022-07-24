<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria- labelledby="editModalLabel" aria-hidden="true">


    <form action="" method="POST" id="editFarmer">
        @csrf
        <input type="hidden" id="edit_id">

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">تعديل مزارع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <div class="col-md-6">
                        <label class="form-label">رقم البطاقة</label>
                        <input type="text" id="edit_card_id" class="form-control" disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">تاريخ الإدخال</label>
                        <input class="form-control" id="edit_entry_date" value="{{ now()->toDateTimeString() }}"
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">رقم الهوية</label>
                        <input name="edit_idnumber" id="edit_idnumber" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">تاريخ الميلاد</label>
                        <input name="edit_date_of_birth" id="edit_date_of_birth" type="date" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الأول</label>
                        <input name="edit_firstname" id="edit_firstname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الثاني</label>
                        <input name="edit_secondname" id="edit_secondname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الثالث</label>
                        <input name="edit_thirdname" id="edit_thirdname" type="text" class="form-control">

                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الرابع</label>
                        <input name="edit_fourthname" id="edit_fourthname" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">رقم الجوال</label>
                        <input name="edit_phone" id="edit_phone" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input name="edit_email" id="edit_email" type="email" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">الجنس</label>
                        <select name="edit_gender" id="edit_gender" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ذكر">ذكر</option>
                            <option value="انثى">انثى</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المحافظة</label>
                        <select name="edit_city" id="edit_city" class="form-select">
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المنطقة</label>
                        <select name="edit_region" id="edit_region" class="form-select">

                        </select>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">اقرب معلم</label>
                        <input name="edit_nearest_place" id="edit_nearest_place" type="text"
                            class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">الحالة الإجتماعية</label>
                        <select name="edit_status" id="edit_status" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="اعزب">اعزب</option>
                            <option value="متزوج">متزوج</option>
                            <option value="مطلق">مطلق</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">المؤهل العلمي</label>
                        <select name="edit_qualification" id="edit_qualification" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="باكلوريس">باكلوريس</option>
                            <option value="دبلوم">دبلوم</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_farmer_form">تعديل</button>
                </div>

            </div>
        </div>

    </form>
</div>
