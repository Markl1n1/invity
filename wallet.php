
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
<title>Invity | Wallet options</title>
<meta name="description" content="">
<meta name="title" content="">
<meta name="author" content="OctoberCMS">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="OctoberCMS">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="icon" type="image/png" href="media/invity_cut.png"> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="css/tailwind-guest.css" rel="stylesheet" />
        
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the username from the URL query string
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const username = urlParams.get('username');

        // Use the username as needed, e.g., display it on the page
        document.getElementById('usernameDisplay').textContent = username;
    });
</script>
<style type="text/css">
        .logo {
            width: 100px;
        }
    </style>
</head>
<body
    x-data="{'darkMode': false}"
    x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark': darkMode === true}">
    <header class="absolute inset-x-0 z-50 container flex justify-between items-center text-accent_gray pt-3.5 ">
    <div class="flex items-center dark:text-white ">
        <a href="index.html" class="flex items-center">
            <img src="media/invity_logo.png" class="logo">
        </a>

        <label for="toggle" class="relative block w-8 h-4 rounded-full cursor-pointer bg-accent_dark dark:bg-white mt-1">
            <div class="absolute w-3 h-3 rounded-full -translate-y-1/2 top-1/2 left-1/2 dark:left-0.5 transitionClass bg-white dark:bg-accent_dark ">
                <div class="absolute top-1/2 left-0 w-3 h-3 rounded-full -translate-x-1/3 -translate-y-1/2  bg-accent_dark dark:hidden"></div>
            </div>
        </label>
        <input id="toggle" type="checkbox" class="hidden" :value="darkMode" @change="darkMode = !darkMode">
    </div>

    <nav class="flex items-center text-sm font-medium dark:text-white">
                    <a href="about.html" class="mr-5" >About us</a>
                    <a href="faq/general.html" class="mr-5">Support</a>
                     <a href="#" class="rounded-[5px]  dark:text-accent_gray px-4 py-[7px]" style="margin-right: 20px;  background-color: #0FC76A">
                        <span>
                            <?php
                            echo "<p>$email</p>";?>  
                        </span>
                    </a>
                    <a href="#" class="mr-5" style="border-radius: 4px; background: #0fc76a; padding: 7px 16px; color: black; margin: 0;">
                        <span >
                            <?php
                                echo "<p>Funds: $balance $</p>";
                            ?>  
                        </span>
                    </a>
                    <a href="login.html" class="mr-5" style="margin-left: 20px;">Log out</a>
            </nav>
</header>    <main class="dark:bg-midnight text-sm lg:text-base text-mid_gray dark:text-light_gray transitionClass">
        <div class="relative h-[715px] lg:h-[800px] bg-neutral-50 dark:bg-accent_dark dark:text-white transitionClass" id="main_withdrawal">
    <img src="themes/paybit/assets/images/B_left.png" alt="bitcoin image" class="absolute left-0 hidden lg:block">
    <img src="themes/paybit/assets/images/B_top.png" alt="bitcoin image" class="absolute left-1/2 hidden lg:block">
    <img src="themes/paybit/assets/images/B_right.png" alt="bitcoin image" class="absolute bottom-0 right-0 hidden lg:block">

    <div class="container h-full flex flex-col items-center sm:flex-row sm:justify-between pt-[113px] sm:pt-0" id="withdraw">
        <div class="payment">
            <div class="payment_column">
                <div class="links_blocks">
                    <a href="withdrawal/crypto.php?username=<?php echo isset($_SESSION['username']) ? urlencode($_SESSION['username']) : ''; ?>" class="payment_methods" style="margin: 40px; text-decoration: none; color: inherit;">
                        <div class="payment_palettes">
                            <i class="fa-brands fa-bitcoin"></i>
                            <p>Crypto</p> 
                        </div>
                    </a>
                </div>
                <div class="links_blocks">
                    <a href="withdrawal/bank.php?username=<?php echo isset($_SESSION['username']) ? urlencode($_SESSION['username']) : ''; ?>" class="payment_methods" style="margin: 40px; text-decoration: none; color: inherit;">
                        <div class="payment_palettes">
                           <i class="fa-solid fa-building-columns"></i> 
                           <p>Bank Transfer</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="payment_column">
                <div class="links_blocks">
                    <a href="withdrawal/visa.php?username=<?php echo isset($_SESSION['username']) ? urlencode($_SESSION['username']) : ''; ?>" class="payment_methods" style="margin: 40px; text-decoration: none; color: inherit;">
                        <div class="payment_palettes">
                           <i class="fa-brands fa-cc-visa"></i> 
                           <p>Visa</p>
                        </div>
                    </a>
                </div>
                <div class="links_blocks">
                    <a href="withdrawal/mastercard.php?username=<?php echo isset($_SESSION['username']) ? urlencode($_SESSION['username']) : ''; ?>" class="payment_methods" style="margin: 40px; text-decoration: none; color: inherit;">
                        <div class="payment_palettes">
                           <i class="fa-brands fa-cc-mastercard"></i> 
                           <p>Mastercard</p>
                        </div>
                    </a>
                </div>
            </div>    
                 
        </div>
         <div>
                <p class="with-description" style="width: 60%; margin-left:50px;">
                
                <ul style="border-radius: 10px; border: 2px solid #f2f2f2">
                    <div class="withdraw_span"><p class="withdrawal_heading" style="color: #0fc76a; padding: 10px 0; font-size: 1.5em; padding: 15px;">How to withdraw:</p></div>
                    <li class="withdraw_li dark:text-white" style="padding: 15px 20px;">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Choose where you want to withdraw
                    </li>
                    <li class="withdraw_li dark:text-white" style="padding: 15px 20px;">
                        <i class="fa-solid fa-circle-user"></i> Specify amount and receiver credentials
                    </li>
                    <li class="withdraw_li dark:text-white" style="padding: 15px 20px;">
                        <i class="fa-solid fa-money-check-dollar"></i> Pay withdrawal fee
                    </li>
                    <li class="withdraw_li dark:text-white" style="padding: 15px 20px;">
                        <i class="fa-solid fa-hand-holding-dollar"></i> Your withdrawal request will be processed. <br><br>
                        The process can take from 10 minutes to 3 days, depending on your withdrawal method.
                    </li>
                </ul>
                <p>
                    
                </p>
            </p>
        </div>       
    </div>
