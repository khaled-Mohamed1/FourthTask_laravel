<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria- labelledby="addModalLabel" aria-hidden="true">


    <form action="" method="POST" id="addFarmer">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">اضافة مزارع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input type="hidden" id="card_id" name="card_id">
                    <input type="hidden" id="entry_date" name="entry_date" value="{{ now()->toDateTimeString() }}">

                    <div class="col-md-6">
                        <label class="form-label">رقم البطاقة</label>
                        <input type="text" class="form-control" disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">تاريخ الإدخال</label>
                        <input class="form-control" value="{{ now()->toDateTimeString() }}" disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">رقم الهوية</label>
                        <input name="id_NO" id="id_NO" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">تاريخ الميلاد</label>
                        <input name="date_of_birth" id="date_of_birth" type="date" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الأول</label>
                        <input name="firstname" id="firstname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الثاني</label>
                        <input name="secondname" id="secondname" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الثالث</label>
                        <input name="thirdname" id="thirdname" type="text" class="form-control">

                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">الاسم الرابع</label>
                        <input name="fourthname" id="fourthname" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">رقم الجوال</label>
                        <input name="phone_NO" id="phone_NO" type="text" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input name="email" id="email" type="email" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">الجنس</label>
                        <select name="gender" id="gender" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="ذكر">ذكر
                            </option>
                            <option value="انثى">انثى
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المحافظة</label>
                        <select name="city" id="city" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_name }}">{{ $city->city_name }}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">المنطقة</label>
                        <select name="region" id="region" class="form-select">
                            <option selected disabled value="">Choose...</option>

                        </select>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">اقرب معلم</label>
                        <input name="nearest_place" id="nearest_place" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">الحالة الإجتماعية</label>
                        <select name="status" id="status" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="اعزب">اعزب
                            </option>
                            <option value="متزوج">متزوج
                            </option>
                            <option value="مطلق">مطلق
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">المؤهل العلمي</label>
                        <select name="qualification" id="qualification" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="باكلوريس">
                                باكلوريس
                            </option>
                            <option value="دبلوم">
                                دبلوم
                            </option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_farmer">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
