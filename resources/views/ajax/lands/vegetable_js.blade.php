<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        //option type of recession
        $("#vegetable_recession").on("change", function() {
            if ($(this).val() == 'نعم') {
                $("#recessionVegetable").show().siblings();
            } else {
                $("#recessionVegetable").hide();
            }
        });

        //edit open type of recession
        $("#edit_vegetable_recession").on("change", function() {
            if ($(this).val() == 'نعم') {
                $("#edit_recessionVegetable").show().siblings();
            } else {
                $("#edit_recessionVegetable").hide();
            }
        })


        //add vegetable
        $(document).on('click', '.add_vegetable', function(e) {
            e.preventDefault();
            let land_id = $('#land_id').val();
            let vegetable_name = $('#vegetable_name').val();
            let vegetable_history = $('#vegetable_history').val();
            let vegetable_area = $('#vegetable_area').val();
            let vegetable_status = $('#vegetable_status').val();
            let vegetable_protection = $('#vegetable_protection').val();
            let vegetable_protectionType = $('#vegetable_protectionType').val();
            let vegetable_irrigation = $('#vegetable_irrigation').val();
            let vegetable_recession = $('#vegetable_recession').val();
            let vegetable_recession_reason = $('#vegetable_recession_reason').val();
            let vegetable_endDate = $('#vegetable_endDate').val();

            console.log(vegetable_recession_reason);

            $.ajax({
                url: "{{ route('add.vegetable') }}",
                method: 'post',
                data: {
                    land_id: land_id,
                    vegetable_name: vegetable_name,
                    vegetable_history: vegetable_history,
                    vegetable_area: vegetable_area,
                    vegetable_status: vegetable_status,
                    vegetable_protection: vegetable_protection,
                    vegetable_protectionType: vegetable_protectionType,
                    vegetable_irrigation: vegetable_irrigation,
                    vegetable_recession: vegetable_recession,
                    vegetable_recession_reason: vegetable_recession_reason,
                    vegetable_endDate: vegetable_endDate,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addVegetable').modal('hide');
                        $('#addVegetable_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.vegetable_table').removeClass('row');
                        $('.vegetable_table').load(location.href + ' .vegetable_table');
                        Command: toastr["success"]("تم اضافة محصول خضرة", "العملية")

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

        // show vegetable value in edit form
        $(document).on('click', '.editvegetable', function() {
            let id = $(this).data('id');
            let vegetable_name = $(this).data('vegetable_name');
            let vegetable_history = $(this).data('vegetable_history');
            let vegetable_area = $(this).data('vegetable_area');
            let vegetable_status = $(this).data('vegetable_status');
            let vegetable_irrigation = $(this).data('vegetable_irrigation');
            let vegetable_protection = $(this).data('vegetable_protection');
            let vegetable_protectiontype = $(this).data('vegetable_protectiontype');
            let vegetable_recession = $(this).data('vegetable_recession');
            let vegetable_recession_reason = $(this).data('vegetable_recession_reason');
            let vegetable_enddate = $(this).data('vegetable_enddate');

            $('#edit_id').val(id);
            $('#edit_vegetable_name').val(vegetable_name);
            $('#edit_vegetable_history').val(vegetable_history);
            $('#edit_vegetable_area').val(vegetable_area);
            $('#edit_vegetable_status').val(vegetable_status);
            $('#edit_vegetable_irrigation').val(vegetable_irrigation);
            $('#edit_vegetable_protection').val(vegetable_protection);
            $('#edit_vegetable_protectionType').val(vegetable_protectiontype);
            $('#edit_vegetable_recession').val(vegetable_recession);
            $('#edit_vegetable_recession_reason').val(vegetable_recession_reason);
            $('#edit_vegetable_endDate').val(vegetable_enddate);

            if ($("#edit_vegetable_recession").val() === 'نعم') {
                $("#edit_recessionVegetable").show().siblings();
                $("#edit_vegetable_endDate").prop("disabled", false);

            } else {
                $('#edit_recessionVegetable').hide();
                $("#edit_vegetable_endDate").prop("disabled", true);
            }

            $("#edit_vegetable_recession").on("change", function() {
                if ($(this).val() == 'نعم') {
                    $("#edit_vegetable_endDate").prop("disabled", false);
                } else {
                    $("#edit_vegetable_endDate").prop("disabled", true);
                }
            })
        });

        //edit vegetable data
        $(document).on('click', '.edit_vegetable', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let land_id = $('#land_id').val();
            let edit_vegetable_name = $('#edit_vegetable_name').val();
            let edit_vegetable_history = $('#edit_vegetable_history').val();
            let edit_vegetable_area = $('#edit_vegetable_area').val();
            let edit_vegetable_status = $('#edit_vegetable_status').val();
            let edit_vegetable_irrigation = $('#edit_vegetable_irrigation').val();
            let edit_vegetable_protection = $('#edit_vegetable_protection').val();
            let edit_vegetable_protectionType = $('#edit_vegetable_protectionType').val();
            let edit_vegetable_recession = $('#edit_vegetable_recession').val();
            let edit_vegetable_recession_reason = $('#edit_vegetable_recession_reason').val();
            let edit_vegetable_endDate = $('#edit_vegetable_endDate').val();

            $.ajax({
                url: "{{ route('update.vegetable') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    land_id: land_id,
                    edit_vegetable_name: edit_vegetable_name,
                    edit_vegetable_history: edit_vegetable_history,
                    edit_vegetable_area: edit_vegetable_area,
                    edit_vegetable_status: edit_vegetable_status,
                    edit_vegetable_irrigation: edit_vegetable_irrigation,
                    edit_vegetable_protection: edit_vegetable_protection,
                    edit_vegetable_protectionType: edit_vegetable_protectionType,
                    edit_vegetable_recession: edit_vegetable_recession,
                    edit_vegetable_recession_reason: edit_vegetable_recession_reason,
                    edit_vegetable_endDate: edit_vegetable_endDate,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editVegetable').modal('hide');
                        $('#editVegetable_form')[0].reset();
                        $('.vegetable_table').removeClass('row');
                        $('.vegetable_table').load(location.href + ' .vegetable_table');
                        Command: toastr["success"]("تم تعديل محصول الخضرة بنجاح", "العملية")

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

        //delete vegetable
        $(document).on('click', '.delete_vegetable', function(e) {
            e.preventDefault();
            let vegetable_id = $(this).data('id');
            if (confirm('هل تريد حذف محصول الخضرة؟!')) {
                $.ajax({
                    url: "{{ route('delete.vegetable') }}",
                    method: 'POST',
                    data: {
                        vegetable_id: vegetable_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.vegetable_table').removeClass('row');
                            $('.vegetable_table').load(location.href + ' .vegetable_table');
                            Command: toastr["success"]("تم حذف محصول الخضرة بنجاح",
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
