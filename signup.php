<?php
// User Registration Page
require_once 'includes/header.php';
require_once 'includes/auth.php'; // For register_user()

$page_title = "Sign Up";
$message = '';
$message_type = '';

if (is_logged_in()) {
    redirect(is_admin() ? 'admin/' : 'client/'); // If already logged in, redirect to respective dashboard
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = html_escape(trim($_POST['full_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Raw password
    $confirm_password = $_POST['confirm_password'];
    $company_name = html_escape(trim($_POST['company_name']));
    $phone_number = html_escape(trim($_POST['phone_number']));

    // Server-side validation
    if (empty($full_name) || empty($email) || empty($password) || empty($confirm_password) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please fill in all required fields and provide a valid email address.";
        $message_type = 'error';
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
        $message_type = 'error';
    } elseif (strlen($password) < 6) {
        $message = "Password must be at least 6 characters long.";
        $message_type = 'error';
    } else {
        if (register_user($full_name, $email, $password, $company_name, $phone_number, 'client')) {
            $message = "Account created successfully! You can now log in.";
            $message_type = 'success';
            // Optionally, log them in immediately after signup
            // login_user($email, $password);
            // redirect('client/');
        } else {
            $message = "Error creating account. Email may already be registered.";
            $message_type = 'error';
        }
    }
}
?>

<section class="page-hero-section">
    <div class="container text-center">
        <h1>Create Your MyK Account</h1>
        <p>Join us to manage your quotes and shipments with ease.</p>
    </div>
</section>

<section class="section-padded bg-white">
    <div class="container form-container small-form">
        <h2>Sign Up</h2>
        <?php if (!empty($message)): ?>
            <?php display_message($message, $message_type); ?>
        <?php endif; ?>
        <form action="<?php echo html_escape($_SERVER['PHP_SELF']); ?>" method="POST" class="auth-form">
            <div class="form-group">
                <label for="full_name">Full Name <span class="required">*</span></label>
                <input type="text" id="full_name" name="full_name" required value="<?php echo isset($_POST['full_name']) ? html_escape($_POST['full_name']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? html_escape($_POST['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password <span class="required">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password <span class="required">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="company_name">Company Name (Optional)</label>
                <input type="text" id="company_name" name="company_name" value="<?php echo isset($_POST['company_name']) ? html_escape($_POST['company_name']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number (Optional)</label>
                <input type="tel" id="phone_number" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? html_escape($_POST['phone_number']) : ''; ?>">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-royalblue btn-lg">Register</button>
            </div>
            <p class="text-center mt-3">Already have an account? <a href="<?php echo BASE_URL; ?>login.php">Log In here</a></p>
        </form>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
