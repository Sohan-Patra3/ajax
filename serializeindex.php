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
                    <td><label for="">Age:</label></td>
                    <td><input type="number" name="age" id="age"></td>
                </tr>
                <tr>
                    <td><label for="">Gender</label></td>
                    <td>Male:<input type="radio" name="gender" value="male">
                        female:<input type="radio" name="gender" value="female"></td>
                </tr>
                <tr>
                    <td><label for="">Country</label></td>
                    <td>
                        <select name="country" id="">
                            <option value="ind">India</option>
                            <option value="pk">Pakistan</option>
                            <option value="us">Usa</option>
                            <option value="uk">England</option>
                            <option value="sing">Singapore</option>
                            <option value="fra">France</option>
                        </select>
                    </td>
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
            var age = $("#age").val()
            if (fname == "" || age == "" || !$('input:radio[name=gender]').is(':checked')) {
                $("#response").fadeIn()
                $("#response").removeClass('success-msg').addClass('error-msg').html(
                    'All field are required')
            } else {
                $.ajax({
                    url: "save-from.php",
                    type: "POST",
                    data: $("#submit_form").serialize(),
                    beforeSend: function() {
                        $("#response").fadeIn();
                        $("#response").removeClass('success-msg error-msg').addClass(
                            'process-msg').html(
                            'Loading...')
                    },
                    success: function(data) {
                        $("#submit_form").trigger("reset")
                        $("#response").fadeIn()
                        $("#response").removeClass('error-msg').addClass('success-msg')
                            .html(data)
                        setTimeout(function() {
                            $("#response").fadeOut("slow")
                        }, 2000)
                    }
                })
            }
        })
    })
    </script>
</body>

</html>