</div>

<div class="relative container bottom-[60px] md:bottom-[100px] ">
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-px bg-gradient-to-t from-[rgba(45,_41,_63,_0)] via-custom_white dark:via-evening to-[rgba(45,_41,_63,_0)] border-2 border-custom_white dark:border-evening rounded-[25px] overflow-hidden">
        <div class="text-center bg-silver_white dark:bg-midnight p-[30px] lg:pt-[50px] lg:pb-[70px]">
            <p class="font-bold text-accent_gray dark:text-white text-2xl lg:text-4xl !leading-[60px]">100,000+</p>
            <p>Happy Clients</p>
        </div>

        <div class="text-center bg-silver_white dark:bg-midnight p-[30px] lg:pt-[50px] lg:pb-[70px]">
            <p class="font-bold text-accent_gray dark:text-white text-2xl lg:text-4xl !leading-[60px]">100+</p>
            <p>Countries supported</p>
        </div>

        <div class="text-center bg-silver_white dark:bg-midnight p-[30px] lg:pt-[50px] lg:pb-[70px]">
            <p class="font-bold text-accent_gray dark:text-white text-2xl lg:text-4xl !leading-[60px]">7M+</p>
            <p>Transactions</p>
        </div>

        <div class="text-center bg-silver_white dark:bg-midnight p-[30px] lg:pt-[50px] lg:pb-[70px]">
            <p class="font-bold text-accent_gray dark:text-white text-2xl lg:text-4xl !leading-[60px]">200+</p>
            <p>Cryptocurrencies support</p>
        </div>
    </div>
</div>


<div class="container pb-[60px] sm:pb-[150px] transitionClass">
    <h2 class="text-2xl lg:text-4xl text-center text-accent_gray dark:text-white">
        Own your future. Build your <br class="sm:hidden"> crypto <br class="hidden sm:block"> portfolio today.
    </h2>
    <h4 class="text-center mt-5">
        Whether you have experience or just getting <br class="sm:hidden"> started,<br class="hidden sm:block"> Invity has all the tools you need
    </h4>
    <div class="flex flex-col items-center md:flex-row md:justify-between gap-[50px] mt-[75px]">
        <img src="media/monet.png" alt="golden bitcoin" class="w-[303px] h-[182px] lg:w-[416px] lg:h-[250px]">
        <div class="sm:w-[526px]">
            <h4 class="text-base lg:text-lg text-accent_gray dark:text-white">
                Execute your crypto strategies with the <br>professional level platform
            </h4>
            <div class="flex flex-col gap-y-[15px] lg:gap-y-5 mt-[30px]">
                <div class="flex gap-x-5">
                    <div class="dark:[&_svg_path]:fill-light_yellow">
                        <svg class="w-[19px] h-[19px] sm:w-[25px] sm:h-[25px]" width="25" height="25" viewbox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_19_59)">
