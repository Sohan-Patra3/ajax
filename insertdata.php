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
                <h1>ADD RECORDS WITH PHP & AJAX</h1>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="table-form">
                    <form id="formData">
                        first Name : <input type="text" id="fname">
                        last Name : <input type="text" id="lname">
                        <input type="button" id="save-button" value="save">
                    </form>
                </td>

            </tr>
            <tr>
                <td id="table-data">
                    <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="error-message"></div>
    <div id="success-message"></div>

    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        function loadTable() {
            $.ajax({
                url: "ajaxload.php",
                type: "POST",
                success: function(data) {
                    $("#table-data").html(data);
                }
            })
        }
        loadTable();

        $("#save-button").on("click", function(e) {
            e.preventDefault();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            if (fname == "" || lname == "") {
                $("#error-message").html("All field are required").slideDown();
                $("#success-message").slideUp()
            } else {
                $.ajax({
                    url: "ajaxinsert.php",
                    type: "POST",
                    data: {
                        first_name: fname,
                        last_name: lname
                    },
                    success: function(data) {
                        if (data == 1) {
                            loadTable();
                            $("#formData").trigger("reset");
                            $("#success-message").html("data inserted successfully")
                                .slideUp();
                            $("#error-message").slideDown()
                        } else {
                            $("#error-message").html("cant save records").slideDown();
                            $("#success-message").slideUp()
                        }
                    }
                })
            }
        })
    })
    </script>
</body>

</html>