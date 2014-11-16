<?php
    include("function/Data_Source.php");

    function getUserInformation($userEmail = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT u.Id AS UserId,
                       p.Id AS ProjectId,
                       p.status_id AS ProjectStatusId,
                       p.Name AS ProjectName,
                       p.Electrical,
                       p.Description,
                       p.Abstract,
                       sc.Name AS ProjectStatus,
                       sc.Description AS ProjectStatusDescription,
                       u.*,
                       s.Id AS SchoolId,
                       s.Name AS SchoolName,
                       st.Name AS SecurityTypeName
                       
                FROM users as u
                     LEFT OUTER JOIN studentProjects AS sp ON u.Id = sp.student_id
                     LEFT OUTER JOIN projects AS p ON sp.project_id = p.Id
                     LEFT OUTER JOIN login.users AS lu ON u.Email = lu.user_email
                     LEFT OUTER JOIN schools AS s ON u.school_id = s.id
                     LEFT OUTER JOIN security_types AS st ON u.security_type_id = st.id
                     LEFT OUTER JOIN statuses AS sc ON p.status_id = sc.Id
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
    
    function updateUserParent($userId, $firstName = "", $lastName = "", $email = "", $phoneNumber = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "UPDATE users
                SET ParentFirstName  = '$firstName', ParentLastName  = '$lastName', ParentEmail  = '$email',ParentPhoneNumber  = '$phoneNumber'
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