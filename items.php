<link rel="stylesheet" href="css/items.css">
<script src="https://kit.fontawesome.com/ef77410712.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

<script src="./js/api.js"></script>
<div class="section2">

	<nav>
		<div class="hamburger">
			<button>
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</button>
			<ul class="nav-links">
				<li><a href="./admindashboard.html">ADMIN<br>ADMIN</a></li>
				<li><a href="./items.php">PRODUCTS</a></li>
				<li><a href="./admin_viewUsers.php">USERS</a></li>
				<li><a href="./admin_viewOrders.html">ORDERS</a></li>
				<li><a href="">DISCOUNTS</a></li>
				<li><a href="javascript:signout();">LOGOUT</a></li>
			</ul>


		</div>
		<h1>ADMIN DASHBOARD</h1>
		<img src="./img/logo.png">
	</nav>
	<div class="wrapper">
		<div class="list-table">
			<div>
				<h1>List of Item</h1>
				<a href="create.php">
					<button>
						<i class="fas fa-plus"></i>
						<p>ADD</p>
					</button>
				</a>
			</div>
			<table id="viewProductsTable">
				<tr>
					<th>Item name</th>
					<th>Item Code</th>
					<th>Stocks</th>
					<th>Action</th>
				</tr>


			</table>
		</div>

	</div>
</div>

<script src="./js/signoutAPI.js"></script>
<script src="./js/admin_viewProductsAPI.js"></script>