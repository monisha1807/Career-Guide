<?php
session_start();
require_once "config.php";

$status = "";
$statusType = "";
$name = $email = $subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $subject === "" || $message === "") {
        $status = "All fields are required.";
        $statusType = "danger";
    } elseif (!preg_match('/^[A-Za-z ]{3,30}$/', $name)) {
        $status = "Name must contain only letters and spaces (3 to 30 characters).";
        $statusType = "danger";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = "Enter a valid email address.";
        $statusType = "danger";
    } elseif (strlen($subject) < 3) {
        $status = "Subject must be at least 3 characters.";
        $statusType = "danger";
    } elseif (strlen($message) < 10) {
        $status = "Message must be at least 10 characters.";
        $statusType = "danger";
    } else {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        if ($stmt->execute()) {
            $status = "Message sent successfully!";
            $statusType = "success";
            $name = $email = $subject = $message = "";
        } else {
            $status = "Something went wrong while sending your message.";
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
  <title>Career Guide | Contact</title>
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
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
          <li class="nav-item"><a class="nav-link" href="colleges.php">Colleges</a></li>
          <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="btn btn-outline-brand ms-lg-2" href="login.php">Login</a></li>
          <li class="nav-item"><a class="btn btn-brand ms-lg-2" href="quiz.php">Get Started</a></li>
        </ul>
      </div>
    </div>
  </nav>

<section class="inner-page section-space-sm">
  <div class="container">
    <span class="eyebrow">Contact</span>
    <h1 class="mt-2">We’re here to support your academic planning</h1>
    <p class="text-secondary page-intro">Use the form below to get in touch. Your message will be saved using PHP and MySQL.</p>
  </div>
</section>

<section class="section-space pt-0">
  <div class="container">
    <div class="row g-4 align-items-start">
      <div class="col-lg-5"><div class="wide-card h-100"><h3>Contact details</h3><p>Email: support@careerguide.edu</p><p>Phone: +91 98765 43210</p><p>Location: Tamil Nadu, India</p></div></div>
      <div class="col-lg-7">
        <div class="wide-card">
          <?php if ($status !== ""): ?>
            <div class="alert alert-<?php echo $statusType; ?>"><?php echo htmlspecialchars($status); ?></div>
          <?php endif; ?>
          <form id="contactForm" method="post" action="contact.php" novalidate>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="contactName">Full Name</label>
                <input class="form-control" type="text" id="contactName" name="name" required value="<?php echo htmlspecialchars($name); ?>">
                <div class="invalid-feedback"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="contactEmail">Email</label>
                <input class="form-control" type="email" id="contactEmail" name="email" required value="<?php echo htmlspecialchars($email); ?>">
                <div class="invalid-feedback"></div>
              </div>
              <div class="col-12">
                <label class="form-label" for="contactSubject">Subject</label>
                <input class="form-control" type="text" id="contactSubject" name="subject" required value="<?php echo htmlspecialchars($subject); ?>">
                <div class="invalid-feedback"></div>
              </div>
              <div class="col-12">
                <label class="form-label" for="contactMessage">Message</label>
                <textarea class="form-control" rows="5" id="contactMessage" name="message" required><?php echo htmlspecialchars($message); ?></textarea>
                <div class="invalid-feedback"></div>
              </div>
              <div class="col-12"><button class="btn btn-brand" type="submit">Send Message</button></div>
            </div>
          </form>
        </div>
      </div>
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
  const contactForm = document.getElementById('contactForm');
  function setError(input, message) { input.classList.add('is-invalid'); input.classList.remove('is-valid'); input.nextElementSibling.textContent = message; }
  function setSuccess(input) { input.classList.remove('is-invalid'); input.classList.add('is-valid'); input.nextElementSibling.textContent = ''; }
  function validateContactName() { const input = document.getElementById('contactName'); const value = input.value.trim(); const p=/^[A-Za-z ]{3,30}$/; if(value==='') setError(input,'Full name is required.'); else if(!p.test(value)) setError(input,'Name must contain only letters and spaces (3 to 30 characters).'); else setSuccess(input); }
  function validateContactEmail() { const input = document.getElementById('contactEmail'); const value = input.value.trim(); const p=/^[^\s@]+@[^\s@]+\.[^\s@]+$/; if(value==='') setError(input,'Email is required.'); else if(!p.test(value)) setError(input,'Enter a valid email address.'); else setSuccess(input); }
  function validateContactSubject() { const input = document.getElementById('contactSubject'); const value = input.value.trim(); if(value==='') setError(input,'Subject is required.'); else if(value.length<3) setError(input,'Subject must be at least 3 characters.'); else setSuccess(input); }
  function validateContactMessage() { const input = document.getElementById('contactMessage'); const value = input.value.trim(); if(value==='') setError(input,'Message is required.'); else if(value.length<10) setError(input,'Message must be at least 10 characters.'); else setSuccess(input); }
  document.getElementById('contactName').addEventListener('input', validateContactName);
  document.getElementById('contactEmail').addEventListener('input', validateContactEmail);
  document.getElementById('contactSubject').addEventListener('input', validateContactSubject);
  document.getElementById('contactMessage').addEventListener('input', validateContactMessage);
  contactForm.addEventListener('submit', function(e){ validateContactName(); validateContactEmail(); validateContactSubject(); validateContactMessage(); if(contactForm.querySelector('.is-invalid')) e.preventDefault(); });
</script>
</body>
</html>
