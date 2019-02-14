<html lang="en">
<head>
    <meta name="_token" content="{{csrf_token()}}"/>

</head>
</head>
<body>
<form name="myform" role="form">
    <div class="form-group">
        <input type="text" name="uname" id="uname" class="form-control"/>
        <input type="button" name="btnSave" id="btnSave" value="Submit"/>
    </div>
</form>

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script type="text/javascript">

    $(document).ready(function(){


        // alert('pakistan');
        $('#btnSave').on('click', function(event){
            //alert('step-1');
            id = $('#uname').val();
            //alert(uname);
            $.ajax({
                type: 'DELETE',
                url: 'info/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                   // toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                   // $('.item' + data['id']).remove();
                }
            });
        });
    });



</script>
</body>

</html>


