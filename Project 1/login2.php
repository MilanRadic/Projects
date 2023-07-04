<?php
            session_start();
            include "db_conn.php";

            if(isset($_POST['email']) && isset($_POST['password'])) {
                function validate($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $email = validate($_POST['email']);
                $pass = validate($_POST['password']);
                if(empty($email)){
                    header("Location: login.php?error=Potreben je email");
                    exit();
                }
                else if(empty($pass)){
                    header("Location: login.php?error=Potrebna je koda");
                    exit();
                }
                else{

                    $sql = "SELECT * FROM uporabniki WHERE email= '$email' AND geslo='$pass'";
                    
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) === 1)
                    {
                        $row = mysqli_fetch_assoc($result);
                        if($row['email'] === $email && $row['geslo'] === $pass)
                        {
                            $SESSION['email'] = $row['email'];
                            $SESSION['ime'] = $row['ime'];
                            $SESSION['id'] = $row['id'];
                            header("Location: index.php");
                            exit();
                        }                   
                        else
                        {
                            header("Location: login.php?error=Napačen e-mail ali geslo");
                            exit();
                        }      
                    }
                    else
                    {
                        header("Location: login.php?error=Napačen e-mail ali geslo");
                        exit();
                    }
                }
                
            }
            else{
                header("Location: login2.php");
                exit();
            }
        ?>