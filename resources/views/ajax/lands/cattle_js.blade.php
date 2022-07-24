<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        //add cattle
        $(document).on('click', '.add_cattle', function(e) {
            e.preventDefault();
            let land_id = $('#land_id').val();
            let cattle_type = $('#cattle_type').val();
            let cattle_gender = $('#cattle_gender').val();
            let cattle_number = $('#cattle_number').val();
            let cattle_age = $('#cattle_age').val();
            let cattle_healthCondition = $('#cattle_healthCondition').val();
            let cattle_notes = $('#cattle_notes').val();
            $.ajax({
                url: "{{ route('add.cattle') }}",
                method: 'post',
                data: {
                    land_id: land_id,
                    cattle_type: cattle_type,
                    cattle_gender: cattle_gender,
                    cattle_number: cattle_number,
                    cattle_age: cattle_age,
                    cattle_healthCondition: cattle_healthCondition,
                    cattle_notes: cattle_notes,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addCattle').modal('hide');
                        $('#addCattle_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.cattle_table').removeClass('row');
                        $('.cattle_table').load(location.href + ' .cattle_table');
                        Command: toastr["success"]("تم اضافة الماشية", "العملية")

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

        // show cattle value in edit form
        $(document).on('click', '.editcattle', function() {
            let id = $(this).data('id');
            let cattle_type = $(this).data('cattle_type');
            let cattle_gender = $(this).data('cattle_gender');
            let cattle_number = $(this).data('cattle_number');
            let cattle_age = $(this).data('cattle_age');
            let cattle_healthcondition = $(this).data('cattle_healthcondition');
            let cattle_notes = $(this).data('cattle_notes');

            $('#edit_id').val(id);
            $('#edit_cattle_type').val(cattle_type);
            $('#edit_cattle_gender').val(cattle_gender);
            $('#edit_cattle_number').val(cattle_number);
            $('#edit_cattle_age').val(cattle_age);
            $('#edit_cattle_healthCondition').val(cattle_healthcondition);
            $('#edit_cattle_notes').val(cattle_notes);
        });

        //edit cattle data
        $(document).on('click', '.edit_cattle', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let land_id = $('#land_id').val();
            let edit_cattle_type = $('#edit_cattle_type').val();
            let edit_cattle_gender = $('#edit_cattle_gender').val();
            let edit_cattle_number = $('#edit_cattle_number').val();
            let edit_cattle_age = $('#edit_cattle_age').val();
            let edit_cattle_healthcondition = $('#edit_cattle_healthCondition').val();
            let edit_cattle_notes = $('#edit_cattle_notes').val();

            $.ajax({
                url: "{{ route('update.cattle') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    land_id: land_id,
                    edit_cattle_type: edit_cattle_type,
                    edit_cattle_gender: edit_cattle_gender,
                    edit_cattle_number: edit_cattle_number,
                    edit_cattle_age: edit_cattle_age,
                    edit_cattle_healthcondition: edit_cattle_healthcondition,
                    edit_cattle_notes: edit_cattle_notes,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editCattle').modal('hide');
                        $('#editCattle_form')[0].reset();
                        $('.cattle_table').removeClass('row');
                        $('.cattle_table').load(location.href + ' .cattle_table');
                        Command: toastr["success"]("تم تعديل الماشية", "العملية")

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

        //delete cattle
        $(document).on('click', '.delete_cattle', function(e) {
            e.preventDefault();
            let cattle_id = $(this).data('id');
            if (confirm('هل تريد حذف هذه الماشية')) {
                $.ajax({
                    url: "{{ route('delete.cattle') }}",
                    method: 'POST',
                    data: {
                        cattle_id: cattle_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.cattle_table').removeClass('row');
                            $('.cattle_table').load(location.href + ' .cattle_table');
                            Command: toastr["success"]("تم حذف هذه الماشية بنجاح",
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
