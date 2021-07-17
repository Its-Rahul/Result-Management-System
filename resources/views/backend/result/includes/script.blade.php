<script>

    $(document).ready(function (){
        $('#class_id').change(function (){
            var classes = $(this).val();
            var path = "{{URL::route('class.getSubject')}}";

            $.ajax({
                url:path,
                data: {'class_id':classes,'_token':$('meta[name="csrf_token"]').attr('content')},
                method:'post',
                dataType : 'text',
                success:function (response){
                    $('#subject_id').empty();
                    $('#subject_id').append(response);
                }
            });
        });
    });
</script>


