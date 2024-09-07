<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel ='stylesheet' href = '../../css/ItemList.css'>
    <title>PinePad</title>
</head>
<body>
    <?php include('../../includes/navigationHeader.php'); ?>
    <!--ItemList-->
    <div class = "section_a">
        <section>
            <div class = "section-content">
                <header class = "section-header-row">
                <h1 class = "section-header-a"> PinePad </h1>
                    <div class = "section-header-b">
                        <p>Touch, draw and type
                            <br>
                            on one magical device.</p>
                    </div>
                </header>
            </div>
        </section>
            <div class = "video-container">
                <video class = "presentation-video" src ="../../video/PinePad.mp4" autoplay loop muted></video>
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
                        <img alt="PinePad" src="../../image/PinePad/PinePad Pro - Black 1.png">
                        <h2>PinePad <a>Pro</a></h2>
                        <p>Built for high performance</p>
                        <div class="details">
                            <h3> From $1299 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePad" src="../../image/PinePad/PinePad Gamer - 1.png">
                        <h2>PinePad <a>Gamer</a></h2> 
                        <p>Optimized for gamers</p>
                        <div class="details">
                            <h3> From $999 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePad" src="../../image/PinePad/PinePad Smol - 1.png">
                        <h2>PinePad <a>Smol</a></h2>
                        <p>Pocket-sized PinePad, easily portable</p>
                        <div class="details">
                            <h3> From $899 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePad" src="../../image/PinePad/PinePad OG - 1.png">
                        <h2>PinePad <a>OG</a></h2> 
                        <p>This is where all it started...</p>
                        <div class="details">
                            <h3> From $699 </h3>
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
                <h1 class = "section-subheader"> Get to know PinePad.</h1>
            </header>
        </div>
    </section>
    <div class = "video-container">
        <video class = "presentation-video" src ="../../video/pPad.mp4" autoplay loop muted></video>
    </div>

    <script src = "../itemListJS.js"></script>
    
    <?php include('../../includes/footer.php'); ?>
</body>
</html>