<?php
// Contact Us Page
$page_title = "Contact Us";
require_once 'includes/header.php';
?>

<section class="page-hero-section">
    <div class="container text-center">
        <h1>Get in Touch with MyK Global Forwarding</h1>
        <p>We're here to answer your questions and assist with your logistics needs.</p>
    </div>
</section>

<section class="section-padded bg-white">
    <div class="container content-section contact-info-grid">
        <div class="contact-card">
            <i class="fas fa-phone-alt icon-royalblue"></i>
            <h3>Phone Support</h3>
            <p>Speak directly with our logistics experts.</p>
            <p><strong><?php echo COMPANY_PHONE; ?></strong></p>
            <p>Available: Mon-Fri, 9 AM - 5 PM (Local Time)</p>
        </div>
        <div class="contact-card">
            <i class="fas fa-envelope icon-royalblue"></i>
            <h3>Email Us</h3>
            <p>Send us your inquiries, and we'll respond promptly.</p>
            <p><strong><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a></strong></p>
            <p>For urgent matters, please call us.</p>
        </div>
        <div class="contact-card">
            <i class="fas fa-map-marker-alt icon-royalblue"></i>
            <h3>Our Office</h3>
            <p>Visit our main office for face-to-face consultation.</p>
            <p><strong>123 Logistics Street, Global City,<br>GL 12345, Country</strong></p>
            <p>Appointments recommended for detailed discussions.</p>
        </div>
    </div>
</section>

<section class="section-padded bg-light-gray">
    <div class="container form-container">
        <h2>Send Us a Message</h2>
        <p class="text-center mb-4">Have a general question or need more information?</p>
        <form action="#" method="POST" class="contact-form">
            <div class="form-group">
                <label for="contact_name">Your Name <span class="required">*</span></label>
                <input type="text" id="contact_name" name="contact_name" required>
            </div>
            <div class="form-group">
                <label for="contact_email">Your Email <span class="required">*</span></label>
                <input type="email" id="contact_email" name="contact_email" required>
            </div>
            <div class="form-group">
                <label for="contact_subject">Subject <span class="required">*</span></label>
                <input type="text" id="contact_subject" name="contact_subject" required>
            </div>
            <div class="form-group">
                <label for="contact_message">Your Message <span class="required">*</span></label>
                <textarea id="contact_message" name="contact_message" rows="8" required></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-royalblue btn-lg">Send Message</button>
            </div>
        </form>
    </div>
</section>

<!-- Optional: Map integration (you'd replace this with an actual Google Maps embed) -->
<section class="map-section">
    <div class="container">
        <h2>Find Us on the Map</h2>
        <div class="map-placeholder">
            <!-- Replace with actual Google Maps embed code -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.76017774288!2d74.3418520750989!3d31.579624846430348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919045749f993d5%3A0x6b4f73a34a9f931d!2sLahore%20University%20of%20Management%20Sciences!5e0!3m2!1sen!2spk!4v1718049615569!5m2!1sen!2spk"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
