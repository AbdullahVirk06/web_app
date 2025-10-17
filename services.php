<?php
// Services Overview Page
$page_title = "Our Services";
require_once 'includes/header.php';
?>

<section class="page-hero-section">
    <div class="container text-center">
        <h1>Comprehensive Logistics Solutions</h1>
        <p>From air to sea, and road, we cover all your freight forwarding needs.</p>
    </div>
</section>

<section class="section-padded bg-white">
    <div class="container">
        <div class="service-list-item">
            <div class="service-text-content">
                <h2>Air Freight</h2>
                <p>For time-sensitive and high-value shipments, MyK Global Forwarding offers expedited air cargo services. We leverage a vast network of airline partners to provide swift and reliable delivery to destinations worldwide, ensuring your urgent cargo reaches its destination on schedule.</p>
                <ul>
                    <li>Express and Standard services</li>
                    <li>Global airport-to-airport and door-to-door options</li>
                    <li>Handling of various cargo types, including hazardous materials</li>
                    <li>Real-time tracking and visibility</li>
                </ul>
                <a href="<?php echo BASE_URL; ?>service_details.php?type=air" class="btn btn-royalblue">Learn More About Air Freight</a>
            </div>
            <div class="service-image-content">
                <img src="<?php echo BASE_URL; ?>assets/images/service-air.jpg" alt="Air Freight" class="responsive-img">
            </div>
        </div>

        <div class="service-list-item reverse-order">
            <div class="service-image-content">
                <img src="<?php echo BASE_URL; ?>assets/images/service-sea.jpg" alt="Sea Freight" class="responsive-img">
            </div>
            <div class="service-text-content">
                <h2>Sea Freight</h2>
                <p>When cost-effectiveness and capacity are key, our sea freight services provide the ideal solution for large volume and less time-sensitive cargo. We manage Full Container Load (FCL) and Less than Container Load (LCL) shipments, ensuring seamless ocean transportation.</p>
                <ul>
                    <li>FCL and LCL options</li>
                    <li>Extensive global port coverage</li>
                    <li>Project cargo and oversized shipments expertise</li>
                    <li>Complete documentation and customs support</li>
                </ul>
                <a href="<?php echo BASE_URL; ?>service_details.php?type=sea" class="btn btn-royalblue">Learn More About Sea Freight</a>
            </div>
        </div>

        <div class="service-list-item">
            <div class="service-text-content">
                <h2>Road Freight</h2>
                <p>Our comprehensive road freight solutions offer flexible and efficient ground transportation. Whether it's last-mile delivery, cross-border trucking, or domestic distribution, we ensure your goods are moved safely and efficiently by road.</p>
                <ul>
                    <li>Full Truck Load (FTL) and Less than Truck Load (LTL) services</li>
                    <li>Door-to-door delivery</li>
                    <li>Temperature-controlled transport available</li>
                    <li>Specialized vehicle options for various cargo sizes</li>
                </ul>
                <a href="<?php echo BASE_URL; ?>service_details.php?type=road" class="btn btn-royalblue">Learn More About Road Freight</a>
            </div>
            <div class="service-image-content">
                <img src="<?php echo BASE_URL; ?>assets/images/service-road.jpg" alt="Road Freight" class="responsive-img">
            </div>
        </div>

        <div class="service-list-item reverse-order">
            <div class="service-image-content">
                <img src="<?php echo BASE_URL; ?>assets/images/placeholder.jpg" alt="Customs Brokerage" class="responsive-img">
            </div>
            <div class="service-text-content">
                <h2>Customs Brokerage</h2>
                <p>Navigating customs regulations can be complex. Our expert customs brokerage team ensures smooth and compliant clearance of your goods across borders, minimizing delays and avoiding penalties.</p>
                <ul>
                    <li>Import and export declarations</li>
                    <li>Duty and tax calculation</li>
                    <li>Compliance consulting</li>
                    <li>Bonded warehousing solutions</li>
                </ul>
                <a href="<?php echo BASE_URL; ?>service_details.php?type=customs" class="btn btn-royalblue">Learn More About Customs</a>
            </div>
        </div>

        <div class="service-list-item">
            <div class="service-text-content">
                <h2>Warehousing & Distribution</h2>
                <p>We provide secure warehousing and efficient distribution services to optimize your supply chain. From short-term storage to comprehensive inventory management, we offer flexible solutions.</p>
                <ul>
                    <li>Secure storage facilities</li>
                    <li>Inventory management and order fulfillment</li>
                    <li>Cross-docking services</li>
                    <li>Value-added services like labeling and packing</li>
                </ul>
                <a href="<?php echo BASE_URL; ?>service_details.php?type=warehousing" class="btn btn-royalblue">Learn More About Warehousing</a>
            </div>
            <div class="service-image-content">
                <img src="<?php echo BASE_URL; ?>assets/images/placeholder.jpg" alt="Warehousing" class="responsive-img">
            </div>
        </div>

    </div>
</section>

<section class="section-padded cta-section bg-deep-red text-white">
    <div class="container text-center">
        <h2>Need a specific logistics solution?</h2>
        <p>Our team is ready to provide tailored support for your unique requirements.</p>
        <a href="<?php echo BASE_URL; ?>request_quote.php" class="btn btn-gold btn-lg">Request a Quote</a>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
