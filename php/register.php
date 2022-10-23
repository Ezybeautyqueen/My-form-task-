<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

userRegistration($username, $email, $password);

}

function userRegistration($username, $email, $password){
    //save data into the file
    $form_data = array(
   "fullname" => $username,
   "email" => $email,
    "password" => $password
    );
  
    // check if user exists
    if (checkUserStatus($email)){
        echo "User already exists";
    }else{
        // if user doesnt exist, insert the data into the file
        $file = fopen('../storage/users.csv',  'a');
        fputcsv($file,$form_data);
        // close file
        fclose($file);
        echo "User successfully registered";
        }

}

function checkUserStatus($email){
    $file = fopen('../storage/users.csv', 'r');
    while(!feof($file)){
        $line = fgetcsv($file);
        if($line[1] ==$email){
            return true;
        }
    }
    return false;
}

//  echo "HANDLE THIS PAGE";

?>