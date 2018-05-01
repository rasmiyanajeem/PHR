
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/home.js"></script>

<script>
    //initializing select element
    $(document).ready(function() {
        $('select').material_select();
        $('.modal').modal();
        $('.tooltipped').tooltip({delay: 50});


    });

    //edit record

    function editRecord(id){

        $('#edittestname').val($('#testname'+id).html());
        $('#editdrname').val($('#drname'+id).html());
        $('#editdrnumber').val($('#drphone'+id).html());
        $('#editdrdate').val($('#drdate'+id).html());
        $('#r_id').val($('#r_id'+id).val());


        Materialize.updateTextFields();

        $('#edit_record').modal('open');
    }

</script>


</body>
</html>
