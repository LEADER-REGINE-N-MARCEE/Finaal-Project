<?php 
$itemType = $_GET['itemType'];
require('header.php')?>
<link rel="stylesheet" href="css/keyboard.css">

    <div class="section2">
        <div class="wrapper">

            <div class="types">
                <a href="products.php?itemType=KB" class="keyboard">Keyboard</a>
                <a href="products.php?itemType=KC" class="keycaps">Keycaps</a>
                <a href="products.php?itemType=SW" class="switches">Switches</a>
                <a href="products.php?itemType=DM" class="deskmat">Deskmat</a>

            </div>


            <div class="search-filter">
                <form class="form1">
                    <div class="label1">
                        <label class="search1">Search</label>
                        <input class="search" type="text">
                        

                    </div>
                    <div class="input">
                        <label class="filter1">Filter</label>
                        <input class="filter" type="text">
                    </div>
                </form>
            </div>


            <div class="item-container" id="itemcontainer">
                    
            </div>

        </div>
    </div>
    <script type="text/javascript">var itemType = "<?php echo $itemType ?>";</script>
    <script src="js/productAPI.js"></script>    
<?php require('footer.php')?>
