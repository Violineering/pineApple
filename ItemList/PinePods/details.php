<?php 
include('../fetch_item.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/ItemDetails.css">
    <link rel="stylesheet" href="../../css/Popup.css">
    <title><?php echo $product['name']; ?> Details</title>
</head>
<body>
    <section>
        <div class = "section_a">
            <div id = "itemDetails-heading">
                <h1 id="itemName">Buy <?php echo $product['name']; ?></h1>
            </div>
        </div>

        <div class = "itemDetails-main row">
            <div class = "itemDetails-column-left">
                <div class = "itemImageBackground">
                    <div id ="itemImageGallery">
                        <svg class="button" id="previous-image" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                        </svg>              
                        <img id="itemImage" alt="Image of Item">
                        <svg class="button" id="next-image" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                        </svg>              
                    </div>
                </div>
            </div>
            <div class = "itemDetails-column-right">
                <div id ="itemDetails-container">
                    <div id ="deviceSection">
                        <div id ="feature">
                            <h2 id="toggleFeatures">Features</h2>
                            <div id="featureContent">
                                <div id="detailsSection" class="grid-container">
                                <?php 
                                // Array mapping detail titles to their corresponding keys in the $product array
                                $details = [
                                    'Active Noise Cancellation' => 'active_noise_cancellation',
                                    'Tranparency Mode' => 'tranparency_mode',
                                    'Battery Lifetime' => 'battery_lifetime',
                                ];

                                // Loop through each detail and generate the corresponding HTML
                                foreach ($details as $title => $key) {
                                    // Ensure the key exists in the $product array to avoid undefined index notices
                                    if (isset($product[$key])) {
                                        echo '<div class="detail">';
                                        echo '<h3>' . $title . '</h3>';
                                        echo '<p>' . $product[$key] . '</p>';
                                        echo '</div>';
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="selectionSection">
                        <form action="" method="POST">
                        <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                        <input type="hidden" name="storage" value="N/A">
                        <input type="hidden" name="color" value="N/A"/>

                        <div class="pb">
                            <h2 class="price" data-base-price="<?php echo $product['price']; ?>">$<?php echo $product['price']; ?></h2>
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                            <button type="submit" value="addToCart">Add to Cart</button>
                        </div>
                            <?php include('../items_addToCart.php') ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pass PHP data to JavaScript -->
    <script>
        window.imagePaths = <?php echo json_encode($imagePaths); ?>;
    </script>
    
    <!-- Change image transition --> 
    <script src="../itemImageGallery.js"></script>

    <script src="../windowScroll.js"></script>
</body>
</html>
