<?php
// About Us Page
$page_title = "About Us";
require_once 'includes/header.php';
?>

<section class="page-hero-section">
    <div class="container text-center">
        <h1>About MyK Global Forwarding</h1>
        <p>Your trusted partner in navigating the complexities of global logistics.</p>
    </div>
</section>

<section class="section-padded bg-white">
    <div class="container content-section">
        <h2>Our Mission</h2>
        <p>At MyK Global Forwarding, our mission is to deliver unparalleled logistics solutions that empower businesses to thrive in the global marketplace. We are committed to efficiency, reliability, and innovative approaches that connect supply chains seamlessly, from origin to destination.</p>

        <h2>Our Vision</h2>
        <p>To be the leading global logistics provider, recognized for our commitment to excellence, customer-centric approach, and cutting-edge technology that simplifies international trade for all our partners.</p>

        <h2>Our Values</h2>
        <div class="values-grid">
            <div class="value-item">
                <i class="fas fa-handshake icon-gold"></i>
                <h3>Integrity</h3>
                <p>Operating with the highest ethical standards, fostering trust and transparency in every interaction.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-cogs icon-gold"></i>
                <h3>Efficiency</h3>
                <p>Streamlining processes and optimizing routes to ensure swift and cost-effective deliveries.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-users icon-gold"></i>
                <h3>Customer Focus</h3>
                <p>Placing our clients at the heart of everything we do, providing personalized and responsive service.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-lightbulb icon-gold"></i>
                <h3>Innovation</h3>
                <p>Continuously seeking new technologies and methodologies to enhance our services and client experience.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-leaf icon-gold"></i>
                <h3>Sustainability</h3>
                <p>Committed to environmentally responsible practices that minimize our carbon footprint.</p>
            </div>
        </div>

        <h2>Our Story</h2>
        <p>Founded in [Year], MyK Global Forwarding began with a vision to simplify complex international shipping. Over the years, we have grown into a robust network, serving diverse industries and building a reputation for reliability and excellence. Our journey is marked by continuous adaptation to market demands, investment in technology, and a dedicated team passionate about logistics.</p>
        <p>We believe that strong relationships are built on trust and consistent performance. This philosophy drives us to go the extra mile for our clients, ensuring their cargo arrives safely and on time, every time.</p>
    </div>
</section>

<section class="section-padded cta-section bg-royalblue text-white">
    <div class="container text-center">
        <h2>Partner with a leader in global logistics.</h2>
        <p>Discover how our expertise can benefit your business.</p>
        <a href="<?php echo BASE_URL; ?>contact.php" class="btn btn-gold btn-lg">Get in Touch</a>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
