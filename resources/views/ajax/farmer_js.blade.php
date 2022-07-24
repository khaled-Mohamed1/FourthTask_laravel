<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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

        //add farmer
        $(document).on('click', '.add_farmer', function(e) {
            e.preventDefault();
            let entry_date = $('#entry_date').val();
            let id_NO = $('#id_NO').val();
            let date_of_birth = $('#date_of_birth').val();
            let firstname = $('#firstname').val();
            let secondname = $('#secondname').val();
            let thirdname = $('#thirdname').val();
            let fourthname = $('#fourthname').val();
            let phone_NO = $('#phone_NO').val();
            let email = $('#email').val();
            let gender = $('#gender').val();
            let city = $('#city').val();
            let region = $('#region').val();
            let nearest_place = $('#nearest_place').val();
            let status = $('#status').val();
            let qualification = $('#qualification').val();

            $.ajax({
                url: "{{ route('add.farmer') }}",
                method: 'post',
                data: {
                    entry_date: entry_date,
                    id_NO: id_NO,
                    date_of_birth: date_of_birth,
                    firstname: firstname,
                    secondname: secondname,
                    thirdname: thirdname,
                    fourthname: fourthname,
                    phone_NO: phone_NO,
                    email: email,
                    gender: gender,
                    city: city,
                    region: region,
                    nearest_place: nearest_place,
                    status: status,
                    qualification: qualification,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#addFarmer')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.table').load(location.href + ' .table');
                        Command: toastr["success"]("تم اضافة المزارع بنجاح", "العملية")

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

        //show farmer value in edit form
        $(document).on('click', '.edit_farmer', function() {
            let id = $(this).data('id');
            let card_id = $(this).data('card_id');
            let entry_date = $(this).data('entry_date');
            let idnumber = $(this).data('idnumber');
            let date_of_birth = $(this).data('date_of_birth');
            let firstname = $(this).data('firstname');
            let secondname = $(this).data('secondname');
            let thirdname = $(this).data('thirdname');
            let fourthname = $(this).data('fourthname');
            let phone = $(this).data('phone');
            let gender = $(this).data('gender');
            let email = $(this).data('email');
            let city = $(this).data('city');
            let region = $(this).data('region');
            let nearest_place = $(this).data('nearest_place');
            let status = $(this).data('status');
            let qualification = $(this).data('qualification');

            $('#edit_id').val(id);
            $('#edit_card_id').val(card_id);
            $('#edit_entry_date').val(entry_date);
            $('#edit_idnumber').val(idnumber);
            $('#edit_date_of_birth').val(date_of_birth);
            $('#edit_firstname').val(firstname);
            $('#edit_secondname').val(secondname);
            $('#edit_thirdname').val(thirdname);
            $('#edit_fourthname').val(fourthname);
            $('#edit_phone').val(phone);
            $('#edit_gender').val(gender);
            $('#edit_email').val(email);
            $('#edit_city').val(city);
            $('#edit_nearest_place').val(nearest_place);
            $('#edit_status').val(status);
            $('#edit_qualification').val(qualification);

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

        });

        //edit farmer data
        $(document).on('click', '.edit_farmer_form', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let edit_idnumber = $('#edit_idnumber').val();
            let edit_date_of_birth = $('#edit_date_of_birth').val();
            let edit_firstname = $('#edit_firstname').val();
            let edit_secondname = $('#edit_secondname').val();
            let edit_thirdname = $('#edit_thirdname').val();
            let edit_fourthname = $('#edit_fourthname').val();
            let edit_phone = $('#edit_phone').val();
            let edit_email = $('#edit_email').val();
            let edit_gender = $('#edit_gender').val();
            let edit_city = $('#edit_city').val();
            let edit_region = $('#edit_region').val();
            let edit_nearest_place = $('#edit_nearest_place').val();
            let edit_status = $('#edit_status').val();
            let edit_qualification = $('#edit_qualification').val();

            $.ajax({
                url: "{{ route('update.farmer') }}",
                method: 'POST',
                data: {
                    edit_id: edit_id,
                    edit_idnumber: edit_idnumber,
                    edit_date_of_birth: edit_date_of_birth,
                    edit_firstname: edit_firstname,
                    edit_secondname: edit_secondname,
                    edit_thirdname: edit_thirdname,
                    edit_fourthname: edit_fourthname,
                    edit_phone: edit_phone,
                    edit_email: edit_email,
                    edit_gender: edit_gender,
                    edit_city: edit_city,
                    edit_region: edit_region,
                    edit_nearest_place: edit_nearest_place,
                    edit_status: edit_status,
                    edit_qualification: edit_qualification,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editModal').modal('hide');
                        $('#editFarmer')[0].reset();
                        $('.table').load(location.href + ' .table');
                        Command: toastr["success"]("تم تعديل المزارع بنجاح", "العملية")

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

        //delete farmer
        $(document).on('click', '.delete_farmer', function(e) {
            e.preventDefault();
            let farmer_id = $(this).data('id');
            if (confirm('هل تريد حذف هذا المزارع؟!')) {
                $.ajax({
                    url: "{{ route('delete.farmer') }}",
                    method: 'POST',
                    data: {
                        farmer_id: farmer_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.table').load(location.href + ' .table');
                            Command: toastr["success"]("تم حذف المزارع بنجاح", "العملية")

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

        //pagination didnt work!!!
        // $(document).on('click', '.pagination a', function() {
        //     e.preventDefault();
        //     var page = $(this).attr('href').split('page=')[1];
        //     farmer(page);
        // });

        // function farmer(page) {
        //     $.ajax({
        //         url: "/farmers/pagination/paginate-data?page=" + page,
        //         success: function(data) {
        //             $('#table_data').html(data);
        //         }
        //     });
        // }


        $(document).on('click', '#button_search', function(e) {
            e.preventDefault();
            $("#search_form").toggle();
        });

        //city and region
        $(document).on('change', '#city', function() {
            var city_name = this.value;
            $("#region").html('');
            $.ajax({
                url: "{{ route('getRegion') }}",
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

        //search city and region
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
                                $('#search_region').append('<option value="' +
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
