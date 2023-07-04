<!DOCTYPE html>
	<html>
	<head>
		<title>LOGIN</title>

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
                color: 10px;
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
    <FORM action="login2.php" method="post">  
            <H2>LOGIN</H2>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

            <label>E-mail</label>
            <input type="email" name="email" placeholder="E-mail"><br>

            <label>Geslo</label>
            <input type="password" name="password" placeholder="Geslo"><br>

            <button type="submit">PRIJAVA</button>
            <a href="registracija.php" class="ca">Ustvarite račun</a>


        </FORM>
        

	</body>
	</html>	