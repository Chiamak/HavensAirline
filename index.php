<?php
     $conn = mysqli_connect('localhost', 'root', '', 'flight_booking_data');
     $title = '';
     $fname = '';
     $sname = '';
     $email = '';
     $phone = '';
     $cphone = '';
     $passid = '';
     $flight_type = '';
     $ddatetime ='';
     $rdatetime = '';
     $from = '';
     $to = '';
     $fclass ='';
     $amount = ''; 
    $err = ""; 
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        if(empty($_POST['fname']) || empty($_POST['sname']) || empty($_POST['tel']) || empty($_POST['ctel'])
        || empty($_POST['email']) || empty($_POST['passid']) || empty($_POST['flight']) || empty($_POST['ddatetime'])
        || empty($_POST['fclass']) || empty($_POST['tplace']) || empty($_POST['fplace']) || empty($_POST['amount'])){
            $err = "All fields are Required except return data& time";
        }else{
            $title = test_input($_POST['title']);
            $fname = test_input($_POST['fname']);
            $sname = test_input($_POST['sname']);
            $em = $_POST['email'];
            if($em){
                if(filter_var($em, FILTER_VALIDATE_EMAIL)){
                   $email = test_input($em); 
                }else{
                    $err = "Invalid email";
                }
            }
            $passlen = strlen($_POST['passid']);
            if ($passlen != 10) {
                $err = "Pssport id must be 10";
                $passid = $err;
            }else{
                $passid = test_input($_POST['passid']);
            }
            $phone = test_input($_POST['tel']);
            $cphone = test_input($_POST['ctel']);
            $flight_type = test_input($_POST['flight']);
            $ddatetime =test_input($_POST['ddatetime']);
            $rdatetime = isset($_POST['rdatetime']) ? test_input($_POST['rdatetime']): '';
            $from = test_input($_POST['fplace']);
            $to = test_input($_POST['tplace']);
            $fclass = test_input($_POST['fclass']);
            $amount = test_input($_POST['amount']);  
        }
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data =htmlspecialchars($data);
        return $data;   
    }
    if (isset($_POST['submit'])) {
        include 'submit.php';
    }
    ?>          

<?php include 'header.php'; ?>
        <div class="div1">
           <div class="booking-form">
                <h1>FLIGHT RESERVATION</h1>
                <p>Please make sure that you fill the name on your passport</p>
                <p><?php echo $err; ?></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" method="POST">
                    <fieldset class="passenger">
                        <legend>Passenger Details</legend>
                        <div class="passenger-title">
                         <input type="text" name="title" id="title" value="<?php echo $title; ?>">
                         <input type="text" name="fname" id="f.name" value="<?php echo $fname; ?>" required>
                         <input type="text" name="sname" id="s.name" value="<?php echo $sname; ?>" required>
                        </div>
                        <div class="passenger-title-label">
                            <label for="title">Title</label>
                            <label for="fname">First Name</label>
                            <label for="sname">Last Name</label>  
                        </div>
                        <div class="passenger-infos">
                           <label for="email">Email</label><br>
                            <input type="email" name="email" id="email" value="<?php echo $email; ?>" required><br>
                            <label for="tel">Phone</label><br>
                            <input type="tel" name="tel" id="tel" maxlength="11" value="<?php echo $phone; ?>"><br>
                            <label for="ctel">Contact Phone</label><br>
                            <input type="ctel" name="ctel" id="ctel" maxlength="11" value="<?php echo $cphone; ?>"><br>
                            <label for="passid">Passport ID</label><br>
                            <input type="text" name="passid" id="passid" value="<?php echo $passid ?>" required>
                        </div>
                    </fieldset>
                    <fieldset class="flight">
                        <legend>Flight Details</legend>
                        <div class="flight-type">
                            <input type="radio" name="flight" value="Int-flight" id="iflight" value="<?php echo $flight_type; ?>">
                            <label for="iflight">International Flight</label><br>
                            <input type="radio" name="flight" value="Dom-flight" id="dflight" value="<?php echo $flight_type; ?>"> 
                            <label for="dflight">Domestic Flight</label>
                        </div>
                        <div id="departure">
                            <label for="depart">Departure Date & Time &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="ret">Return Date & Time</label>
                        </div>
                        <div id="return">
                            <input type="datetime-local" name="ddatetime" id="depart" value="<?php echo $ddatetime; ?>">
                            <input type="datetime-local" name="rdatetime" id="ret" value="<?php echo $rdatetime; ?>">
                        </div>
                        <div id="from">
                            <label for="from">From</label>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="to">To</label>
                        </div>
                        <div id="to">
                            <input type="text" name="fplace" id="from" placeholder="State or Country" value="<?php echo $from; ?>">
                            <input type="text" name="tplace" id="to" placeholder="State or Country" value="<?php echo $to; ?>">
                        </div>
                        <label for="fclass">Flight Class</label><br>
                        <div class="fclass">
                            <select id="fclass" onchange="seeAmount()" name="fclass" >
                                <option value="<?php echo $fclass; ?>">..</option>
                                <option value="First Class">First Class</option>
                                <option value="Business Class">Business Class</option>
                                <option value="Economy">Economy</option>
                            </select><br>
                            <label for="amt">Amount <br> $<input id="amt" name="amount" value="<?php echo $amount; ?>"></label>
                        </div>
                        <button id="btn" type="button" onclick="showCode()">Make Payment</button>
                        <input type="text" name="code" id="code" value="" required><br><br>
                    </fieldset>   
                    <button type="submit" id="btn" name="submit">Book Now</button>
                </form>
                <!-- <?php echo $btn; ?> -->
            </div> 
<?php include 'footer.php'; ?>