<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <h1>Json</h1>
    </div>

    <div id="result">

    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $.getJSON(
            "https://jsonplaceholder.typicode.com/posts",
            function(data) {
                $.each(data, function(key, value) {
                    $("#result").append(value.id + " ")
                })
            }
        )
    })
    </script>
</body>

</html>