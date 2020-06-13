<?php
$username = filter_input(INPUT_POST,'username');
$qualification = filter_input(INPUT_POST,'qualification');
$designation = filter_input(INPUT_POST,'designation');
$study = filter_input(INPUT_POST,'study');
$gender = filter_input(INPUT_POST,'gender');
$email = filter_input(INPUT_POST,'email');
$phoneCode = filter_input(INPUT_POST,'phoneCode');
$phone = filter_input(INPUT_POST,'phone');

if(!empty($username) || !empty($qualification) || !empty($designation) || !empty($study)  || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone))
{
$conn = new mysqli('localhost','root','','conference');
if($conn->connect_error)
{
    die('Connection failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into register(username,qualification,designation,study,gender,email,phoneCode,phone) values (? , ? , ? , ?, ? , ?, ?, ?)");
    $stmt->bind_param("ssssssii", $username,$qualification,$designation,$study,$gender,$email,$phoneCode,$phone);
    $stmt->execute();
    echo "Thank you for your registration.";
    $stmt->close();
    $conn->close();
}
}
else {
    echo "All fields are required";
    die();
}


/*if(!empty($username) || !empty($qualification) || !empty($designation) || !empty($study)  || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone))
    {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "conference"; 

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if(mysqli_connect_error())
        {
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        } else {
           
           // $SELECT ="SELECT email From register where email = ? Limit 1";
            //$INSERT = "INSERT Into register (username,qualification,designation,study,gender,email,phoneCode,phone) values (? , ? , ? , ?, ? , ?, ?, ?)";

            //data insertion
            $sql = "INSERT INTO register(username,qualification,designation,study,gender,email,phoneCode,phone) values ('$username' , '$qualification' , '$designation' , '$study' , '$gender', '$email' , '$phoneCode' , '$phone')";

            if($conn->query($sql)){
                echo "Thank you for your registration.";
             }
             else
             {
                 echo "Error:".$sql."<br>".$conn->error;
                echo "Someone already register using this email";
             }
             $conn->close();
            
           /* $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum=$stmt->num_rows();*/
        
            /*if($rnum==0)
            {
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssssssii",$username,$qualification,$designation,$study,$gender,$email,$phoneCode,$phone);
                $stmt->execute();
                echo "Thank you for your registration.";
            }
            else{
                echo "Someone already register using this email";
            }

            $stmt->close();
            $conn->close();
            */
      /*  }
     } else {
    echo "All fields are required";
    die();
}*/
?>