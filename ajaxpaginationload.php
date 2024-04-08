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
            <h1>PHP & Ajax Pagination</h1>
        </div>
        <div id="table-data">
            <table id="loadData" border='1' width='100%' cellspacing='0' cellpadding='10px'>
                <th width='10%'>ID</th>
                <th width='50%'>Name</th>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        function loadTable(page) {
            $.ajax({
                url: "ajaxload-pagination.php",
                type: "POST",
                data: {
                    page_no: page
                },
                success: function(data) {
                    if (data) {
                        $("#pagination").remove()
                        $("#loadData").append(data)
                    } else {
                        $("#ajaxbtn").html("finished")
                        $("#ajaxbtn").prop("disabled", true)
                    }
                }
            })
        }
        loadTable()

        $(document).on("click", "#ajaxbtn", function() {
            $("#ajaxbtn").html("Loading..")
            var pid = $(this).data("id")
            loadTable(pid)
        })
    })
    </script>
</body>

</html>