<?php
// Quote Request Form Page
require_once 'includes/header.php';
require_once 'includes/db.php';
require_once 'includes/functions.php';
require_once 'includes/auth.php'; // For checking if user is logged in

$page_title = "Request a Freight Quote";
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    // Sanitize and validate inputs
    $client_name = html_escape(trim($_POST['full_name']));
    $client_email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $client_phone = html_escape(trim($_POST['phone']));
    $origin_city = html_escape(trim($_POST['origin_city']));
    $origin_country = html_escape(trim($_POST['origin_country']));
    $origin_zip = html_escape(trim($_POST['origin_zip']));
    $destination_city = html_escape(trim($_POST['destination_city']));
    $destination_country = html_escape(trim($_POST['destination_country']));
    $destination_zip = html_escape(trim($_POST['destination_zip']));
    $cargo_type = html_escape(trim($_POST['cargo_type']));
    $length = floatval($_POST['length']);
    $width = floatval($_POST['width']);
    $height = floatval($_POST['height']);
    $weight = floatval($_POST['weight']);
    $weight_unit = html_escape(trim($_POST['weight_unit']));
    $service_type = html_escape(trim($_POST['service_type']));
    $desired_transit = html_escape(trim($_POST['desired_transit']));
    $ready_date = html_escape(trim($_POST['ready_date']));
    $additional_services = isset($_POST['additional_services']) ? implode(', ', array_map('html_escape', $_POST['additional_services'])) : '';
    $special_instructions = html_escape(trim($_POST['special_instructions']));

    // Simple server-side validation
    if (empty($client_name) || empty($client_email) || empty($origin_city) || empty($origin_country) ||
        empty($destination_city) || empty($destination_country) || empty($cargo_type) ||
        empty($weight) || empty($service_type) || empty($ready_date) || !filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please fill in all required fields and ensure email is valid.";
        $message_type = 'error';
    } else {
        // Generate a unique quote reference number
        $quote_reference_number = generate_quote_reference();

        // Prepare dimensions string
        $dimensions = "L:{$length}cm, W:{$width}cm, H:{$height}cm";

        $user_id = is_logged_in() ? $_SESSION['user_id'] : NULL; // Link to user if logged in

        try {
            $stmt = $db->prepare("INSERT INTO quotes (
                quote_reference_number, user_id, client_name, client_email, client_phone,
                origin_city, origin_country, origin_zip, destination_city, destination_country, destination_zip,
                cargo_type, dimensions, weight, weight_unit, service_type, desired_transit, ready_date,
                additional_services, special_instructions, status
            ) VALUES (
                :quote_reference_number, :user_id, :client_name, :client_email, :client_phone,
                :origin_city, :origin_country, :origin_zip, :destination_city, :destination_country, :destination_zip,
                :cargo_type, :dimensions, :weight, :weight_unit, :service_type, :desired_transit, :ready_date,
                :additional_services, :special_instructions, 'Pending'
            )");

            $stmt->bindParam(':quote_reference_number', $quote_reference_number);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':client_name', $client_name);
            $stmt->bindParam(':client_email', $client_email);
            $stmt->bindParam(':client_phone', $client_phone);
            $stmt->bindParam(':origin_city', $origin_city);
            $stmt->bindParam(':origin_country', $origin_country);
            $stmt->bindParam(':origin_zip', $origin_zip);
            $stmt->bindParam(':destination_city', $destination_city);
            $stmt->bindParam(':destination_country', $destination_country);
            $stmt->bindParam(':destination_zip', $destination_zip);
            $stmt->bindParam(':cargo_type', $cargo_type);
            $stmt->bindParam(':dimensions', $dimensions);
            $stmt->bindParam(':weight', $weight);
            $stmt->bindParam(':weight_unit', $weight_unit);
            $stmt->bindParam(':service_type', $service_type);
            $stmt->bindParam(':desired_transit', $desired_transit);
            $stmt->bindParam(':ready_date', $ready_date);
            $stmt->bindParam(':additional_services', $additional_services);
            $stmt->bindParam(':special_instructions', $special_instructions);

            if ($stmt->execute()) {
                $message = "Your quote request (Reference: <strong>{$quote_reference_number}</strong>) has been submitted successfully! We will get back to you shortly.";
                $message_type = 'success';

                // --- Send Email Notifications ---
                // Email to Client
                $client_subject = "MyK Global Forwarding: Your Quote Request Received - " . $quote_reference_number;
                $client_body = "
                    <p>Dear " . html_escape($client_name) . ",</p>
                    <p>Thank you for your recent quote request with MyK Global Forwarding. We've successfully received your inquiry and are currently reviewing the details. Your reference number is: <strong>" . html_escape($quote_reference_number) . "</strong>.</p>
                    <p><strong>Summary of your request:</strong></p>
                    <ul>
                        <li>Service Type: " . html_escape($service_type) . "</li>
                        <li>Origin: " . html_escape($origin_city) . ", " . html_escape($origin_country) . "</li>
                        <li>Destination: " . html_escape($destination_city) . ", " . html_escape($destination_country) . "</li>
                        <li>Cargo Type: " . html_escape($cargo_type) . "</li>
                        <li>Weight: " . html_escape($weight) . " " . html_escape($weight_unit) . "</li>
                        <li>Ready Date: " . format_date($ready_date) . "</li>
                    </ul>
                    <p>Our team is now working on your personalized quote. You can expect to hear from us shortly. If you are a registered user, you can view the status of your request in your <a href='" . BASE_URL . "client/'>Client Portal</a>.</p>
                    <p>We appreciate your interest in MyK Global Forwarding and look forward to serving your logistics needs.</p>
                    <p>Sincerely,<br>The MyK Global Forwarding Team</p>
                ";
                send_email($client_email, $client_subject, $client_body);

                // Email to Company
                $company_subject = "NEW Quote Request Received - " . $client_name . " (Ref: " . $quote_reference_number . ")";
                $company_body = "
                    <p>A new quote request has been submitted on the MyK Global Forwarding website.</p>
                    <p><strong>Client Information:</strong></p>
                    <ul>
                        <li>Name: " . html_escape($client_name) . "</li>
                        <li>Email: " . html_escape($client_email) . "</li>
                        <li>Phone: " . html_escape($client_phone) . "</li>
                    </ul>
                    <p><strong>Quote Details (Reference: " . html_escape($quote_reference_number) . "):</strong></p>
                    <ul>
                        <li>Service Type: " . html_escape($service_type) . "</li>
                        <li>Origin: " . html_escape($origin_city) . ", " . html_escape($origin_country) . " (" . html_escape($origin_zip) . ")</li>
                        <li>Destination: " . html_escape($destination_city) . ", " . html_escape($destination_country) . " (" . html_escape($destination_zip) . ")</li>
                        <li>Cargo Type: " . html_escape($cargo_type) . "</li>
                        <li>Dimensions: " . html_escape($dimensions) . "</li>
                        <li>Weight: " . html_escape($weight) . " " . html_escape($weight_unit) . "</li>
                        <li>Desired Transit: " . html_escape($desired_transit) . "</li>
                        <li>Ready Date: " . format_date($ready_date) . "</li>
                        <li>Additional Services: " . (empty($additional_services) ? 'N/A' : html_escape($additional_services)) . "</li>
                        <li>Special Instructions: " . (empty($special_instructions) ? 'N/A' : html_escape($special_instructions)) . "</li>
                    </ul>
                    <p>Please log in to the <a href='" . BASE_URL . "admin/manage_quotes.php'>Admin Panel</a> to review and process this quote request.</p>
                    <p>Submitted at: " . date('Y-m-d H:i:s') . "</p>
                ";
                send_email(COMPANY_EMAIL, $company_subject, $company_body);

            } else {
                $message = "Error submitting your quote request. Please try again.";
                $message_type = 'error';
                error_log("Quote submission failed: " . implode(" ", $stmt->errorInfo()));
            }
        } catch (PDOException $e) {
            $message = "An error occurred during submission. Please try again.";
            $message_type = 'error';
            error_log("Quote submission PDO error: " . $e->getMessage());
        }
    }
}
?>

