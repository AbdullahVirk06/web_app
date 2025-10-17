<?php
// Homepage for MyK Global Forwarding
$page_title = "Global Logistics Solutions";
require_once 'includes/header.php';
?>

<section class="hero-section">
    <div class="hero-content">
        <h1>Your World, Delivered.</h1>
        <p>Seamless logistics solutions for a connected world. Trust MyK Global Forwarding for reliable and efficient freight services.</p>
        <a href="<?php echo BASE_URL; ?>request_quote.php" class="btn btn-gold btn-lg">Get a Free Quote Now!</a>
    </div>
</section>

<section class="section-padded bg-white">
    <div class="container text-center">
        <h2>Why Choose MyK Global Forwarding?</h2>
        <p class="section-subtitle">We're more than just logistics; we're your partners in growth.</p>
        <div class="features-grid">
            <div class="feature-item">
                <i class="fas fa-globe-americas icon-royalblue"></i>
                <h3>Global Reach</h3>
                <p>Extensive network covering continents, connecting your business worldwide.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-truck-fast icon-royalblue"></i>
                <h3>Timely Delivery</h3>
                <p>Committed to on-time and efficient delivery, every single time.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-shield-alt icon-royalblue"></i>
                <h3>Reliable & Secure</h3>
                <p>Your cargo's safety is our priority, with robust security measures.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-headset icon-royalblue"></i>
                <h3>Dedicated Support</h3>
                <p>24/7 customer service to assist you at every step of the journey.</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padded bg-light-gray">
    <div class="container text-center">
        <h2>Our Core Services</h2>
        <p class="section-subtitle">Diverse solutions tailored to your unique shipping needs.</p>
        <div class="service-cards-grid">
            <div class="service-card">
                <img src="<?php echo BASE_URL; ?>assets/images/service-air.jpg" alt="Air Freight" class="card-img">
                <h3>Air Freight</h3>
                <p>Fast and reliable air cargo solutions for time-sensitive shipments.</p>
                <a href="<?php echo BASE_URL; ?>service_details.php?type=air" class="btn btn-royalblue-outline">Learn More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo BASE_URL; ?>assets/images/service-sea.jpg" alt="Sea Freight" class="card-img">
                <h3>Sea Freight</h3>
                <p>Cost-effective ocean shipping for large volume and bulk cargo.</p>
                <a href="<?php echo BASE_URL; ?>service_details.php?type=sea" class="btn btn-royalblue-outline">Learn More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo BASE_URL; ?>assets/images/service-road.jpg" alt="Road Freight" class="card-img">
                <h3>Road Freight</h3>
                <p>Flexible and efficient ground transportation across regions.</p>
                <a href="<?php echo BASE_URL; ?>service_details.php?type=road" class="btn btn-royalblue-outline">Learn More</a>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="<?php echo BASE_URL; ?>services.php" class="btn btn-royalblue btn-lg">View All Services</a>
        </div>
    </div>
</section>

<section class="section-padded cta-section bg-deep-red text-white">
    <div class="container text-center">
        <h2>Ready for a seamless shipping experience?</h2>
        <p>Get an instant quote and let us handle your logistics challenges.</p>
        <a href="<?php echo BASE_URL; ?>request_quote.php" class="btn btn-gold btn-lg">Request Your Free Quote Today!</a>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
