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
        $("#building_type").on("change", function() {
            if ($(this).val() == 'مزرعة') {
                $("#" + $(this).val()).show().siblings();
            } else {
                $("#مزرعة").hide();
            }
        });

        //edit open type of onwer
        $("#edit_building_type").on("change", function() {
            if ($(this).val() == 'مزرعة') {
                $("#" + $(this).val()).show().siblings();
            } else {
                $("#مزرعة").hide();
            }
        })


        //add building
        $(document).on('click', '.add_building', function(e) {
            e.preventDefault();
            let land_id = $('#land_id').val();
            let building_type = $('#building_type').val();
            let building_farm_type = $('#building_farm_type').val();
            let building_farm_roof_type = $('#building_farm_roof_type').val();
            let building_area = $('#building_area').val();
            let building_ownership = $('#building_ownership').val();
            let building_notes = $('#building_notes').val();

            $.ajax({
                url: "{{ route('add.building') }}",
                method: 'post',
                data: {
                    land_id: land_id,
                    building_type: building_type,
                    building_farm_type: building_farm_type,
                    building_farm_roof_type: building_farm_roof_type,
                    building_area: building_area,
                    building_ownership: building_ownership,
                    building_notes: building_notes,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addBuilding').modal('hide');
                        $('#addBuilding_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.building_table').removeClass('row');
                        $('.building_table').load(location.href + ' .building_table');
                        Command: toastr["success"]("تم اضافة المبنى بنجاح", "العملية")

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

        // show building value in edit form
        $(document).on('click', '.editbuilding', function() {
            let id = $(this).data('id');
            let building_type = $(this).data('building_type');
            let building_area = $(this).data('building_area');
            let building_ownership = $(this).data('building_ownership');
            let building_notes = $(this).data('building_notes');
            let building_farm_type = $(this).data('building_farm_type');
            let building_farm_roof_type = $(this).data('building_farm_roof_type');

            $('#edit_id').val(id);
            $('#edit_building_type').val(building_type);
            $('#edit_building_area').val(building_area);
            $('#edit_building_ownership').val(building_ownership);
            $('#edit_building_notes').val(building_notes);
            $('#edit_building_farm_type').val(building_farm_type);
            $('#edit_building_farm_roof_type').val(building_farm_roof_type);

            if ($("#edit_building_type").val() === 'مزرعة') {
                $("#مزرعة").show().siblings();
            } else {
                $('#مزرعة').hide();
            }

        });

        //edit parnter data
        $(document).on('click', '.edit_building', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let land_id = $('#land_id').val();
            let edit_building_type = $('#edit_building_type').val();
            let edit_building_area = $('#edit_building_area').val();
            let edit_building_ownership = $('#edit_building_ownership').val();
            let edit_building_notes = $('#edit_building_notes').val();
            let edit_building_farm_type = $('#edit_building_farm_type').val();
            let edit_building_farm_roof_type = $('#edit_building_farm_roof_type').val();

            $.ajax({
                url: "{{ route('update.building') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    land_id: land_id,
                    edit_building_type: edit_building_type,
                    edit_building_area: edit_building_area,
                    edit_building_ownership: edit_building_ownership,
                    edit_building_notes: edit_building_notes,
                    edit_building_farm_type: edit_building_farm_type,
                    edit_building_farm_roof_type: edit_building_farm_roof_type,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editBuilding').modal('hide');
                        $('#editBuilding_form')[0].reset();
                        $('.building_table').removeClass('row');
                        $('.building_table').load(location.href + ' .building_table');
                        Command: toastr["success"]("تم تعديل هذا المبنى بنجاح", "العملية")

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

        //delete building
        $(document).on('click', '.delete_building', function(e) {
            e.preventDefault();
            let building_id = $(this).data('id');
            if (confirm('هل تريد حذف هذا المبنى؟!')) {
                $.ajax({
                    url: "{{ route('delete.building') }}",
                    method: 'POST',
                    data: {
                        building_id: building_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.building_table').removeClass('row');
                            $('.building_table').load(location.href + ' .building_table');
                            Command: toastr["success"]("تم حذف هذا المبنى", "العملية")

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