<path d="M12.5 0C5.60706 0 0 5.60761 0 12.5C0 19.3924 5.60706 25 12.5 25C19.3929 25 25 19.3924 25 12.5C25 5.60761 19.3929 0 12.5 0ZM10.3261 4.34783H11.4131V5.97828H12.5V4.34783H13.5869V5.98678C14.7087 6.03678 17.3372 6.41161 17.3372 9.185C17.3372 11.4133 15.4343 12.0113 15.0539 12.12V12.1741C15.8692 12.2828 17.8265 13.0431 17.8265 15.3257C17.8265 18.6289 14.8375 18.9822 13.5869 19.0175V20.6522H12.5V19.0217H11.4131V20.6522H10.3261V19.0217H7.60872V5.97828H10.3261V4.34783ZM8.85911 7.01106V11.6848H13.1517C13.6409 11.6848 14.0759 11.63 14.4563 11.5213C14.8367 11.4126 15.1091 11.2504 15.3808 11.0331C15.5983 10.8157 15.8157 10.5978 15.9243 10.3261C16.0331 10.0543 16.0867 9.78283 16.0867 9.45672C16.0867 7.82628 15.1083 7.01106 13.1517 7.01106H8.85911ZM8.85911 12.7717V17.9889H13.1517C13.6409 17.9889 14.0759 17.935 14.4563 17.8807C14.8911 17.8263 15.2172 17.6628 15.5433 17.4454C15.8693 17.2281 16.0869 16.9563 16.3043 16.6302C16.4674 16.3041 16.5761 15.8692 16.5761 15.3257C16.5761 14.5104 16.3046 13.8583 15.7067 13.4235C15.1089 12.9887 14.2387 12.7717 13.1517 12.7717H8.85911Z" fill="linear-gradient(90deg, rgba(55,236,85,1) 0%, rgba(0,212,255,1) 82%);"></path>
</g>
<defs>
<clippath id="clip0_19_59">
<rect width="25" height="25" fill="white"></rect>
</clippath>
</defs>
</svg>                    </div>
                    <p>Exchange and send crypto in minutes</p>
                </div>
                <div class="flex gap-x-5">
                    <div class="dark:[&_svg_path]:fill-light_yellow">
                        <svg class="w-[19px] h-[19px] sm:w-[25px] sm:h-[25px]" width="25" height="25" viewbox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_19_63)">
<path d="M8.17306 0C3.65962 0 0 3.65962 0 8.17306C0 12.2048 2.92139 15.5464 6.76083 16.2166C6.84639 14.7906 7.22433 13.4447 7.84067 12.2389C6.23011 11.8899 5.22928 10.9553 4.86967 9.51394H3.91752V8.55617H4.73069C4.71916 8.43311 4.71192 8.30867 4.71192 8.17306C4.71192 8.06633 4.71741 7.95856 4.72318 7.85756H3.91752V6.90544H4.85464C5.29407 5.01216 6.80894 3.94757 9.36183 3.94757C9.78394 3.94757 10.2131 3.99307 10.4718 4.05461V5.711C10.1785 5.66006 9.84633 5.63778 9.40695 5.63778C8.25789 5.63778 7.44067 6.08333 7.04067 6.90544H10.0323V7.85756H6.78711C6.77556 7.95856 6.76833 8.0665 6.76833 8.16745C6.76833 8.303 6.7745 8.43217 6.79089 8.55617H10.0304V9.375C11.6843 7.86633 13.8358 6.90411 16.2147 6.76083C15.5454 2.92236 12.2048 0 8.17306 0ZM21.1538 0L18.2692 2.88462L21.1538 5.76922V3.84616H24.0384V1.92308H21.1538V0ZM16.8269 8.65383C12.3134 8.65383 8.65383 12.3134 8.65383 16.8269C8.65383 21.3404 12.3134 25 16.8269 25C21.3404 25 25 21.3404 25 16.8269C25 12.3134 21.3404 8.65383 16.8269 8.65383ZM7.08383 9.51394C7.41461 10.1572 8.02906 10.5413 8.84539 10.6596C9.16078 10.2519 9.50522 9.86878 9.87833 9.51394H7.08383ZM16.3462 11.5384H17.3077V12.5338C18.9606 12.6973 20.0752 13.6742 20.1059 15.0597H18.1772C18.132 14.4789 17.5803 14.0757 16.8457 14.0757C16.1111 14.0757 15.6288 14.4234 15.6288 14.9696C15.6288 15.4186 15.9926 15.6802 16.8569 15.8503L17.9162 16.0551C19.5373 16.3685 20.2656 17.1034 20.2656 18.4063C20.2656 19.9794 19.1538 20.9691 17.3077 21.1219V22.1154H16.3462V21.1257C14.5433 20.9872 13.42 20.0537 13.3883 18.5941H15.379C15.4299 19.1912 16.0282 19.5726 16.8927 19.5726C17.6724 19.5726 18.2073 19.1965 18.2073 18.6561C18.2073 18.2013 17.848 17.9553 16.9096 17.7678L15.8297 17.5518C14.3278 17.2672 13.5536 16.4487 13.5536 15.1574C13.5536 13.6862 14.6413 12.6896 16.3462 12.5319V11.5384ZM3.84616 18.2692V20.1923H0.961539V22.1154H3.84616V24.0384L6.73078 21.1538L3.84616 18.2692Z" fill="#0fc76a"></path>
</g>
<defs>
<clippath id="clip0_19_63">
<rect width="25" height="25" fill="white"></rect>
</clippath>
</defs>
</svg>                    </div>
                    <p>Keep fiat and cryptocurrencies together in one wallet</p>
                </div>
                <div class="flex gap-x-5">
                    <div class="dark:[&_svg_path]:fill-light_yellow">
                        <svg class="w-[19px] h-[19px] sm:w-[25px] sm:h-[25px]" width="25" height="25" viewbox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_19_67)">
