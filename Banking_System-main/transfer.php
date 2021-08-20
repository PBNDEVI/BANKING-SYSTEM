<?php
            require_once "config.php";
            if(isset($_POST["submit"]))
            {
                $sender=$_POST["sender"];
     
                $receiver=$_POST["receiver"];
               
                $amount=$_POST["amount"];
              
                $err = 0;
                $sender_err= $rec_err = $amount_err= $same_names = $amount_less = "";
                if($sender == $receiver)
                {
                    $err = 1;
                    $same_names = "same";
                }

                $sql="select email from user where email='$sender'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                if(!$row)
                {
                    $err = 1;
                    $sender_err = "sender not exists";
                }

                $sql="select email from user where email='$receiver'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                if(!$row)
                {
                    $err =1;
                    $rec_err = "receiver not exists";
                }

                $sql="select balance from user where email='$sender'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                $sender_balance = 0;
                if($row)
                {
                    $sender_balance=$row['balance'];
                }
                if($amount<0 || $amount=='')
                {
                    $err = 1;
                    $amount_err = "please enter amount greater than 0";
                }
                else if($amount>$sender_balance)
                {
                    $err = 1;
                    $amount_err = "insufficient balance";
                }
                if($err == 0)
                {
                    $sql="select balance from user where email='$receiver'";
                    $res=mysqli_query($link,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $rec_balance=$row['balance']+$amount;

                    
                    $sender_balance=$sender_balance-$amount;

                    $sql="update user set balance='$sender_balance' where email='$sender'";
                    $res=mysqli_query($link,$sql);
                    

                    $sql="update user set balance='$rec_balance' where email='$receiver'";
                    $res=mysqli_query($link,$sql);
                    

                    $sql  = "insert into transaction(sender,receiver,amount) values('$sender','$receiver','$amount')";
                    $res = mysqli_query($link,$sql);
                    
                    echo " <script>alert('Transcation Successful...');location.href='history.php';</script>";
                }
                else{
                    echo "<script>
                    let x = '';
                    if('$same_names' !='')
                    {
                        x += '$same_names';
                    }
                    if('$sender_err' !='')
                    {
                        if(x!='')
                            x += ' and $sender_err';
                        else
                            x += '$sender_err';
                    }
                    if('$rec_err' !='')
                    {
                        if(x!='')
                            x += ' and $rec_err';
                        else
                            x += '$rec_err';
                    }
                    if('$amount_err' !='')
                    {
                        if(x!='')
                            x += ' and $amount_err';
                        else
                            x += '$amount_err';
                    }
                    alert(x)</script>";
                }
            }
            
        ?>
