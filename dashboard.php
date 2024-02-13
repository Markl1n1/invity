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
    $balance = isset($_SESSION['balance']) ? $_SESSION['balance'] : 0; 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<title>Invity | Dashboard</title>
<meta name="description" content="">
<meta name="title" content="">
<meta name="author" content="OctoberCMS">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="OctoberCMS">
<link rel="icon" type="image/png" href="media/invity_cut.png">    
    <link href="css/tailwind-guest.css" rel="stylesheet" />
    <link rel="stylesheet" href="main.css">   
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style type="text/css">
        .logo {
            width: 100px;
        }
        .asset-icon {
            width: 30px;
            
        }
        .asset-list {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 2px solid #787b86;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.05);
            
        }
        .asset-list_item {
            border-bottom: 1px solid #787b86;
            
        }
        .asset-list_item span
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
                    <a href="#" class="rounded-[5px] dark:text-accent_gray main-bg px-4 py-[7px]" style="margin-right: 20px">
                        <span>
                            <?php
                            echo "<p>$email</p>";?>  
                        </span>
                    </a>
                    <a href="wallet.php?email=<?php echo isset($_SESSION['email']) ? urlencode($_SESSION['email']) : ''; ?>" class="mr-5 main-bg" style="border-radius: 4px; padding: 7px 16px; color: black; margin: 0;">
                        <span>
                            <?php
                            echo "<p>Funds: $balance $</p>";?>  
                        </span>
                    </a>
                    <a href="login.html" class="mr-5" style="margin-left: 20px;">Log out</a>
            </nav>
</header>    <main class="dark:bg-midnight text-sm lg:text-base text-mid_gray dark:text-light_gray transitionClass">
        <div class="relative h-[715px] lg:h-[800px] bg-neutral-50 dark:bg-accent_dark dark:text-white transitionClass">
    <img src="themes/paybit/assets/images/B_left.png" alt="bitcoin image" class="absolute left-0 hidden lg:block">
    <img src="themes/paybit/assets/images/B_top.png" alt="bitcoin image" class="absolute left-1/2 hidden lg:block">
    <img src="themes/paybit/assets/images/B_right.png" alt="bitcoin image" class="absolute bottom-0 right-0 hidden lg:block">

    <div class="container h-full flex flex-col items-center sm:flex-row sm:justify-between pt-[113px] sm:pt-0">
            <div>
                <h1 class="text-accent_gray dark:text-white font-medium text-3xl lg:text-5xl">
                    <span>Welcome</span>
                    <span class="main-color">
                       <?php
                        echo "<p>$email</p>";
                        ?> 
                    </span>
                    
                </h1>
                <div class="assets">
                    
                </div>
            </div>
            <img src="media/girl_notebook.png"
                    class="h-[242px] lg:h-[351px] mt-[60px] md:mt-0" alt="girl with notebook">
    </div>
</div>

<div class="relative container bottom-[60px] md:bottom-[100px] ">
    <ul class="asset-list">
        <li class="asset-list_item" style="display: flex; flex-direction: row; padding: 15px;">
            <span class="assets-number-span">
                1
            </span>
            <img src="media/eth.png" class="asset-icon">
            <span class="asset-name">
                ETH
            </span>
            <span class="asset-index">
                Cordano
            </span>
            <span>
                <?php
                            echo "<p>$balance_eth $</p>";?>
            </span>
        </li>
        <li class="asset-list_item" style="display: flex; flex-direction: row; padding: 15px;">
            <span class="assets-number-span">
                2
            </span>
            <img src="media/btc.png" class="asset-icon">
            <span class="asset-name">
                BTC
            </span>
            <span class="asset-index">
                Cordano
            </span>
            <span>
                <?php
                            echo "<p>$balance_btc $</p>";?>
            </span>
        </li>
        <li class="asset-list_item" style="display: flex; flex-direction: row; padding: 15px;">
            <span class="assets-number-span">
                3
            </span>
            <img src="media/ltc.png" class="asset-icon">
            <span class="asset-name">
                LTC
            </span>
            <span class="asset-index">
                Cordano
            </span>
            <span>
                <?php
                            echo "<p>$balance_ltc $</p>";?>
            </span>
        </li>
        <li class="asset-list_item" style="display: flex; flex-direction: row; padding: 15px;">
            <span class="assets-number-span">
                4
            </span>
            <img src="media/bch.png" class="asset-icon">
            <span class="asset-name">
                BCH
            </span>
            <span class="asset-index">
                Cordano
            </span>
            <span>
                <?php
                            echo "<p>$balance_bch $</p>";?>
            </span>
        </li>
        <li class="asset-list_item" style="display: flex; flex-direction: row; padding: 15px;">
            <span class="assets-number-span">
                5
            </span>
            <img src="media/ada.png" class="asset-icon">
            <span class="asset-name">
                ADA
            </span>
            <span class="asset-index">
                Cordano
            </span>
            <span>
                <?php
                            echo "<p>$balance_ada $</p>";?>
            </span>
        </li>
        <li class="asset-list_item" style="display: flex; flex-direction: row; padding: 15px;">
            <span class="assets-number-span">
                6
            </span>
            <img src="media/xrp.png" class="asset-icon">
            <span class="asset-name">
                XRP
            </span>
            <span class="asset-index">
                Cordano
            </span>
            <span>
                <?php
                            echo "<p>$balance_xrp $</p>";?>
            </span>
        </li>
        <li class="asset-list_item" style="display: flex; flex-direction: row; padding: 15px;">
            <span class="assets-number-span">
                7
            </span>
            <img src="media/pol.png" class="asset-icon">
            <span class="asset-name">
                POL
            </span>
            <span class="asset-index">
                Cordano
            </span>
            <span>
                <?php
                            echo "<p>$balance_pol $</p>";?>
            </span>
        </li>
        <li class="asset-list_item" style="display: flex; flex-direction: row; padding: 15px;">
            <span class="assets-number-span">
                8
            </span>
            <img src="media/teh.png" class="asset-icon">
            <span class="asset-name">
                USDT
            </span>
            <span class="asset-index">
                Cordano
            </span>
            <span>
                <?php
                            echo "<p>$balance_teh $</p>";?>
            </span>
        </li>
    </ul>
