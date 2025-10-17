<?php
// User Login Page
require_once 'includes/header.php';
require_once 'includes/auth.php'; // For login_user()

$page_title = "Login";
$message = '';
$message_type = '';

if (is_logged_in()) {
    redirect(is_admin() ? 'admin/' : 'client/'); // If already logged in, redirect to respective dashboard
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $message = "Please enter both email and password.";
        $message_type = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
        $message_type = 'error';
    } else {
        if (login_user($email, $password)) {
            // Redirect based on user role
            if (is_admin()) {
                redirect('admin/');
            } else {
                redirect('client/');
            }
        } else {
            $message = "Invalid email or password.";
            $message_type = 'error';
        }
    }
}
?>

<section class="page-hero-section">
    <div class="container text-center">
        <h1>Login to Your MyK Account</h1>
        <p>Access your client portal or admin panel.</p>
    </div>
</section>

<section class="section-padded bg-white">
    <div class="container form-container small-form">
        <h2>Login</h2>
        <?php if (!empty($message)): ?>
            <?php display_message($message, $message_type); ?>
        <?php endif; ?>
        <form action="<?php echo html_escape($_SERVER['PHP_SELF']); ?>" method="POST" class="auth-form">
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? html_escape($_POST['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password <span class="required">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-royalblue btn-lg">Login</button>
            </div>
            <p class="text-center mt-3">Don't have an account? <a href="<?php echo BASE_URL; ?>signup.php">Sign Up here</a></p>
            <p class="text-center"><a href="#">Forgot Password?</a> (Feature to be implemented)</p>
        </form>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
