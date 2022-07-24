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
        $("#sources_type").on("change", function() {
            if ($(this).val() == 'بئر') {
                $("#" + $(this).val()).show().siblings();
                $("#خزان").hide();
                $("#مياه").hide();

            } else if ($(this).val() === 'خزان علوي') {
                $("#خزان").show().siblings();
                $("#بئر").hide();
                $("#مياه").hide();
            } else {
                $("#مياه").show().siblings();
                $("#بئر").hide();
                $("#خزان").hide();
            }
        });

        //edit open type of building
        $("#edit_sources_type").on("change", function() {
            if ($(this).val() == 'بئر') {
                $("#" + $(this).val()).show().siblings();
                $("#خزان").hide();
                $("#مياه").hide();

            } else if ($(this).val() === 'خزان علوي') {
                $("#خزان").show().siblings();
                $("#بئر").hide();
                $("#مياه").hide();
            } else {
                $("#مياه").show().siblings();
                $("#بئر").hide();
                $("#خزان").hide();
            }
        });


        //add waterSource
        $(document).on('click', '.add_waterSource', function(e) {
            e.preventDefault();
            let land_id = $('#land_id').val();
            let sources_type = $('#sources_type').val();
            let well_number = $('#well_number').val();
            let well_depth = $('#well_depth').val();
            let well_impetus = $('#well_impetus').val();
            let well_electro = $('#well_electro').val();
            let tank_storage_capacity = $('#tank_storage_capacity').val();
            let tank_Height = $('#tank_Height').val();
            let groundWater_depth = $('#groundWater_depth').val();
            let groundWater_storage_capacity = $('#groundWater_storage_capacity').val();
            let groundWater_pond_type = $('#groundWater_pond_type').val();

            $.ajax({
                url: "{{ route('add.waterSource') }}",
                method: 'post',
                data: {
                    land_id: land_id,
                    sources_type: sources_type,
                    well_number: well_number,
                    well_depth: well_depth,
                    well_impetus: well_impetus,
                    well_electro: well_electro,
                    tank_storage_capacity: tank_storage_capacity,
                    tank_Height: tank_Height,
                    groundWater_depth: groundWater_depth,
                    groundWater_storage_capacity: groundWater_storage_capacity,
                    groundWater_pond_type: groundWater_pond_type,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addWaterSource').modal('hide');
                        $('#addWaterSource_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.waterSources_table').removeClass('row');
                        $('.waterSources_table').load(location.href +
                            ' .waterSources_table');
                        Command: toastr["success"]("تم اضافة طريقة الري", "العملية")

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

        // show waterSource value in edit form
        $(document).on('click', '.editwaterSource', function() {
            let id = $(this).data('id');
            let sources_type = $(this).data('sources_type');
            let well_number = $(this).data('well_number');
            let well_depth = $(this).data('well_depth');
            let well_impetus = $(this).data('well_impetus');
            let well_electro = $(this).data('well_electro');
            let tank_storage_capacity = $(this).data('tank_storage_capacity');
            let tank_Height = $(this).data('tank_Height');
            let groundWater_depth = $(this).data('groundWater_depth');
            let groundWater_pond_type = $(this).data('groundWater_pond_type');

            $('#edit_id').val(id);
            $('#edit_sources_type').val(sources_type);
            $('#edit_well_number').val(well_number);
            $('#edit_well_depth').val(well_depth);
            $('#edit_well_impetus').val(well_impetus);
            $('#edit_well_electro').val(well_electro);
            $('#edit_tank_storage_capacity').val(tank_storage_capacity);
            $('#edit_tank_Height').val(tank_Height);
            $('#edit_groundWater_depth').val(groundWater_depth);
            $('#edit_groundWater_pond_type').val(groundWater_pond_type);

            if ($('#edit_sources_type').val() == 'بئر') {
                $("#بئر").show().siblings();
                $("#خزان").hide();
                $("#مياه").hide();

            } else if ($('#edit_sources_type').val() === 'خزان علوي') {
                $("#خزان").show().siblings();
                $("#بئر").hide();
                $("#مياه").hide();
            } else {
                $("#مياه").show().siblings();
                $("#بئر").hide();
                $("#خزان").hide();
            }

        });

        //edit waterSource data
        $(document).on('click', '.edit_waterSource', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let land_id = $('#land_id').val();
            let edit_sources_type = $('#edit_sources_type').val();
            let edit_well_number = $('#edit_well_number').val();
            let edit_well_depth = $('#edit_well_depth').val();
            let edit_well_impetus = $('#edit_well_impetus').val();
            let edit_well_electro = $('#edit_well_electro').val();
            let edit_tank_storage_capacity = $('#edit_tank_storage_capacity').val();
            let edit_tank_Height = $('#edit_tank_Height').val();
            let edit_groundWater_depth = $('#edit_groundWater_depth').val();
            let edit_groundWater_storage_capacity = $('#edit_groundWater_storage_capacity').val();
            let edit_groundWater_pond_type = $('#edit_groundWater_pond_type').val();

            $.ajax({
                url: "{{ route('update.waterSource') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    land_id: land_id,
                    edit_sources_type: edit_sources_type,
                    edit_well_number: edit_well_number,
                    edit_well_depth: edit_well_depth,
                    edit_well_impetus: edit_well_impetus,
                    edit_well_electro: edit_well_electro,
                    edit_tank_storage_capacity: edit_tank_storage_capacity,
                    edit_tank_Height: edit_tank_Height,
                    edit_groundWater_depth: edit_groundWater_depth,
                    edit_groundWater_storage_capacity: edit_groundWater_storage_capacity,
                    edit_groundWater_pond_type: edit_groundWater_pond_type,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editWaterSource').modal('hide');
                        $('#editWaterSource_form')[0].reset();
                        $('.waterSources_table').removeClass('row');
                        $('.waterSources_table').load(location.href +
                            ' .waterSources_table');
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

        //delete waterSource
        $(document).on('click', '.delete_waterSource', function(e) {
            e.preventDefault();
            let waterSource_id = $(this).data('id');
            if (confirm('هل تريد حذف طريقة الري؟!')) {
                $.ajax({
                    url: "{{ route('delete.waterSource') }}",
                    method: 'POST',
                    data: {
                        waterSource_id: waterSource_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.waterSources_table').removeClass('row');
                            $('.waterSources_table').load(location.href +
                                ' .waterSources_table');
                            Command: toastr["success"]("تم حذف طريق الري", "العملية")

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
