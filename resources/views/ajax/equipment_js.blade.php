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

        //add equipment
        $(document).on('click', '.add_equipment', function(e) {
            e.preventDefault();
            let farmer_id = $('#farmer_id').val();
            let machine_type = $('#machine_type').val();
            let property_type = $('#property_type').val();
            let quantity = $('#quantity').val();
            let notes = $('#notes').val();

            $.ajax({
                url: "{{ route('add.equipment') }}",
                method: 'post',
                data: {
                    farmer_id: farmer_id,
                    machine_type: machine_type,
                    property_type: property_type,
                    quantity: quantity,
                    notes: notes,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addEquipment').modal('hide');
                        $('#addEquipment_form')[0].reset();
                        $('#errMsgContainer').empty();
                        $('.equipment_table').removeClass('row');
                        $('.equipment_table').load(location.href + ' .equipment_table');
                        Command: toastr["success"]("تم اضافة معدات بنجاح", "العملية")

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

        //show equipment value in edit form
        $(document).on('click', '.editequipment', function() {
            let id = $(this).data('id');
            let machine_type = $(this).data('machine_type');
            let property_type = $(this).data('property_type');
            let quantity = $(this).data('quantity');
            let notes = $(this).data('notes');

            $('#edit_id').val(id);
            $('#edit_machine_type').val(machine_type);
            $('#edit_property_type').val(property_type);
            $('#edit_quantity').val(quantity);
            $('#edit_notes').val(notes);
        });

        //edit equipment data
        $(document).on('click', '.edit_equipment', function(e) {
            e.preventDefault();
            let edit_id = $('#edit_id').val();
            let farmer_id = $('#farmer_id').val();
            let edit_machine_type = $('#edit_machine_type').val();
            let edit_property_type = $('#edit_property_type').val();
            let edit_quantity = $('#edit_quantity').val();
            let edit_notes = $('#edit_notes').val();


            $.ajax({
                url: "{{ route('update.equipment') }}",
                method: 'post',
                data: {
                    edit_id: edit_id,
                    farmer_id: farmer_id,
                    edit_machine_type: edit_machine_type,
                    edit_property_type: edit_property_type,
                    edit_quantity: edit_quantity,
                    edit_notes: edit_notes,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editEquipment').modal('hide');
                        $('#editEquipment_form')[0].reset();
                        $('.equipment_table').removeClass('row');
                        $('.equipment_table').load(location.href + ' .equipment_table');
                        Command: toastr["success"]("تم تعديل المعدات بنجاح", "العملية")

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

        //delete equipment
        $(document).on('click', '.delete_equipment', function(e) {
            e.preventDefault();
            let equipment_id = $(this).data('id');
            if (confirm('هل تريد حذف هذه المعدات؟!')) {
                $.ajax({
                    url: "{{ route('delete.equipment') }}",
                    method: 'POST',
                    data: {
                        equipment_id: equipment_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.equipment_table').removeClass('row');
                            $('.equipment_table').load(location.href + ' .equipment_table');
                            Command: toastr["success"]("تم حذف الآلة بنجاح", "العملية")

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
