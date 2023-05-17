<?php
// Include the database connection file
require("../storeDB.php");

// Check if the search query or category is provided
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

if (!empty($search)) {
  // Construct the SQL query with only search filter
  $get_product = "SELECT * FROM product WHERE product_name LIKE '%$search%'";
} elseif (!empty($category) && $category != 'all') {
  // Construct the SQL query with only category filter
  $get_product = "SELECT * FROM product WHERE category = '$category'";
} else {
  // No search or category provided, retrieve all products
  $get_product = "SELECT * FROM product";
}

// Execute the query
$result = mysqli_query($conn, $get_product);

// Check if there are any search results
if (mysqli_num_rows($result) > 0) {
  // Loop through the search results and display them
  while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['pid'];
    $category = $row['category'];
    $product_name = $row['product_name'];
    $product_price = $row['product_price'];
    $product_image = $row['product_image'];
    $product_description = $row['product_description'];
    $quantity = $row['quantity'];

    // Display the search result HTML structure
    echo '
      <div class="shop-card2">
        <figure class="card-banner" style="width:300; height: 260;">
          <img src="' . $product_image . '" width="300" height="260" loading="lazy" alt="' . $product_name . '" class="img-cover">
          <div class="card-content">
            <a href="#" class="card-badge skewBg">' . $category . '</a>
            <h3 class="h3">
              <a href="#" class="card-title">' . $product_name . '</a>
            </h3>
            <div class="card-wrapper">
              <p class="card-price">$' . $product_price . '</p>
              <form method="POST" action="shop_cart.php">
                <input type="hidden" name="product_id" value="' . $product_id . '">
                <input type="hidden" name="product_quantity" value="1">
                <button type="submit" class="card-btn" name="submit">
                  <ion-icon name="basket"></ion-icon>
                </button>
              </form>
            </div>
            <i style="color:white;">' . $product_description . '</i>
          </div>
        </figure>
      </div>
    ';
  }
} else {
  // No search results found
  echo 'No products found.';
}

// Close the database connection
mysqli_close($conn);
?>
