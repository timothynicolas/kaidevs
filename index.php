<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaidevs | Home</title>
    <link rel="stylesheet" href="css/main.css">

    <!-- Animate On Scroll -->

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- GOOGLE FONTS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="icon" href="assets/favicon.png" type="image/x-icon" />

     <!-- SEO Meta Tags -->
    <meta name="description" content="Kaidevs builds stunning, result-driven websites for growing businesses. Let's build something together.">
    <meta name="keywords" content="web design, web development, Kaidevs, websites for business, SEO, custom web app, freelance developer Philippines">
    <meta name="author" content="Kaidevs">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Kaidevs | Web Design for Business" />
    <meta property="og:description" content="We build custom websites that drive results for businesses in the Philippines and beyond." />
    <meta property="og:image" content="https://kaidevs.co/assets/preview.png" />
    <meta property="og:url" content="https://kaidevs.co" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Kaidevs" />

    
</head>
<body>
    
    <!-- MADE BY TIMOTHY AND JENICA -->
    <?php include 'components/navbar.php'; ?>

    <?php include 'components/modal.php'; ?>

    <?php include 'components/mobile-navbar.php'; ?>

    <div class="container">
        <div class="grid-container">

            <?php include 'components/hero.php'; ?>

            <?php include 'components/about.php'; ?>
            
            <?php include 'components/services.php'; ?>
            <?php include 'components/cta.php'; ?>
            
            <?php include 'components/footer.php'; ?>

            </div>  <!-- idk para san to, but the code breaks when u remove it -->


        </div> <!-- grid-container -->
    </div> <!-- container -->
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script type="module" src="script.js"></script>

</body>
</html>