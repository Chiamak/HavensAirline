<?php
    $conn = mysqli_connect('localhost', 'root', '', 'flight_booking_data');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ticket Preview</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='icon' type='image/png' href='./images/logo.png'>
    <style>
        body{
            margin:0 auto;
            background-color:navy;
        }
        .div1{
            width:50%;
            padding:10px;
            background-color:skyblue;
            margin:10vh 25%;
            border-radius:5px;
        }
        h1{
            color:white;
            font-family:monospace;
            font-size:30px;
            text-align:center;
        }
        table{
            border-collapse:collapse;
            padding: 10px;
            text-align:center;
            width:70%;
            margin: 2% 15%;
        }
        table td, th{
            border:2px solid darkblue;
            padding:5px;
            font-family:cursive;
            font-size:15px;
            color: white;
        }
        th{
            font-family:monospace;
            font-size:18px;
            color:navy;
        }
    </style>
</head>
<body>
    <div class="div1">
        <h1>HAVENS AIRLINE TICKET</h1>
            <?php
                if (isset($_GET['id'])) {
                    $pid = $_GET['id'];
                    $sql  = "SELECT * FROM `flight_info` WHERE pass_id='$pid'";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }else{
                        if ($row1 = mysqli_fetch_array($result)) {     
            ?>
        <table>
            <tr>
                <th>Seat Number</th>
                <td><?php echo $row1['seat_number']; ?></td>
            </tr>
            <tr>
                <th>Flight_class</th>
                <td><?php echo $row1['flight_class']; ?></td>
            </tr>
            <tr>
                <th>Payment Status</td>
                <td><?php  echo $row1['payment_status']; ?></td>
            </tr>
            <tr>
                <th>Ticket Id</th>
                <td><?php echo $row1['ticket_id']; ?></td>
            </tr>
            <?php
                }
            }
                $sql2 = "SELECT * FROM `passenger data` WHERE pass_id='$pid'";
                $result2 = mysqli_query($conn, $sql2);
                if (!$result2) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                }else{
                    if($row2 = mysqli_fetch_array($result2)){
            ?>
            <tr>
                <th>Flight_type</th>
                <td><?php echo $row2['flight_type']; ?></td>
            </tr>
            <tr>
                <th>Departure (Date/Time)</th>
                <td><?php echo $row2['departure_day']; ?></td>
            </tr>
            <tr>
                <th>Return (Date/Time)</th>
                <td><?php echo $row2['arrival_day']; ?></td>
            </tr>
            <tr>
                <th>From</th>
               <td><?php echo $row2['departing_from']; ?></td>
            </tr>
            <tr>
                <th>To</th>
                <td><?php echo $row2['going_to']; ?></td>
            </tr>
            <tr>
                <th>Flight_type</th>
                <td><?php echo $row2['flight_type']; ?></td>
            </tr>
            <tr>
                <th>Amount</th>
                <td><?php echo $row2['amount']; ?></td>
            </tr>
        </table>
            <?php 
                echo "<a href='index.php?id=".$row2["pass_id"]."'>Edit</a>";
                    }}
                }
            ?>
    </div>
</body>
</html>