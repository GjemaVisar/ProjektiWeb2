<?php
require('../storeDB.php');

$searchQuery = isset($_GET['search_term']) ? $_GET['search_term'] : '';

if (!empty($searchQuery)) {
    $query = "SELECT * FROM user WHERE email LIKE '%$searchQuery%' AND role = 'user'";
} else {
    $query = "SELECT * FROM user WHERE role = 'user'";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>";
        echo "<form action='#' method='post'>";
        echo "<input type='hidden' name='edit_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='edit_btn' class='btn btn-success'>EDIT</button>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form action='deleteUsers.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}

mysqli_close($conn);
?>
