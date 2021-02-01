<?php
$itemCode = $_GET['itemCode'];
?>

<html>
<body>

<div id="body"></div>


<script type="text/javascript">var itemCode = <?php echo json_encode($itemCode) ?>;</script>
<script src="./js/productPage.js"></script>
</body>

</html>