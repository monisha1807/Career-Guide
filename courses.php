<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Career Guide | Courses</title>
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
    <span class="eyebrow">Courses</span>
    <h1 class="mt-2">Trending programs and smart comparison tools</h1>
    <p class="text-secondary page-intro">Explore high-demand courses with clean summaries and compare them side by side before choosing.</p>
  </div>
</section>

<section class="section-space pt-0">
  <div class="container">
    <div class="row g-4 mb-4">
      <div class="col-md-6 col-xl-3"><div class="course-card h-100"><span class="trend-badge">Trending</span><h5>AI & ML</h5><p>Focus on intelligent systems, models, automation, and product innovation.</p></div></div>
      <div class="col-md-6 col-xl-3"><div class="course-card h-100"><span class="trend-badge">Trending</span><h5>Data Science</h5><p>Strong mix of statistics, coding, dashboards, and predictive analytics.</p></div></div>
      <div class="col-md-6 col-xl-3"><div class="course-card h-100"><span class="trend-badge">Growing</span><h5>Cybersecurity</h5><p>Security-focused path for networks, systems, compliance, and risk defense.</p></div></div>
      <div class="col-md-6 col-xl-3"><div class="course-card h-100"><span class="trend-badge">Creative</span><h5>UI/UX Design</h5><p>Ideal for students interested in product thinking, interfaces, and design systems.</p></div></div>
    </div>

    <div class="wide-card" id="compare">
      <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
          <span class="eyebrow">Course comparison</span>
          <h3 class="mt-2 mb-0">Compare two courses</h3>
        </div>
      </div>
      <div class="row g-3 align-items-end">
        <div class="col-md-5">
          <label class="form-label">Choose first course</label>
          <select id="courseOne" class="form-select">
            <option value="aiml">AI & ML</option>
            <option value="datascience">Data Science</option>
            <option value="cybersecurity">Cybersecurity</option>
            <option value="uiux">UI/UX Design</option>
          </select>
        </div>
        <div class="col-md-5">
          <label class="form-label">Choose second course</label>
          <select id="courseTwo" class="form-select">
            <option value="datascience">Data Science</option>
            <option value="aiml">AI & ML</option>
            <option value="cybersecurity">Cybersecurity</option>
            <option value="uiux">UI/UX Design</option>
          </select>
        </div>
        <div class="col-md-2 d-grid">
          <button class="btn btn-brand" id="compareBtn">Compare</button>
        </div>
      </div>
      <div class="row g-4 mt-2" id="compareResult"></div>
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
<script src="script.js"></script>
</body>
</html>