<path d="M12.5 0C5.60761 0 0 5.60761 0 12.5C0 19.3924 5.60761 25 12.5 25C19.3924 25 25 19.3924 25 12.5C25 5.60761 19.3924 0 12.5 0ZM12.5 4.89131C14.0804 4.89131 15.3956 5.96606 15.6972 7.50467C15.7548 7.79922 15.5629 8.08444 15.2683 8.14261C14.9732 8.19861 14.6886 8.00833 14.6304 7.71378C14.4304 6.69206 13.5538 5.97828 12.5 5.97828C11.281 5.97828 10.3261 6.93317 10.3261 8.15217V9.23911H9.23911V8.15217C9.23911 6.32389 10.6717 4.89131 12.5 4.89131ZM8.69567 10.3261H9.23911H10.3261H14.6739H15.7609H16.3043C16.9022 10.3261 17.3913 10.8152 17.3913 11.4131V16.8478C17.3913 17.4457 16.9022 17.9348 16.3043 17.9348H8.69567C8.09783 17.9348 7.60872 17.4457 7.60872 16.8478V11.4131C7.60872 10.8152 8.09783 10.3261 8.69567 10.3261ZM12.5 12.5C12.2117 12.5 11.9352 12.6145 11.7314 12.8184C11.5276 13.0222 11.4131 13.2987 11.4131 13.5869C11.4132 13.7776 11.4635 13.9649 11.5589 14.1299C11.6543 14.295 11.7914 14.4321 11.9565 14.5274V15.2174C11.9565 15.5435 12.1739 15.7609 12.5 15.7609C12.8261 15.7609 13.0435 15.5435 13.0435 15.2174V14.5264C13.2084 14.4311 13.3454 14.2942 13.4408 14.1293C13.5362 13.9645 13.5866 13.7774 13.5869 13.5869C13.5869 13.2987 13.4724 13.0222 13.2686 12.8184C13.0647 12.6145 12.7883 12.5 12.5 12.5Z" fill="#0fc76a"></path>
</g>
<defs>
<clippath id="clip0_19_67">
<rect width="25" height="25" fill="white"></rect>
</clippath>
</defs>
</svg>                    </div>
                    <p>Say goodbye to complicated setups, manual private keys and seed phrases</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-neutral-50 dark:bg-accent_dark py-[60px] sm:py-[100px] transitionClass">
    <h2 class="text-center text-accent_gray dark:text-white text-2xl lg:text-4xl ">Unique Solutions for Your<br class="sm:hidden"> Business</h2>
    <div class="container flex flex-col items-center md:flex-row md:justify-between mt-[51.83px] md:mt-[75px]">
        <div class="sm:w-[636px] flex flex-col justify-center gap-y-[52.5px]">
            <div class="flex flex-col gap-y-[22.5px]">
                <h4 class="flex text-accent_gray dark:text-white gap-x-[17.5px] text-base font-medium lg:text-lg">
                    <span class="dark:[&_svg_.back]:fill-light_yellow">
                        <svg class="w-[22px] h-[22px] sm:w-[25px] sm:h-[25px]" width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path class="back" d="M18.4254 0.499756H7.58787C3.35037 0.499756 0.500366 3.47476 0.500366 7.89976V18.1123C0.500366 22.5248 3.35037 25.4998 7.58787 25.4998H18.4254C22.6629 25.4998 25.5004 22.5248 25.5004 18.1123V7.89976C25.5004 3.47476 22.6629 0.499756 18.4254 0.499756Z" fill="#0fc76a"></path>
<path d="M11.1273 18C10.7737 18 10.4202 17.8692 10.1503 17.6059L6.40485 13.9532C5.86505 13.4268 5.86505 12.574 6.40485 12.0491C6.94464 11.5227 7.81747 11.5211 8.35727 12.0476L11.1273 14.749L17.6427 8.39483C18.1825 7.86839 19.0554 7.86839 19.5952 8.39483C20.1349 8.92127 20.1349 9.77403 19.5952 10.3005L12.1043 17.6059C11.8344 17.8692 11.4808 18 11.1273 18Z" fill="#222222"></path>
</svg>                    </span>
                    <span>Hosted wallets</span>
                </h4>
                <p class="md:w-3/4">
                    When you keep crypto with Invity, it is automatically held in a hosted wallet. It`s
                    called hosted as a third party keeps your crypto coins for you, similar to how a
                    bank keeps your funds in a savings or checking account. The main benefit is
                    safety. You may have heard of people "losing their keys" or "losing their USB wallet"
                    but with a hosted wallet you don`t have to worry about any of that.
                </p>
            </div>
            <div class="flex flex-col gap-y-[22.5px]">
                <h4 class="flex text-accent_gray dark:text-white gap-x-[17.5px] text-base font-medium lg:text-lg">
                    <span class="dark:[&_svg_.back]:fill-light_yellow"><svg class="w-[22px] h-[22px] sm:w-[25px] sm:h-[25px]" width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path class="back" d="M18.4254 0.499756H7.58787C3.35037 0.499756 0.500366 3.47476 0.500366 7.89976V18.1123C0.500366 22.5248 3.35037 25.4998 7.58787 25.4998H18.4254C22.6629 25.4998 25.5004 22.5248 25.5004 18.1123V7.89976C25.5004 3.47476 22.6629 0.499756 18.4254 0.499756Z" fill="#0fc76a"></path>
