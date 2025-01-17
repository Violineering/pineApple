<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<header class="navbar clearfix">
        <div class="navbar-container">
            <a href="index.php" class="logo">
            <img src="/pineApple/image/logo-image.png" class="logo-img">
            </a>
            <nav>
                <div class="dropdown">
                    <button class="dropbtn">Store</button>
                    <div class="dropdown-content">
                        <div class="section">
                            <a href="/pineApple/ItemList/PineBook/list.php?product=PineBook" class="open-button">
                                <h3>PineBook</h3>
                            </a>
                            <a href="/pineApple/ItemList/PineBook/details.php?product=PineBook King">PineBook King</a>
                            <a href="/pineApple/ItemList/PineBook/details.php?product=PineBook Light">PineBook Light</a>
                        </div>
                        <div class="section">
                            <a href="/pineApple/ItemList/PinePhone/list.php" class="open-button">
                                <h3>PinePhone</h3>
                            </a>
                            <a href="/pineApple/ItemList/PinePhone/details.php?product=PinePhone Pro Ultimate">PinePhone Pro Ultimate</a>
                            <a href="/pineApple/ItemList/PinePhone/details.php?product=PinePhone Pro Gamer">PinePhone Pro Gamer</a>
                            <a href="/pineApple/ItemList/PinePhone/details.php?product=PinePhone Cutie">PinePhone Cutie</a>
                            <a href="/pineApple/ItemList/PinePhone/details.php?product=PinePhone Primitive">PinePhone Primitive</a>
                            <a href="/pineApple/ItemList/PinePhone/details.php?product=PinePhone OG">PinePhone OG</a>
                        </div>
                        <div class="section">
                            <a href="/pineApple/ItemList/PinePad/list.php" class="open-button">
                                <h3>PinePad</h3>
                            </a>
                            <a href="/pineApple/ItemList/PinePad/details.php?product=PinePad Pro">PinePad Pro</a>
                            <a href="/pineApple/ItemList/PinePad/details.php?product=PinePad Gamer">PinePad Gamer</a>
                            <a href="/pineApple/ItemList/PinePad/details.php?product=PinePad Smol">PinePad Smol</a>
                            <a href="/pineApple/ItemList/PinePad/details.php?product=PinePad OG">PinePad OG</a>
                        </div>
                        <div class="section">
                            <a href="/pineApple/ItemList/PinePods/list.php" class="open-button">
                                <h3>PinePods</h3>
                            </a>
                            <a href="/pineApple/ItemList/PinePods/details.php?product=PinePods Ultimate">PinePods Ultimate</a>
                            <a href="/pineApple/ItemList/PinePods/details.php?product=PinePods Gen X">PinePods Gen Z</a>
                            <a href="/pineApple/ItemList/PinePods/details.php?product=PinePods Gen Y">PinePods Gen Y</a>
                            <a href="/pineApple/ItemList/PinePods/details.php?product=PinePods Gen Z">PinePods Gen X</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Accessories</button>
                    <div class="dropdown-content">
                        <div class="section">
                            <a href="/pineApple/ItemList/Accessories/PinePen.php" class="open-button">
                                <h3>PinePen</h3>
                            </a>
                            <a href="/pineApple/ItemList/Accessories/Pineapple.php" class="open-button">
                                <h3>Pineapple</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Support</button>
                    <div class="dropdown-content">
                        <div class="section">
                            <h3>Customer Service</h3>
                            <a href="/pineApple/Contact Us">Contact Us</a>
                            <a href="#">Order Status</a>
                            <a href="#">Refunds</a>
                        </div>
                        <div class="section">
                            <h3>Warranty</h3>
                            <a href="#">PineAppleCare</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="navbar-icons">
                <div class="search-container">
                    <input type="text" id="search-input" placeholder="Search..." onkeyup="searchSuggestions()">
                </div>
                <a href="#" class="fa fa-search"></a>
                <div class="icon-cart">
                    <a href="/pineApple/CartList" class="fa fa-shopping-cart"></a>
                    <span id="cart-quantity">0</span>
                </div>
                <a href="/pineApple/Profile.php" class="fa fa-user"></a>
            </div>
        </div>
    </header>


<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pineappleUsers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pineapple_id = $_SESSION['session_id'];

$query = "SELECT quantity FROM orders_in_cart WHERE pineapple_id = ? ORDER BY id";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $pineapple_id);
$stmt->execute();
$result = $stmt->get_result();

$totalQuantity = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $quantity = $row['quantity'];
        $totalQuantity += $quantity;
    }
}

$_SESSION['totalQuantity'] = $totalQuantity;
$stmt->close();
$conn->close();
?>

<script>
    // Update the span with the quantity value from PHP
    document.getElementById("cart-quantity").innerText = "<?php echo $totalQuantity; ?>";
</script>


    
