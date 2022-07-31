<div class="modal fade" id="addVisit" tabindex="-1" role="dialog" aria- labelledby="addVisitLabel" aria-hidden="true">


    <form action="{{ route('add.visit') }}" method="POST" id="addVisit_form" enctype="multipart/form-data"
        class="ui-front">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitLabel">اضافة تقرير الزيارة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row ">

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input name="tour_id" id="tour_id" type="hidden" value="{{ $tour->id }}"
                        class="form-control">

                    <input name="type" id="type" type="hidden" value="{{ $tour->visit_type }}"
                        class="form-control">

                    <div class="col-md-6">
                        <label class="form-label">رقم الجولة</label>
                        <input type="text" class="form-control" disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">تاريخ الإدخال</label>
                        <input class="form-control" value="{{ now()->toDateTimeString() }}" disabled>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">التاريخ</label>
                        <input name="visit_date" id="visit_date" type="date" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">بطاقة المزارع</label>
                        <input name="farmer_cardid" id="farmer_cardid" type="text" class="form-control"
                            data-tour_id="{{ $tour->id }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label required">حالة الزيارة</label>
                        <select name="visit_status" id="visit_status" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            @if ($tour->visit_type == 'زراعة')
                                <option value="منتهية">منتهية</option>
                                <option value="غير منتهية">غير منتهية</option>
                            @else
                                <option value="علاج">علاج</option>
                                <option value="تحصين">تحصين</option>
                            @endif
                        </select>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="note">وصف الزيارة</label>
                        <textarea class="form-control bg-light" placeholder="Leave a comment here" name="visit_description"
                            id="visit_description" style="height: 100px"></textarea>
                        <br>
                    </div>

                    <div class="col-md-12">
                        <label for="note">وصف الإرشاد</label>
                        <textarea class="form-control bg-light" placeholder="Leave a comment here" name="guidance_description"
                            id="guidance_description" style="height: 100px"></textarea>
                        <br>
                    </div>

                    <div class="col-md-12">
                        <label for="note">ملاحظات</label>
                        <textarea class="form-control bg-light" placeholder="Leave a comment here" name="note" id="note"
                            style="height: 100px"></textarea>
                        <br>
                    </div>

                    <div class="container px-4">
                        <div class="row gx-5">

                            @if ($tour->visit_type == 'زراعة')
                                <div class="col">
                                    <h5>الآفات</h5>
                                    <div class="p-3">
                                        <table class="table table-light table-bordered" id="tablePest">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الصنف</th>
                                                    <th>الأفة</th>
                                                    <th>صورة المرض</th>
                                                    <th>وصف الصورة</th>
                                                    <th><button type="button" name="add"
                                                            class="btn btn-success btn-xs add"><i
                                                                class="las la-plus"></i></button></th>
                                                </tr>
                                            </thead>
                                            <tbody class="pest_body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="col">
                                    <h5>الأمراض</h5>
                                    <div class="p-3">
                                        <table class="table table-light table-bordered" id="tableDisease">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الصنف</th>
                                                    <th>المرض</th>
                                                    <th>صورة المرض</th>
                                                    <th>وصف الصورة</th>
                                                    <th><button type="button" name="add"
                                                            class="btn btn-success btn-xs addDisease"><i
                                                                class="las la-plus"></i></button></th>
                                            </thead>
                                            <tbody class="disease_body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_visit">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>
