<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | URMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Boxicons CDN -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?= base_url('assets/css/auth-style.css') ?>" rel="stylesheet">
</head>
<body>

  <div class="container" id="container">
    <!-- Sign Up Form -->
    <div class="form-container sign-up-container">
      <form action="<?= base_url('/register') ?>" method="post">
        <h2>Create Account</h2>
        <div class="social-container">
          <a href="#" class="social"><i class='bx bxl-google'></i></a>
          <a href="#" class="social"><i class='bx bxl-facebook'></i></a>
          <a href="#" class="social"><i class='bx bxl-linkedin'></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <select name="role" required>
            <option value="">Select Role</option>
            <option value="student">Student</option>
            <option value="faculty">Faculty</option>
        </select>
        <button type="submit">Sign Up</button>
      </form>
    </div>

    <!-- Sign In Form -->
    <div class="form-container sign-in-container">
      <form action="<?= base_url('/login-auth') ?>" method="post">
        <h2>Sign In to URMS</h2>
        <div class="social-container">
          <a href="#" class="social"><i class='bx bxl-google'></i></a>
          <a href="#" class="social"><i class='bx bxl-facebook'></i></a>
          <a href="#" class="social"><i class='bx bxl-linkedin'></i></a>
        </div>
        <span>or use your account</span>
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <a href="<?= base_url('/forgot-password') ?>">Forgot your password?</a>
        <button type="submit">Sign In</button>

        <!-- 🔒 Show only if logged in as admin -->
        <?php if (session()->get('role') === 'admin'): ?>
          <div class="quick-links">
            <p><strong>Quick Dashboard Access:</strong></p>
            <div class="role-buttons">
              <a href="<?= base_url('student/dashboard') ?>" class="role-btn">Student Dashboard</a>
              <a href="<?= base_url('faculty/dashboard') ?>" class="role-btn">Faculty Dashboard</a>
            </div>
          </div>
        <?php endif; ?>
      </form>
    </div>

    <!-- Overlay Panels -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To stay connected with us, please login with your info</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Register with your personal details to use all of our features</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="<?= base_url('assets/js/auth-script.js') ?>"></script>
</body>
</html>
