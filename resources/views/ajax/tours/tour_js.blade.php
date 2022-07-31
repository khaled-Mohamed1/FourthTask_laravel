<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        // add tour
        $(document).on('click', '.add_tour', function(e) {
            e.preventDefault();
            let city = $('#city').val();
            let region = $('#region').val();
            let required_date = $('#required_date').val();
            let visit_type = $('#visit_type').val();
            let note = $('#note').val();

            var employee_name = new Array();
            var j = 0;
            $(".employee_name").each(function() {
                employee_name[j] = $(this).val();
                j++;
            });

            var farmer_name = new Array();
            var i = 0;
            $(".farmer_name").each(function() {
                farmer_name[i] = $(this).val();
                i++;
            });

            $.ajax({
                url: "{{ route('add.tour') }}",
                method: 'post',
                data: {
                    city: city,
                    region: region,
                    required_date: required_date,
                    visit_type: visit_type,
                    note: note,
                    employee_name: employee_name,
                    farmer_name: farmer_name,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addTour').modal('hide');
                        $('#addTour_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('#tableFarmer tbody').empty();
                        $('#tableEmployee tbody').empty();
                        $('.tour_table').removeClass('row');
                        $('.tour_table').load(location.href + ' .tour_table');
                        Command: toastr["success"]("تم اضافة الجولة السياحية", "العملية")

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
                    $('#errMsgContainer').empty();
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    });
                },
            });
        });

        //show data in edit form
        $(document).on('click', '.edittour', function() {
            let id = $(this).data('id');
            let city = $(this).data('city');
            let region = $(this).data('region');
            let visit_type = $(this).data('visit_type');
            let required_date = $(this).data('required_date');
            let note = $(this).data('note');
            let farmer_data = $(this).data('farmer_data');
            let employees_data = $(this).data('employee_data');

            $('#edit_id').val(id);
            $('#edit_city').val(city);
            $('#edit_region').val(region);
            $('#edit_visit_type').val(visit_type);
            $('#edit_required_date').val(required_date);
            $('#edit_note').val(note);
            $('#edit_tableFarmer tbody').empty();
            $('#edit_tableEmployee tbody').empty();

            $.each(farmer_data, function(key, value) {
                $('#edit_tableFarmer tbody').append(
                    `<tr>
                        <td>${++key}</td>
                        <td><input type="text" class="form-control edit_farmer_name" name="edit_farmer_name[]" value='${value.farmer_name}'></td>
                        <td><a href="javascript:void(0)" class="btn btn-danger edit_removeFarmer" title="edit_Remove"><i class="las la-trash-alt"></i></a></td>
                    </tr>`
                );
            });

            $.each(employees_data, function(key, value) {
                $('#edit_tableEmployee tbody').append(
                    `<tr>
                        <td>${++key}</td>
                        <td><input type="text" class="form-control edit_employee_name" name="edit_employee_name[]" value='${value.employee_name}'></td>
                        <td><a href="javascript:void(0)" class="btn btn-danger edit_remove" title="Remove"><i class="las la-trash-alt"></i></a></td>
                    </tr>`
                );
            });

            var cities = '{!! json_encode($cities, JSON_HEX_TAG) !!}'
            var obj = jQuery.parseJSON(cities);
            $("#edit_region").html('');
            $.each(obj, function(key, value) {
                if (value.city_name === city) {
                    $.each(value.regions, function(key, value) {
                        $('#edit_region').append('<option value="' +
                            value
                            .region_name + '">' + value
                            .region_name +
                            '</option>');
                    });
                }
            });
            $('#edit_region').val(region);

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

        //edit tour data
        $(document).on('click', '.edit_tour', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let edit_city = $('#edit_city').val();
            let edit_region = $('#edit_region').val();
            let edit_visit_type = $('#edit_visit_type').val();
            let edit_required_date = $('#edit_required_date').val();
            let edit_note = $('#edit_note').val();

            var edit_farmer_name = new Array();
            var i = 0;
            $(".edit_farmer_name").each(function() {
                edit_farmer_name[i] = $(this).val();
                i++;
            });

            var edit_employee_name = new Array();
            var i = 0;
            $(".edit_employee_name").each(function() {
                edit_employee_name[i] = $(this).val();
                i++;
            });


            $.ajax({
                url: "{{ route('update.tour') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    edit_city: edit_city,
                    edit_region: edit_region,
                    edit_visit_type: edit_visit_type,
                    edit_required_date: edit_required_date,
                    edit_note: edit_note,
                    edit_farmer_name: edit_farmer_name,
                    edit_employee_name: edit_employee_name,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editTour').modal('hide');
                        $('#editTour_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('#edit_tableFarmer tbody').empty();
                        $('#edit_tableEmployee tbody').empty();
                        $('.tour_table').removeClass('row');
                        $('.tour_table').load(location.href + ' .tour_table');
                        Command: toastr["success"]("تم تعديل الجولة السياحية", "العملية")

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

        //delete tour
        $(document).on('click', '.delete_tour', function(e) {
            e.preventDefault();
            let tour_id = $(this).data('id');
            if (confirm('هل تريد حذف هذه الجولة الإرشادية؟!')) {
                $.ajax({
                    url: "{{ route('delete.tour') }}",
                    method: 'POST',
                    data: {
                        tour_id: tour_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.tour_table').removeClass('row');
                            $('.tour_table').load(location.href + ' .tour_table');
                            Command: toastr["success"]("تم حذف الجولة الإرشادية بنجاح",
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

        // for alert message
        $("document").ready(function() {
            setTimeout(() => {
                $("div.alert").remove();
            }, 6000);
        });

        // city and region
        $(document).on('change', '#city', function() {
            var city_name = this.value;
            $("#region").html('');
            $.ajax({
                url: "{{ route('tour.getRegion') }}",
                type: "get",
                dataType: 'json',
                success: function(result) {
                    $('#region').html('<option value="">Select region</option>');
                    $.each(result, function(key, value) {
                        if (value.city_name === city_name) {
                            $.each(value.regions, function(key, value) {
                                $('#region').append('<option value="' +
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


        //search button
        $(document).on('click', '#button_search_visit', function(e) {
            e.preventDefault();
            $("#search_form_visit").toggle();
            $("#search_form_tour").hide();
        });

        $(document).on('click', '#button_search_tour', function(e) {
            e.preventDefault();
            $("#search_form_tour").toggle();
            $("#search_form_visit").hide();
        });

        //search for صنف
        $(document).on('change', '#search_visitType', function() {
            var search_visitType = $(this).val();
            var html = '';
            if (search_visitType == 'زراعة') {
                $('#search_class').empty();
                $('#search_type').empty();
                $('#search_class').append('<option selected disabled value="">صنف زراعي</option>');
                $('#search_type').append('<option selected disabled value="">اختار اسم الآفة</option>');

                html += `
                    @foreach ($agriculturals as $agricultural)
                        <option value="{{ $agricultural->agricultural_name }}">
                            {{ $agricultural->agricultural_name }}</option>
                    @endforeach`;

                $('#search_class').append(html);

            $(document).on('change', '#search_class', function() {
            var agricultural_name = $(this).val();

            $.ajax({
                url: "{{ route('getAgricultural') }}",
                method: "POST",
                data: {
                    agricultural_name: agricultural_name
                },
                success: function(data) {
                    $('#search_type').html(
                        '<option value="">اختار اسم الآفة</option>');
                    $.each(data, function(key, value) {
                        if (value.agricultural_name === agricultural_name) {
                            $.each(value.agriculturalpests, function(key, value) {
                                $('#search_type')
                                    .append('<option value="' +
                                        value
                                        .agricultural_pest_name + '">' +
                                        value
                                        .agricultural_pest_name +
                                        '</option>');
                            });
                        }
                    });
                }
            })

        });

            }else{
                $('#search_class').empty();
                $('#search_type').empty();
                $('#search_class').append('<option selected disabled value="">صنف حيواني</option>');
                $('#search_type').append('<option selected disabled value="">اختار اسم المرض</option>');

                html += `
                    @foreach ($animals as $animal)
                        <option value="{{ $animal->animal_name }}">
                            {{ $animal->animal_name }}</option>
                    @endforeach`;

                $('#search_class').append(html);

                $(document).on('change', '#search_class', function() {
                    var animal_name = $(this).val();

                    $.ajax({
                        url: "{{ route('getAnimal') }}",
                        method: "POST",
                        data: {
                            animal_name: animal_name
                        },
                        success: function(data) {
                            $('#search_type').html(
                                '<option value="">اختار اسم مرض</option>');
                            $.each(data, function(key, value) {
                                if (value.animal_name === animal_name) {
                                    $.each(value.animaldiseases, function(key, value) {
                                        $('#search_type')
                                            .append('<option value="' +
                                                value
                                                .animal_disease_name + '">' +
                                                value
                                                .animal_disease_name +
                                                '</option>');
                                    });
                                }
                            });
                        }
                    });

                });

            }
        });


        //search city and region for visit
        $(document).on('change', '#search_city', function() {
            var city_name = this.value;
            $("#search_region").html('');
            $.ajax({
                url: "{{ route('getRegion') }}",
                type: "get",
                dataType: 'json',
                success: function(result) {
                    $('#search_region').html('<option value="">Select region</option>');
                    $.each(result, function(key, value) {
                        if (value.city_name === city_name) {
                            $.each(value.regions, function(key, value) {
                                $('#search_region').append(
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

        //search city and region for tour
        $(document).on('change', '#tour_search_city', function() {
            var city_name = this.value;
            $("#tour_search_region").html('');
            $.ajax({
                url: "{{ route('getRegion') }}",
                type: "get",
                dataType: 'json',
                success: function(result) {
                    $('#tour_search_region').html('<option value="">Select region</option>');
                    $.each(result, function(key, value) {
                        if (value.city_name === city_name) {
                            $.each(value.regions, function(key, value) {
                                $('#tour_search_region').append(
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



        //edit city and region
        $(document).on('change', '#edit_city', function() {
            var city_name = this.value;
            $("#edit_region").html('');
            $.ajax({
                url: "{{ route('getRegion') }}",
                type: "get",
                dataType: 'json',
                success: function(result) {
                    $('#edit_region').html('<option value="">Select region</option>');
                    $.each(result, function(key, value) {
                        if (value.city_name === city_name) {
                            $.each(value.regions, function(key, value) {
                                $('#edit_region').append('<option value="' +
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

        //edit farmer name autocomplete



    });
</script>
