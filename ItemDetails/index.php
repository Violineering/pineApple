<?php include('fetch_item.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title><?php echo $product['name']; ?> Details</title>
</head>
<body>
    <header class="navbar">
        <!-- Navbar content here -->
    </header>

    <a href="index.php?product=PineBook Light" class="open-button">PineBook Light</a>
    <a href="index.php?product=PineBook King" class="open-button">PineBook King</a>

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
                    <div class="detail">
                        <h3>Core</h3>
                        <p><?php echo $product['core']; ?></p>
                    </div>
                    <div class="detail">
                        <h3>Display</h3>
                        <p><?php echo $product['display']; ?></p>
                    </div>
                    <div class="detail">
                        <h3>Camera</h3>
                        <p><?php echo $product['camera']; ?></p>
                    </div>
                    <div class="detail">
                        <h3>Ports</h3>
                        <p><?php echo $product['ports']; ?></p>
                    </div>
                </div>
            </div>

            <div id="selectionSection">
                <form action="items_addToCart.php" method="POST">
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
                            $storages = explode(',', $product['storage']);
                            foreach ($storages as $storage) {
                                echo '<label class="container">
                                        <input type="radio" name="storage" value="' . trim($storage) . '" required>
                                        <span class="checkmark"></span>' . trim($storage) . '
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
                        <h2 class="price">$<?php echo $product['price']; ?></h2>
                        <button type="submit" value="addToCart">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let images = <?php echo json_encode($imagePaths); ?>;
            let currentIndex = 0;

            const imageElement = document.querySelector('#itemImage');
            const nextButton = document.getElementById('next-image');
            const prevButton = document.getElementById('previous-image');

            function updateImage(newIndex, direction) {
                if (newIndex >= 0 && newIndex < images.length) {
                    const exitDirection = direction === 'next' ? '-100%' : '100%';
                    const enterDirection = direction === 'next' ? '100%' : '-100%';

                    // Exit current image
                    imageElement.style.transition = 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
                    imageElement.style.transform = `translateX(${exitDirection}) scale(1.1)`;
                    imageElement.style.opacity = 0;

                    setTimeout(() => {
                        // Change image source to new image
                        currentIndex = newIndex;
                        imageElement.src = images[currentIndex];

                        // Enter new image from the opposite side
                        imageElement.style.transition = 'none'; // Temporarily disable transition for repositioning
                        imageElement.style.transform = `translateX(${enterDirection}) scale(1.1)`;

                        setTimeout(() => {
                            // Re-enable transition and bring new image into view
                            imageElement.style.transition = 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out';
                            imageElement.style.transform = 'translateX(0) scale(1)';
                            imageElement.style.opacity = 1;
                        }, 20); // Short delay to ensure the transition is applied
                    }, 500); // Match the duration of the transition
                }
            }

            if (images.length > 0) {
                updateImage(currentIndex, 'next');
            }

            nextButton.addEventListener('click', () => {
                let newIndex = (currentIndex + 1) % images.length;
                updateImage(newIndex, 'next');
            });

            prevButton.addEventListener('click', () => {
                let newIndex = (currentIndex - 1 + images.length) % images.length;
                updateImage(newIndex, 'prev');
            });
        });
    </script>
</body>
</html>
