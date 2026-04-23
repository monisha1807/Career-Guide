const courseData = {
  aiml: {
    name: 'AI & ML',
    duration: '3–4 years',
    scope: 'Excellent',
    salary: '₹6–18 LPA',
    skills: 'Python, ML basics, math, problem solving'
  },
  datascience: {
    name: 'Data Science',
    duration: '3–4 years',
    scope: 'Excellent',
    salary: '₹6–16 LPA',
    skills: 'Statistics, Python, SQL, analytics'
  },
  cybersecurity: {
    name: 'Cybersecurity',
    duration: '3–4 years',
    scope: 'Strong',
    salary: '₹5–14 LPA',
    skills: 'Networking, security tools, risk analysis'
  },
  uiux: {
    name: 'UI/UX Design',
    duration: '2–4 years',
    scope: 'Growing',
    salary: '₹4–10 LPA',
    skills: 'Design thinking, wireframing, user research'
  }
};

const compareBtn = document.getElementById('compareBtn');
if (compareBtn) {
  compareBtn.addEventListener('click', () => {
    const first = document.getElementById('courseOne').value;
    const second = document.getElementById('courseTwo').value;
    const result = document.getElementById('compareResult');

    if (first === second) {
      result.innerHTML = '<div class="col-12"><div class="alert alert-warning">Please select two different courses to compare.</div></div>';
      return;
    }

    const renderCourse = (course) => `
      <div class="col-md-6">
        <div class="course-card h-100">
          <h5>${course.name}</h5>
          <p><strong>Duration:</strong> ${course.duration}</p>
          <p><strong>Scope:</strong> ${course.scope}</p>
          <p><strong>Average Salary:</strong> ${course.salary}</p>
          <p><strong>Key Skills:</strong> ${course.skills}</p>
        </div>
      </div>`;

    result.innerHTML = renderCourse(courseData[first]) + renderCourse(courseData[second]);
  });
}

const quizForm = document.getElementById('careerQuiz');
if (quizForm) {
  quizForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let tech = 0, bio = 0, commerce = 0;

    for (let i = 1; i <= 5; i++) {
      const selected = quizForm.querySelector(`input[name="q${i}"]:checked`);
      if (!selected) {
        document.getElementById('quizResult').innerHTML = '<div class="alert alert-warning">Please answer all questions before submitting.</div>';
        return;
      }
      if (selected.value === 'tech') tech++;
      if (selected.value === 'bio') bio++;
      if (selected.value === 'commerce') commerce++;
    }

    let message = 'You are best suited for Commerce / Management related careers.';
    if (tech >= bio && tech >= commerce) {
      message = 'You are best suited for Computer Science, AI, Data Science, or Cybersecurity related careers.';
    } else if (bio >= tech && bio >= commerce) {
      message = 'You are best suited for Biology, Medical, Biotechnology, or Life Science related careers.';
    }

    document.getElementById('quizResult').innerHTML = `<div class="alert alert-success">${message}</div>`;
  });
}

const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    document.getElementById('contactStatus').innerHTML = '<div class="alert alert-success">Your message has been recorded successfully.</div>';
    contactForm.reset();
  });
}

const loginForm = document.getElementById('loginForm');
if (loginForm) {
  loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    document.getElementById('loginStatus').innerHTML = '<div class="alert alert-success">Login validation passed. This is a front-end demo page.</div>';
  });
}

const registerForm = document.getElementById('registerForm');
if (registerForm) {
  registerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const password = document.getElementById('regPassword').value;
    const confirmPassword = document.getElementById('regConfirmPassword').value;
    if (password !== confirmPassword) {
      document.getElementById('registerStatus').innerHTML = '<div class="alert alert-danger">Password and confirm password do not match.</div>';
      return;
    }
    document.getElementById('registerStatus').innerHTML = '<div class="alert alert-success">Registration validation passed. This is a front-end demo page.</div>';
    registerForm.reset();
  });
}

const revealItems = document.querySelectorAll('.info-card, .course-card, .college-card, .wide-card, .auth-card');
revealItems.forEach((el) => el.classList.add('reveal'));
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) entry.target.classList.add('show');
  });
}, { threshold: 0.15 });
revealItems.forEach((el) => observer.observe(el));
