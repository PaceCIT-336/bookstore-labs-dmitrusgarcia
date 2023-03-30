<!DOCTYPE html>
<html lang="en">

<?php session_start();
require_once 'login.php'; 
// find if a customer is logged in
$id = NULL;
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    // if not logged in, redirect to login page
    header("Location: authenticate.php");
}

// query database for user details

$stmt = $pdo->prepare("SELECT FirstName, LastName, Address, City, State, Zip, Email, PhoneNumber FROM customers WHERE CustomerID = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

// Assign values to the variables for the React component props
$firstName = $user['FirstName'];
$lastName = $user['LastName'];
$address = $user['Address'] . ', ' . $user['City'] . ', ' . $user['State'] . ' ' . $user['Zip'];
$email = $user['Email'];
$phone = $user['PhoneNumber'];

//echo "First Name: " . $firstName . "<br>";
//echo "Last Name: " . $lastName . "<br>";
//echo "Address: " . $address . "<br>";
//echo "Email: " . $email . "<br>";
//echo "Phone Number: " . $phoneNumber . "<br>";

$purchases = array();

//query database for purchase history

$stmt = $pdo->prepare("SELECT BookID, OrderDate FROM purchases WHERE CustomerID = ?");
$stmt->execute([$id]);
while ($row = $stmt->fetch()) {
    
    $bookID = $row['BookID'];
    $orderDate = $row['OrderDate'];

    $stmt2 = $pdo->prepare("SELECT Title FROM books WHERE BookID = ?");
    $stmt2->execute([$bookID]);

    $book = $stmt2->fetch();
    $title = $book['Title'];

    $purchase = array($title, $orderDate);
    array_push($purchases, $purchase);
}

?>

<head>
    <meta charset="utf-8">
    <title>Rainy Bookstore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
    
    <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script type="text/babel" src="assets/reactScript.js"></script>
    <script type="text/babel">
        doRender(<UserPage 
                firstName="<?php echo $firstName; ?>"
                lastName="<?php echo $lastName; ?>"
                address="<?php echo $address; ?>"
                email="<?php echo $email; ?>"
                phone="<?php echo $phone; ?>"
				purchases={<?php echo json_encode($purchases); ?>}
            />,
            'user');
    </script>
</head>
<!-- don't change anything below here! React should handle the display -->
<body>
    <div id="user"></div>
</body>
</html>