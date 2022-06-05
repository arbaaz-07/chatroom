<?php

    $room=$_POST['room'];
    

    

    if(strlen($room)<2 || strlen($room)>20){
        $message="please choose name between 2 to 20 characters";

        echo '<script type="text/javascript">';
        echo ' alert(" '.$message . '")';
        echo '</script>';
        echo '<script>';
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>';
    }

    else if(!ctype_alnum($room)){
        $message="please choose alphanumeric room name";

        echo '<script type="text/javascript">';
        echo ' alert(" '.$message . '")';
        echo '</script>';
        echo '<script>';
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>';
    }

    else{
        include 'db_connect.php';
    }


    $sql="SELECT * FROM `rooms` WHERE roomname='$room'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);

    if($row>0){
        echo '<script type="text/javascript">';
        echo ' alert("this room name is already claimed, please choose a different room name ")';
        echo '</script>';
        echo '<script>';
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>';
    }
    else{
        $sql="INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script type="text/javascript">';
            echo ' alert("your room is reay now you can chat")';
            echo '</script>';
            echo '<script>';
            echo 'window.location="http://localhost/chatroom/rooms.php?roomname='.$room.'";';
            echo '</script>';
        }
    }

   

?>