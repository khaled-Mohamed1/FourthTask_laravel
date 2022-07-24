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
        $("#tree_recession").on("change", function() {
            if ($(this).val() == 'نعم') {
                $("#recessionTree").show().siblings();
            } else {
                $("#recessionTree").hide();
            }
        });

        //edit open type of recession
        $("#edit_tree_recession").on("change", function() {
            if ($(this).val() == 'نعم') {
                $("#edit_recessionTree").show().siblings();
            } else {
                $("#edit_recessionTree").hide();
            }
        })


        //add tree
        $(document).on('click', '.add_tree', function(e) {
            e.preventDefault();
            let land_id = $('#land_id').val();
            let tree_name = $('#tree_name').val();
            let tree_history = $('#tree_history').val();
            let tree_area = $('#tree_area').val();
            let tree_number = $('#tree_number').val();
            let tree_protection = $('#tree_protection').val();
            let tree_irrigation = $('#tree_irrigation').val();
            let tree_recession = $('#tree_recession').val();
            let tree_recession_reason = $('#tree_recession_reason').val();
            let tree_enddate = $('#tree_endDate').val();

            $.ajax({
                url: "{{ route('add.tree') }}",
                method: 'post',
                data: {
                    land_id: land_id,
                    tree_name: tree_name,
                    tree_history: tree_history,
                    tree_area: tree_area,
                    tree_number: tree_number,
                    tree_protection: tree_protection,
                    tree_irrigation: tree_irrigation,
                    tree_recession: tree_recession,
                    tree_recession_reason: tree_recession_reason,
                    tree_enddate: tree_enddate,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addTree').modal('hide');
                        $('#addTree_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.tree_table').removeClass('row');
                        $('.tree_table').load(location.href + ' .tree_table');
                        Command: toastr["success"]("تم اضافة اشجار", "العملية")

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

        // show tree value in edit form
        $(document).on('click', '.edittree', function() {
            let id = $(this).data('id');
            let tree_name = $(this).data('tree_name');
            let tree_history = $(this).data('tree_history');
            let tree_area = $(this).data('tree_area');
            let tree_number = $(this).data('tree_number');
            let tree_irrigation = $(this).data('tree_irrigation');
            let tree_protection = $(this).data('tree_protection');
            let tree_recession = $(this).data('tree_recession');
            let tree_recession_reason = $(this).data('tree_recession_reason');
            let tree_enddate = $(this).data('tree_enddate');

            $('#edit_id').val(id);
            $('#edit_tree_name').val(tree_name);
            $('#edit_tree_history').val(tree_history);
            $('#edit_tree_area').val(tree_area);
            $('#edit_tree_number').val(tree_number);
            $('#edit_tree_irrigation').val(tree_irrigation);
            $('#edit_tree_protection').val(tree_protection);
            $('#edit_tree_recession').val(tree_recession);
            $('#edit_tree_recession_reason').val(tree_recession_reason);
            $('#edit_tree_endDate').val(tree_enddate);

            if ($("#edit_tree_recession").val() === 'نعم') {
                $("#edit_recessionTree").show().siblings();
                $("#edit_tree_endDate").prop("disabled", false);

            } else {
                $('#edit_recessionTree').hide();
                $("#edit_tree_endDate").prop("disabled", true);
            }

            $("#edit_tree_recession").on("change", function() {
                if ($(this).val() == 'نعم') {
                    $("#edit_tree_endDate").prop("disabled", false);
                } else {
                    $("#edit_tree_endDate").prop("disabled", true);
                }
            })
        });

        //edit tree data
        $(document).on('click', '.edit_tree', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let land_id = $('#land_id').val();
            let edit_tree_name = $('#edit_tree_name').val();
            let edit_tree_history = $('#edit_tree_history').val();
            let edit_tree_area = $('#edit_tree_area').val();
            let edit_tree_number = $('#edit_tree_number').val();
            let edit_tree_irrigation = $('#edit_tree_irrigation').val();
            let edit_tree_protection = $('#edit_tree_protection').val();
            let edit_tree_recession = $('#edit_tree_recession').val();
            let edit_tree_recession_reason = $('#edit_tree_recession_reason').val();
            let edit_tree_enddate = $('#edit_tree_endDate').val();

            $.ajax({
                url: "{{ route('update.tree') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    land_id: land_id,
                    edit_tree_name: edit_tree_name,
                    edit_tree_history: edit_tree_history,
                    edit_tree_area: edit_tree_area,
                    edit_tree_number: edit_tree_number,
                    edit_tree_irrigation: edit_tree_irrigation,
                    edit_tree_protection: edit_tree_protection,
                    edit_tree_recession: edit_tree_recession,
                    edit_tree_recession_reason: edit_tree_recession_reason,
                    edit_tree_enddate: edit_tree_enddate,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editTree').modal('hide');
                        $('#editTree_form')[0].reset();
                        $('.tree_table').removeClass('row');
                        $('.tree_table').load(location.href + ' .tree_table');
                        Command: toastr["success"]("تم تعديل الأشجار", "العملية")

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

        //delete tree
        $(document).on('click', '.delete_tree', function(e) {
            e.preventDefault();
            let tree_id = $(this).data('id');
            if (confirm('هل تريد حذف هذه الشجرة؟!')) {
                $.ajax({
                    url: "{{ route('delete.tree') }}",
                    method: 'POST',
                    data: {
                        tree_id: tree_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.tree_table').removeClass('row');
                            $('.tree_table').load(location.href + ' .tree_table');
                            Command: toastr["success"]("تم حذف هذه الشجرة بنجاح",
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
