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
    <title><?php echo $product['name']; ?> Details</title>
</head>
<body>
    <main>
        <div id="itemDetails-container">
            <h1 id="itemName"><?php echo $product['name']; ?></h1>
            <div id="imageSection">
                <div id="itemImageGallery">
                    <svg class="button" id="previous-image" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                    </svg>              
                    <img id="itemImage" alt="Image of Item">
                    <svg class="button" id="next-image" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>              
                </div>
            </div>

            <div id="deviceSection">
                <div id="feature" class="detail">
                    <h3>Features</h3>
                    <p><?php echo $product['features']; ?></p>
                </div>
                <div id="detailsSection" class="grid-container">
                <?php 
                // Array mapping detail titles to their corresponding keys in the $product array
                $details = [
                    'Core' => 'core',
                    'Chipset' => 'chipset',
                    'RAM' => 'RAM',
                    'Display' => 'display',
                    'Camera' => 'camera',
                    'Battery' => 'battery'
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

            <div id="selectionSection">
                <form action="" method="POST">
                    <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">

                    <div class="name">
                        <h1>Customize your <?php echo $product['name']; ?></h1>
                    </div>

                    <div class="spec">
                        <div class="title">
                            <h1>Storage Options</h1>
                        </div>
                        <div class="storage">
                            <?php
                            $storageOptions = explode(',', $product['storage']);
                            $basePrice = $product['price'];

                            // Assuming the first option is the base storage with no additional cost
                            foreach ($storageOptions as $index => $storage) {
                                $storage = trim($storage);
                                $additionalPrice = 0;

                                // Define additional price for each storage option except the first one
                                if ($index > 0) {
                                    $additionalPrice = ($index * 300); 
                                }
                            
                                echo '<label class="container">
                                        <input type="radio" name="storage" value="' . $storage . '" data-price="' . $additionalPrice . '" required>
                                        <span class="checkmark"></span>' . $storage . '
                                      </label>';
                            }
                            ?>
                        </div>

                        <div class="title">
                            <h1>Color Options</h1>
                        </div>
                        <div class="color">
                            <?php
                            $colors = explode(',', $product['color']);
                            foreach ($colors as $color) {
                                echo '<label class="container">
                                        <input type="radio" name="color" value="' . trim($color) . '" required>
                                        <span class="checkmark"></span>' . trim($color) . '
                                    </label>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="pb">
                        <h2 class="price" data-base-price="<?php echo $product['price']; ?>">$<?php echo $product['price']; ?></h2>
                        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                        <button type="submit" value="addToCart">Add to Cart</button>
                    </div>
                    
                    <?php include('../items_addToCart.php') ?>
                    
                </form>
            </div>
        </div>
    </main>

    <!-- Pass PHP data to JavaScript -->
    <script>
        window.imagePaths = <?php echo json_encode($imagePaths); ?>;
    </script>
    
    <!-- Change image transition --> 
    <script src="../itemImageGallery.js"></script>

    <!-- Update price based on selected storage option -->
    <script src="../updatePrice.js"></script>
    
</body>
</html>
