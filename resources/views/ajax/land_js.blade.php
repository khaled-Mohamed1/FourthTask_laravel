<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        //option type of owner
        $("#land_owner_type").on("change", function() {
            if ($(this).val() == 'مؤسسة') {
                $("#" + $(this).val()).show().siblings();
                $("#فرد").hide();
            } else {
                $("#مؤسسة").hide();
                $("#" + $(this).val()).show().siblings();
            }
        })

        //edit open type of onwer
        $("#edit_land_owner_type").on("change", function() {
            if ($(this).val() == 'مؤسسة') {
                $("#" + $(this).val()).show().siblings();
                $("#فرد").hide();

            } else {
                $("#مؤسسة").hide();
                $("#" + $(this).val()).show().siblings();
            }
        })

        //area
        $('#area').on('input', '.texcal', function() {
            let area_sum = 0;
            $("#area .texcal").each(function() {
                var get_value = $(this).val();
                if ($.isNumeric(get_value)) {
                    area_sum += parseFloat(get_value);
                }
            });
            $('#land_total_land_area_number').val(area_sum);
        });

        // edit area
        $('#edit_area').on('input', '.texcal', function() {
            let area_sum = 0;
            $("#edit_area .texcal").each(function() {
                var get_value = $(this).val();
                if ($.isNumeric(get_value)) {
                    area_sum += parseFloat(get_value);
                }
            });
            $('#edit_land_total_land_area_number').val(area_sum);
        });

        //add land
        $(document).on('click', '.add_land', function(e) {
            e.preventDefault();
            let farmer_id = $('#farmer_id').val();
            let land_piece_number = $('#land_piece_number').val();
            let land_coupon_number = $('#land_coupon_number').val();
            let land_area_number_for_tenure_purposes = $('#land_area_number_for_tenure_purposes')
                .val();
            let land_area_number_for_non_acquisition_purposes = $(
                '#land_area_number_for_non_acquisition_purposes').val();
            let land_permanent_fallow_area_number = $('#land_permanent_fallow_area_number').val();
            let land_temporary_fallow_area_number = $('#land_temporary_fallow_area_number').val();
            let land_cultivated_land_area_number = $('#land_cultivated_land_area_number').val();
            let land_forest_trees_area_number = $('#land_forest_trees_area_number').val();
            let land_total_land_area_number = $('#land_total_land_area_number').val();
            let land_far_from_armistice_line_number = $('#land_far_from_armistice_line_number').val();
            let land_contract_type = $('#land_contract_type').val();
            let land_holding_type = $('#land_holding_type').val();
            let land_owner_ID_number = $('#land_owner_ID_number').val();
            let land_owner_type = $('#land_owner_type').val();
            let land_owner_firstname = $('#land_owner_firstname').val();
            let land_owner_secondname = $('#land_owner_secondname').val();
            let land_owner_thirdname = $('#land_owner_thirdname').val();
            let land_owner_fourthname = $('#land_owner_fourthname').val();
            let land_enterprise_type = $('#land_enterprise_type').val();
            let land_enterprise_number = $('#land_enterprise_number').val();
            let land_enterprise_name = $('#land_enterprise_name').val();
            let land_enterprise_owner_ID_number = $('#land_enterprise_owner_ID_number').val();
            let land_enterprise_owner_name = $('#land_enterprise_owner_name').val();
            let land_city = $('#land_city').val();
            let land_region = $('#land_region').val();
            let land_nearest_place = $('#land_nearest_place').val();
            let land_notes = $('#land_notes').val();
            let lat = $('#lat').val();
            let lng = $('#lng').val();

            $.ajax({
                url: "{{ route('add.land') }}",
                method: 'post',
                data: {
                    farmer_id: farmer_id,
                    land_piece_number: land_piece_number,
                    land_coupon_number: land_coupon_number,
                    land_area_number_for_tenure_purposes: land_area_number_for_tenure_purposes,
                    land_area_number_for_non_acquisition_purposes: land_area_number_for_non_acquisition_purposes,
                    land_permanent_fallow_area_number: land_permanent_fallow_area_number,
                    land_temporary_fallow_area_number: land_temporary_fallow_area_number,
                    land_cultivated_land_area_number: land_cultivated_land_area_number,
                    land_forest_trees_area_number: land_forest_trees_area_number,
                    land_total_land_area_number: land_total_land_area_number,
                    land_far_from_armistice_line_number: land_far_from_armistice_line_number,
                    land_contract_type: land_contract_type,
                    land_holding_type: land_holding_type,
                    land_owner_ID_number: land_owner_ID_number,
                    land_owner_type: land_owner_type,
                    land_owner_firstname: land_owner_firstname,
                    land_owner_secondname: land_owner_secondname,
                    land_owner_thirdname: land_owner_thirdname,
                    land_owner_fourthname: land_owner_fourthname,
                    land_enterprise_type: land_enterprise_type,
                    land_enterprise_number: land_enterprise_number,
                    land_enterprise_name: land_enterprise_name,
                    land_enterprise_owner_ID_number: land_enterprise_owner_ID_number,
                    land_enterprise_owner_name: land_enterprise_owner_name,
                    land_city: land_city,
                    land_region: land_region,
                    land_nearest_place: land_nearest_place,
                    land_notes: land_notes,
                    lat: lat,
                    lng: lng,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addLand').modal('hide');
                        $('#addLand_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.land_table').removeClass('row');
                        $('.land_table').load(location.href + ' .land_table');
                        Command: toastr["success"]("تم اضافة الأرض بنجاح", "العملية")

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
                        $(".errMsgContainer").append(
                            '<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    });
                },
            });

        });

        //show land value in edit form
        $(document).on('click', '.editland', function() {
            let land_id = $(this).data('land_id');
            let individual_id = $(this).data('individual_id');
            let enterprise_id = $(this).data('enterprise_id');
            let land_piece_number = $(this).data('piece_number');
            let land_coupon_number = $(this).data('coupon_number');
            let land_area_number_for_tenure_purposes = $(this).data(
                'area_number_for_tenure_purposes');
            let land_area_number_for_non_acquisition_purposes = $(this).data(
                'area_number_for_non_acquisition_purposes');
            let land_permanent_fallow_area_number = $(this).data('permanent_fallow_area_number');
            let land_temporary_fallow_area_number = $(this).data('temporary_fallow_area_number');
            let cultivated_land_area_number = $(this).data('cultivated_land_area_number');
            let forest_trees_area_number = $(this).data('forest_trees_area_number');
            let total_land_area_number = $(this).data('total_land_area_number');
            let far_from_armistice_line_number = $(this).data('far_from_armistice_line_number');
            let contract_type = $(this).data('contract_type');
            let holding_type = $(this).data('holding_type');
            let owner_id_number = $(this).data('owner_id_number');
            let owner_type = $(this).data('owner_type');
            let owner_firstname = $(this).data('owner_firstname');
            let owner_secondname = $(this).data('owner_secondname');
            let owner_thirdname = $(this).data('owner_thirdname');
            let owner_fourthname = $(this).data('owner_fourthname');
            let enterprise_type = $(this).data('enterprise_type');
            let enterprise_number = $(this).data('enterprise_number');
            let enterprise_name = $(this).data('enterprise_name');
            let enterprise_owner_id_number = $(this).data('enterprise_owner_id_number');
            let enterprise_owner_name = $(this).data('enterprise_owner_name');
            let city = $(this).data('city');
            let region = $(this).data('region');
            let nearest_place = $(this).data('nearest_place');
            let notes = $(this).data('notes');

            $('#edit_land_id').val(land_id);
            $('#edit_individual_id').val(individual_id);
            $('#edit_enterprise_id').val(enterprise_id);
            $('#edit_land_piece_number').val(land_piece_number);
            $('#edit_land_coupon_number').val(land_coupon_number);
            $('#edit_land_area_number_for_tenure_purposes').val(land_area_number_for_tenure_purposes);
            $('#edit_land_area_number_for_non_acquisition_purposes').val(
                land_area_number_for_non_acquisition_purposes);
            $('#edit_land_permanent_fallow_area_number').val(land_permanent_fallow_area_number);
            $('#edit_land_temporary_fallow_area_number').val(land_temporary_fallow_area_number);
            $('#edit_land_cultivated_land_area_number').val(cultivated_land_area_number);
            $('#edit_land_forest_trees_area_number').val(forest_trees_area_number);
            $('#edit_land_total_land_area_number').val(total_land_area_number);
            $('#edit_land_far_from_armistice_line_number').val(far_from_armistice_line_number);
            $('#edit_land_contract_type').val(contract_type);
            $('#edit_land_holding_type').val(holding_type);
            $('#edit_land_owner_ID_number').val(owner_id_number);
            $('#edit_land_owner_type').val(owner_type);
            $('#edit_land_owner_firstname').val(owner_firstname);
            $('#edit_land_owner_secondname').val(owner_secondname);
            $('#edit_land_owner_thirdname').val(owner_thirdname);
            $('#edit_land_owner_fourthname').val(owner_fourthname);
            $('#edit_land_enterprise_type').val(enterprise_type);
            $('#edit_land_enterprise_number').val(enterprise_number);
            $('#edit_land_enterprise_name').val(enterprise_name);
            $('#edit_land_enterprise_owner_ID_number').val(enterprise_owner_id_number);
            $('#edit_land_enterprise_owner_name').val(enterprise_owner_name);
            $('#edit_land_city').val(city);
            $('#edit_land_nearest_place').val(nearest_place);
            $('#edit_land_notes').val(notes);

            if ($("#edit_land_owner_type").val() === 'فرد') {
                $("#فرد").show().siblings();
                $('#مؤسسة').hide();
            } else {
                $("#مؤسسة").show().siblings();
                $('#فرد').hide();
            }

            var cities = '{!! json_encode($cities, JSON_HEX_TAG) !!}'
            var obj = jQuery.parseJSON(cities);
            $("#edit_land_region").html('');
            $.each(obj, function(key, value) {
                if (value.city_name === city) {
                    $.each(value.regions, function(key, value) {
                        $('#edit_land_region').append('<option value="' +
                            value
                            .region_name + '">' + value
                            .region_name +
                            '</option>');
                    });
                }
            });
            $('#edit_land_region').val(region);
        });

        //edit land data
        $(document).on('click', '.edit_land', function(e) {
            e.preventDefault();
            let edit_land_id = $('#edit_land_id').val();
            let edit_individual_id = $('#edit_individual_id').val();
            let edit_enterprise_id = $('#edit_enterprise_id').val();
            let farmer_id = $('#farmer_id').val();
            let edit_land_piece_number = $('#edit_land_piece_number').val();
            let edit_land_coupon_number = $('#edit_land_coupon_number').val();
            let edit_land_area_number_for_tenure_purposes = $(
                '#edit_land_area_number_for_tenure_purposes').val();
            let edit_land_area_number_for_non_acquisition_purposes = $(
                '#edit_land_area_number_for_non_acquisition_purposes').val();
            let edit_land_permanent_fallow_area_number = $('#edit_land_permanent_fallow_area_number')
                .val();
            let edit_land_temporary_fallow_area_number = $('#edit_land_temporary_fallow_area_number')
                .val();
            let edit_land_cultivated_land_area_number = $('#edit_land_cultivated_land_area_number')
                .val();
            let edit_land_forest_trees_area_number = $('#edit_land_forest_trees_area_number').val();
            let edit_land_total_land_area_number = $('#edit_land_total_land_area_number').val();
            let edit_land_far_from_armistice_line_number = $(
                '#edit_land_far_from_armistice_line_number').val();
            let edit_land_contract_type = $('#edit_land_contract_type').val();
            let edit_land_holding_type = $('#edit_land_holding_type').val();
            let edit_land_owner_id_number = $('#edit_land_owner_ID_number').val();
            let edit_land_owner_type = $('#edit_land_owner_type').val();
            let edit_land_owner_firstname = $('#edit_land_owner_firstname').val();
            let edit_land_owner_secondname = $('#edit_land_owner_secondname').val();
            let edit_land_owner_thirdname = $('#edit_land_owner_thirdname').val();
            let edit_land_owner_fourthname = $('#edit_land_owner_fourthname').val();
            let edit_land_enterprise_type = $('#edit_land_enterprise_type').val();
            let edit_land_enterprise_number = $('#edit_land_enterprise_number').val();
            let edit_land_enterprise_name = $('#edit_land_enterprise_name').val();
            let edit_land_enterprise_owner_id_number = $('#edit_land_enterprise_owner_ID_number').val();
            let edit_land_enterprise_owner_name = $('#edit_land_enterprise_owner_name').val();
            let edit_land_city = $('#edit_land_city').val();
            let edit_land_region = $('#edit_land_region').val();
            let edit_land_nearest_place = $('#edit_land_nearest_place').val();
            let edit_land_notes = $('#edit_land_notes').val();

            $.ajax({
                url: "{{ route('update.land') }}",
                method: 'post',
                data: {
                    edit_land_id: edit_land_id,
                    edit_individual_id: edit_individual_id,
                    edit_enterprise_id: edit_enterprise_id,
                    farmer_id: farmer_id,
                    edit_land_piece_number: edit_land_piece_number,
                    edit_land_coupon_number: edit_land_coupon_number,
                    edit_land_area_number_for_tenure_purposes: edit_land_area_number_for_tenure_purposes,
                    edit_land_area_number_for_non_acquisition_purposes: edit_land_area_number_for_non_acquisition_purposes,
                    edit_land_permanent_fallow_area_number: edit_land_permanent_fallow_area_number,
                    edit_land_temporary_fallow_area_number: edit_land_temporary_fallow_area_number,
                    edit_land_cultivated_land_area_number: edit_land_cultivated_land_area_number,
                    edit_land_forest_trees_area_number: edit_land_forest_trees_area_number,
                    edit_land_total_land_area_number: edit_land_total_land_area_number,
                    edit_land_far_from_armistice_line_number: edit_land_far_from_armistice_line_number,
                    edit_land_contract_type: edit_land_contract_type,
                    edit_land_holding_type: edit_land_holding_type,
                    edit_land_owner_id_number: edit_land_owner_id_number,
                    edit_land_owner_type: edit_land_owner_type,
                    edit_land_owner_firstname: edit_land_owner_firstname,
                    edit_land_owner_secondname: edit_land_owner_secondname,
                    edit_land_owner_thirdname: edit_land_owner_thirdname,
                    edit_land_owner_fourthname: edit_land_owner_fourthname,
                    edit_land_enterprise_type: edit_land_enterprise_type,
                    edit_land_enterprise_number: edit_land_enterprise_number,
                    edit_land_enterprise_name: edit_land_enterprise_name,
                    edit_land_enterprise_owner_id_number: edit_land_enterprise_owner_id_number,
                    edit_land_enterprise_owner_name: edit_land_enterprise_owner_name,
                    edit_land_city: edit_land_city,
                    edit_land_region: edit_land_region,
                    edit_land_nearest_place: edit_land_nearest_place,
                    edit_land_notes: edit_land_notes,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editLand').modal('hide');
                        $('#editLand_form')[0].reset();
                        $('.land_table').removeClass('row');
                        $('.land_table').load(location.href + ' .land_table');
                        Command: toastr["success"]("تم تعديل الأرض الزراعية بنجاح",
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
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    });
                },
            });
        });

        //delete land
        $(document).on('click', '.delete_land', function(e) {
            e.preventDefault();
            let land_id = $(this).data('id');
            if (confirm('هل تريد حذف هذه الأرض؟!')) {
                $.ajax({
                    url: "{{ route('delete.land') }}",
                    method: 'POST',
                    data: {
                        land_id: land_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.land_table').removeClass('row');
                            $('.land_table').load(location.href + ' .land_table');
                            Command: toastr["success"]("تم حذف الأرض بنجاح", "العملية")

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

        //get region
        $(document).on('change', '#land_city', function() {
            var city_name = this.value;
            $("#land_region").html('');
            $.ajax({
                url: "{{ route('getRegionLand') }}",
                type: "get",
                dataType: 'json',
                success: function(result) {
                    $('#land_region').html('<option value="">Select region</option>');
                    $.each(result, function(key, value) {
                        if (value.city_name === city_name) {
                            $.each(value.regions, function(key, value) {
                                $('#land_region').append('<option value="' +
                                    value
                                    .region_name + '">' + value
                                    .region_name +
                                    '</option>');
                            });
                        }
                    });
                },
                error: function(err) {
                    let error = err.responseJSON;
                },
            });
        });

        //edit city and region
        $(document).on('change', '#edit_land_city', function() {
            var city_name = this.value;
            $("#edit_land_region").html('');
            $.ajax({
                url: "{{ route('getRegion') }}",
                type: "get",
                dataType: 'json',
                success: function(result) {
                    $('#edit_land_region').html('<option value="">Select region</option>');
                    $.each(result, function(key, value) {
                        if (value.city_name === city_name) {
                            $.each(value.regions, function(key, value) {
                                $('#edit_land_region').append(
                                    '<option value="' +
                                    value
                                    .region_name + '">' + value
                                    .region_name +
                                    '</option>');
                            });
                        }
                    });
                },
                error: function(err) {
                    let error = err.responseJSON;
                },
            });
        });


    });
</script>
