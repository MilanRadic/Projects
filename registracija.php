<!DOCTYPE html>
	<html>
	<head>
		<title>REGISTRACIJA</title>

        <link href="assets/img/l.png" rel="icon">

        <style>
            body{
                background: #1690A7;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            *{
                font-family: sans-serif;
                box-sizing: border-box;
            }
            form{
                width: 500px;
                border: 2px solid #ccc;
                padding: 30px;
                background: #fff;
                border-radius: 15px;
            }
            h2{
                text-align: center;
                margin-bottom: 40px;
            }
            input{
                display: block;
                border: 2px solid #ccc;
                width::95%;
                padding: 10px;
                margin: 10px auto;
                border-radius: 5px;
            }
            label{
                color: #888;
                font-size: 18px;
                padding: 10px;
            }
            button{
                float: right;
                background: #555;
                padding: 10px 15px;
                color: #fff;
                border-radius: 5px;
                margin-right: 10px;
                border: none;
            }
            button:hover{
                opacity: .7;
            }
            .error{
                background: #F2DEDE;
                color: #A94442;
                padding: 10px;
                width: 95%;
                border-radius: 5px;
                margin: 20px auto;
            }
            .success{
                background: #D4EDDA;
                color: #40754c;
                padding: 10px;
                width: 95%;
                border-radius: 5px;
                margin: 20px auto;
            }
            .ca{
                font-size: 14px;
                display: inline-block;
                padding:10px;
                text-decoration: none;
                color: #444;
            }
            .ca:hover{

                text-decoration: underline;
            }
            
        </style>
	</head>
	<body>
    <FORM action="preverjanje.php" method="post">  
            <H2>REGISTRACIJA</H2>

            <?php if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>
            

            <?php if(isset($_GET['success'])) {?>
                    <p class="success"><?php echo $_GET['success'];?></p>
            <?php } ?>

            <label>E-mail</label>
            <?php if(isset($_GET['email'])) {?>
                    <p class="error"></p>
                    <input type="email" 
                            name="email"               
                            placeholder="Vstavite e-mail" 
                            value="<?php echo $_GET['email'];?>"><br>
            <?php  }else{?>
                <input type="email" 
                        name="email" 
                        placeholder="Vstavite e-mail"><br>
            <?php } ?>

            <label>Geslo</label>
            <?php if(isset($_GET['password'])) {?>
                    <p class="error"></p>
                    <input type="password" 
                            name="password"               
                            placeholder="Vstavite geslo" 
                            value="<?php echo $_GET['password'];?>"><br>
            <?php  }else{?>
                <input type="password" 
                        name="password" 
                        placeholder="Vstavite geslo"><br>
            <?php } ?>

            <label>Ponovite Geslo</label>
            <?php if(isset($_GET['re_password'])) {?>
                    <p class="error"></p>
                    <input type="password" 
                            name="re_password"               
                            placeholder="E-mail" 
                            value="<?php echo $_GET['re_password'];?>"><br>
            <?php  }else{?>
                <input type="password" 
                        name="re_password" 
                        placeholder="Vstavite geslo"><br>
            <?php } ?>

            

            

           

            <button type="submit">PRIJAVA</button>
            <a href="login.php" class="ca">Ali že imate račun ?</a>

        </FORM>
        

	</body>
	</html>	