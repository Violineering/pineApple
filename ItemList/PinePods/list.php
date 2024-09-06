<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/ItemList.css">
    <title>PinePods</title>
</head>
<body>
    <?php include("../../includes/navigationHeader.php"); ?>
    <!--ItemList-->
    <div class = "section_a">
        <section>
                <div class = "section-content">
                    <header class = "section-header-row">
                    <h1 class = "section-header-a"> PinePods </h1>
                        <div class = "section-header-b">
                            <p>A magical connection 
                                <br>
                                to your devices.</p>
                        </div>
                    </header>
                </div>
        </section>
                <div class = "video-container">
                    <video class = "presentation-video" src ="../../video/PinePods.mp4" autoplay loop muted></video>
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
                        <img alt="PinePods" src="../../image/PinePods/PinePods Ultimate - 1.png">
                        <h2>PinePods <a>Ultimate</a></h2>
                        <p>Designed for best music experience </p>
                        <div class="details">
                            <h3> From $599 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePods" src="../../image/PinePods/PinePods Gen Z - 1.png">
                        <h2>PinePods <a>Gen Z</a></h2> 
                        <p>Designed for confortable and quality</p>
                        <div class="details">
                            <h3> From $299 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePods" src="../../image/PinePods/PinePods Gen Y - 1.png">
                        <h2>PinePods <a>Gen Y</a></h2>
                        <p>Affordable and reliable</p>
                        <div class="details">
                            <h3> From $149 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePods" src="../../image/PinePods/PinePods Gen X - 1.png">
                        <h2>PinePods <a>Gen X</a></h2> 
                        <p>This is where all it started...</p>
                        <div class="details">
                            <h3> From $49 </h3>
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
                <h1 class = "section-subheader"> Get to know PinePods.</h1>
            </header>
        </div>
    </section>
    <div class = "video-container">
        <video class = "presentation-video" src ="../video/pPods.mp4" autoplay loop muted></video>
    </div>
    
    <script src = "../itemListJS.js"></script>

    <?php include('../../includes/footer.php'); ?>

</body>
</html>