<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        //add poultry
        $(document).on('click', '.add_poultry', function(e) {
            e.preventDefault();
            let land_id = $('#land_id').val();
            let poultry_type = $('#poultry_type').val();
            let poultry_number = $('#poultry_number').val();
            let poultry_aged = $('#poultry_ageD').val();
            let poultry_agem = $('#poultry_ageM').val();
            let poultry_notes = $('#poultry_notes').val();

            console.log(poultry_aged);

            $.ajax({
                url: "{{ route('add.poultry') }}",
                method: 'post',
                data: {
                    land_id: land_id,
                    poultry_type: poultry_type,
                    poultry_number: poultry_number,
                    poultry_aged: poultry_aged,
                    poultry_agem: poultry_agem,
                    poultry_notes: poultry_notes,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addPoultry').modal('hide');
                        $('#addPoultry_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.poultry_table').removeClass('row');
                        $('.poultry_table').load(location.href + ' .poultry_table');
                        Command: toastr["success"]("تم اضافة الدواجن بنجاح", "العملية")

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

        // show poultry value in edit form
        $(document).on('click', '.editpoultry', function() {
            let id = $(this).data('id');
            let poultry_type = $(this).data('poultry_type');
            let poultry_number = $(this).data('poultry_number');
            let poultry_aged = $(this).data('poultry_aged');
            let poultry_agem = $(this).data('poultry_agem');
            let poultry_notes = $(this).data('poultry_notes');

            $('#edit_id').val(id);
            $('#edit_poultry_type').val(poultry_type);
            $('#edit_poultry_number').val(poultry_number);
            $('#edit_poultry_ageD').val(poultry_aged);
            $('#edit_poultry_ageM').val(poultry_agem);
            $('#edit_poultry_notes').val(poultry_notes);
        });

        //edit poultry data
        $(document).on('click', '.edit_poultry', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let land_id = $('#land_id').val();
            let edit_poultry_type = $('#edit_poultry_type').val();
            let edit_poultry_number = $('#edit_poultry_number').val();
            let edit_poultry_aged = $('#edit_poultry_ageD').val();
            let edit_poultry_agem = $('#edit_poultry_ageM').val();
            let edit_poultry_notes = $('#edit_poultry_notes').val();

            $.ajax({
                url: "{{ route('update.poultry') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    land_id: land_id,
                    edit_poultry_type: edit_poultry_type,
                    edit_poultry_number: edit_poultry_number,
                    edit_poultry_aged: edit_poultry_aged,
                    edit_poultry_agem: edit_poultry_agem,
                    edit_poultry_notes: edit_poultry_notes,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editPoultry').modal('hide');
                        $('#editPoultry_form')[0].reset();
                        $('.poultry_table').removeClass('row');
                        $('.poultry_table').load(location.href + ' .poultry_table');
                        Command: toastr["success"]("تم تعديل الداجنة بنجاح", "العملية")

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
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    });
                },
            });
        });

        //delete poultry
        $(document).on('click', '.delete_poultry', function(e) {
            e.preventDefault();
            let poultry_id = $(this).data('id');
            if (confirm('هل تريد حذف هذه الداجنة')) {
                $.ajax({
                    url: "{{ route('delete.poultry') }}",
                    method: 'POST',
                    data: {
                        poultry_id: poultry_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.poultry_table').removeClass('row');
                            $('.poultry_table').load(location.href + ' .poultry_table');
                            Command: toastr["success"]("تم حذف هذه الداجنة بنجاح",
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

    });
</script>
