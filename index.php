<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #modal {
        background-color: rgba(0, 0, 0, 0.7);
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        display: none;
    }

    #modal-form {
        background-color: #fff;
        width: 30%;
        top: 20%;
        left: calc(50%-15%);
        padding: 15px;
        border-radius: 4px;
        position: relative;
    }

    #modal-form h2 {
        margin: 0 0 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #000;
    }

    #close-btn {
        background-color: red;
        color: white;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50px;
        position: absolute;
        top: -15px;
        right: -15px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <td>
                    <h1>ADD RECORDS WITH PHP & AJAX</h1>
                    <div id="serach-bar">
                        <label for="">Search:</label>
                        <input type="text" id="search" autocomplete="off">
                        <br>
                    </div>
                </td>
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

    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">
            </table>
            <div id='close-btn'>
                X
            </div>
        </div>
    </div>


    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        function loadTable() {
            $.ajax({
                url: "ajaxload.php",
                type: "POST",
                success: function(data) {
                    $("#table-data").html(data)
                }
            })
        }
        loadTable()

        $("#save-button").on("click", function(e) {
            e.preventDefault()
            var fname = $("#fname").val()
            var lname = $("#lname").val()
            if (fname == "" || lname == "") {
                $("#error-message").html("All field are required").slideDown()
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
                            loadTable()
                            $("#formData").trigger("reset")
                            $("#success-message").html("Data inserted successfully")
                                .slideDown()
                            $("#error-message").slideUp()
                        } else {
                            $("#error-message").html("Could not insert the data")
                                .slideDown()
                            $("#success-msg").slideUp()
                        }
                    }
                })
            }
        }) 

        $(document).on("click", ".delete-btn", function() {
            var sno = $(this).data("id")
            var element = this

            if (confirm("Do you really want to delete this record")) {
                $.ajax({
                    url: "ajaxdelete.php",
                    type: "POST",
                    data: {
                        id: sno
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(element).closest("tr").fadeOut()
                            $("#success-message").html("Data deleted successfully")
                                .slideDown()
                            $("#error-message").slideUp()
                        } else {
                            $("#error-message").html("could not delete the data")
                                .slideDown()
                            $("#success-message").slideUp()
                        }
                    }
                })
            }
        })

        $(document).on('click' , '.edit-btn' , function(){
            $('#modal').show()
            let sno = $(this).data('eid')

            $.ajax({
                url:"load-update-form.php",
                type:"POST",
                data : {
                    id: sno
                },
                success :function(data){
                    $('#modal-form table').html(data)
                }
            })
        })

        $(document).on("click", "#close-btn", function() {
            $("#modal").hide()
        })

        $(document).on('click' , '#edit-submit' , function(){
            let sid = $('#edit-id').val()
            let fname = $('#edit-fname').val()
            let lname = $('#edit-lname').val()

            $.ajax({
                url:"ajax-update-form.php",
                type:'POST',
                data:{
                    first_name:fname,
                    last_name:lname,
                    id:sid
                },
                success:function(data){
                    if(data==1){
                        $("#modal").hide()
                        loadTable()
                    }
                }
            })
        })

        $(document).on('keyup' , "#search" , function(){
            var search_item = $(this).val()

            $.ajax({
                url:"ajax-live-search.php",
                type:"POST",
                data:{
                    search: search_item
                },
                success:function(data){
                    $("#table-data").html(data)
                }
            })
        })

        
    })
    </script>
</body>

</html>