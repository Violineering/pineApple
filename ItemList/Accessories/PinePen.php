<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/NavigationHeader.css">
    <link rel="stylesheet" href="../../css/ItemList.css">
    <link rel="stylesheet" href="../../css/Popup.css">
    <title>PinePen</title>
</head>
<body>
    <?php include('../items_addToCart.php') ?>

    <!--ItemList-->
    <div class = "section_a">
        <section>
            <div class = "section-content">
                <header class = "section-header-row">
                <h1 class = "section-header-a"> PinePen </h1>
                    <div class = "section-header-b">
                        <p>Pen Pineapple,
                            <br>
                            no more pending.</p>
                    </div>
                </header>
            </div>
        </section>
        <div class = "video-container">
            <video class = "presentation-video" src ="../video/Accessories_a.mp4" autoplay loop muted></video>
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
                        <img alt="PinePen" src="../../image/PinePen/PinePen Pro - 1.png">
                        <h2>PinePen <a>Pro</a></h2>
                        <p>Designed for PinePad Pro</p>
                        <div class="details">
                            <h3>From $199</h3>
                            <form action="" method="POST">
                                <input type="hidden" name="product_name" value="PinePen Pro">                                <input type="hidden" name="price" value="199">
                                <input type="hidden" name="storage" value="N/A">
                                <input type="hidden" name="color" value="N/A">
                                <input type="hidden" name="price" value="199">
                                <button type="submit" name="addToCart">Add to Cart</button>
                            </form>
                        </div>
                    </div>

                    <div class="product hidden">
                        <img alt="PinePen" src="../../image/PinePen/PinePen Gen 3 - 1.png">
                        <h2>PinePen <a>Gen 3</a></h2> 
                        <p>Designed for PinePad Gamer</p>
                        <div class="details">
                            <h3> From $79 </h3>
                            <form action="" method="POST">
                                <input type="hidden" name="product_name" value="PinePen Gen 3">                                <input type="hidden" name="price" value="199">
                                <input type="hidden" name="storage" value="N/A">
                                <input type="hidden" name="color" value="N/A">
                                <input type="hidden" name="price" value="79">
                                <button type="submit" name="addToCart">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePen" src="../../image/PinePen/PinePen Gen 2 - 1.png">
                        <h2>PinePen <a>Gen 2</a></h2>
                        <p>Designed for PinePad Smol</p>
                        <div class="details">
                            <h3> From $49 </h3>
                            <form action="" method="POST">
                                <input type="hidden" name="product_name" value="PinePen Gen 2">                                <input type="hidden" name="price" value="199">
                                <input type="hidden" name="storage" value="N/A">
                                <input type="hidden" name="color" value="N/A">
                                <input type="hidden" name="price" value="49">
                                <button type="submit" name="addToCart">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                    <div class="product hidden">
                        <img alt="PinePen" src="../../image/PinePen/PinePen OG - 1.png">
                        <h2>PinePen <a>OG</a></h2> 
                        <p>Designed for PinePad OG</p>
                        <div class="details">
                            <h3> From $29 </h3>
                            <form action="" method="POST">
                                <input type="hidden" name="product_name" value="PinePen OG">                                <input type="hidden" name="price" value="199">
                                <input type="hidden" name="storage" value="N/A">
                                <input type="hidden" name="color" value="N/A">
                                <input type="hidden" name="price" value="29">
                                <button type="submit" name="addToCart">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        <section>
            <div class = "section-content">
                <header class = "section-header-row">
                    <h1 class = "section-subheader">Get to know PinePen.</h1>
                </header>
            </div>
        </section>
        <div class = "video-container">
            <video class = "presentation-video" src ="../../video/Accessories_b.mp4" autoplay loop muted></video>
    </div> 

    <script src = "../itemListJS.js"></script>

    <?php include('../../includes/footer.php'); ?>

</body>
</html>