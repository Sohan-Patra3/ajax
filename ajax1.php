<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <h1>PHP with AJAX</h1>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="button" id="load-button" value="load data"></td>
            </tr>
            <tr>
                <td id="data-table">
                    <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#load-button').on('click' , function(){
            $.ajax({
                url :"ajaxload.php",
                type:"POST",
                success:function(data){
                    $('#data-table').html(data)
                }
            })
        })
    })
    </script>
</body>

</html>