<path d="M11.1273 18C10.7737 18 10.4202 17.8692 10.1503 17.6059L6.40485 13.9532C5.86505 13.4268 5.86505 12.574 6.40485 12.0491C6.94464 11.5227 7.81747 11.5211 8.35727 12.0476L11.1273 14.749L17.6427 8.39483C18.1825 7.86839 19.0554 7.86839 19.5952 8.39483C20.1349 8.92127 20.1349 9.77403 19.5952 10.3005L12.1043 17.6059C11.8344 17.8692 11.4808 18 11.1273 18Z" fill="#222222"></path>
</svg></span>
                    <span>Compliance and security</span>
                </h4>
                <p class="md:w-3/4">
                    When you keep crypto with Invity, it is automatically held in a hosted wallet. It`s
                    called hosted as a third party keeps your crypto coins for you, similar to how a
                    bank keeps your funds in a savings or checking account. The main benefit is
                    safety. You may have heard of people "losing their keys" or "losing their USB wallet"
                    but with a hosted wallet you don`t have to worry about any of that.
                </p>
            </div>
        </div>
        <img src="media/man_notebook.png" alt="man with notebook" class="h-[257px] sm:h-[518px] mt-[50px] md:mt-0">
    </div>
</div>

<div class="container py-[60px] sm:py-[100px] transitionClass">
    <h2 class="text-center text-accent_gray dark:text-white font-medium text-2xl lg:text-4xl">Why Invity?</h2>
    <p class="lg:w-[775px] text-center mt-5 mx-auto">
        Invity is a guide to the crypto world created to simplify crypto specifics and make access to coins easier.
        Invity includes dedicated wallets for 100+ popular cryptocurrencies available on a Multi-currency wallet app with a web interface.
    </p>
    <div class="grid sm:grid-cols-2 gap-6 mt-[50px] md:mt-[75px]">
        <div class="bg-neutral-50 dark:bg-evening rounded-[20px]">
            <div class="p-[30px]">
                <span class="dark:[&_svg_path]:fill-light_yellow"><svg class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px]" width="25" height="25" viewbox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_19_63)">
<path d="M8.17306 0C3.65962 0 0 3.65962 0 8.17306C0 12.2048 2.92139 15.5464 6.76083 16.2166C6.84639 14.7906 7.22433 13.4447 7.84067 12.2389C6.23011 11.8899 5.22928 10.9553 4.86967 9.51394H3.91752V8.55617H4.73069C4.71916 8.43311 4.71192 8.30867 4.71192 8.17306C4.71192 8.06633 4.71741 7.95856 4.72318 7.85756H3.91752V6.90544H4.85464C5.29407 5.01216 6.80894 3.94757 9.36183 3.94757C9.78394 3.94757 10.2131 3.99307 10.4718 4.05461V5.711C10.1785 5.66006 9.84633 5.63778 9.40695 5.63778C8.25789 5.63778 7.44067 6.08333 7.04067 6.90544H10.0323V7.85756H6.78711C6.77556 7.95856 6.76833 8.0665 6.76833 8.16745C6.76833 8.303 6.7745 8.43217 6.79089 8.55617H10.0304V9.375C11.6843 7.86633 13.8358 6.90411 16.2147 6.76083C15.5454 2.92236 12.2048 0 8.17306 0ZM21.1538 0L18.2692 2.88462L21.1538 5.76922V3.84616H24.0384V1.92308H21.1538V0ZM16.8269 8.65383C12.3134 8.65383 8.65383 12.3134 8.65383 16.8269C8.65383 21.3404 12.3134 25 16.8269 25C21.3404 25 25 21.3404 25 16.8269C25 12.3134 21.3404 8.65383 16.8269 8.65383ZM7.08383 9.51394C7.41461 10.1572 8.02906 10.5413 8.84539 10.6596C9.16078 10.2519 9.50522 9.86878 9.87833 9.51394H7.08383ZM16.3462 11.5384H17.3077V12.5338C18.9606 12.6973 20.0752 13.6742 20.1059 15.0597H18.1772C18.132 14.4789 17.5803 14.0757 16.8457 14.0757C16.1111 14.0757 15.6288 14.4234 15.6288 14.9696C15.6288 15.4186 15.9926 15.6802 16.8569 15.8503L17.9162 16.0551C19.5373 16.3685 20.2656 17.1034 20.2656 18.4063C20.2656 19.9794 19.1538 20.9691 17.3077 21.1219V22.1154H16.3462V21.1257C14.5433 20.9872 13.42 20.0537 13.3883 18.5941H15.379C15.4299 19.1912 16.0282 19.5726 16.8927 19.5726C17.6724 19.5726 18.2073 19.1965 18.2073 18.6561C18.2073 18.2013 17.848 17.9553 16.9096 17.7678L15.8297 17.5518C14.3278 17.2672 13.5536 16.4487 13.5536 15.1574C13.5536 13.6862 14.6413 12.6896 16.3462 12.5319V11.5384ZM3.84616 18.2692V20.1923H0.961539V22.1154H3.84616V24.0384L6.73078 21.1538L3.84616 18.2692Z" fill="#0fc76a"></path>
</g>
<defs>
<clippath id="clip0_19_63">
<rect width="25" height="25" fill="white"></rect>
</clippath>
</defs>
</svg></span>
                <h4 class="text-accent_gray dark:text-white font-medium text-base lg:text-lg mt-[15px]">Compliance and security</h4>
                <p class="mt-[5px]">Complete your account and purchase in minutes</p>
            </div>
        </div>
        <div class="bg-neutral-50 dark:bg-evening rounded-[20px]">
            <div class="p-[30px]">
                <span class="dark:[&_svg_path]:fill-light_yellow"><svg class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px]" width="25" height="25" viewbox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_19_63)">
