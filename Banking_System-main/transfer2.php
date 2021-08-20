<html>
    <head>
        <title>Money Transfer</title>
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
            }
	    table
            {
                   border : 2px solid white; 
                   border-collapse:collapse;
                   box-sizing: border-box;
                   margin: 0;
                   margin-left:32%;
                   width:500px;
                   height:100px;
                   background-color:midnightblue;
                   color:white;
                   padding: 0;
            }
            td,th
            {
             border:2px solid white; font-weight:bold; text-align:center;}
           .form-control,input{
                margin:20px 0;
                border-radius:20px;
            }

            a{
                text-decoration:none;
                margin:10px;
                color:white;
                font-weight:bolder;
            }
            
            .d-flex h1, .d-flex div{
                width:33%;
            }

            .mx-auto{
                
                box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
            
            }
            .btn{
                background:midnightblue;
            }
           
            
        </style>
    </head>
    
    <body style="background:#e4ebe9">
        <div class="w-100 p-4 d-flex justify-content-between" style="background:midnightblue; font-style:TimesNewRoman; color:white">
        <h1 class="ml-4">Money Transfer</h1>
        <div class="d-flex justify-content-end align-self-center">
            <a href="index.php">Home</a>
            <a href="users.php">Customers</a>
            <a href="history.php">History</a>
        </div>
    </div>
    <table> <center><h1 style="font-size:30px;">Sender Details<h1></center><br>
	    <center><tr> <th> ID </th> <th> Name </th> <th> Email </th> <th> Balance </th></center>
            <cemter><tr> <td> <?php
        		require_once "config.php";
                        $sno=$_POST["art_id"];
                        echo $sno;
                        ?> </td>
                  <td> <?php
        		require_once "config.php";
                        $name=$_POST["art_id1"];
                        echo $name;
                        ?> </td>
                  <td> <?php
        		require_once "config.php";
                        $sender=$_POST["art_id2"];
                        echo $sender;
                        ?> </td>
                  <td> <?php
        		require_once "config.php";
                        $balance=$_POST["art_id3"];
                        echo $balance;
                        ?> </td> </tr> </center> </table> 

                 <div class="container mt-5">
                    <form action="transfer.php" method="post" autocomplete="off" class="w-50 p-3 mx-auto bg-light">
                    <?php require_once "config.php";
                          $sender=$_POST["art_id2"];
			  echo "<input type='text' class='form-control w-75 mx-auto'  id='sender' name='sender' value='$sender' style='display:none;'> "; ?>
                    <input type="text" class="form-control w-75 mx-auto" placeholder="Recipient Id" id="receiver" name="receiver">
                    <input type="text" class="form-control w-75 mx-auto" placeholder="Enter Amount" id="amount" name="amount">
                    <center>
                    <input type="submit" class="form-control btn w-75 text-light" value="Transfer Money" name="submit">
                    </center>
                
            </form>
    
        </div>
      