<!-- You can call this SIGNUP API via: https://todakapi.herokuapp.com/signupapi/signup.php     -->




<?php
        // DATABASE CONNECTION
        $con = mysqli_connect("us-cdbr-iron-east-01.cleardb.net","b5fa4cd1369827","2e0336cb","heroku_c04bc5b15b58b00");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
        // END OF DATABASE CONNECTION
     
            //function to generate the driver's id
            function unique_linka($length=10) {

                $string = '';
                // You can define your own characters here.
                $characters = "23456789ABCDEFHJKLMNPRTVWXYZ";
                 
                    for ($p = 0; $p < $length; $p++) {
                        $string .= $characters[mt_rand(0, strlen($characters)-1)];
                    }
                 
                    return $string;
             
             }
             // end of function to generate unique driver's id
            $ref = unique_linka(6); // driver's unique id generated
            $driver_id = "A2B-".$ref;           
            $password = unique_linka(10); // driver's unique password generated
        
            $form_data = array(
                'first_name'		=>	$_POST['first_name'],
                'last_name'		=>	$_POST["last_name"],
                'email'		=>	$_POST["email"],
                'phone_no'		=>	$_POST["phone_no"],
                'address'		=>	$_POST["address"],
                'driver_id'		=> $driver_id,
                'password'		=> $password
            );
            $fname = $form_data['first_name'];
            $lname = $form_data['last_name'];
            $email = $form_data['email'];
            $phone = $form_data['phone_no'];
            $address = $form_data['address'];
            $driver = $form_data['driver_id'];
            $pass = $form_data['password'];
            $query = "INSERT INTO driver_tbl (first_name,last_name,email,phone_no,driver_id,password,address) VALUES ('$fname','$lname','$email','$phone','$driver','$pass','$address')";
            
			$result = mysqli_query($con,$query) or die(mysqli_error());
            
            // IF DATA IS SUCCESFULLY INSERTED/REGISTERED INTO THE DATABASE, EXECUTE THE BELOW
            if($result){
			
			
				$data[] = array(
					'success'	=>	'200'
                );
                echo json_encode($data); 
            }
           
			// IF DATA NOT INSERTED EXECUTE THE BELOW
			else
			{
				$data[] = array(
					'success'	=>	'400'
                );
                echo json_encode($data); 
            }
           

?>

