<?php $itemCode = $_GET['itemCode'];
      $itemType = $_GET['itemType'];?>
<?php require('header.php')?>
<link rel="stylesheet" href="css/productPage.css">

    <div class="details-container" id="item-container">

    </div>
    <script type="text/javascript">
        var itemCode = <?php echo json_encode($itemCode) ?>;
        var itemType = <?php echo json_encode($itemType) ?>;
    </script>
    <script src="./js/productPageAPI.js"></script>
<?php require('footer.php')?>