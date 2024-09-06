<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/ItemList.css">
    <title>PineBook</title>
</head>
<body>
    <?php include("../../includes/navigationHeader.php"); ?>
    <!--ItemList-->
    <div class = "section_a">
        <section>
            <div class = "section-content">
                <header class = "section-header-row">
                <h1 class = "section-header-a"> PineBook </h1>
                    <div class = "section-header-b">
                    <p>If you can dream it,
                        <br>
                        PineBook can do it.</p>
                    </div>
                </header>
            </div>
        </section>
            <div class = "video-container">
                <video class = "presentation-video" src ="../../video/PineBook.mp4" autoplay loop muted></video>
            </div>
    </div>

     <div class = "section_b">
         <section>
            <div class = "section-content">
                <header class = "section-header-row">
                    <h1 class = "section-subheader"> Explore the line-up.</h1>
                </header>
            </div>
            <div class="itemList-container">
                <div class="products">
                    <div class="product hidden">
                        <img alt="PineBook" src="../../image/PineBook/PineBook King - 1.png"">
                        <h2>PineBook King <a>with SSSD</a></h2>
                        <p>Designed for heavy duty</p>
                        <div class="details">
                            <h3> From $2499 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PineBook" src="../../image/PineBook/PineBook Light - 1.png">
                        <h2>PineBook Lite <a>with SSD</a></h2> 
                        <p>Designed for light duty</p>
                        <div class="details">
                            <h3> From $1499 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </div>
    <section>
        <div class = "section-content">
            <header class = "section-header-row">
                <h1 class = "section-subheader"> Get to know PineBook.</h1>
            </header>
        </div>
    </section>
    <div class = "video-container">
        <video class = "presentation-video" src ="../../video/pBook.mp4" autoplay loop muted></video>
    </div>
    
    <script src = "../itemListJS.js"></script>
        
    <?php include('../../includes/footer.php'); ?>
</body>
</html>
