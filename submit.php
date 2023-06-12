<?php
    $conn = mysqli_connect('localhost', 'root', '', 'flight_booking_data');    
    if(isset($_POST['submit'])){ 
        $title = $_POST['title'];
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $email = $_POST['email'];
        $phone = $_POST['tel'];
        $cphone = $_POST['ctel'];
        $passid = $_POST['passid'];
        $flight_type = $_POST['flight'];
        $ddatetime =$_POST['ddatetime'];
        $rdatetime = isset($_POST['rdatetime']) ? $_POST['rdatetime'] : '';
        $from = $_POST['fplace'];
        $to = $_POST['tplace'];
        $fclass = $_POST['fclass'];
        $amount = $_POST['amount'];   

        $query = mysqli_query($conn, "INSERT INTO `passenger data`(`title`, `f_name`, `l_name`, `email`, `phone`, `contact`, `passport_id`, `flight_type`, `departure_day`, `arrival_day`, `departing_from`, `going_to`, `flight_class`, `amount`) 
        VALUES ('$title','$fname','$sname','$email','$phone','$cphone','$passid','$flight_type','$ddatetime','$rdatetime','$from','$to','$fclass','$amount')");

        $msg;
        $paystatus = isset($_POST['code']) ? 'paid' : 'not paid';
        if($query && $paystatus){
                $msg= 'Your Transaction is Successful!!';
                $em = $_REQUEST['email'];
                $snumber = rand(1,100);
                $ticketid = $_REQUEST['passid'];
                $flightc = $_REQUEST['fclass'];
                // $paystatus = $paystatus;
                $getid = mysqli_query($conn, "SELECT `pass_id` FROM `passenger data` WHERE email='$em'");
                $row = mysqli_fetch_assoc($getid);
                $pass_id=$row['pass_id'];
                
                $finfo = mysqli_query($conn, "INSERT INTO `flight_info`(`seat_number`, `flight_class`, `payment_status`, `ticket_id`, `pass_id`) 
                        VALUES ('$snumber','$flightc','$paystatus','$ticketid', '$pass_id')");
                $mess;        
            if($finfo){
                    $que= "SELECT `pass_id` FROM `passenger data` WHERE email='$em'";
                    $query = mysqli_query($conn, $que);
                    if($rowe=mysqli_fetch_array($query)){ 
                        $mess ='<a href="review.php?id='.$rowe["pass_id"].'">Form Preview</a>'; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge, chrome=1'>
    <title>Ticket Preview</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='icon' type='image/png' href='./images/logo.png'>
    <style>
        .container{
            display:none;
        }
        .div2{
            background-color:navajowhite;
            color:navy;
            font-size:20px;
            font-family: monospace;
            width:40%;
            margin:10vh 30%;
            padding:15px;
            text-align:center;
        }
        a{
            all:unset;
            background-color:navajowhite;
            color:navy;
            padding:10px;
            border-radius:5px;
        }
    </style>
</head>
<body>
    <div class="div2">
        <h1><?php echo $msg; ?></h1>
        <?php echo $mess;
                }else{
                            printf("Error: %s\n", mysqli_error($conn));
                        exit();
                        }
                }else{
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                }
                            // print($email);
            }else{
                $msg= 'Review data again';
            }
            }    
         ?>
    </div>
</body>
</html>