<!--    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-px bg-gradient-to-t from-[rgba(45,_41,_63,_0)] via-custom_white dark:via-evening to-[rgba(45,_41,_63,_0)] border-2 border-custom_white dark:border-evening rounded-[25px] overflow-hidden">-->
<!--        <div class="text-center bg-silver_white dark:bg-midnight p-[30px] lg:pt-[50px] lg:pb-[70px]">-->
<!--            <p class="font-bold text-accent_gray dark:text-white text-2xl lg:text-4xl !leading-[60px]">100,000+</p>-->
<!--            <p>Happy Clients</p>-->
<!--        </div>-->

<!--        <div class="text-center bg-silver_white dark:bg-midnight p-[30px] lg:pt-[50px] lg:pb-[70px]">-->
<!--            <p class="font-bold text-accent_gray dark:text-white text-2xl lg:text-4xl !leading-[60px]">100+</p>-->
<!--            <p>Countries supported</p>-->
<!--        </div>-->

<!--        <div class="text-center bg-silver_white dark:bg-midnight p-[30px] lg:pt-[50px] lg:pb-[70px]">-->
<!--            <p class="font-bold text-accent_gray dark:text-white text-2xl lg:text-4xl !leading-[60px]">7M+</p>-->
<!--            <p>Transactions</p>-->
<!--        </div>-->

<!--        <div class="text-center bg-silver_white dark:bg-midnight p-[30px] lg:pt-[50px] lg:pb-[70px]">-->
<!--            <p class="font-bold text-accent_gray dark:text-white text-2xl lg:text-4xl !leading-[60px]">200+</p>-->
<!--            <p>Cryptocurrencies support</p>-->
<!--        </div>-->
<!--    </div>-->
</div>


<div class="container pb-[60px] sm:pb-[150px] transitionClass" style="display: flex; align-items: center; flex-direction: column;">
   <!-- TradingView Widget BEGIN -->
   <h1 class="main-color" style="font-size: 3em; padding-bottom: 50px; fon-weight: bold;">Market</h1>
    <div class="tradingview-widget-container" style="height: 40vw">
      <div class="tradingview-widget-container__widget"></div>
      <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a></div>
      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
      {
      "width": "100%",
      "height": "100%",
      "defaultColumn": "overview",
      "screener_type": "crypto_mkt",
      "displayCurrency": "USD",
      "colorTheme": "light",
      "locale": "en"
    }
      </script>
    </div>
