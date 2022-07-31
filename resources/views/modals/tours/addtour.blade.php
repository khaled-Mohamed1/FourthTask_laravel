<div class="modal fade" id="addTour" tabindex="-1" role="dialog" aria- labelledby="addTourLabel" aria-hidden="true">


    <form action="" method="POST" id="addTour_form" class="ui-front">
        @csrf

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTourLabel">اضافة جولة ارشادية</h5>
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
                        <input class="form-control" value="{{ now()->toDateTimeString() }}" disabled>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">المحافظة</label>
                        <select name="city" id="city" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_name }}">{{ $city->city_name }}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">المنطقة</label>
                        <select name="region" id="region" class="form-select">
                            <option selected disabled value="">Choose...</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">التاريخ</label>
                        <input name="required_date" id="required_date" type="date" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required">نوع الزيارة</label>
                        <select name="visit_type" id="visit_type" class="form-select">
                            <option selected disabled value="">Choose...</option>
                            <option value="زراعة">زراعة</option>
                            <option value="بيطرة">بيطرة</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="note">ملاحظات</label>
                        <textarea class="form-control" placeholder="Leave a comment here" name="note" id="note" style="height: 100px"></textarea>
                        <br>
                    </div>

                    <div class="container px-4">
                        <div class="row gx-5">

                            <div class="col">
                                <h5>المكلفين</h5>
                                <div class="p-3">
                                    <table class="table table-light table-bordered" id="tableEmployee">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <td><a href="javascript:void(0)" class="btn btn-success"><i
                                                            class="las la-plus" title="Add" id="addBtn"></i></a>
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
                                    <table class="table table-light table-bordered" id="tableFarmer">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <td><a href="javascript:void(0)" class="btn btn-success"><i
                                                            class="las la-plus" title="Add"
                                                            id="addBtnFarmer"></i></a>
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
                    <button type="submit" class="btn btn-primary add_tour">اعتماد</button>
                </div>

            </div>
        </div>

    </form>
</div>

<script>
    var rowIdF = 0;
    $("#addBtnFarmer").on("click", function() {
        // Adding a row inside the tbody.
        $("#tableFarmer tbody").append(`
                <tr id="R${++rowIdF}">
                    <td class="row-index text-center"><p> ${rowIdF}</p></td>
                    <td><input type="text" class="form-control farmer_name" name="farmer_name[]"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger removeFarmer"  title="Remove"><i class="las la-trash-alt"></i></a></td>
                </tr>`);

        $(".farmer_name").autocomplete({
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

    $(document).on('click', '.removeFarmer', function() {
        $(this).closest('tr').remove();
        rowIdF = 0;
    });

    //farmer
    var rowIdx = 0;
    $("#addBtn").on("click", function() {
        // Adding a row inside the tbody.
        $("#tableEmployee tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index text-center"><p> ${rowIdx}</p></td>
                    <td><input type="text" class="form-control employee_name" name="employee_name[]" id="employee_name"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger remove"  title="Remove"><i class="las la-trash-alt"></i></a></td>
                </tr>`);
    });

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
        rowIdF = 0;
    });


</script>
