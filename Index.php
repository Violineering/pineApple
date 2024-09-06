<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Main.css">
    <title>Welcome to PineApple Store</title>
</head>

<body>
    
    <?php include('includes/navigationHeader.php'); ?>

    <div class="grid-container">
        
        <!-- Large Image - Full Width -->
        <div class="grid-item full-width hero-image">
            <img src="image/mainPage/iPhone.jpg" alt="iPhone">
            <div class="hero-text">
                <h2>Pinephone</h2>
                <p>Our most powerful cameras yet. Ultra-fast chips. And USB-C.</p>
                <button>Buy Now</button>
            </div>
        </div>

        <!-- Left - Large Hero Image -->
        <div class="grid-item large hero-image">
            <img src="image/mainPage/MacBook.jpg" alt="MacBook Air">
            <div class="hero-text">
                <h2>Pinebook</h2>
                <p>Lean. Mean. Juicy machine.</p>
                <button>Buy Now</button>
            </div>
        </div>

        <!-- Right - Large Hero Image -->
        <div class="grid-item large hero-image">
        <img src="image/mainPage/blackBackground.jpg" alt="AirPods Pro">    
                <div class="pineapple-text">
                <h2>About Pinebook</h2>
                <p> 
                    The PineBook series combines sleek design with powerful performance, 
                    featuring the Juicy Engine for seamless multitasking and a stunning 
                    Liquid Retina display for crisp, vibrant visuals. Built with innovative 
                    features and crafted from premium materials, PineBook redefines productivity 
                    and style. It's ready to elevate your workflow wherever you go.                
                </p>
            </div>
        </div>

        <!-- Right - Large Hero Image -->
        <div class="grid-item large hero-image">
            <img src="image/mainPage/pinepods.jpg" alt="AirPods Pro">
            <div class="hero-text">
                <h2>Pinepods</h2>
                <p>Adaptive Audio. Now playing.</p>
                <button>Buy Now</button>
            </div>
        </div>

        <!-- Left - Large Hero Image -->
        <div class="grid-item large hero-image align-mid">
            <img src="image/mainPage/pencil.jpg" alt="Apple Pencil">
            <div class="hero-text">
                <h2>Pineapple Pencil</h2>
                <p>Smarter. Brighter. Mightier.</p>
                <button>Buy Now</button>
            </div>
        </div>

        <!-- Large Image - Full Width -->
        <div class="grid-item full-width hero-image">
            <img src="image/mainPage/iPad.jpg" alt="iPad Air">
            <div class="hero-text">
                <h2>Pinepad</h2>
                <p>Two sizes. Faster chip. Does it all.</p>
                <button>Buy Now</button>
            </div>
        </div>

    </div>

    <?php include('includes/footer.php'); ?>

</body>

</html>
