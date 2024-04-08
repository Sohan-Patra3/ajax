<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="header">
        <h1>Save From Data in Json File</h1>
    </div>

    <div id="table-data">
        <form action="daily-json-file-saveform.php" id="submit_form" method="POST">
            <table width="100%" cellpadding="10px">
                <tr>
                    <td><label for="">Name:</label></td>
                    <td><input type="text" name="fullname" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><label for="">LastName:</label></td>
                    <td><input type="text" name="lastname" autocomplete="off"></td>
                </tr>
                <tr><button id="submit" name="submit">Submit</button></tr>
            </table>
        </form>
    </div>
</body>

</html>