<section class="page-hero-section">
    <div class="container text-center">
        <h1>Request a Free Freight Quote</h1>
        <p>Get a personalized quote for your shipping needs. Fill out the form below!</p>
    </div>
</section>

<section class="section-padded bg-white">
    <div class="container form-container">
        <?php if (!empty($message)): ?>
            <?php display_message($message, $message_type); ?>
        <?php endif; ?>

        <form action="<?php echo html_escape($_SERVER['PHP_SELF']); ?>" method="POST" class="quote-form">
            <h3>Your Contact Information</h3>
            <div class="form-group">
                <label for="full_name">Full Name <span class="required">*</span></label>
                <input type="text" id="full_name" name="full_name" required
                    value="<?php echo is_logged_in() ? html_escape($_SESSION['full_name']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" required
                    value="<?php echo is_logged_in() ? html_escape($_SESSION['user_email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone">
            </div>

            <h3>Shipment Details</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="origin_city">Origin City <span class="required">*</span></label>
                    <input type="text" id="origin_city" name="origin_city" required>
                </div>
                <div class="form-group">
                    <label for="origin_country">Origin Country <span class="required">*</span></label>
                    <input type="text" id="origin_country" name="origin_country" required>
                </div>
                <div class="form-group">
                    <label for="origin_zip">Origin Zip/Postal Code</label>
                    <input type="text" id="origin_zip" name="origin_zip">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="destination_city">Destination City <span class="required">*</span></label>
                    <input type="text" id="destination_city" name="destination_city" required>
                </div>
                <div class="form-group">
                    <label for="destination_country">Destination Country <span class="required">*</span></label>
                    <input type="text" id="destination_country" name="destination_country" required>
                </div>
                <div class="form-group">
                    <label for="destination_zip">Destination Zip/Postal Code</label>
                    <input type="text" id="destination_zip" name="destination_zip">
                </div>
            </div>

            <div class="form-group">
                <label for="cargo_type">Cargo Type <span class="required">*</span></label>
                <input type="text" id="cargo_type" name="cargo_type" placeholder="e.g., General, Electronics, Perishable" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="length">Length (cm)</label>
                    <input type="number" id="length" name="length" min="0" step="0.01" value="0">
                </div>
                <div class="form-group">
                    <label for="width">Width (cm)</label>
                    <input type="number" id="width" name="width" min="0" step="0.01" value="0">
                </div>
                <div class="form-group">
                    <label for="height">Height (cm)</label>
                    <input type="number" id="height" name="height" min="0" step="0.01" value="0">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="weight">Total Weight <span class="required">*</span></label>
                    <input type="number" id="weight" name="weight" min="0.01" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="weight_unit">Weight Unit <span class="required">*</span></label>
                    <select id="weight_unit" name="weight_unit" required>
                        <option value="KG">Kilograms (KG)</option>
                        <option value="LBS">Pounds (LBS)</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="service_type">Preferred Service Type <span class="required">*</span></label>
                <select id="service_type" name="service_type" required>
                    <option value="">-- Select Service --</option>
                    <option value="Air Freight">Air Freight</option>
                    <option value="Sea Freight">Sea Freight</option>
                    <option value="Road Freight">Road Freight</option>
                    <option value="Customs Brokerage">Customs Brokerage</option>
                    <option value="Warehousing">Warehousing & Distribution</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="desired_transit">Desired Transit Time</label>
                <input type="text" id="desired_transit" name="desired_transit" placeholder="e.g., Express, Standard, Economy">
            </div>

            <div class="form-group">
                <label for="ready_date">Cargo Ready Date <span class="required">*</span></label>
                <input type="date" id="ready_date" name="ready_date" required>
            </div>

            <div class="form-group">
                <label>Additional Services (Optional)</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="additional_services[]" value="Customs Clearance"> Customs Clearance</label>
                    <label><input type="checkbox" name="additional_services[]" value="Cargo Insurance"> Cargo Insurance</label>
                    <label><input type="checkbox" name="additional_services[]" value="Warehousing"> Warehousing</label>
                    <label><input type="checkbox" name="additional_services[]" value="Packaging"> Packaging</label>
                </div>
            </div>

            <div class="form-group">
                <label for="special_instructions">Special Instructions/Notes</label>
                <textarea id="special_instructions" name="special_instructions" rows="5" placeholder="Any specific requirements or details for your shipment..."></textarea>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-gold btn-lg">Submit Quote Request</button>
            </div>
        </form>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
