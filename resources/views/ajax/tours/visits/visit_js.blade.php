<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

        //delete visit
        $(document).on('click', '.delete_visit', function(e) {
            e.preventDefault();
            let visit_id = $(this).data('id');
            if (confirm('هل تريد حذف تقرير الزيارة؟!')) {
                $.ajax({
                    url: "{{ route('delete.visit') }}",
                    method: 'POST',
                    data: {
                        visit_id: visit_id,
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.visit_table').removeClass('row');
                            $('.visit_table').load(location.href + ' .visit_table');
                            Command: toastr["success"]("تم حذف تقرير الزيارة",
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


        //autocomplete for farmer card_id
        let tour_id = $('#farmer_cardid').data('tour_id');
        console.log(tour_id);
        $( "#farmer_cardid" ).autocomplete({
                source: function(request, response) {
                    $.ajax({
                    url: "{{ route('visit.autocomplete') }}",
                    data: {
                            term : request.term,
                            tour_id:tour_id
                    },
                    dataType: "json",
                    success: function(data){
                    var resp = $.map(data,function(obj){
                            return obj.farmer_cardId;
                    });

                    response(resp);
                    }
                });
            },
            minLength: 1
        });


        // get Agricultural and AgriculturalPest
        var count = 0;
        var rowIdx = 0;
        $(document).on('click', '.add', function() {
            count++;
            var html = '';
            html += `<tr id="R${++rowIdx}">`;
            html += `<td class="row-index text-center"><p>${rowIdx}</p></td>`;
            html +=
                `<td><select name="agricultural_class[]" class="form-select agricultural_class" data-sub_agricultural_id="${count}"><option value="">Select Category</option>@foreach ($agriculturals as $agricultural) <option value="{{ $agricultural->agricultural_name }}"> {{ $agricultural->agricultural_name }} @endforeach</select></td>`;
            html +=
                `<td><select name="pest_name[]" class="form-select pest_name" id="pest_name${count}"><option value="">اختار اسم الآفة</option></select></td>`;
            html += `<td><input name="pest_image[]" id="pest_image${count}" type="file" class="form-control pest_image" multiple></td>`;
            html += `<td><input name="pest_image_description[]" id="pest_image_description" type="text" class="form-control pest_image_description"></td>`;
            html +=
                `<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="las la-trash-alt"></i></button></td>`;
            $('.pest_body').append(html);
        });


        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
        });

        $(document).on('change', '.agricultural_class', function() {
            var agricultural_name = $(this).val();
            var sub_agricultural_id = $(this).data('sub_agricultural_id');

            $.ajax({
                url: "{{ route('getAgricultural') }}",
                method: "POST",
                data: {
                    agricultural_name: agricultural_name
                },
                success: function(data) {
                    $('#pest_name' + sub_agricultural_id).html(
                        '<option value="">اختار اسم الآفة</option>');
                    $.each(data, function(key, value) {
                        if (value.agricultural_name === agricultural_name) {
                            $.each(value.agriculturalpests, function(key, value) {
                                $('#pest_name' + sub_agricultural_id)
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




        //get Animal and AnimalDiseaes
        var countD = 0;
        var rowIdxD = 0;
        $(document).on('click', '.addDisease', function() {
            countD++;
            var html = '';
            html += `<tr id="R${++rowIdxD}">`;
            html += `<td class="row-index text-center"><p>${rowIdxD}</p></td>`;
            html +=
                `<td><select name="animal_class[]" class="form-select animal_class" data-sub_animal_id="${countD}"><option value="">اختار صنف</option>@foreach ($animals as $animal) <option value="{{ $animal->animal_name }}"> {{ $animal->animal_name }} @endforeach</select></td>`;
            html +=
                `<td><select name="disease_name[]" class="form-select disease_name" id="disease_name${countD}"><option value="">اختار اسم مرض</option></select></td>`;
            html += `<td><input name="disease_image[]" id="disease_image" type="file" class="form-control disease_image" multiple></td>`;
            html += `<td><input name="disease_image_description[]" id="disease_image_description" type="text" class="form-control disease_image_description"></td>`;
            html +=
                `<td><button type="button" name="remove" class="btn btn-danger btn-xs removeDisease"><i class="las la-trash-alt"></i></button></td>`;
            $('.disease_body').append(html);
        });


        $(document).on('click', '.removeDisease', function() {
            $(this).closest('tr').remove();
        });

        $(document).on('change', '.animal_class', function() {
            var animal_name = $(this).val();
            var sub_animal_id = $(this).data('sub_animal_id');

            $.ajax({
                url: "{{ route('getAnimal') }}",
                method: "POST",
                data: {
                    animal_name: animal_name
                },
                success: function(data) {
                    $('#disease_name' + sub_animal_id).html(
                        '<option value="">اختار اسم مرض</option>');
                    $.each(data, function(key, value) {
                        if (value.animal_name === animal_name) {
                            $.each(value.animaldiseases, function(key, value) {
                                $('#disease_name' + sub_animal_id)
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

    });
</script>
