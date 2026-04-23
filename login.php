<?php
session_start();
require_once "config.php";

if (isset($_SESSION["user_id"])) {
    header("Location: quiz.php");
    exit;
}

$status = "";
$statusType = "";
$email = $studentClass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $studentClass = trim($_POST["student_class"] ?? "");

    if ($email === "" || $password === "" || $studentClass === "") {
        $status = "All fields are required.";
        $statusType = "danger";
    } else {
        $stmt = $conn->prepare("SELECT id, name, email, student_class, password FROM users WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["student_class"] = $studentClass;
                header("Location: quiz.php");
                exit;
            } else {
                $status = "Incorrect password.";
                $statusType = "danger";
            }
        } else {
            $status = "No account found with this email.";
            $statusType = "danger";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Career Guide | Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container py-2">
      <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.php">
        <span class="brand-mark">CG</span>
        <span>Career Guide</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
          <li class="nav-item"><a class="nav-link" href="colleges.php">Colleges</a></li>
          <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="btn btn-brand ms-lg-2" href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="auth-section">
    <div class="container">
      <div class="auth-card mx-auto">
        <h1 class="mb-2">Welcome Back</h1>
        <p class="text-secondary mb-4">Login to continue your career guidance journey.</p>

        <?php if ($status !== ""): ?>
          <div class="alert alert-<?php echo $statusType; ?>"><?php echo htmlspecialchars($status); ?></div>
        <?php endif; ?>

        <form id="loginForm" method="post" action="login.php" novalidate>
          <div class="mb-3">
            <label class="form-label" for="loginEmail">Email Address</label>
            <input type="email" id="loginEmail" name="email" class="form-control" required value="<?php echo htmlspecialchars($email); ?>">
            <div class="invalid-feedback"></div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="loginPassword">Password</label>
            <input type="password" id="loginPassword" name="password" class="form-control" required>
            <div class="invalid-feedback"></div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="studentClass">Select Class</label>
            <select id="studentClass" name="student_class" class="form-select" required>
              <option value="">Choose your class</option>
              <option value="10th" <?php if ($studentClass === '10th') echo 'selected'; ?>>10th</option>
              <option value="12th" <?php if ($studentClass === '12th') echo 'selected'; ?>>12th</option>
              <option value="Graduate" <?php if ($studentClass === 'Graduate') echo 'selected'; ?>>Graduate</option>
            </select>
            <div class="invalid-feedback"></div>
          </div>

          <button type="submit" class="btn btn-brand w-100">Login</button>
        </form>

        <p class="text-center mt-4 mb-0">
          New here? <a href="register.php" class="link-brand">Create an account</a>
        </p>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="container">
      <div class="footer-bottom only-bottom">© 2026 Career Guide. All rights reserved.</div>
    </div>
  </footer>

  <script>
    const loginForm = document.getElementById('loginForm');
    function setError(input, message) { input.classList.add('is-invalid'); input.classList.remove('is-valid'); input.nextElementSibling.textContent = message; }
    function setSuccess(input) { input.classList.remove('is-invalid'); input.classList.add('is-valid'); input.nextElementSibling.textContent = ''; }
    function validateLoginEmail() { const input = document.getElementById('loginEmail'); const value = input.value.trim(); const p=/^[^\s@]+@[^\s@]+\.[^\s@]+$/; if(value==='') setError(input,'Email is required.'); else if(!p.test(value)) setError(input,'Enter a valid email address.'); else setSuccess(input); }
    function validateLoginPassword() { const input = document.getElementById('loginPassword'); const value = input.value.trim(); if(value==='') setError(input,'Password is required.'); else if(value.length<6) setError(input,'Password must be at least 6 characters.'); else setSuccess(input); }
    function validateStudentClass() { const input = document.getElementById('studentClass'); if(input.value==='') setError(input,'Please select your class.'); else setSuccess(input); }
    document.getElementById('loginEmail').addEventListener('input', validateLoginEmail);
    document.getElementById('loginPassword').addEventListener('input', validateLoginPassword);
    document.getElementById('studentClass').addEventListener('change', validateStudentClass);
    loginForm.addEventListener('submit', function(e){ validateLoginEmail(); validateLoginPassword(); validateStudentClass(); if(loginForm.querySelector('.is-invalid')) e.preventDefault(); });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
