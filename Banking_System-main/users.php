<html>
    <head>
    <title>Users</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <style>
            *{
                box-sizing:border-box;
                margin:0;
                color:white;
            }
            tbody tr{
                background:midnightblue;
            }

            
            a{
                text-decoration:none;
                margin:10px;
                color:white;
                font-weight:bolder;
            }
            a:hover{
                    text-decoration:none;
                    color:antiquewhite;
             }
            .d-flex h1, .d-flex div{
                width:33%;
            }

        </style>
    </head>
    <body style="background:#e4ebe9">
    <div class="w-100 p-4 d-flex justify-content-between" style="background:midnightblue; font-style:TimesNewRoman;c; color:white">
        <h1 class=" ml-4">Customers List</h1>
        <div class="d-flex justify-content-end align-self-center">
            <a href="index.php">Home</a>
            <a href="transfer1.php">Transfer</a>
            <a href="history.php">History</a>
        </div>
    </div>

            
    <div class="container mt-4" >
            <table class="table border border-dark">
    <thead class="thead-dark">
      
      <tr class='text-center'>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Transfer</th>
        
        </tr>
      
    </thead>
    <tbody>
    <?php
            require_once "config.php";
            $sql = "select *from user";
            
            $res=mysqli_query($link,$sql);
            while($row=mysqli_fetch_assoc($res))
            {
                $para= "\""."{$row['sno']}".","."{$row['name']}".","."{$row['email']}".","."{$row['balance']}"."\"";
                $mail= "\""."{$row['email']}"."\"";
                $sno= "\""."{$row['sno']}"."\"";
		$name= "\""."{$row['name']}"."\"";
		$balance= "\""."{$row['balance']}"."\"";
                echo "
                <tr class='text-center'>
                    <td>{$row['sno']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['balance']}</td>
                    <td><button class='btn btn-light text-dark' onclick='nextPage($sno,$name,$mail,$balance)'>Transfer</button></td>
                    </tr>
                ";

            }
            
        ?>

        <form action="transfer2.php" method="post" style="display: none;">
        <input type="text" name="art_id" id="art_txt"  style="display: none;">
        <input type="text" name="art_id1" id="art_txt1" style="display:none;">
        <input type="text" name="art_id2" id="art_txt2" style="display:none;">
        <input type="text" name="art_id3" id="art_txt3" style="display:none;">
        <input type="submit" name="submit" id="sub"  style="display: none;">
        </form>
        <script>
                        function nextPage(thisid1,thisid2,thisid3,thisid4)
                        {
                                                          
                               document.getElementById('art_txt').value=thisid1; 
                               document.getElementById('art_txt1').value=thisid2;
                               document.getElementById('art_txt2').value=thisid3;
                               document.getElementById('art_txt3').value=thisid4;  
                               document.getElementById('sub').click();
                            
                        }

                        </script>

       
</body>
</html>