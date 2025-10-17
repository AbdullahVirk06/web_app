<?php
// Generic Service Detail Page
require_once 'includes/config.php';
require_once 'includes/functions.php';

$service_type = isset($_GET['type']) ? html_escape($_GET['type']) : 'general';
$page_title = "Service Details";
$service_heading = "Our Services";
$service_content = "<p>Please select a specific service to view details.</p>";
$service_image = BASE_URL . 'assets/images/placeholder.jpg';

// Define content based on service type
switch ($service_type) {
    case 'air':
        $page_title = "Air Freight Solutions";
        $service_heading = "Air Freight - Speed & Reliability";
        $service_content = "
            <p>MyK Global Forwarding's Air Freight services are designed for urgent and high-value cargo, offering the fastest transit times for international shipments. We ensure your goods take flight with precision and arrive on schedule, every time.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>Expedited & Standard Options:</strong> Choose the speed that matches your business needs and budget.</li>
                <li><strong>Global Network:</strong> Access to major international airports and a comprehensive network of trusted airline partners.</li>
                <li><strong>Diverse Cargo Handling:</strong> Expertise in managing general cargo, perishables, dangerous goods, and oversized items, adhering to all international regulations.</li>
                <li><strong>Real-Time Tracking:</strong> Advanced tracking systems provide complete visibility of your shipment from departure to arrival.</li>
                <li><strong>Customs Clearance:</strong> Integrated customs brokerage services to ensure seamless border transitions.</li>
            </ul>
            <p>Whether it's a critical spare part or a time-sensitive fashion collection, our air freight specialists work tirelessly to provide efficient and secure transportation.</p>
        ";
        $service_image = BASE_URL . 'assets/images/service-air.jpg';
        break;
    case 'sea':
        $page_title = "Sea Freight Solutions";
        $service_heading = "Sea Freight - Cost-Effective & High Capacity";
        $service_content = "
            <p>For large volume, heavy, or less time-sensitive cargo, MyK Global Forwarding offers robust Sea Freight solutions. We manage both Full Container Load (FCL) and Less than Container Load (LCL) shipments, providing flexible and economical options for global trade.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>FCL & LCL Services:</strong> Flexible container options to suit your cargo size and volume, optimizing costs.</li>
                <li><strong>Global Port Coverage:</strong> Extensive network connecting major ports worldwide, offering diverse route options.</li>
                <li><strong>Special Cargo Handling:</strong> Expertise in handling project cargo, oversized machinery, bulk commodities, and specialized equipment.</li>
                <li><strong>Complete Documentation:</strong> Professional assistance with all necessary shipping documents, permits, and customs declarations.</li>
                <li><strong>Integrated Solutions:</strong> Seamless integration with our road and rail services for comprehensive door-to-door delivery.</li>
            </ul>
            <p>Our sea freight experts are dedicated to finding the most efficient and secure routes for your cargo, minimizing transit times while maximizing cost savings.</p>
        ";
        $service_image = BASE_URL . 'assets/images/service-sea.jpg';
        break;
    case 'road':
        $page_title = "Road Freight Solutions";
        $service_heading = "Road Freight - Flexible & Local Expertise";
        $service_content = "
            <p>MyK Global Forwarding provides comprehensive Road Freight services, offering flexible and efficient ground transportation solutions for domestic and cross-border movements. We ensure your goods are moved safely and efficiently, reaching their destination with precision.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>FTL & LTL Services:</strong> Full Truck Load for dedicated transport and Less Than Truck Load for cost-effective shared space.</li>
                <li><strong>Door-to-Door Delivery:</strong> Convenient and reliable service from your pick-up location directly to the recipient's door.</li>
                <li><strong>Specialized Transport:</strong> Capabilities for temperature-controlled goods, hazardous materials, and oversized cargo with specialized vehicles.</li>
                <li><strong>Extensive Network:</strong> Reliable ground network covering regions for both inter-city and intra-city deliveries.</li>
                <li><strong>Integrated Logistics:</strong> Seamless connection with our air and sea freight services for multi-modal solutions.</li>
            </ul>
            <p>Our road freight team is committed to delivering timely and secure transportation, adapting to your specific needs and schedules.</p>
        ";
        $service_image = BASE_URL . 'assets/images/service-road.jpg';
        break;
    case 'customs':
        $page_title = "Customs Brokerage";
        $service_heading = "Customs Brokerage - Smooth Border Transitions";
        $service_content = "
            <p>Navigating the complexities of international customs regulations can be daunting. MyK Global Forwarding's expert customs brokerage team ensures your goods clear customs efficiently, compliantly, and without unnecessary delays.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>Import & Export Declarations:</strong> Accurate and timely submission of all required customs documentation.</li>
                <li><strong>Duty & Tax Management:</strong> Calculation and optimization of customs duties and taxes to minimize costs.</li>
                <li><strong>Compliance Consulting:</strong> Expert advice on trade agreements, regulations, and licensing requirements to ensure full compliance.</li>
                <li><strong>Documentation Preparation:</strong> Assistance with preparing invoices, packing lists, certificates of origin, and other necessary paperwork.</li>
                <li><strong>Problem Resolution:</strong> Proactive resolution of any customs-related issues to prevent delays.</li>
            </ul>
            <p>Partner with us to streamline your customs processes and ensure a hassle-free flow of your international shipments.</p>
        ";
        break;
    case 'warehousing':
        $page_title = "Warehousing & Distribution";
        $service_heading = "Warehousing & Distribution - Optimized Supply Chain";
        $service_content = "
            <p>MyK Global Forwarding offers secure and flexible warehousing solutions, integrated with efficient distribution services to optimize your supply chain. Whether you need short-term storage or comprehensive inventory management, we provide tailored solutions.</p>
            <h3>Key Features:</h3>
            <ul>
                <li><strong>Secure Storage:</strong> Modern, well-maintained facilities with advanced security systems for all types of goods.</li>
                <li><strong>Inventory Management:</strong> Comprehensive control over your stock, including receiving, put-away, picking, and packing.</li>
                <li><strong>Order Fulfillment:</strong> Efficient processing of orders, from small parcels to large shipments, ensuring accuracy and speed.</li>
                <li><strong>Cross-Docking:</strong> Rapid transfer of goods from incoming to outgoing vehicles with minimal storage, improving efficiency.</li>
                <li><strong>Value-Added Services:</strong> Additional services like labeling, kitting, quality control, and light assembly to meet your specific needs.</li>
            </ul>
            <p>Let us manage your warehousing and distribution needs, allowing you to focus on your core business.</p>
        ";
        break;
    default:
        $page_title = "Our Logistics Services";
        $service_heading = "Our Comprehensive Logistics Services";
        $service_content = "<p>MyK Global Forwarding offers a wide range of logistics services tailored to meet the diverse needs of our clients. From efficient air freight to cost-effective sea shipping and reliable road transport, we ensure your cargo reaches its destination safely and on time.</p><p>Explore our specific service pages to learn more about how we can support your supply chain requirements.</p>";
        $service_image = BASE_URL . 'assets/images/placeholder.jpg';
        break;
}

require_once 'includes/header.php';
?>

<section class="page-hero-section">
    <div class="container text-center">
        <h1><?php echo html_escape($service_heading); ?></h1>
        <p>Details about the specific logistics service offered by MyK Global Forwarding.</p>
    </div>
</section>

<section class="section-padded bg-white">
    <div class="container content-section service-detail-content">
        <div class="service-detail-image">
            <img src="<?php echo html_escape($service_image); ?>" alt="<?php echo html_escape($service_heading); ?>" class="responsive-img">
        </div>
        <div class="service-detail-text">
            <?php echo $service_content; // Content is pre-sanitized in PHP variable ?>
        </div>
    </div>
</section>

<section class="section-padded cta-section bg-royalblue text-white">
    <div class="container text-center">
        <h2>Ready to get a quote for <?php echo html_escape($service_type); ?>?</h2>
        <p>Fill out our form and our experts will get back to you with a competitive offer.</p>
        <a href="<?php echo BASE_URL; ?>request_quote.php" class="btn btn-gold btn-lg">Request a Quote</a>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
