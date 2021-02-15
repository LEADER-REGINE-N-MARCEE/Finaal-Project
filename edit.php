<link rel="stylesheet" href="css/edit.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/ef77410712.js" crossorigin="anonymous"></script>
<script src="./js/api.js"></script>
<div class="section2">

  <nav>
    <div class="hamburger">
      <button>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </button>
      <ul class="nav-links" id="nav-links">

      </ul>


    </div>
    <h1>ADMIN DASHBOARD</h1>
    <img src="./img/logo.png">
  </nav>

  <div class="wrapper">
    <h1>Create</h1>
    <form method="POST">
      <label>Item Name:</label><br>
      <input type="text" id="" name="itemName" placeholder="Enter Name"><br>

      <label>Item Subtitle:</label><br>
      <input type="text" id="" name="subtitle" placeholder="Enter Subtitle"><br>

      <label>Item Description:</label><br>
      <input type="text" id="" name="descriptions" placeholder="Enter Description"><br>

      <label>Price:</label><br>
      <input type="text" id="" name="price" placeholder="Enter Price"><br>

      <label>Item Code:</label><br>
      <input type="text" id="" name="itemCode" placeholder="Enter Code"><br>

      <label>Choose a Type:</label><br>
      <select class="select" name="itemType">
        <option value="KB">Keyboard</option>
        <option value=KC">Keycap</option>
        <option value="SW">Switch</option>
        <option value="DM">Deskmat</option>
        <option value="GB">Group Buy</option>
      </select>

      <br><label>Stocks:</label><br>
      <input type="text" id="" name="quantity" placeholder="Enter Stocks"><br>
      <div class="file-container">
        <label>Item Image: </label><br>
        <input type="file" class="photo-choose" name="" multiple="multiple"><br>
      </div>
      <!--<input type="file" id="" name="" value="" >
        <label for="file" class="photo-label">
          <i class="fas fa-images"></i>&nbsp;
          Choose Photo
        </label><br>-->
      <input type="button" value="Create" id="btnCreate">
    </form>
  </div>
</div>

<script src="./js/admin_addProductsAPI.js"></script>