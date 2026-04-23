<?php
session_start();
require_once "config.php";

$status = "";
$statusType = "";

$name = $email = $phone = $studentClass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $studentClass = trim($_POST["student_class"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirm_password"] ?? "";

    if ($name === "" || $email === "" || $phone === "" || $studentClass === "" || $password === "" || $confirmPassword === "") {
        $status = "All fields are required.";
        $statusType = "danger";
    } elseif (!preg_match('/^[A-Za-z ]{3,30}$/', $name)) {
        $status = "Name must contain only letters and spaces (3 to 30 characters).";
        $statusType = "danger";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = "Enter a valid email address.";
        $statusType = "danger";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $status = "Phone number must contain exactly 10 digits.";
        $statusType = "danger";
    } elseif (strlen($password) < 6) {
        $status = "Password must be at least 6 characters.";
        $statusType = "danger";
    } elseif ($password !== $confirmPassword) {
        $status = "Password and confirm password do not match.";
        $statusType = "danger";
    } else {
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            $status = "This email is already registered.";
            $statusType = "danger";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = $conn->prepare("INSERT INTO users (name, email, phone, student_class, password) VALUES (?, ?, ?, ?, ?)");
            $insertStmt->bind_param("sssss", $name, $email, $phone, $studentClass, $hashedPassword);

            if ($insertStmt->execute()) {
                $status = "Registration successful! You can now login.";
                $statusType = "success";
                $name = $email = $phone = $studentClass = "";
            } else {
                $status = "Something went wrong while registering.";
                $statusType = "danger";
            }
            $insertStmt->close();
        }
        $checkStmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Career Guide | Register</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
  <div class="container py-2">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.php"><span class="brand-mark">CG</span><span>Career Guide</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="colleges.php">Colleges</a></li>
        <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="btn btn-outline-brand ms-lg-2" href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<section class="auth-section">
  <div class="container">
    <div class="auth-card mx-auto auth-card-lg">
      <h1 class="mb-2">Create your account</h1>
      <p class="text-secondary mb-4">Register to save preferences and explore a guided student experience.</p>

      <?php if ($status !== ""): ?>
        <div class="alert alert-<?php echo $statusType; ?>"><?php echo htmlspecialchars($status); ?></div>
      <?php endif; ?>

      <form id="registerForm" method="post" action="register.php" novalidate>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label" for="regName">Full Name</label>
            <input type="text" id="regName" name="name" class="form-control" required value="<?php echo htmlspecialchars($name); ?>">
            <div class="invalid-feedback"></div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="regEmail">Email Address</label>
            <input type="email" id="regEmail" name="email" class="form-control" required value="<?php echo htmlspecialchars($email); ?>">
            <div class="invalid-feedback"></div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="regPhone">Phone Number</label>
            <input type="tel" id="regPhone" name="phone" class="form-control" required value="<?php echo htmlspecialchars($phone); ?>">
            <div class="invalid-feedback"></div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="regStream">Class</label>
            <select id="regStream" name="student_class" class="form-select" required>
              <option value="">Select</option>
              <option value="10th" <?php if ($studentClass === '10th') echo 'selected'; ?>>10th</option>
              <option value="12th" <?php if ($studentClass === '12th') echo 'selected'; ?>>12th</option>
              <option value="Graduate" <?php if ($studentClass === 'Graduate') echo 'selected'; ?>>Graduate</option>
            </select>
            <div class="invalid-feedback"></div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="regPassword">Password</label>
            <input type="password" id="regPassword" name="password" class="form-control" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="regConfirmPassword">Confirm Password</label>
            <input type="password" id="regConfirmPassword" name="confirm_password" class="form-control" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="col-12"><button type="submit" class="btn btn-brand w-100">Register</button></div>
        </div>
      </form>
      <p class="text-center mt-4 mb-0">Already have an account? <a href="login.php" class="link-brand">Login here</a></p>
    </div>
  </div>
</section>

<footer class="site-footer">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <h5>Career Guide</h5>
          <p>A modern student guidance website that helps learners explore courses, compare opportunities, and choose colleges with better confidence.</p>
        </div>
        <div class="col-6 col-lg-2">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="colleges.php">Colleges</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-3">
          <h6>Support</h6>
          <ul class="footer-links">
            <li><a href="quiz.php">Career Quiz</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Student Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div>
        <div class="col-lg-3">
          <h6>Contact</h6>
          <ul class="footer-contact">
            <li>Email: support@careerguide.edu</li>
            <li>Phone: +91 98765 43210</li>
            <li>Location: Tamil Nadu, India</li>
            <li>Hours: Mon – Sat, 9 AM – 6 PM</li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">© 2026 Career Guide. All rights reserved.</div>
    </div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const registerForm = document.getElementById('registerForm');
  function setError(input, message) { input.classList.add('is-invalid'); input.classList.remove('is-valid'); input.nextElementSibling.textContent = message; }
  function setSuccess(input) { input.classList.remove('is-invalid'); input.classList.add('is-valid'); input.nextElementSibling.textContent = ''; }
  function validateRegName() { const input = document.getElementById('regName'); const value = input.value.trim(); const p=/^[A-Za-z ]{3,30}$/; if(value==='') setError(input,'Full name is required.'); else if(!p.test(value)) setError(input,'Name must contain only letters and spaces (3 to 30 characters).'); else setSuccess(input); }
  function validateRegEmail() { const input = document.getElementById('regEmail'); const value = input.value.trim(); const p=/^[^\s@]+@[^\s@]+\.[^\s@]+$/; if(value==='') setError(input,'Email is required.'); else if(!p.test(value)) setError(input,'Enter a valid email address.'); else setSuccess(input); }
  function validateRegPhone() { const input = document.getElementById('regPhone'); const value = input.value.trim(); const p=/^[0-9]{10}$/; if(value==='') setError(input,'Phone number is required.'); else if(!p.test(value)) setError(input,'Phone number must contain exactly 10 digits.'); else setSuccess(input); }
  function validateRegStream() { const input = document.getElementById('regStream'); if(input.value==='') setError(input,'Please select your class.'); else setSuccess(input); }
  function validateRegPassword() { const input = document.getElementById('regPassword'); const value = input.value.trim(); if(value==='') setError(input,'Password is required.'); else if(value.length<6) setError(input,'Password must be at least 6 characters.'); else setSuccess(input); }
  function validateRegConfirmPassword() { const input = document.getElementById('regConfirmPassword'); const value = input.value.trim(); const password = document.getElementById('regPassword').value.trim(); if(value==='') setError(input,'Confirm password is required.'); else if(value!==password) setError(input,'Password and confirm password do not match.'); else setSuccess(input); }
  document.getElementById('regName').addEventListener('input', validateRegName);
  document.getElementById('regEmail').addEventListener('input', validateRegEmail);
  document.getElementById('regPhone').addEventListener('input', validateRegPhone);
  document.getElementById('regStream').addEventListener('change', validateRegStream);
  document.getElementById('regPassword').addEventListener('input', validateRegPassword);
  document.getElementById('regConfirmPassword').addEventListener('input', validateRegConfirmPassword);
  registerForm.addEventListener('submit', function(e){ validateRegName(); validateRegEmail(); validateRegPhone(); validateRegStream(); validateRegPassword(); validateRegConfirmPassword(); if(registerForm.querySelector('.is-invalid')) e.preventDefault(); });
</script>
</body>
</html>
