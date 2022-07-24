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

        //add partner
        $(document).on('click', '.add_partner', function(e) {
            e.preventDefault();
            let land_id = $('#land_id').val();
            let partner_idnumber = $('#partner_idnumber').val();
            let partner_name = $('#partner_name').val();
            let partner_type = $('#partner_type').val();
            let partner_ratio = $('#partner_ratio').val();

            $.ajax({
                url: "{{ route('add.partner') }}",
                method: 'post',
                data: {
                    land_id: land_id,
                    partner_idnumber: partner_idnumber,
                    partner_name: partner_name,
                    partner_type: partner_type,
                    partner_ratio: partner_ratio,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addPartner').modal('hide');
                        $('#addPartner_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.partner_table').removeClass('row');
                        $('.partner_table').load(location.href + ' .partner_table');
                        Command: toastr["success"]("تم اضافة هذا الشريك بنجاح", "العملية")

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

        //show parnter value in edit form
        $(document).on('click', '.editpartner', function() {
            let id = $(this).data('id');
            let partner_idnumber = $(this).data('partner_idnumber');
            let partner_name = $(this).data('partner_name');
            let partner_type = $(this).data('partner_type');
            let partner_ratio = $(this).data('partner_ratio');

            $('#edit_id').val(id);
            $('#edit_partner_idnumber').val(partner_idnumber);
            $('#edit_partner_name').val(partner_name);
            $('#edit_partner_type').val(partner_type);
            $('#edit_partner_ratio').val(partner_ratio);
        });

        //edit parnter data
        $(document).on('click', '.edit_partner', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let land_id = $('#land_id').val();
            let edit_partner_idnumber = $('#edit_partner_idnumber').val();
            let edit_partner_name = $('#edit_partner_name').val();
            let edit_partner_type = $('#edit_partner_type').val();
            let edit_partner_ratio = $('#edit_partner_ratio').val();

            $.ajax({
                url: "{{ route('update.partner') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    land_id: land_id,
                    edit_partner_idnumber: edit_partner_idnumber,
                    edit_partner_name: edit_partner_name,
                    edit_partner_type: edit_partner_type,
                    edit_partner_ratio: edit_partner_ratio,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editPartner').modal('hide');
                        $('#editPartner_form')[0].reset();
                        $('.partner_table').removeClass('row');
                        $('.partner_table').load(location.href + ' .partner_table');
                        Command: toastr["success"]("تم تعديل هذا الشريك بنجاح", "العملية")

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

        //delete partner
        $(document).on('click', '.delete_partner', function(e) {
            e.preventDefault();
            let partner_id = $(this).data('id');
            if (confirm('هل تريد حذف هذا الشريك؟!')) {
                $.ajax({
                    url: "{{ route('delete.partner') }}",
                    method: 'POST',
                    data: {
                        partner_id: partner_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.partner_table').removeClass('row');
                            $('.partner_table').load(location.href + ' .partner_table');
                            Command: toastr["success"]("تم حذف هذا الشريك بنجاح", "العملية")

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
