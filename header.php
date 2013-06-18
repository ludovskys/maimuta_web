<?php

	if(isset($_POST["pseudo"]) || isset($_POST["pseudo"]))
	{
		$pseudo = $_POST["pseudo"];
		$password = $_POST["password"];
	
		if(($pseudo == "antoine") && ($password == "antoine"))
		{
			$_SESSION["connecte"] = "ok";
			$_SESSION["user"] = $pseudo;
			header('Location: main_page.php');  
		}
		else
		{
			echo('
					<div id="box-connection" >
						<form id="form" method="post" action="index.php">
							<input class="connect" name="pseudo" type="text" value="Pseudo" size="20" onclick=if(this.value=="Pseudo"){this.value=""} onBlur=if(this.value==""){this.value="Pseudo"} />
							<input class="connect" name="password" type="password" value="Password" size="20" onclick=if(this.value=="Password"){this.value=""} onBlur=if(this.value==""){this.value="Password"} />
							<input id="valid" type="submit" value="Connexion" />
						</form>
					</div>
					<div id="wrong-connection">
						<span style="color:red;">Mauvais pseudo ou mot de passe !</span>
					</div>
				');
		}
	}
	else
	{
		echo('	
				<div id="box-connection" >
					<form id="form" method="post" action="index.php">
						<input class="connect" name="pseudo" type="text" value="Pseudo" size="20" onclick=if(this.value=="Pseudo"){this.value=""} onBlur=if(this.value==""){this.value="Pseudo"} />
						<input class="connect" name="password" type="password" value="Password" size="20" onclick=if(this.value=="Password"){this.value=""} onBlur=if(this.value==""){this.value="Password"} />
						<input id="valid" type="submit" value="Connexion" />
					</form>
				</div>
			');
	}

?>	