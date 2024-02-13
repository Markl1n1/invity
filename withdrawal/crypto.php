<?php
 session_start();

    // Check if the user is authenticated (logged in)
    if (!isset($_SESSION['user_id'])) {
        // If not authenticated, redirect to the login page
        header("Location: login.html");
        exit();
    }

    // Extract user information from the session
    $user_id = $_SESSION['user_id'];
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $balance = isset($_SESSION['balance']) ? $_SESSION['balance'] : 0; // Default to 0 if balance is not set
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<title>Invity | Cryptocurrency witdrawal</title>
<meta name="description" content="">
<meta name="title" content="">
<meta name="author" content="OctoberCMS">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="OctoberCMS">
<link rel="icon" type="image/png" href="../media/invity_cut.png">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">    
    <link href="../css/tailwind-guest.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../main.css">
        
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style type="text/css">
        .crypto-form {
    max-width: 40vw;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    color: #222222;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.crypto-label {
    display: block;
    margin-bottom: 8px;
}
.crypto-label i {
    color: #222222;
}

.crypto-select, .crypto-input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #222222;
    border-radius: 5px;
}

.crypto-button {
    background-color: #0fc76a;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.crypto-button:hover {
    background-color: #222222;
    color: #ffffff;
}
.main-block {
    padding: 20px;
    display: flex;
    justify-content: center;

}
.crypto-desc {
    display: flex;
    color: #222222;
    padding: 15px;
    font-size: 1.5em;
    font-weight: bold;
    align-items: center;
    justify-content: center;
}
.crypto-button {
    color: #222222;
    font-weight: bold;
}
@media (max-width: 768px) {
    .crypto-form {
        max-width: 70vw;
    }
    .main-block div p span {
        max-width: 100vw;
    }
}
.send {
    display: none;
    padding: 20px 0;
    color: #17b505;
    font-weight: bold;
    font-size: 1.2em;
}
.main-block {
    display: flex;
    justify-content: center;
}
.main-block div {
    width: 75vw;
}
.main-block div p {
    display: flex;
    font-size: 1.3em;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
.main-block div p span {
    max-width: 40vw;
}
.logo {
    width: 100px;
}

    </style>
</head>
<body
    x-data="{'darkMode': false}"
    x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark': darkMode === true}">

    <header class=" inset-x-0 container flex justify-between items-center text-accent_gray pt-3.5 ">
    <div class="flex items-center dark:text-white ">
        <a href="../index.html" class="flex items-center">
           <img src="../media/invity_logo.png" class="logo"> 
        </a>
        <input id="toggle" type="checkbox" class="hidden" :value="darkMode" @change="darkMode = !darkMode">
    </div>

    <nav class="flex items-center text-sm font-medium dark:text-white">
                    <a href="../about.html" class="mr-5" >About us</a>
                    <a href="../faq/general.html" class="mr-5">Support</a>
            <a href="#" class="rounded-[5px] bg-accent_yellow dark:text-accent_gray main-bg px-4 py-[7px]" style="margin-right: 20px;  background-color: #0FC76A">
            <span>
                <?php
                echo "<p>$email</p>";?>  
            </span>
        </a>
        <a href="../wallet.php?email=<?php echo isset($_SESSION['email']) ? urlencode($_SESSION['email']) : ''; ?>" class="mr-5" style="border-radius: 4px; background: #0fc76a; padding: 7px 16px; color: black; margin: 0;">
            <span>
                <?php
                echo "<p>Funds: $balance $</p>";?>  
            </span>
        </a>
        <a href="../login.html" class="mr-5" style="margin-left: 20px;">Log out</a>
    </nav>
</header> 
<!-- Main Section -->

<main class="main-block">
    <div>
        <p>
            <strong style="color: #0fc76a;">Note: </strong> <br>
            <span>
                Choose correct currency and network before submitting withdrawal process. In case of mistake crypto funds could be lost irreversibly.
            </span>
        </p>
    </div>
</main>

<!-- Form Section -->
<form class="crypto-form" onsubmit="submitForm(event)">
    <p class="crypto-desc">
        Withdrawal Info
    </p>
    <label class="crypto-label" for="cryptocurrency"><i class="fa-solid fa-coins"></i> Select Cryptocurrency:</label>
    <select class="crypto-select" id="cryptocurrency" name="cryptocurrency">
        <option value="BTC">Bitcoin (BTC)</option>
        <option value="ETH">Ethereum (ETH)</option>
        <option value="LTC">Litecoin (LTC)</option>
        <option value="USDT">Tether (USDT)</option>
        <option value="XRP">Ripple (XRP)</option>
        <option value="SOL">Cosmos (ATOM)</option>
        <option value="SOL">Avalanche (AVAX)</option>
        <option value="SOL">Bitcoin Cash (BCH)</option>
        <option value="SOL">DeFiChain (DFI)</option>
        <option value="SOL">Polkadot (DOT)</option>
        <option value="SOL">Ethereum Name Service (ENS)</option>
    </select>

    <br>

    <!-- Dropdown for Network -->
    <label class="crypto-label" for="network"><i class="fa-solid fa-circle-nodes"></i> Select Network:</label>
    <select class="crypto-select" id="network" name="network">
        <option value="TRC-20">TRC-20</option>
        <option value="BEP-20">BEP-20</option>
        <option value="ERC-20">ERC-20</option>
        <option value="ERC-20">BEP-2</option>
        <option value="ERC-20">BSC</option>
        <option value="ERC-20">Avalanche</option>
        <option value="ERC-20">Cosmos</option>
        <option value="ERC-20">BCH</option>
        <option value="ERC-20">Polkadot</option>
    </select>

    <br>

    <label class="crypto-label" for="amount"><i class="fa-solid fa-dollar-sign"></i> Enter Amount of Funds:</label>
    <input class="crypto-input" type="text" id="amount" name="amount" placeholder="0.00" pattern="\d+(\.\d{2})?" required>

    <br>
    <label class="crypto-label" for="address"><i class="fa-solid fa-wallet"></i> Enter your wallet address:</label>
    <input class="crypto-input" type="text" id="address" name="address" placeholder="0x4f8298b5A2e3b82b2C6A503a5C02D22171D00bE9" required>
    <!-- Submit Button -->
    <button class="crypto-button" type="submit">Submit</button><br><br>
    <span class="send" id="successMessage">
        Your request is now in progress. Wait for the confirmation call!
    </span>
</form>
<footer class="flex justify-center bg-neutral-100 dark:bg-accent_evening h-[412px] md:h-[265px] text-sm text-mid_gray dark:text-light_gray">
    <div class="container flex flex-col md:flex-row md:justify-between">
        <div class="mt-[34px] md:mt-[50px]">
            <a href="index.html" class="flex items-center">
                <img src="../media/invity_logo.png" class="logo"> 
            </a>

            <h4 class="font-medium text-base lg:text-lg mt-[5px] md:mt-[20px] text-accent_gray dark:text-white">Buy crypto with us today</h4>
            <p class="flex flex-col lg:text-[base] mt-[5px]">High level experience in crypto and development <br>knowledge,producing quality work.</p>
            <p class="hidden md:block text-xs lg:text-sm mt-[15px]">℗ Copyright 2023 Invity. All Rights Reserved.</p>

        </div>
        <div class="flex mt-[30px] md:mt-[50px]">
            <div class=" flex flex-col gap-y-[10px] mr-[97px] md:mr-[78px]">
                <h4 class="font-medium text-base lg:text-lg text-accent_gray dark:text-white">Company</h4>
                <p class="flex flex-col lg:text-base gap-y-[5px]">
                    <a href="about.html">About Us</a>
                    <a href="../faq/general.html">Support</a>
                    <a href="privacypolicy.html">Privacy Policy</a>
                    <a href="terms.html">Terms of Use</a>
                    <a href="cookiepolicy.html">Cookie Policy</a>
                </p>
            </div>
            <div class="flex flex-col gap-y-[10px]">
                <h4 class="font-medium text-base lg:text-lg text-accent_gray dark:text-white">Personal account</h4>
                <p class="flex flex-col lg:text-base gap-y-[5px]">
                                   <a href="login.html">Sign in</a>
                    <a href="register.html">Get account</a>
                
                </p>
            </div>
        </div>
        <p class="md:hidden text-xs lg:text-sm mt-[30px]">℗ Copyright 2023 Invity. All Rights Reserved.</p>
    </div>
</footer> 
<script>
    function submitForm(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Assuming you have a function to handle the form submission (e.g., submitFormData)
        submitFormData();

        // Show the success message
        document.getElementById('successMessage').style.display = 'inline';
    }

    // Placeholder function for form submission handling
    function submitFormData() {
        // Implement your form submission logic here
        // This function will be called when the form is submitted
        // You can use AJAX to submit the form data to the server
        // and update the UI based on the server's response
    }
</script>
</body>