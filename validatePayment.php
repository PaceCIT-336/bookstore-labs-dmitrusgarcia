<?php
// Step 5a: if statements to sanitize input
if(isset($_POST['full_name'])) {
    $full_name = htmlentities($_POST['full_name']);
} else {
    $full_name = '';
}
if(isset($_POST['email'])) {
    $email = htmlentities($_POST['email']);
} else {
    $email = '';
}
if(isset($_POST['credit_card'])) {
    $credit_card = htmlentities($_POST['credit_card']);
} else {
    $credit_card = '';
}
if(isset($_POST['cvv'])) {
    $cvv = htmlentities($_POST['cvv']);
} else {
    $cvv = '';
}

// Step 5b: validation functions
function validateName($name) {
    if(empty($name)) {
        return 'Name is required. ';
    }
    return '';
}

function validateEmail($email) {
    if(empty($email)) {
        return 'Email is required. ';
    }
    if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        return 'Invalid email format. ';
    }
    return '';
}

function validateCreditCard($credit_card) {
    if(empty($credit_card)) {
        return 'Credit card number is required. ';
    }
    if(!preg_match('/^[0-9]{16}$/', $credit_card)) {
        return 'Invalid credit card format. ';
    }
    return '';
}

function validateCVV($cvv) {
    if(empty($cvv)) {
        return 'CVV is required. ';
    }
    if(!preg_match('/^[0-9]{3}$/', $cvv)) {
        return 'Invalid CVV format. ';
    }
    return '';
}

// Step 5c: call validation functions and build error message string
$fail = '';
$fail .= validateName($full_name);
$fail .= validateEmail($email);
$fail .= validateCreditCard($credit_card);
$fail .= validateCVV($cvv);

echo '<form name="paymentForm" method="post">';
echo '<label for="full_name">Full Name:</label><br>';
echo '<input type="text" id="full_name" name="full_name" placeholder="Enter full name" value="' . $full_name . '" required><br><br>';

echo '<label for="email">Email:</label><br>';
echo '<input type="email" id="email" name="email" placeholder="Enter email" value="' . $email . '" required><br><br>';

echo '<label for="credit_card">Credit Card Number:</label><br>';
echo '<input type="text" id="credit_card" name="credit_card" placeholder="Enter credit card number" value="' . $credit_card . '" required><br><br>';

echo '<label for="cvv">CVV:</label><br>';
echo '<input type="text" id="cvv" name="cvv" placeholder="Enter CVV" value="' . $cvv . '" required><br><br>';
echo '<button type="submit">Submit Payment</button>';
echo '</form>';

if(!isset($_POST['full_name']) && !isset($_POST['email']) && !isset($_POST['credit_card']) && !isset($_POST['cvv'])) {
    echo 'Please enter your payment information.';
} else {
    if($fail == '') {
        echo 'Thank you for not having any errors <br>';
        echo "<a href=\"index.php\"><button>Return to Shop</button></a>";
    } else {
        echo '<div style="color:red">' . $fail . '</div>';
    }
}
?>
