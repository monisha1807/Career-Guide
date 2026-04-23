<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
$studentClass = $_SESSION["student_class"] ?? "";
$userName = $_SESSION["user_name"] ?? "Student";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Career Guide | Quiz</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />

  <style>
    .quiz-set {
      display: none;
    }

    .quiz-set.active {
      display: block;
    }

    .quiz-block {
      background: #f8fafc;
      padding: 20px;
      border-radius: 16px;
      margin-bottom: 18px;
      border: 1px solid #e2e8f0;
    }

    .quiz-block h5 {
      margin-bottom: 14px;
      color: #0f172a;
      font-size: 1.05rem;
    }

    .quiz-block label {
      display: block;
      margin-bottom: 10px;
      color: #334155;
      cursor: pointer;
    }

    .quiz-block input[type="radio"] {
      margin-right: 10px;
    }

    .result-box {
      background: #eff6ff;
      border: 1px solid #bfdbfe;
      border-radius: 16px;
      padding: 20px;
      color: #1e3a8a;
      font-weight: 600;
    }
  </style>
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
          <li class="nav-item"><a class="nav-link active" href="quiz.php">Quiz</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="btn btn-outline-brand ms-lg-2" href="login.php">Login</a></li>
          <li class="nav-item"><a class="btn btn-brand ms-lg-2" href="quiz.php">Get Started</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="inner-page section-space-sm">
    <div class="container">
      <span class="eyebrow">Career Quiz</span>
      <p class="mt-3 mb-0"><strong>Welcome, <?php echo htmlspecialchars($userName); ?></strong> | <a href="logout.php" class="link-brand">Logout</a></p>
      <h1 class="mt-2">Discover a direction that fits your interests</h1>
      <p class="text-secondary page-intro" id="quizIntro">
        Answer a few questions and get your result.
      </p>
    </div>
  </section>

  <section class="section-space pt-0">
    <div class="container">
      <div class="wide-card">

        <!-- 10th Quiz -->
        <div id="quiz10" class="quiz-set">
          <form id="careerQuiz10">

            <div class="quiz-block">
              <h5>1. Which subject do you enjoy most?</h5>
              <label><input type="radio" name="q10_1" value="science"> Mathematics / Science</label>
              <label><input type="radio" name="q10_1" value="commerce"> Business / Accounts basics</label>
              <label><input type="radio" name="q10_1" value="arts"> English / Social Science</label>
              <label><input type="radio" name="q10_1" value="diploma"> Practical / Technical activities</label>
            </div>

            <div class="quiz-block">
              <h5>2. What kind of work interests you?</h5>
              <label><input type="radio" name="q10_2" value="science"> Solving problems and experiments</label>
              <label><input type="radio" name="q10_2" value="commerce"> Business and money management</label>
              <label><input type="radio" name="q10_2" value="arts"> Writing, communication and society</label>
              <label><input type="radio" name="q10_2" value="diploma"> Hands-on practical work</label>
            </div>

            <div class="quiz-block">
              <h5>3. Which career sounds better to you?</h5>
              <label><input type="radio" name="q10_3" value="science"> Engineer / Doctor / Scientist</label>
              <label><input type="radio" name="q10_3" value="commerce"> Accountant / Banker / Entrepreneur</label>
              <label><input type="radio" name="q10_3" value="arts"> Teacher / Lawyer / Journalist</label>
              <label><input type="radio" name="q10_3" value="diploma"> Technician / Skilled professional</label>
            </div>

            <button type="submit" class="btn btn-brand mt-3">Result</button>
          </form>

          <div id="quizResult10" class="mt-4"></div>
        </div>

        <!-- 12th Quiz -->
        <div id="quiz12" class="quiz-set">
          <form id="careerQuiz12">

            <div class="quiz-block">
              <h5>1. Which area interests you most?</h5>
              <label><input type="radio" name="q12_1" value="cse"> Programming / software / web development</label>
              <label><input type="radio" name="q12_1" value="ai"> Artificial Intelligence / smart systems</label>
              <label><input type="radio" name="q12_1" value="data"> Data, charts, analytics</label>
              <label><input type="radio" name="q12_1" value="business"> Management / business / finance</label>
            </div>

            <div class="quiz-block">
              <h5>2. Which skill matches you best?</h5>
              <label><input type="radio" name="q12_2" value="cse"> Logical thinking and coding</label>
              <label><input type="radio" name="q12_2" value="ai"> Problem solving with innovation</label>
              <label><input type="radio" name="q12_2" value="data"> Analysis and interpretation</label>
              <label><input type="radio" name="q12_2" value="business"> Leadership and communication</label>
            </div>

            <div class="quiz-block">
              <h5>3. Which career do you prefer?</h5>
              <label><input type="radio" name="q12_3" value="cse"> Software Developer / Web Developer</label>
              <label><input type="radio" name="q12_3" value="ai"> AI Engineer / ML Engineer</label>
              <label><input type="radio" name="q12_3" value="data"> Data Analyst / Data Scientist</label>
              <label><input type="radio" name="q12_3" value="business"> Business Analyst / Manager</label>
            </div>

            <button type="submit" class="btn btn-brand mt-3">Result</button>
          </form>

          <div id="quizResult12" class="mt-4"></div>
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


  <script>
    const studentClass = <?php echo json_encode($studentClass); ?>;

    if (studentClass === "10th") {
      document.getElementById("quiz10").classList.add("active");
      document.getElementById("quizIntro").innerHTML =
        "You are logged in as <strong>10th student</strong>. Answer these questions to know the best stream for you.";
    } 
    else if (studentClass === "12th") {
      document.getElementById("quiz12").classList.add("active");
      document.getElementById("quizIntro").innerHTML =
        "You are logged in as <strong>12th student</strong>. Answer these questions to know the best course for you.";
    } 
    else {
      alert("Please login first and select your class.");
      window.location.href = "login.html";
    }

    document.getElementById("careerQuiz10").addEventListener("submit", function(e) {
      e.preventDefault();

      const answers = [
        document.querySelector('input[name="q10_1"]:checked')?.value,
        document.querySelector('input[name="q10_2"]:checked')?.value,
        document.querySelector('input[name="q10_3"]:checked')?.value
      ];

      if (answers.includes(undefined)) {
        alert("Please answer all questions.");
        return;
      }

      const count = {};
      answers.forEach(a => count[a] = (count[a] || 0) + 1);
      const resultKey = Object.keys(count).reduce((a, b) => count[a] > count[b] ? a : b);

      const resultMap = {
        science: "Recommended Stream: <strong>Science</strong><br>Best for students interested in Engineering, Medicine, Computer Science, and research careers.",
        commerce: "Recommended Stream: <strong>Commerce</strong><br>Best for students interested in Finance, Business, Banking, Accountancy, and management.",
        arts: "Recommended Stream: <strong>Arts & Humanities</strong><br>Best for students interested in communication, society, teaching, law, and public service.",
        diploma: "Recommended Stream: <strong>Diploma / Vocational</strong><br>Best for students who prefer practical learning and technical education."
      };

      document.getElementById("quizResult10").innerHTML =
        `<div class="result-box">${resultMap[resultKey]}</div>`;
    });

    document.getElementById("careerQuiz12").addEventListener("submit", function(e) {
      e.preventDefault();

      const answers = [
        document.querySelector('input[name="q12_1"]:checked')?.value,
        document.querySelector('input[name="q12_2"]:checked')?.value,
        document.querySelector('input[name="q12_3"]:checked')?.value
      ];

      if (answers.includes(undefined)) {
        alert("Please answer all questions.");
        return;
      }

      const count = {};
      answers.forEach(a => count[a] = (count[a] || 0) + 1);
      const resultKey = Object.keys(count).reduce((a, b) => count[a] > count[b] ? a : b);

      const resultMap = {
        cse: "Recommended Course: <strong>Computer Science Engineering / BCA / Software-related course</strong><br>Best for students interested in coding, software development, websites, and applications.",
        ai: "Recommended Course: <strong>Artificial Intelligence & Machine Learning</strong><br>Best for students interested in smart systems, automation, and future technologies.",
        data: "Recommended Course: <strong>Data Science / Data Analytics</strong><br>Best for students interested in data, statistics, charts, and analysis.",
        business: "Recommended Course: <strong>BBA / B.Com / Business Analytics</strong><br>Best for students interested in business, finance, planning, and management."
      };

      document.getElementById("quizResult12").innerHTML =
        `<div class="result-box">${resultMap[resultKey]}</div>`;
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>