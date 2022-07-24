<div class="modal fade" id="editApp" tabindex="-1" role="dialog" aria- labelledby="editAppLabel" aria-hidden="true">



    <div class="modal-dialog modal-dialog-scrollable  modal-lg" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAppLabel">اضافة تطبيقات</h5>
                <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body row">

                <form action="{{ route('update.app', $app->id) }}" method="POST" id="editApp_form">
                    @csrf

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="farmer_id" id="farmer_id" type="hidden" value="{{ $farmer->id }}"
                        class="form-control">

                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-label">1- هل تستخدم اصول محسنة (بذور, أبصال, درنات, أشتال)؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q1" id="q1" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q1 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q1 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>


                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">2- هل تستخدم اسمدة عضوية؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q2" id="q2" class="form-select">
                                <option selected disabled value="">Choose...</option>

                                <option value="نعم" {{ $app->q2 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q2 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">3- هل تستخدم اسمدة كيماوية؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q3" id="q3" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q3 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q3 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">4- هل تستخدم مبيدات زراعية؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q4" id="q4" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q4 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q4 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">5- هل تستخدم المكافحة المتكاملة؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q5" id="q5" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q5 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q5 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">6- هل تقوم بتطعيم حيواناتك ضد الأمراض الوبائية؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q6" id="q6" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q6 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q6 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">7- هل تتلقى خدمات حكومية؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q7" id="q7" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q7 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q7 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">8- حدد مصدر الإرشاد الزراعي الرئيسي؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q8" id="q8" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q8 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q8 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">9- هل يوجد فقاسة؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q9" id="q9" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q9 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q9 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="row" id="q10" style="display: none">
                            <div class="col-md-8">
                                <label class="form-label">10- الطافة الإنتاجية (بيضة\دورة)؟</label>
                            </div>
                            <div class="col-md-4">
                                <input name="qten" id="qten" type="text" value="{{ $app->q10 }}"
                                    class="form-control">
                            </div>

                            <br><br>
                            <hr>

                        </div>



                        <div class="col-md-8">
                            <label class="form-label">11- هل يشكل الحيازة 50% من إجمالي دخل الأسرة؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q11" id="q11" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q11 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q11 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">12- هل استفدت من مشاريع استصلاحات الأراضي او شق الطرق الزراعية او
                                أي مشاريع زراعية أخرى؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q12" id="q12" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q12 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q12 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">13- هل تنصع منتجات الحيازة؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q13" id="q13" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q13 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q13 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">14- هل يوجد لديك بئر مياه؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q14" id="q14" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="نعم" {{ $app->q14 == 'نعم' ? 'selected' : '' }}>نعم</option>
                                <option value="لا" {{ $app->q14 == 'لا' ? 'selected' : '' }}>لا</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">15- حالة البئر؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q15" id="q15" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="صالح للإستخدام" {{ $app->q15 == 'صالح للإستخدام' ? 'selected' : '' }}>
                                    صالح للإستخدام</option>
                                <option value="غير صالح للإستخدام"
                                    {{ $app->q15 == 'غير صالح للإستخدام' ? 'selected' : '' }}>غير صالح للإستخدام
                                </option>
                            </select>
                        </div>

                        <br><br>
                        <hr>

                        <div class="col-md-8">
                            <label class="form-label">16- ما هو النشاط الاقتصادي الرئيسي للحيازة؟</label>
                        </div>
                        <div class="col-md-4">
                            <select name="q16" id="q16" class="form-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="استحقاقي" {{ $app->q16 == 'استحقاقي' ? 'selected' : '' }}>استحقاقي
                                </option>
                                <option value="عرضي" {{ $app->q16 == 'عرضي' ? 'selected' : '' }}>عرضي</option>
                            </select>
                        </div>

                        <br><br>
                        <hr>


                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary edit_app">اعتماد</button>
                    </div>

                </form>


            </div>



        </div>
    </div>

</div>
