<link rel="stylesheet" href="css/contactUs.css">
<script src="https://kit.fontawesome.com/ef77410712.js" crossorigin="anonymous"></script>
<?php require('header.php')?>
<div class="section2">
	<div class="wrapper">
		<div class="left">
			<img src="./img/map.png">
		</div>
		<div class="right">
			<h1>Contact Us</h1>
			<div class="info">
				<div class="info0">
					<i class="fas fa-map-marker-alt"></i>
					<p>0231 Poblacion,<br>
					Bustos, Bulacan</p>
				</div>
				<div class="info1">
					<div>
						<i class="fas fa-phone-alt"></i>
						<p>(044) 766-2451</p>
					</div>
					<div>
						<i class="fas fa-envelope"></i>
						<p>info@keycorp.ph</p>
					</div>
				</div>
			</div>
			<form action="/action_page.php">
				
				
				<input class="name" type="text" placeholder="Name">
				<input class="email" type="text" placeholder="Email">
				<input class="message" type="text" placeholder="Message">
				<input class="send" type="submit" value="Send">
			</form> 

		</div>


	</div>
</div>
<?php require('footer.php')?>