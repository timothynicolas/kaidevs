<?php require_once '../config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaidevs | Contact</title>
    <link rel="stylesheet" href="../css/contact.css">

    <!-- Animate On Scroll -->

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- GOOGLE FONTS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="icon" href="<?php echo BASE_URL; ?>assets/favicon.png" type="image/x-icon" />

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
    <?php include '../components/navbar.php'; ?>
    <?php include '../components/modal.php'; ?>
    <?php include '../components/message-sent-modal.php'; ?>
    <?php include '../components/mobile-navbar.php'; ?>

    <div class="container">
        <div class="grid-container">

            <section class="contact-input-container">
                
                <p class="secondary-header" data-aos="fade-up" data-aos-duration="800">Let's <span class="primary-header underline">Connect</span></p>
                <p data-aos="fade-up" data-aos-duration="800">Whether you have a question, need a quote, or you're ready to kick off your project — just fill out the form and we'll get back to you shortly!</p>

                <form method="POST" action="send_mail.php">
                    <input type="text" name="website"  tabindex="-1" autocomplete="off" placeholder="website" style="display:none">


                    <div class="form-group" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <input type="text" name="name" class="form-input" placeholder=" " required />
                        <label for="name" class="form-label">Name</label>
                    </div>

                    <div class="form-group" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                        <input type="text" name="business_name" class="form-input" placeholder=" " required />
                        <label for="business_name" class="form-label">Business Name</label>
                    </div>

                    <div class="form-group" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                        <input type="email" name="email" class="form-input" placeholder=" " required />
                        <label for="email" class="form-label">Email Address</label>
                    </div>

                    <div class="form-group" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
                        <select name="service" id="service" class="form-input" required>
                            <option value="" disabled selected hidden>Select a Service</option>
                            <option value="Website Design">Website Design</option>
                            <option value="Web Maintenance">Website Development</option>
                            <option value="SEO Optimization">Complete Website Build</option>
                            <option value="Custom Web App">Business Website Build</option>
                            <option value="Other">Other</option>
                        </select>
                        <label for="service" class="form-label">Service</label>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="1000" data-aos-anchor-placement="top-bottom">

                        <div class="form-group">
                            <textarea name="message" class="form-input" placeholder=" " required></textarea>
                            <label for="message" class="form-label">Message</label>
                        </div>
    
                        <button type="submit" class="submit-btn">
                            Send Message
                            <img src="<?php echo BASE_URL; ?>assets/contact-plane.svg" alt="Plane icon">
                        </button>
                    </div>
                </form>

                
            </section>
            <section class="contact-img-container" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <img src="<?php echo BASE_URL; ?>assets/form-img.svg" class="contact-image" alt="">
            </section>

            
            <?php include '../components/footer.php'; ?>

            </div>  <!-- idk para san to, but the code breaks when u remove it -->


        </div> <!-- grid-container -->
    </div> <!-- container -->

    <?php if (isset($_GET['success'])): ?>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('modalSuccess');
                if (modal) modal.showPopover();
            });
        </script>
    <?php endif; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script type="module" src="<?php echo BASE_URL; ?>js/contact.js"></script>

    
</body>
</html>