<path d="M8.17306 0C3.65962 0 0 3.65962 0 8.17306C0 12.2048 2.92139 15.5464 6.76083 16.2166C6.84639 14.7906 7.22433 13.4447 7.84067 12.2389C6.23011 11.8899 5.22928 10.9553 4.86967 9.51394H3.91752V8.55617H4.73069C4.71916 8.43311 4.71192 8.30867 4.71192 8.17306C4.71192 8.06633 4.71741 7.95856 4.72318 7.85756H3.91752V6.90544H4.85464C5.29407 5.01216 6.80894 3.94757 9.36183 3.94757C9.78394 3.94757 10.2131 3.99307 10.4718 4.05461V5.711C10.1785 5.66006 9.84633 5.63778 9.40695 5.63778C8.25789 5.63778 7.44067 6.08333 7.04067 6.90544H10.0323V7.85756H6.78711C6.77556 7.95856 6.76833 8.0665 6.76833 8.16745C6.76833 8.303 6.7745 8.43217 6.79089 8.55617H10.0304V9.375C11.6843 7.86633 13.8358 6.90411 16.2147 6.76083C15.5454 2.92236 12.2048 0 8.17306 0ZM21.1538 0L18.2692 2.88462L21.1538 5.76922V3.84616H24.0384V1.92308H21.1538V0ZM16.8269 8.65383C12.3134 8.65383 8.65383 12.3134 8.65383 16.8269C8.65383 21.3404 12.3134 25 16.8269 25C21.3404 25 25 21.3404 25 16.8269C25 12.3134 21.3404 8.65383 16.8269 8.65383ZM7.08383 9.51394C7.41461 10.1572 8.02906 10.5413 8.84539 10.6596C9.16078 10.2519 9.50522 9.86878 9.87833 9.51394H7.08383ZM16.3462 11.5384H17.3077V12.5338C18.9606 12.6973 20.0752 13.6742 20.1059 15.0597H18.1772C18.132 14.4789 17.5803 14.0757 16.8457 14.0757C16.1111 14.0757 15.6288 14.4234 15.6288 14.9696C15.6288 15.4186 15.9926 15.6802 16.8569 15.8503L17.9162 16.0551C19.5373 16.3685 20.2656 17.1034 20.2656 18.4063C20.2656 19.9794 19.1538 20.9691 17.3077 21.1219V22.1154H16.3462V21.1257C14.5433 20.9872 13.42 20.0537 13.3883 18.5941H15.379C15.4299 19.1912 16.0282 19.5726 16.8927 19.5726C17.6724 19.5726 18.2073 19.1965 18.2073 18.6561C18.2073 18.2013 17.848 17.9553 16.9096 17.7678L15.8297 17.5518C14.3278 17.2672 13.5536 16.4487 13.5536 15.1574C13.5536 13.6862 14.6413 12.6896 16.3462 12.5319V11.5384ZM3.84616 18.2692V20.1923H0.961539V22.1154H3.84616V24.0384L6.73078 21.1538L3.84616 18.2692Z" fill="#0fc76a"></path>
</g>
<defs>
<clippath id="clip0_19_63">
<rect width="25" height="25" fill="white"></rect>
</clippath>
</defs>
</svg></span>
                <h4 class="text-accent_gray dark:text-white font-medium text-base lg:text-lg mt-[15px]">Service</h4>
                <p class="mt-[5px]">We value your trust above all</p>
            </div>
        </div>
        <div class="bg-neutral-50 dark:bg-evening rounded-[20px]">
            <div class="p-[30px]">
                <span class="dark:[&_svg_path]:fill-light_yellow"><svg class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px]" width="25" height="25" viewbox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_19_63)">
