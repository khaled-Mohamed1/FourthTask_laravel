<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        //edit open type of q9
        $("#q9").on("change", function() {
            if ($(this).val() == 'نعم') {
                $("#q10").show().siblings();
            } else {
                $("#q10").hide();
            }
        })

        //edit open type of q9
        $("#edit_q9").on("change", function() {
            if ($(this).val() == 'نعم') {
                $("#edit_q10").show().siblings();
            } else {
                $("#edit_q10").hide();
            }
        })


    })
</script>