<!-- TradingView Widget END -->
    <!--<h2 class="text-2xl lg:text-4xl text-center text-accent_gray dark:text-white">-->
    <!--    Own your future. Build your <br class="sm:hidden"> crypto <br class="hidden sm:block"> portfolio today.-->
    <!--</h2>-->
    <!--<h4 class="text-center mt-5">-->
    <!--    Whether you have experience or just getting <br class="sm:hidden"> started,<br class="hidden sm:block"> Invity has all the tools you need-->
    <!--</h4>-->
    <!--<div class="flex flex-col items-center md:flex-row md:justify-between gap-[50px] mt-[75px]">-->
    <!--    <img src="media/monet.png" alt="golden bitcoin" class="w-[303px] h-[182px] lg:w-[416px] lg:h-[250px]">-->
    <!--    <div class="sm:w-[526px]">-->
    <!--        <h4 class="text-base lg:text-lg text-accent_gray dark:text-white">-->
    <!--            Execute your crypto strategies with the <br>professional level platform-->
    <!--        </h4>-->
    <!--        <div class="flex flex-col gap-y-[15px] lg:gap-y-5 mt-[30px]">-->
    <!--            <div class="flex gap-x-5">-->
    <!--                <div class="main-color">-->
    <!--                    <i class="main-color fa-solid fa-right-left" style="font-size: 25px;"></i>-->
    <!--                </div>-->
    <!--                <p>Exchange and send crypto in minutes</p>-->
    <!--            </div>-->
    <!--            <div class="flex gap-x-5">-->
    <!--                <div class="main-color">-->
    <!--                     <i class=" main-color fa-solid fa-hand-holding-dollar" style="font-size: 25px;"></i>-->
    <!--                </div>-->
    <!--                <p>Keep fiat and cryptocurrencies together in one wallet</p>-->
    <!--            </div>-->
    <!--            <div class="flex gap-x-5">-->
    <!--                <div class="main-color">-->
    <!--                    <i class="main-color fa-regular fa-handshake" style="font-size: 25px;"></i>-->
    <!--                </div>-->
    <!--                <p>Say goodbye to complicated setups, manual private keys and seed phrases</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</div>

<div class="bg-neutral-50 dark:bg-accent_dark py-[60px] sm:py-[100px] transitionClass">
    <h2 class="text-center text-accent_gray dark:text-white text-2xl lg:text-4xl ">Unique Solutions for Your<br class="sm:hidden"> Business</h2>
    <div class="container flex flex-col items-center md:flex-row md:justify-between mt-[51.83px] md:mt-[75px]">
        <div class="sm:w-[636px] flex flex-col justify-center gap-y-[52.5px]">
            <div class="flex flex-col gap-y-[22.5px]">
                <h4 class="flex text-accent_gray dark:text-white gap-x-[17.5px] text-base font-medium lg:text-lg">
                    <span class="main-bg" style="border-radius: 5px">
                        <svg class="w-[22px] h-[22px] sm:w-[25px] sm:h-[25px]" width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path class="back" d="M18.4254 0.499756H7.58787C3.35037 0.499756 0.500366 3.47476 0.500366 7.89976V18.1123C0.500366 22.5248 3.35037 25.4998 7.58787 25.4998H18.4254C22.6629 25.4998 25.5004 22.5248 25.5004 18.1123V7.89976C25.5004 3.47476 22.6629 0.499756 18.4254 0.499756Z" fill="##0fc76a"></path>
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
                    <span class="main-bg" style="border-radius: 5px"><svg class="w-[22px] h-[22px] sm:w-[25px] sm:h-[25px]" width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path class="back" d="M18.4254 0.499756H7.58787C3.35037 0.499756 0.500366 3.47476 0.500366 7.89976V18.1123C0.500366 22.5248 3.35037 25.4998 7.58787 25.4998H18.4254C22.6629 25.4998 25.5004 22.5248 25.5004 18.1123V7.89976C25.5004 3.47476 22.6629 0.499756 18.4254 0.499756Z" fill="##0fc76a"></path>
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
                <span class="icons">
                    <i class="fa-solid fa-industry"></i>
                </span>
                <h4 class="text-accent_gray dark:text-white font-medium text-base lg:text-lg mt-[15px]">Compliance and security</h4>
                <p class="mt-[5px]">Complete your account and purchase in minutes</p>
            </div>
        </div>
        <div class="bg-neutral-50 dark:bg-evening rounded-[20px]">
            <div class="p-[30px]">
                <span class="icons">
                         <i class="fa-solid fa-arrow-right-arrow-left"></i>
                </span>
                <h4 class="text-accent_gray dark:text-white font-medium text-base lg:text-lg mt-[15px]">Service</h4>
                <p class="mt-[5px]">We value your trust above all</p>
            </div>
        </div>
        <div class="bg-neutral-50 dark:bg-evening rounded-[20px]">
            <div class="p-[30px]">
                <span class="icons">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <h4 class="text-accent_gray dark:text-white font-medium text-base lg:text-lg mt-[15px]">Industry-leading security</h4>
                <p class="mt-[5px]">Strictest security standarts keep your data and money safe</p>
            </div>
        </div>
        <div class="bg-neutral-50 dark:bg-evening rounded-[20px]">
            <div class="p-[30px]">
                <span class="icons">
                    <i class="fa-solid fa-chart-simple"></i> 
                </span>
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
            class="flex justify-center items-center w-[108px] h-[43px] rounded-[5px] font-medium text-accent_gray text-lg mt-[30px]" style="background-color: #0FC76A">
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
                                   <a href="login.html">Sign in</a>
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
