<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Updated Info</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='icon' type='image/png' href='./images/logo.png'>
        <style>
            body{
                background-color:navajowhite;
                margin:0 auto;
            }
            div{
                background-color:navy;
                color:white;
                font-size:20px;
                font-family: monospace;
                width:40%;
                margin:10vh 30%;
                padding:15px;
                text-align:center;
            }
            a{
                all:unset;
                background-color:navy;
                color:navajowhite;
                padding:10px;
                border-radius:5px;
            }
        </style>
    </head>
    <body>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'flight_booking_data');
            if(isset($_POST['update'])){

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
            }
            if(isset($_GET['id'])) {
            $pid = $_GET['id'];
    
            $upd = "UPDATE `passenger data` SET `title`='$title',`f_name`='$fname',`l_name`='$sname',`email`='$email',`phone`='$phone',
            `contact`='$cphone',`passport_id`='$passid',`flight_type`='$flight_type',`departure_day`='$ddatetime',`arrival_day`='$rdatetime',
            `departing_from`='$from',`going_to`='$to',`flight_class`='$fclass',`amount`='$amount' WHERE pass_id='$pid'";

            $query1 = mysqli_query($conn, $upd);
            $msg;
            if($query1){
                $msg = "Updated successfully";
                $ticketid = $_REQUEST['passid'];
                $flightc = $_REQUEST['fclass'];

                    $flinfo = mysqli_query($conn, "UPDATE `flight_info` SET `flight_class`='$flightc',`ticket_id`='$ticketid', WHERE pass_id='$pid'");
                    if($flinfo){
                        $que= "SELECT * FROM `passenger data` WHERE pass_id='$pid'";
                        $query = mysqli_query($conn, $que);
                        if($rowd=mysqli_fetch_array($query)){
        ?>
        <div>
            <h1> <?php echo $msg ;  ?></h1>
             <?php
                    echo "<a href='review.php?id=".$rowd["pass_id"]."'>Form Preview</a>";
                    }else{
                        echo "Wrong";
                    }       
                }}
                }
            ?>
        </div>
    </body>
</html> -->