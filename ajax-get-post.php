<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serialize Form</title>
    <style>
    #response {
        width: 35%;
        margin: 15px auto;
        padding: 15px;
        border-radius: 5px;
    }

    .error-msg {
        background-color: #f2dedf;
        color: #9c4150;
        border: 1px solid #e7ced1;
    }

    .success-msg {
        background: #e0efda;
        color: #407a4a;
        border: 1px solid #c6dfb2;
    }

    .process-msg {
        background: #d9edf6;
        color: #377084;
        border: 1px solid #c8dce5;
    }
    </style>
</head>

<body>
    <div id="tabledata">
        <form id="submit_form">
            <table width="50%" cellpadding="10px">
                <tr>
                    <td width="%"><label for="">Name:</label></td>
                    <td><input type="text" name="fullname" id="fullname"></td>
                </tr>
                <tr>
                    <td><label for="">LastName:</label></td>
                    <td><input type="text" name="lastname" id="lastname"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button id="submit" name="submit">Submit</button></td>
                </tr>
            </table>
        </form>
        <div id="response"></div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $(document).on("click", "#submit", function(e) {
            e.preventDefault()
            var fname = $("#fullname").val()
            var lname = $("#lastname").val()
            if (fname == "" || lname == "") {
                $("#process").fadeIn()
                $("#response").removeClass('success-msg').addClass('error-msg').html(
                    'All feild are required')
            } else {
                $.post(
                    "saveFormGetPost.php",
                    $("#submit_form").serialize(),
                    function(data) {
                        $("#submit_form").trigger("reset")
                        $("#response").fadeIn()
                        $("#response").removeClass('error-msg').addClass('success-msg').html(data)
                        setTimeout(function() {
                            $("#response").fadeOut()
                        }, 2000)
                    }
                )
            }
        })
    })
    </script>
</body>

</html>