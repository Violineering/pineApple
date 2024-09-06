<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/ItemList.css">
    <title>PinePhone</title>
</head>
<body>
    <?php include("../../includes/navigationHeader.php"); ?>

    <!--ItemList-->
    <div class = "section_a">
    <section>
        <div class = "section-content">
            <header class = "section-header-row">
            <h1 class = "section-header-a"> PinePhone </h1>
                <div class = "section-header-b">
                    <br>
                    <p>Designed to be loved.</p>
                </div>
            </header>
        </div>
    </section>
        <div class = "video-container">
            <video class = "presentation-video" src ="../../video/PinePhone.mp4" autoplay loop muted></video>
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
                        <img alt="PinePhone" src="../../image/PinePhone/PinePhone Pro Ultimate - 1.png">
                        <h2>PinePhone <a>Pro Ultimate</a></h2>
                        <p>Built for high performance</p>
                        <div class="details">
                            <h3> From $999 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePhone" src="../../image/PinePhone/PinePhone Pro Gamer - 1.png">
                        <h2>PinePhone <a>Pro Gamer</a></h2> 
                        <p>Optimized for gamers</p>
                        <div class="details">
                            <h3> From $799 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePhone" src="../../image/PinePhone/PinePhone Primitive - 1.png">
                        <h2>PinePhone <a>Primitive</a></h2>
                        <p>Affordable and reliable</p>
                        <div class="details">
                            <h3> From $699 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePhone" src="../../image/PinePhone/PinePhone Cutie - 1.png">
                        <h2>PinePhone <a>Cutie</a></h2> 
                        <p>Designed for womans</p>
                        <div class="details">
                            <h3> From $599 </h3>
                            <button value="itemDetails">Buy</button>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePhone" src="../../image/PinePhone/PinePhone OG - 1.png">
                        <h2>PinePhone <a>OG</a></h2> 
                        <p>This is where all it started...</p>
                        <div class="details">
                            <h3> From $299 </h3>
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
                    <h1 class = "section-subheader"> Get to know PinePhone.</h1>
                </header>
            </div>
        </section>
        <div class = "video-container">
            <video class = "presentation-video" src ="../../video/pPhone.mp4" autoplay loop muted></video>
        </div>

    <script src = "../itemListJS.js"></script>

    <?php include('../../includes/footer.php'); ?>

    </body>
</html>