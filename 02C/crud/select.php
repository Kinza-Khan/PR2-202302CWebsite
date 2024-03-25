<?php
include('query.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
   <div class="container p-4">

    <input type="text"  class="form-control" id="search_value">

            <a href="addUser.php" class="btn btn-info">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
     </div>


   <script>



    $(document).ready(function(){
        function loadAllUsers() {
        $.ajax({
            url: "config.php",
            type: "post",
            success: function(data) {
                $("tbody").html(data);  
            }
        });
    }

    // Load all users initially
    loadAllUsers()

        $("#search_value").keyup(function(){
            let input = $(this).val();
            // alert(input);

            if(input != ""){
            $.ajax({
                url : "query.php",
                type : "post",
                data : {input:input},
                success :function(abc){
                   $("tbody").html(abc);  
              
                }
            })
        }
        else{
            loadAllUsers();;
        }


        });
    });
   </script>
   
  </body>
</html>