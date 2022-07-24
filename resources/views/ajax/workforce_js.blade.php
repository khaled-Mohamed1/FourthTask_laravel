<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        //add TemporaryWorkforce
        $(document).on('click', '.add_temporaryWorkforce', function(e) {
            e.preventDefault();
            let farmer_id = $('#farmer_id').val();
            let males_number = $('#males_number').val();
            let males_number_family = $('#males_number_family').val();
            let females_number = $('#females_number').val();
            let females_number_family = $('#females_number_family').val();

            $.ajax({
                url: "{{ route('add.temporaryWorkforce') }}",
                method: 'post',
                data: {
                    farmer_id: farmer_id,
                    males_number: males_number,
                    males_number_family: males_number_family,
                    females_number: females_number,
                    females_number_family: females_number_family,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addTemporaryWorkforce').modal('hide');
                        $('#addTemporaryWorkforce_form')[0].reset();
                        $('.errMsgContainer').empty();
                        $('#temporaryWorkforces_add').hide();
                        $('.temporaryWorkforces_table').load(location.href +
                            ' .temporaryWorkforces_table');
                        Command: toastr["success"]("تم اضافة قوة العاملة المؤقتة بنجاح",
                            "العملية")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-left",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    $(".errMsgContainer").empty();
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    });
                },
            });
        });

        //show TemporaryWorkforce value in edit form
        $(document).on('click', '.edittemporaryWorkforce', function() {
            let id = $(this).data('id');
            let males_number = $(this).data('males_number');
            let males_number_family = $(this).data('males_number_family');
            let females_number = $(this).data('females_number');
            let females_number_family = $(this).data('females_number_family');

            $('#editTemporaryWorkforce_id').val(id);
            $('#edit_males_number').val(males_number);
            $('#edit_males_number_family').val(males_number_family);
            $('#edit_females_number').val(females_number);
            $('#edit_females_number_family').val(females_number_family);
        });

        //edit TemporaryWorkforce data
        $(document).on('click', '.edit_temporaryWorkforce', function(e) {
            e.preventDefault();
            let edit_id = $('#editTemporaryWorkforce_id').val();
            let farmer_id = $('#farmer_id').val();
            let edit_males_number = $('#edit_males_number').val();
            let edit_males_number_family = $('#edit_males_number_family').val();
            let edit_females_number = $('#edit_females_number').val();
            let edit_females_number_family = $('#edit_females_number_family').val();


            $.ajax({
                url: "{{ route('update.temporaryWorkforce') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    farmer_id: farmer_id,
                    edit_males_number: edit_males_number,
                    edit_males_number_family: edit_males_number_family,
                    edit_females_number: edit_females_number,
                    edit_females_number_family: edit_females_number_family,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editTemporaryWorkforce').modal('hide');
                        $(".errMsgContainer").empty();
                        $('#editTemporaryWorkforce_form')[0].reset();
                        $('.temporaryWorkforces_table').load(location.href +
                            ' .temporaryWorkforces_table');
                        Command: toastr["success"]("تم تعديل القوة العاملة بنجاح",
                            "العملية")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-left",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    $(".errMsgContainer").empty();
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    });
                },
            });
        });

        //delete TemporaryWorkforce
        $(document).on('click', '.delete_temporaryWorkforce', function(e) {
            e.preventDefault();
            let temporaryWorkforce_id = $(this).data('id');
            if (confirm('هل تريد حذف القوة العاملة المؤقتة')) {
                $.ajax({
                    url: "{{ route('delete.temporaryWorkforce') }}",
                    method: 'POST',
                    data: {
                        temporaryWorkforce_id: temporaryWorkforce_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#temporaryWorkforces_add').show();
                            $('.temporaryWorkforces_table').load(location.href +
                                ' .temporaryWorkforces_table');
                            Command: toastr["success"]("تم حذف القوة العاملة المؤقتة",
                                "العملية")

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-left",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    },
                });
            }
        });



        //add PermanentWorkforce
        $(document).on('click', '.add_permanentWorkforce', function(e) {
            e.preventDefault();
            let farmer_id = $('#farmer_id').val();
            let id_NO = $('#id_NO').val();
            let phone_NO = $('#phone_NO').val();
            let firstname = $('#firstname').val();
            let secondname = $('#secondname').val();
            let thirdname = $('#thirdname').val();
            let fourthname = $('#fourthname').val();
            let gender = $('#gender').val();
            let address = $('#address').val();
            let from_family = $('#from_family').val();

            $.ajax({
                url: "{{ route('add.permanentWorkforce') }}",
                method: 'post',
                data: {
                    farmer_id: farmer_id,
                    id_NO: id_NO,
                    phone_NO: phone_NO,
                    firstname: firstname,
                    secondname: secondname,
                    thirdname: thirdname,
                    fourthname: fourthname,
                    gender: gender,
                    address: address,
                    from_family: from_family,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addPermanentWorkforce').modal('hide');
                        $('#addPermanentWorkforce_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.permanentWorkforces_table').load(location.href +
                            ' .permanentWorkforces_table');
                        Command: toastr["success"]("تم اضافة قوة العاملة الدائمة بنجاح",
                            "العملية")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-left",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    $(".errMsgContainer").empty();
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    });
                },
            });
        });

        //show PermanentWorkforce value in edit form
        $(document).on('click', '.editpermanentWorkforce', function() {
            let id = $(this).data('id');
            let id_no = $(this).data('id_no');
            let firstname = $(this).data('firstname');
            let secondname = $(this).data('secondname');
            let thirdname = $(this).data('thirdname');
            let fourthname = $(this).data('fourthname');
            let gender = $(this).data('gender');
            let phone_no = $(this).data('phone_no');
            let address = $(this).data('address');
            let from_family = $(this).data('from_family');

            $('#editPermanentWorkforce_id').val(id);
            $('#edit_id_NO').val(id_no);
            $('#edit_firstname').val(firstname);
            $('#edit_secondname').val(secondname);
            $('#edit_thirdname').val(thirdname);
            $('#edit_fourthname').val(fourthname);
            $('#edit_gender').val(gender);
            $('#edit_phone_NO').val(phone_no);
            $('#edit_address').val(address);
            $('#edit_from_family').val(from_family);
        });

        //edit PermanentWorkforce data
        $(document).on('click', '.edit_permanentWorkforce', function(e) {
            e.preventDefault();
            let edit_id = $('#editPermanentWorkforce_id').val();
            let farmer_id = $('#farmer_id').val();
            let edit_id_no = $('#edit_id_NO').val();
            let edit_firstname = $('#edit_firstname').val();
            let edit_secondname = $('#edit_secondname').val();
            let edit_thirdname = $('#edit_thirdname').val();
            let edit_fourthname = $('#edit_fourthname').val();
            let edit_gender = $('#edit_gender').val();
            let edit_phone_no = $('#edit_phone_NO').val();
            let edit_address = $('#edit_address').val();
            let edit_from_family = $('#edit_from_family').val();


            $.ajax({
                url: "{{ route('update.permanentWorkforce') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    farmer_id: farmer_id,
                    edit_id_no: edit_id_no,
                    edit_firstname: edit_firstname,
                    edit_secondname: edit_secondname,
                    edit_thirdname: edit_thirdname,
                    edit_fourthname: edit_fourthname,
                    edit_gender: edit_gender,
                    edit_phone_no: edit_phone_no,
                    edit_address: edit_address,
                    edit_from_family: edit_from_family,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editPermanentWorkforce').modal('hide');
                        $('#editPermanentWorkforce_form')[0].reset();
                        $('.permanentWorkforces_table').load(location.href +
                            ' .permanentWorkforces_table');
                        Command: toastr["success"]("تم تعديل القوة العاملةالدائمة بنجاح",
                            "العملية")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-left",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    $(".errMsgContainer").empty();
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    });
                },
            });
        });

        //delete TemporaryWorkforce
        $(document).on('click', '.delete_permanentWorkforce', function(e) {
            e.preventDefault();
            let permanentWorkforce_id = $(this).data('id');
            if (confirm('هل تريد القوة العاملة الدائمة')) {
                $.ajax({
                    url: "{{ route('delete.permanentWorkforce') }}",
                    method: 'POST',
                    data: {
                        permanentWorkforce_id: permanentWorkforce_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.permanentWorkforces_table').load(location.href +
                                ' .permanentWorkforces_table');
                            Command: toastr["success"]("تم حذف القوة العاملة الدائمة",
                                "العملية")

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-left",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    },
                });
            }
        });

    })
</script>
