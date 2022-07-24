<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        //option type of building
        $("#crop_recession").on("change", function() {
            if ($(this).val() == 'نعم') {
                $("#recessionCrop").show().siblings();
            } else {
                $("#recessionCrop").hide();
            }
        });

        //edit open type of onwer
        $("#edit_crop_recession").on("change", function() {
            if ($(this).val() == 'نعم') {
                $("#edit_recessionCrop").show().siblings();
            } else {
                $("#edit_recessionCrop").hide();
            }
        })


        //add crop
        $(document).on('click', '.add_crop', function(e) {
            e.preventDefault();
            let land_id = $('#land_id').val();
            let crop_name = $('#crop_name').val();
            let crop_history = $('#crop_history').val();
            let crop_area = $('#crop_area').val();
            let crop_status = $('#crop_status').val();
            let crop_irrigation = $('#crop_irrigation').val();
            let crop_recession = $('#crop_recession').val();
            let crop_recession_reason = $('#crop_recession_reason').val();
            let crop_endDate = $('#crop_endDate').val();

            $.ajax({
                url: "{{ route('add.crop') }}",
                method: 'post',
                data: {
                    land_id: land_id,
                    crop_name: crop_name,
                    crop_history: crop_history,
                    crop_area: crop_area,
                    crop_status: crop_status,
                    crop_irrigation: crop_irrigation,
                    crop_recession: crop_recession,
                    crop_recession_reason: crop_recession_reason,
                    crop_endDate: crop_endDate,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addCrop').modal('hide');
                        $('#addCrop_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.crop_table').removeClass('row');
                        $('.crop_table').load(location.href + ' .crop_table');
                        Command: toastr["success"]("تم اضافة المحصول بنجاح", "العملية")

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

        // show crop value in edit form
        $(document).on('click', '.editcrop', function() {
            let id = $(this).data('id');
            let crop_name = $(this).data('crop_name');
            let crop_history = $(this).data('crop_history');
            let crop_area = $(this).data('crop_area');
            let crop_status = $(this).data('crop_status');
            let crop_irrigation = $(this).data('crop_irrigation');
            let crop_recession = $(this).data('crop_recession');
            let crop_recession_reason = $(this).data('crop_recession_reason');
            let crop_enddate = $(this).data('crop_enddate');

            console.log(crop_enddate);

            $('#edit_id').val(id);
            $('#edit_crop_name').val(crop_name);
            $('#edit_crop_history').val(crop_history);
            $('#edit_crop_area').val(crop_area);
            $('#edit_crop_status').val(crop_status);
            $('#edit_crop_irrigation').val(crop_irrigation);
            $('#edit_crop_recession').val(crop_recession);
            $('#edit_crop_recession_reason').val(crop_recession_reason);
            $('#edit_crop_endDate').val(crop_enddate);

            if ($("#edit_crop_recession").val() === 'نعم') {
                $("#edit_recessionCrop").show().siblings();

            } else {
                $('#edit_recessionCrop').hide();
            }

            $("#edit_crop_recession").on("change", function() {
                if ($(this).val() == 'نعم') {
                    $("#edit_crop_endDate").prop("disabled", false);
                } else {
                    $("#edit_crop_endDate").prop("disabled", true);
                }
            })
        });

        //edit crop data
        $(document).on('click', '.edit_crop', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let land_id = $('#land_id').val();
            let edit_crop_name = $('#edit_crop_name').val();
            let edit_crop_history = $('#edit_crop_history').val();
            let edit_crop_area = $('#edit_crop_area').val();
            let edit_crop_status = $('#edit_crop_status').val();
            let edit_crop_irrigation = $('#edit_crop_irrigation').val();
            let edit_crop_recession = $('#edit_crop_recession').val();
            let edit_crop_recession_reason = $('#edit_crop_recession_reason').val();
            let edit_crop_enddate = $('#edit_crop_endDate').val();

            $.ajax({
                url: "{{ route('update.crop') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    land_id: land_id,
                    edit_crop_name: edit_crop_name,
                    edit_crop_history: edit_crop_history,
                    edit_crop_area: edit_crop_area,
                    edit_crop_status: edit_crop_status,
                    edit_crop_irrigation: edit_crop_irrigation,
                    edit_crop_recession: edit_crop_recession,
                    edit_crop_recession_reason: edit_crop_recession_reason,
                    edit_crop_enddate: edit_crop_enddate,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editCrop').modal('hide');
                        $('#editCrop_form')[0].reset();
                        $('.crop_table').removeClass('row');
                        $('.crop_table').load(location.href + ' .crop_table');
                        Command: toastr["success"]("تم تعديل هذا المحصول بنجاح", "العملية")

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

        //delete crop
        $(document).on('click', '.delete_crop', function(e) {
            e.preventDefault();
            let crop_id = $(this).data('id');
            if (confirm('هل تريد حذف هذا المحصول')) {
                $.ajax({
                    url: "{{ route('delete.crop') }}",
                    method: 'POST',
                    data: {
                        crop_id: crop_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.crop_table').removeClass('row');
                            $('.crop_table').load(location.href + ' .crop_table');
                            Command: toastr["success"]("تم حذف هذا المحصول بنجاح",
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
