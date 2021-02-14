<link rel="stylesheet" href="css/edit.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/ef77410712.js" crossorigin="anonymous"></script>

<div class="section2">
     
    <nav>
        <div class="hamburger"> 
            <button>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </button>
            <ul class="nav-links">
                <li><a href="index.php">ADMIN<br>ADMIN</a></li>
                <li><a href="">PRODUCTS</a></li>
                <li><a href="">USERS</a></li>
                <li><a href="">ORDERS</a></li>
                <li><a href="">DISCOUNTS</a></li>
                <li><a href="">LOGOUT</a></li>
            </ul>

            
        </div>
        <h1>ADMIN DASHBOARD</h1>
        <img src="./img/logo.png">
    </nav>

    <div class="wrapper">
      <h1>Edit</h1>
      <form method="POST">
        <label >Item Name:</label><br>
        <input type="text" id="" name="" value="name1"><br>

        <label >Item Subtitle:</label><br>
        <input type="text" id="" name="" value="Subtitle1"><br>

        <label >Item Description:</label><br>
        <input type="text" id="" name="" value="Description1"><br>

        <label >Item Code:</label><br>
        <input type="text" id="" name="" value="Code1"><br>

        <label >Choose a Type:</label><br>
        <select class="select">
            <option value="Keyboard">Keyboard</option>
            <option value="Keyboard">Keyboard</option>
            <option value="Keycap">Keycap</option>
            <option value="Switch">Switch</option>
            <option value="Deskmat">Deskmat</option>
        </select>

        <br><label >Stocks:</label><br>
        <input type="text" id="" name="" value="Stocks1"><br>
        <div class="file-container">
          <label >Item Image: </label><br>
          <input type="file" class="photo-choose" name="" multiple="multiple"><br>
        </div>
        <!--<input type="file" id="" name="" value="" >
        <label for="file" class="photo-label">
          <i class="fas fa-images"></i>&nbsp;
          Choose Photo
        </label><br>-->
        <input type="button" value="Edit" onclick="window.location.href='items.php'">
      </form> 
    </div>
</div>