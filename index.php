<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Career Guide | Home</title>
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

  <header class="hero-section">
    <div class="container">
      <div class="row align-items-center gy-5">
        <div class="col-lg-6">
          <span class="eyebrow">Career Guidance Platform</span>
          <h1 class="display-5 fw-bold mt-3">Choose your future with confidence.</h1>
          <p class="lead text-secondary mt-3">
            Explore trending courses, compare future-ready options, discover NIRF-ranked colleges, and take a career quiz designed to help you make smarter academic decisions.
          </p>
          <div class="d-flex flex-wrap gap-3 mt-4">
            <a href="courses.php" class="btn btn-brand btn-lg">Explore Courses</a>
            <a href="quiz.php" class="btn btn-outline-brand btn-lg">Take Career Quiz</a>
          </div>
          <div class="hero-stats row row-cols-2 row-cols-md-4 g-3 mt-4">
            <div class="col"><div class="stat-card"><strong>40+</strong><span>Course Paths</span></div></div>
            <div class="col"><div class="stat-card"><strong>20+</strong><span>Top Colleges</span></div></div>
            <div class="col"><div class="stat-card"><strong>8</strong><span>Trending Domains</span></div></div>
            <div class="col"><div class="stat-card"><strong>1</strong><span>Smart Quiz</span></div></div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="hero-image-box">
            <img
              src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80"
              alt="Students discussing career guidance"
              class="img-fluid hero-main-img"
            >
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="section-space">
    <div class="container">
      <div class="section-title text-center mb-5">
        <span class="eyebrow">Core features</span>
        <h2 class="mt-2">Everything a student needs in one place</h2>
        <p class="text-secondary">A focused platform to help students compare, shortlist, and decide with clarity.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-xl-3">
          <div class="info-card h-100">
            <div class="icon-badge">01</div>
            <h5>Career Quiz</h5>
            <p>Identify suitable academic directions based on interests, strengths, and future goals.</p>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="info-card h-100">
            <div class="icon-badge">02</div>
            <h5>Course Comparison</h5>
            <p>Compare duration, scope, salary range, and skills across trending courses.</p>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="info-card h-100">
            <div class="icon-badge">03</div>
            <h5>NIRF College Insights</h5>
            <p>Browse leading institutions with ranking labels, location, and course strengths.</p>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="info-card h-100">
            <div class="icon-badge">04</div>
            <h5>Student Guidance</h5>
            <p>Navigate choices with clear, readable information and a professional interface.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-space bg-soft">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
          <span class="eyebrow">Trending courses</span>
          <h2 class="mt-2">Future-ready programs students compare most</h2>
        </div>
        <a href="courses.php" class="link-brand">View all courses →</a>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-xl-3"><div class="course-card h-100"><span class="trend-badge">Trending 2026</span><h5>Artificial Intelligence & ML</h5><p>High-growth field with strong demand across product, research, and enterprise technology.</p><ul><li>Duration: 3–4 years</li><li>Scope: Excellent</li><li>Ideal for: Tech students</li></ul></div></div>
        <div class="col-md-6 col-xl-3"><div class="course-card h-100"><span class="trend-badge">Hot Skill</span><h5>Data Science & Analytics</h5><p>Best suited for students who enjoy mathematics, insights, dashboards, and data-driven work.</p><ul><li>Duration: 3–4 years</li><li>Scope: Excellent</li><li>Ideal for: Math + Tech</li></ul></div></div>
        <div class="col-md-6 col-xl-3"><div class="course-card h-100"><span class="trend-badge">Secure Future</span><h5>Cybersecurity</h5><p>Focused on digital safety, ethical hacking, compliance, and infrastructure protection.</p><ul><li>Duration: 3–4 years</li><li>Scope: Strong</li><li>Ideal for: Problem solvers</li></ul></div></div>
        <div class="col-md-6 col-xl-3"><div class="course-card h-100"><span class="trend-badge">Creative + Tech</span><h5>UI/UX Design</h5><p>Combines design thinking, product experience, and digital interface development.</p><ul><li>Duration: 2–4 years</li><li>Scope: Growing</li><li>Ideal for: Creative thinkers</li></ul></div></div>
      </div>
    </div>
  </section>

  <section class="section-space">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-5">
          <span class="eyebrow">Compare smarter</span>
          <h2 class="mt-2">Compare courses before making a decision</h2>
          <p class="text-secondary">A professional comparison layout helps students evaluate options on eligibility, future scope, salary range, and required skills.</p>
          <a href="courses.html#compare" class="btn btn-brand mt-3">Open Comparison</a>
        </div>
        <div class="col-lg-7">
          <div class="comparison-preview">
            <div class="compare-col">
              <h6>AI & ML</h6>
              <p>Best for automation, models, and intelligent systems.</p>
            </div>
            <div class="compare-col">
              <h6>Data Science</h6>
              <p>Best for analytics, business insights, and big data.</p>
            </div>
            <div class="compare-col">
              <h6>Cybersecurity</h6>
              <p>Best for secure systems, networks, and risk control.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-space bg-soft">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
          <span class="eyebrow">Top colleges</span>
          <h2 class="mt-2">Explore institutions with NIRF ranking labels</h2>
        </div>
        <a href="colleges.php" class="link-brand">Browse colleges →</a>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-xl-3"><div class="college-card h-100"><span class="rank-pill">NIRF #1</span><h5>IIT Madras</h5><p>Chennai</p><small>Top for Engineering, AI, Data, Research</small></div></div>
        <div class="col-md-6 col-xl-3"><div class="college-card h-100"><span class="rank-pill">NIRF #2</span><h5>IIT Delhi</h5><p>New Delhi</p><small>Top for Engineering, Innovation, Startups</small></div></div>
        <div class="col-md-6 col-xl-3"><div class="college-card h-100"><span class="rank-pill">NIRF #3</span><h5>IIT Bombay</h5><p>Mumbai</p><small>Strong placements and research ecosystem</small></div></div>
        <div class="col-md-6 col-xl-3"><div class="college-card h-100"><span class="rank-pill">Top NIT</span><h5>NIT Tiruchirappalli</h5><p>Tiruchirappalli</p><small>Strong national reputation and outcomes</small></div></div>
      </div>
    </div>
  </section>

  <section class="section-space">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="wide-card h-100">
            <span class="eyebrow">Why choose us</span>
            <h3 class="mt-2">Designed for clarity, trust, and better decisions</h3>
            <div class="row g-3 mt-1">
              <div class="col-sm-6"><div class="mini-feature"><strong>Updated trends</strong><span>Find current course directions and demand.</span></div></div>
              <div class="col-sm-6"><div class="mini-feature"><strong>Student-first UX</strong><span>Simple, clean, and mobile-friendly layouts.</span></div></div>
              <div class="col-sm-6"><div class="mini-feature"><strong>Comparison tools</strong><span>Make side-by-side analysis easier.</span></div></div>
              <div class="col-sm-6"><div class="mini-feature"><strong>College focus</strong><span>Shortlist based on ranking and relevance.</span></div></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="wide-card h-100">
            <span class="eyebrow">Student feedback</span>
            <h3 class="mt-2">What students value most</h3>
            <div class="testimonial-card mt-3">
              <p>“The quiz and comparison section helped me understand whether I should choose CSE, AI, or Data Science.”</p>
              <strong>— Student User</strong>
            </div>
            <div class="testimonial-card mt-3">
              <p>“The clean layout and college ranking cards made shortlisting much easier.”</p>
              <strong>— Career Explorer</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="container">
      <div class="cta-box text-center">
        <span class="eyebrow text-white-50">Start your journey</span>
        <h2 class="text-white mt-2">Ready to plan your future with confidence?</h2>
        <p class="text-white-50 mx-auto">Use the career quiz, compare trending courses, and explore top colleges in one modern platform.</p>
        <div class="d-flex justify-content-center flex-wrap gap-3 mt-4">
          <a href="quiz.php" class="btn btn-light btn-lg">Start Career Quiz</a>
          <a href="colleges.php" class="btn btn-outline-light btn-lg">Explore Colleges</a>
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
  <script src="script.js"></script>
</body>
</html>