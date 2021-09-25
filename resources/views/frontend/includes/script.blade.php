
<script>

    $(document).ready(function (){
        $('#class_id').change(function (){
            var student = $(this).val();
            var path = "{{URL::route('class.getStudent')}}";

            $.ajax({
                url:path,
                data: {'class_id':student,'_token':$('meta[name="csrf_token"]').attr('content')},
                method:'post',
                dataType : 'text',
                success:function (response){
                    $('#student_id').empty();
                    $('#student_id').append(response);
                }
            });
        });
    });
</script>























