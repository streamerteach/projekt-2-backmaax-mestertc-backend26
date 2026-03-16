
<?php


$userid = $_SESSION['userid'];

$sql = "SELECT * FROM profiles WHERE id = ?";
$result = $conn -> prepare($sql);
$result -> execute([$userid]);
$row = $result->fetch();




function updateAccount($conn, $row){

    $realname = test_input($_REQUEST['realname']);
    $gender = test_input($_REQUEST['gender']);
    $email = test_input($_REQUEST['email']);
    $zipcode = test_input($_REQUEST['zipcode']);
    $salary = test_input($_REQUEST['salary']);
    $preference = test_input($_REQUEST['preference']);
    $bio = test_input($_REQUEST['bio']);


    if(password_verify(test_input($_REQUEST['password']), $row['passhash'])){
    $sql = "UPDATE `profiles` SET `realname` = ?, `gender` = ?, `zipcode` = ?, `bio` = ?, `salary` = ?, `preference` = ?, `email` = ? WHERE `profiles`.`id` = ?";
    $stmt= $conn-> prepare($sql);
    $stmt -> execute([$realname, $gender, $zipcode, $bio, $salary, $preference, $email, $_SESSION['userid']]);
    print("Your information was succesfully edited");
    header("Refresh:3; url=./index.php");
    }
}