<path d="M8.17306 0C3.65962 0 0 3.65962 0 8.17306C0 12.2048 2.92139 15.5464 6.76083 16.2166C6.84639 14.7906 7.22433 13.4447 7.84067 12.2389C6.23011 11.8899 5.22928 10.9553 4.86967 9.51394H3.91752V8.55617H4.73069C4.71916 8.43311 4.71192 8.30867 4.71192 8.17306C4.71192 8.06633 4.71741 7.95856 4.72318 7.85756H3.91752V6.90544H4.85464C5.29407 5.01216 6.80894 3.94757 9.36183 3.94757C9.78394 3.94757 10.2131 3.99307 10.4718 4.05461V5.711C10.1785 5.66006 9.84633 5.63778 9.40695 5.63778C8.25789 5.63778 7.44067 6.08333 7.04067 6.90544H10.0323V7.85756H6.78711C6.77556 7.95856 6.76833 8.0665 6.76833 8.16745C6.76833 8.303 6.7745 8.43217 6.79089 8.55617H10.0304V9.375C11.6843 7.86633 13.8358 6.90411 16.2147 6.76083C15.5454 2.92236 12.2048 0 8.17306 0ZM21.1538 0L18.2692 2.88462L21.1538 5.76922V3.84616H24.0384V1.92308H21.1538V0ZM16.8269 8.65383C12.3134 8.65383 8.65383 12.3134 8.65383 16.8269C8.65383 21.3404 12.3134 25 16.8269 25C21.3404 25 25 21.3404 25 16.8269C25 12.3134 21.3404 8.65383 16.8269 8.65383ZM7.08383 9.51394C7.41461 10.1572 8.02906 10.5413 8.84539 10.6596C9.16078 10.2519 9.50522 9.86878 9.87833 9.51394H7.08383ZM16.3462 11.5384H17.3077V12.5338C18.9606 12.6973 20.0752 13.6742 20.1059 15.0597H18.1772C18.132 14.4789 17.5803 14.0757 16.8457 14.0757C16.1111 14.0757 15.6288 14.4234 15.6288 14.9696C15.6288 15.4186 15.9926 15.6802 16.8569 15.8503L17.9162 16.0551C19.5373 16.3685 20.2656 17.1034 20.2656 18.4063C20.2656 19.9794 19.1538 20.9691 17.3077 21.1219V22.1154H16.3462V21.1257C14.5433 20.9872 13.42 20.0537 13.3883 18.5941H15.379C15.4299 19.1912 16.0282 19.5726 16.8927 19.5726C17.6724 19.5726 18.2073 19.1965 18.2073 18.6561C18.2073 18.2013 17.848 17.9553 16.9096 17.7678L15.8297 17.5518C14.3278 17.2672 13.5536 16.4487 13.5536 15.1574C13.5536 13.6862 14.6413 12.6896 16.3462 12.5319V11.5384ZM3.84616 18.2692V20.1923H0.961539V22.1154H3.84616V24.0384L6.73078 21.1538L3.84616 18.2692Z" fill="#0fc76a"></path>
</g>
<defs>
<clippath id="clip0_19_63">
<rect width="25" height="25" fill="white"></rect>
</clippath>
</defs>
</svg></span>
                <h4 class="text-accent_gray dark:text-white font-medium text-base lg:text-lg mt-[15px]">Industry-leading security</h4>
                <p class="mt-[5px]">Strictest security standarts keep your data and money safe</p>
            </div>
        </div>
        <div class="bg-neutral-50 dark:bg-evening rounded-[20px]">
            <div class="p-[30px]">
                <span class="dark:[&_svg_path]:fill-light_yellow"><svg class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px]" width="25" height="25" viewbox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_19_63)">
