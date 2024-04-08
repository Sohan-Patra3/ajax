<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="main">
        <div id="header">
            <h1>PHP with Ajax & JSON</h1>
        </div>

        <div id="load-data">
            <table id="load-table" border="1" cellpadding="10px" width="50%">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>gender</th>
                    <th>country</th>
                </tr>
            </table>
        </div>

    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script>
    /*$.getJSON(
        "fetch-json.php",
        function(data) {
            $.each(data, function(key, value) {
                $("#load-data").append(value.id + " " + value.name + " " + value.gender + " " + value
                    .country + "<br>")
            })
        }
    )*/
    $.ajax({
        url: "fetch-json.php",
        type: "POST",
        data: {
            id: 3
        },
        dataType: "JSON",
        success: function(data) {
            $.each(data, function(key, value) {
                $("#load-table").append("<tr><td>" + value.id + "</td><td>" + value.name +
                    "</td><td>" + value.gender + "</td><td>" +
                    value.country + "</td></tr>");
            });
        }


    })
    </script>
</body>

</html>