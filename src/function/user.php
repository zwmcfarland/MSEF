<?php
    include("function/Data_Source.php");

    function getUserInformation($userEmail = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT u.Id AS UserId,
                       p.Id AS ProjectId,
                       u.*,
                       p.*,
                       s.Id AS SchoolId,
                       s.Name AS SchoolName
                FROM users as u
                     LEFT OUTER JOIN studentProjects AS sp ON u.Id = sp.student_id
                     LEFT OUTER JOIN projects AS p ON sp.project_id = p.Id
                     LEFT OUTER JOIN login.users AS lu ON u.Email = lu.user_email
                     LEFT OUTER JOIN schools AS s ON u.school_id = s.id
                WHERE 1 = 1";

        if(!empty($userEmail) && $userEmail != NULL) {
            $sql .= " AND lu.user_email = '$userEmail'";
        }

        $qryUsers = mysql_query($sql);

        if(mysql_error()) {
            echo "SQL Error: " . mysql_error();
            exit;
        }

        mysql_close();
        return $qryUsers;
    }

    function createUser($userEmail) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "INSERT INTO users (Email)
                VALUES ('$userEmail');";

        $insUser = mysql_query($sql);

        if(mysql_error()) {
            echo "SQL Error: " . mysql_error();
            exit;
        }

        mysql_close();
        return $insUser;
    }
    
    function updateUser($userId, $firstName = "", $lastName = "", $email = "", $phoneNumber = "", $altPhoneNumber = "", $school = "", $grade = "", $address1 = "", $address2 = "", $city = "", $state = "", $zip = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "UPDATE users 
                SET FirstName = '$firstName', LastName = '$lastName', Email = '$email', 
                    PhoneNumber = '$phoneNumber', AltPhoneNumber = '$altPhoneNumber', school_id =  $school, 
                    Grade = $grade, Address1 = '$address1', Address2 = '$address2', City = '$city', State = '$state', Zip = '$zip'
                WHERE Id = $userId";

        $updUser = mysql_query($sql);

        if(mysql_error()) {
            echo "Failed to update user " . mysql_error();
            exit;
        }

        mysql_close();
        return $updUser;
    }
?>