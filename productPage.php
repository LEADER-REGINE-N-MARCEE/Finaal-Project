<?php
$itemCode = $_GET['itemCode'];
$itemType = $_GET['itemType'];
?>

<html>

<body>

    <div id="body"></div>


    <script type="text/javascript">
        var itemCode = <?php echo json_encode($itemCode) ?>;
        var itemType = <?php echo json_encode($itemType) ?>;
    </script>
    <script src="./js/productPageAPI.js"></script>
</body>

</html>