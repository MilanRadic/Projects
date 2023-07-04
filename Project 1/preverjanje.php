<?php
            session_start();
            include "db_conn.php";

            if(isset($_POST['email']) && isset($_POST['password']) && 
                isset($_POST['email']) && isset($_POST['re_password'])) {
                function validate($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $email = validate($_POST['email']);
                $pass = validate($_POST['password']);
                $re_pass = validate($_POST['re_password']);                

                $user_data = 'email' . $email. '$re_password'. $re_pass;


                if(empty($email)){
                    header("Location: registracija.php?error=Potreben je email&$user_data");
                    exit();
                }
                else if(empty($pass)){
                    header("Location: registracija.php?error=Potrebna je koda&$user_data");
                    exit();
                }
                else if(empty($re_pass)){
                    header("Location: registracija.php?error=Potrebna je koda&$user_data");
                    exit();
                }
                else if($pass !== $re_pass){
                    header("Location: registracija.php?error=Gesli se ne ujemata&$user_data");
                    exit();
                }
                else{

    

                    $sql = "SELECT * FROM uporabniki WHERE email= '$email'";
                    
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        header("Location: registracija.php?error=E-mail je že zasedeno poskusi novega&$user_data");
                        exit();
                    }
                    else{
                        $sql2 = "INSERT INTO uporabniki(email, geslo) VALUES ('$email', '$pass')";
                        $result2 = mysqli_query($conn, $sql2);
                        if($result2){
                            header("Location: registracija.php?success=Usspešnoo ste končali vaš račun");
                            exit();
                        }
                        else{
                            header("Location: registracija.php?error=Napaka&$user_data");
                            exit();
                        }
                    }
                }
                
            }
            else{
                header("Location: preverjanje.php");
                exit();
            }
        ?>