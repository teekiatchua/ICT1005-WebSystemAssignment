<html>
    <head>
        <title>TUMMY FOR YUM-YUM</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/process_contact.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>   
    </head>

    <body>   
        <?php
            include "navbar.inc.php";
        ?>
        
        <article class="formvalidateOutput">
            <?php
                    // Constants for accessing our DB:
            define("DBHOST", "161.117.122.252"); 
            define("DBNAME", "p2_5"); 
            define("DBUSER", "p2_5"); 
            define("DBPASS", "rBs4CTxkDU");  
            $contactName = $email = $contactPhoneNumber = $contactMessage = $errorMsg = "";
            $success = true; 

            if (empty($_POST["contactName"])) {
                $errorMsg .= "First name is required.<br>";     
                $success = false; 
            } else {
                $contactName = sanitize_input($_POST["contactName"]); 
                if (!preg_match("/^([a-zA-Z]+)$/", $contactName)) {
                    $errorMsg .= "Please enter a proper first name.<br>";     
                    $success = false; 
                }
            }
            
            if (empty($_POST["email"])) {     
                $errorMsg .= "Email is required.<br>";     
                $success = false; 
            } else {     
                $email = sanitize_input($_POST["email"]); // Additional check to make sure e-mail address is well-formed.     
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {         
                    $errorMsg .= "Invalid email format.<br>";         
                    $success = false;       
                }
            }
            
            if (empty($_POST["contactPhoneNumber"])) {
                $errorMsg .= "Contact number is required.<br>";     
                $success = false; 
            } else {
                $contactPhoneNumber = sanitize_input($_POST["contactPhoneNumber"]); 
                if (!preg_match("/^([0-9]{8})$/", $contactPhoneNumber)) {
                    $errorMsg .= "Please enter a valid number.<br>";     
                    $success = false; 
                }
            }
            
            if (empty($_POST["contactMessage"])) {
                $errorMsg .= "Feed back is required.<br>";     
                $success = false; 
            } else {
                $contactMessage = sanitize_input($_POST["contactMessage"]); 
                if (!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $contactMessage)) {
                    $errorMsg .= "Please enter a valid comment.<br>";     
                    $success = false; 
                }
            }

            if ($success) {     
                echo "<h1>Thank you for your feedback!</h1>";
                echo "<p>We will get back to you as soon as possible.</p>";
                echo "<p>Have a nice day.</p>";
                header('Refresh:2; url=index.php');
                saveMemberToDB();          
            } else {    
                echo '<script>alert("Please check your form and submit again."); </script>';
                header('Location: about_contact.php');
            } 
            
            //Helper function that checks input for malicious or unwanted content. 
            function sanitize_input($data) {   
                $data = trim($data);   
                $data = stripslashes($data);   
                $data = htmlspecialchars($data);   
                return $data; 
            }
            
            function saveMemberToDB() {  
                global $contactName, $email, $contactPhoneNumber, $contactMessage, $errorMsg; 
                // Create connection     
                $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                // Check connection     
                if ($conn->connect_error) {            
                    $errorMsg = "Connection failed: " . $conn->connect_error;                               
                } else {         
                    $sql = "INSERT INTO customer_enquiries (name, email, mobileNumber, enquiryMessage)";         
                    $sql .= " VALUES ('$contactName', '$email', '$contactPhoneNumber', '$contactMessage')"; 
                    $compile = $conn->prepare("INSERT INTO customer_enquiries (name, email, mobileNumber, enquiryMessage) VALUES (?, ?, ?, ?)");
                    $compile->bind_param("ssis", $contactName, $email, $contactPhoneNumber, $contactMessage);
                    $compile->execute();
                    $compile->close();
                }  
                $conn->close();
                } 
            ?> 
            
        </article>
        
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>