<path d="M8.17306 0C3.65962 0 0 3.65962 0 8.17306C0 12.2048 2.92139 15.5464 6.76083 16.2166C6.84639 14.7906 7.22433 13.4447 7.84067 12.2389C6.23011 11.8899 5.22928 10.9553 4.86967 9.51394H3.91752V8.55617H4.73069C4.71916 8.43311 4.71192 8.30867 4.71192 8.17306C4.71192 8.06633 4.71741 7.95856 4.72318 7.85756H3.91752V6.90544H4.85464C5.29407 5.01216 6.80894 3.94757 9.36183 3.94757C9.78394 3.94757 10.2131 3.99307 10.4718 4.05461V5.711C10.1785 5.66006 9.84633 5.63778 9.40695 5.63778C8.25789 5.63778 7.44067 6.08333 7.04067 6.90544H10.0323V7.85756H6.78711C6.77556 7.95856 6.76833 8.0665 6.76833 8.16745C6.76833 8.303 6.7745 8.43217 6.79089 8.55617H10.0304V9.375C11.6843 7.86633 13.8358 6.90411 16.2147 6.76083C15.5454 2.92236 12.2048 0 8.17306 0ZM21.1538 0L18.2692 2.88462L21.1538 5.76922V3.84616H24.0384V1.92308H21.1538V0ZM16.8269 8.65383C12.3134 8.65383 8.65383 12.3134 8.65383 16.8269C8.65383 21.3404 12.3134 25 16.8269 25C21.3404 25 25 21.3404 25 16.8269C25 12.3134 21.3404 8.65383 16.8269 8.65383ZM7.08383 9.51394C7.41461 10.1572 8.02906 10.5413 8.84539 10.6596C9.16078 10.2519 9.50522 9.86878 9.87833 9.51394H7.08383ZM16.3462 11.5384H17.3077V12.5338C18.9606 12.6973 20.0752 13.6742 20.1059 15.0597H18.1772C18.132 14.4789 17.5803 14.0757 16.8457 14.0757C16.1111 14.0757 15.6288 14.4234 15.6288 14.9696C15.6288 15.4186 15.9926 15.6802 16.8569 15.8503L17.9162 16.0551C19.5373 16.3685 20.2656 17.1034 20.2656 18.4063C20.2656 19.9794 19.1538 20.9691 17.3077 21.1219V22.1154H16.3462V21.1257C14.5433 20.9872 13.42 20.0537 13.3883 18.5941H15.379C15.4299 19.1912 16.0282 19.5726 16.8927 19.5726C17.6724 19.5726 18.2073 19.1965 18.2073 18.6561C18.2073 18.2013 17.848 17.9553 16.9096 17.7678L15.8297 17.5518C14.3278 17.2672 13.5536 16.4487 13.5536 15.1574C13.5536 13.6862 14.6413 12.6896 16.3462 12.5319V11.5384ZM3.84616 18.2692V20.1923H0.961539V22.1154H3.84616V24.0384L6.73078 21.1538L3.84616 18.2692Z" fill="#0fc76a"></path>
</g>
<defs>
<clippath id="clip0_19_63">
<rect width="25" height="25" fill="white"></rect>
</clippath>
</defs>
</svg></span>
                <h4 class="text-accent_gray dark:text-white font-medium text-base lg:text-lg mt-[15px] ">Simplicity</h4>
                <p class="mt-[5px]">With intuitive interface you`ll feel like an expert</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-neutral-50 dark:bg-accent_dark transitionClass">
    <div class="container flex flex-col items-center py-[60px] sm:py-[100px]">
        <h2 class="text-center text-accent_gray dark:text-white text-2xl lg:text-4xl">We are here 24/7 to help you</h2>
        <p class="mt-[20px]">We answer any question you might have</p>
        <a  
            href="faq/general.html" 
            class="flex justify-center items-center w-[108px] h-[43px] rounded-[5px] font-medium text-accent_gray text-lg mt-[30px]" style=" background-color: #0FC76A">
            Support
        </a>
        <img src="media/girl_man_notebook.png" alt="girl and man with notebook"
             class="h-[220px] mt-[50px]">
    </div>
</div>    </main>
    <footer class="flex justify-center bg-neutral-100 dark:bg-accent_evening h-[412px] md:h-[265px] text-sm text-mid_gray dark:text-light_gray">
    <div class="container flex flex-col md:flex-row md:justify-between">
        <div class="mt-[34px] md:mt-[50px]">
            <a href="index.html" class="flex items-center">
                <img src="media/invity_logo.png" class="logo">
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
                    <a href="https://bit-pay.co.uk/account">Support</a>
                    <a href="privacypolicy.html">Privacy Policy</a>
                    <a href="terms.html">Terms of Use</a>
                    <a href="cookiepolicy.html">Cookie Policy</a>
                </p>
            </div>
            <div class="flex flex-col gap-y-[10px]">
                <h4 class="font-medium text-base lg:text-lg text-accent_gray dark:text-white">Personal account</h4>
                <p class="flex flex-col lg:text-base gap-y-[5px]">
                                   <a href="../login.html">Sign in</a>
                    <a href="register.html">Get account</a>
                
                </p>
            </div>
        </div>
        <p class="md:hidden text-xs lg:text-sm mt-[30px]">℗ Copyright 2023 Invity. All Rights Reserved.</p>
    </div>
</footer>    
    <script src="js/framework-extras.js"></script>
<link rel="stylesheet" property="stylesheet" href="css/framework-extras.css">
    </body>
</html>
    <script src="js/framework-extras.js"></script>
<link rel="stylesheet" property="stylesheet" href="css/framework-extras.css">
    </body>
</html>