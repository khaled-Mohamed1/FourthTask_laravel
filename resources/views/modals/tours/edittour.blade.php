<div class="modal fade" id="editTour" tabindex="-1" role="dialog" aria- labelledby="editTourLabel" aria-hidden="true">


    <form action="" method="POST" id="editTour_form" class="ui-front">
        @csrf

        <input type="hidden" id="edit_id">

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTourLabel">تعديل جولة ارشادية</h5>
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

                    <div class="col-md-3">
                        <label class="form-label">رقم الجولة</label>
                        <input type="text" class="form-control" disabled>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">تاريخ الإدخال</label>
                        <input class="form-control" disabled>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">المحافظة</label>
                        <select name="edit_city" id="edit_city" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_name }}">{{ $city->city_name }}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">المنطقة</label>
                        <select name="edit_region" id="edit_region" class="form-select">
                            <option selected disabled value="">Choose...</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">التاريخ</label>
                        <input name="edit_required_date" id="edit_required_date" type="date" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نوع الزيارة</label>
                        <select name="edit_visit_type" id="edit_visit_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="زراعة">زراعة</option>
                            <option value="بيطرة">بيطرة</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="note">ملاحظات</label>
                        <textarea class="form-control" placeholder="Leave a comment here" name="edit_note" id="edit_note" style="height: 100px"></textarea>
                        <br>
                    </div>

                    <div class="container px-4">
                        <div class="row gx-5">

                            <div class="col">
                                <h5>المكلفين</h5>
                                <div class="p-3">
                                    <table class="table table-light table-bordered" id="edit_tableEmployee">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <td><a href="javascript:void(0)" class="btn btn-success"><i
                                                            class="las la-plus" title="Add" id="edit_addBtn"></i></a>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col">
                                <h5>المستهدفين</h5>

                                <div class="p-3">
                                    <table class="table table-light table-bordered" id="edit_tableFarmer">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <td><a href="javascript:void(0)" class="btn btn-success"><i
                                                            class="las la-plus" title="Add"
                                                            id="edit_addBtnFarmer"></i></a>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary edit_tour">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>

<script>
    var rowIdF = 0;
    $("#edit_addBtnFarmer").on("click", function() {
        // Adding a row inside the tbody.
        $("#edit_tableFarmer tbody").append(`
                <tr id="R${++rowIdF}">
                    <td class="row-index text-center"><p> ${rowIdF}</p></td>
                    <td><input type="text" class="form-control edit_farmer_name" name="edit_farmer_name[]"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger edit_removeFarmer"  title="Remove"><i class="las la-trash-alt"></i></a></td>
                </tr>`);

        $(".edit_farmer_name").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('tour.autocompletename') }}",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.firstname + ' ' + obj.secondname + ' ' +
                                obj.thirdname + ' ' + obj.fourthname;
                        });

                        response(resp);
                    }
                });
            },
            minLength: 1
        });


    });

    $(document).on('click', '.edit_removeFarmer', function() {
        $(this).closest('tr').remove();
        rowIdF = 0;
    });

    //employees
    var rowIdx = 0;
    $("#edit_addBtn").on("click", function() {
        // Adding a row inside the tbody.
        $("#edit_tableEmployee tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index text-center"><p> ${rowIdx}</p></td>
                    <td><input type="text" class="form-control edit_employee_name" name="edit_employee_name[]" id="employee_name"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger edit_remove"  title="Remove"><i class="las la-trash-alt"></i></a></td>
                </tr>`);
    });

    $(document).on('click', '.edit_remove', function() {
        $(this).closest('tr').remove();
        rowIdx = 0;
    });

</script>
