<?php

$servername= "localhost";
$username = "root";
$password = "";
$db = "robotbase";

$conn = new mysqli ($servername, $username, $password, $db);

if ($conn->connect_error) {

    die ("Connection failed: " . $conn->connect_error);

}

$default = "UPDATE control_base SET isActive = DEFAULT";

        if ($conn->query($default) === TRUE)
        {

            $sql = "UPDATE control_base Set isActive= TRUE WHERE direction ='Right'";

            if ($conn->query($sql) === TRUE)
            {

            $direction = "SELECT direction FROM control_base WHERE isActive = TRUE";
            $result = $conn->query($direction);

                    if ($result->num_rows > 0) 
                    {

                        while($row = $result->fetch_assoc()) 
                        {
                            echo $row["direction"];   
                        }
                        
                    }    

            }

            else 
            {
                "Error" . $conn->error;
            }

        } 

        else 
        {
            "Error updating records" . $conn->error;
        }

$conn->close();
?>