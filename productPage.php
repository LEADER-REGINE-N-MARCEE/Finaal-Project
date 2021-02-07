<?php $itemCode = $_GET['itemCode'];
      $itemType = $_GET['itemType'];?>
<?php require('header.php')?>
<link rel="stylesheet" href="css/productPage.css">

    <div class="details-container" id="body">
    
    </div>

    <script type="text/javascript">
        let thumbnails = document.getElementsByClassName('thumbnail')

        let activeImages = document.getElementsByClassName('active')

        for (var i = 0; i < thumbnails.length; i++) {

            thumbnails[i].addEventListener('mouseover', function() {
                console.log(activeImages)

                if (activeImages.length > 0) {
                    activeImages[0].classList.remove('active')
                }


                this.classList.add('active')
                document.getElementById('featured').src = this.src
            })
        }
    </script>
    <script type="text/javascript">
        var itemCode = <?php echo json_encode($itemCode) ?>;
        var itemType = <?php echo json_encode($itemType) ?>;
    </script>
    <script src="./js/productPageAPI.js"></script>
<?php require('footer.php')?>