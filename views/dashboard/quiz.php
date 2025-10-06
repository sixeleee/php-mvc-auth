<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Quiz</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sixtyfour&family=Sofadi+One&family=Press+Start+2P&display=swap" rel="stylesheet">

  <style>
    #bg-video {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      object-fit: cover;
      z-index: -1;
    }

    body {
      margin: 0;
      color: #fff;
      text-align: center;
      overflow: hidden;
      background: #000;
    }

    .container {
      position: relative;
      z-index: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .title {
      font-family: "Sixtyfour", sans-serif;
      font-size: clamp(4rem, 8vw, 6rem);
      margin-bottom: 20px;
      color: #fff;
    }

    .question {
      font-family: "Sofadi One", sans-serif;
      font-size: clamp(2rem, 5vw, 3rem); 
      margin: 20px 0;
      color: #222;
      background: #fff;
      padding: 16px 24px;
      border-radius: 10px;
      display: inline-block;
      max-width: 90%;
    }

    .progress-text {
      font-family: "Sofadi One", cursive;
      font-size: clamp(1.6rem, 4vw, 2rem); 
      color: #fff;
    }

    .question-type {
      font-family: "Press Start 2P", cursive;
      font-size: clamp(1.6rem, 4vw, 2rem); 
      color: #ffcc00;
      margin-bottom: 16px;
      text-shadow: 2px 2px 0 #000;
    }

    .pixel-btn {
      background: #00ff99;
      color: black;
      border: 4px solid black;
      padding: 22px 32px;
      margin: 14px auto;
      text-transform: uppercase;
      font-size: clamp(1.6rem, 4vw, 2.2rem); 
      font-family: "Press Start 2P", cursive;
      cursor: pointer;
      text-shadow: 2px 2px 0 #000;
      box-shadow: 0 0 0 4px #00ff99, 0 0 0 8px black;
      transition: all 0.18s ease-in-out;
      border-radius: 12px;
      display: block;
      width: 90%;
      max-width: 700px; 
    }

    .pixel-btn:hover {
      background: #ff0066;
      color: white;
      box-shadow: 0 0 0 4px #ff0066, 0 0 0 8px black;
      transform: translateY(-3px);
    }

    .answers {
      display: flex;
      flex-direction: column;
      align-items: center; 
      justify-content: center;
      gap: 20px;
      margin: 30px 0;
      width: 100%;
    }

    .correct { background: #32CD32 !important; border-color: #228B22 !important; }
    .incorrect { background: #DC143C !important; border-color: #B22222 !important; }

    .score {
      font-size: clamp(1.8rem, 4vw, 2.2rem); 
      color: #2E8B57;
      margin: 20px 0;
      font-family: "Sofadi One", cursive;
    }

    input.quiz-input, textarea.quiz-input {
      padding: 18px;
      font-size: clamp(1.6rem, 4vw, 2rem); 
      border: 4px solid black;
      border-radius: 12px;
      text-align: center;
      font-family: "Sofadi One", cursive;
      box-shadow: 0 0 0 4px #00ff99, 0 0 0 8px black;
      margin: 14px auto;
      display: block;
      width: 80%;
      max-width: 700px;
      background: #fff;
      color: #222;
    }

    #feedback-screen {
      display: none;
      opacity: 0;
      transition: opacity 0.45s ease;
    }

    /* Certificate Styles */
    #certificate-screen {
      display: none;
      opacity: 0;
      transition: opacity 0.45s ease;
    }

    .certificate-container {
      background: white;
      color: #000;
      padding: 40px;
      border-radius: 20px;
      max-width: 800px;
      margin: 0 auto;
      box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
      border: 8px solid #2d5016;
    }

    .certificate-header {
      font-family: "Sixtyfour", sans-serif;
      font-size: 3rem;
      color: #2d5016;
      margin-bottom: 10px;
      text-shadow: 2px 2px 0 #ccc;
    }

    .certificate-subtitle {
      font-family: "Sofadi One", cursive;
      font-size: 1.8rem;
      color: #555;
      margin-bottom: 30px;
    }

    .certificate-body {
      font-family: "Sofadi One", cursive;
      font-size: 1.5rem;
      line-height: 1.8;
      margin: 30px 0;
      color: #333;
    }

    .certificate-name {
      font-family: "Sixtyfour", sans-serif;
      font-size: 2.5rem;
      color: #2d5016;
      margin: 20px 0;
      text-decoration: underline;
      text-decoration-color: #2d5016;
    }

    .certificate-details {
      margin: 30px 0;
      font-family: "Press Start 2P", cursive;
      font-size: 1rem;
      color: #666;
    }

    .certificate-signature {
      display: flex;
      justify-content: space-around;
      margin-top: 40px;
      padding-top: 20px;
      border-top: 2px solid #ddd;
    }

    .signature-block {
      text-align: center;
      font-family: "Sofadi One", cursive;
    }

    .signature-line {
      width: 200px;
      border-bottom: 2px solid #333;
      margin: 10px auto;
    }

    .download-btn {
      background: #2d5016;
      color: white;
      border: none;
      padding: 15px 30px;
      margin: 20px 10px;
      font-size: 1.2rem;
      font-family: "Press Start 2P", cursive;
      cursor: pointer;
      border-radius: 10px;
      transition: all 0.3s ease;
    }

    .download-btn:hover {
      background: #3a6b1e;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(45, 80, 22, 0.3);
    }

    @media (max-width: 520px) {
      .title { font-size: 2.6rem; }
      .pixel-btn { font-size: 1.4rem; }
      input.quiz-input, textarea.quiz-input { width: 95%; font-size: 1.4rem; }
      .certificate-container { padding: 20px; }
      .certificate-header { font-size: 2rem; }
      .certificate-name { font-size: 1.8rem; }
    }
  </style>
</head>
<body>
  <video autoplay muted loop playsinline id="bg-video">
    <source src="/php-mvc-auth/QuizBg.mp4" type="video/mp4">
  </video>

  <div class="container">
    <div id="welcome-screen">
      <h1 class="title">Let's get to know our MOTHERLAND</h1>
      <button id="start-btn" class="pixel-btn">Start Quiz</button>
    </div>

    <div id="quiz-screen" style="display: none;">
      <div class="progress-text" id="progress-text"></div>
      <div id="question-type" class="question-type"></div>
      <div id="question" class="question"></div>
      <div id="answer-buttons" class="answers"></div>
    </div>

    <div id="result-screen" style="display: none;">
      <h2 id="result-message" class="title"></h2>
      <p id="score" class="score"></p>
      <button id="get-certificate-btn" class="pixel-btn">Get Your Certificate</button>
      <button id="restart-btn" class="pixel-btn">Restart Quiz</button>
      <button id="improve-btn" class="pixel-btn">Help me to Improve</button>
    </div>

    <div id="id-screen" style="display: none;">
      <h2 class="title">Identification Challenge</h2>
      <p class="question">Type your answer: <strong>What is the national flower of the Philippines?</strong></p>
      <input id="id-answer" type="text" class="quiz-input" placeholder="Type your answer here...">
      <button id="id-submit-btn" class="pixel-btn">Submit</button>
      <p id="id-feedback" style="font-family:'Sofadi One', cursive; margin-top:10px;"></p>
    </div>

    <div id="certificate-screen">
      <div class="certificate-container" id="certificate-content">
        <div class="certificate-header">Certificate of Completion</div>
        <div class="certificate-subtitle">Philippines Knowledge Quiz</div>
        
        <div class="certificate-body">
          This is to certify that
        </div>
        
        <div class="certificate-name" id="cert-name">Participant Name</div>
        
        <div class="certificate-body">
          has successfully completed the Philippines Knowledge Quiz
          <br>and demonstrated excellent understanding of Philippine history, culture, and geography.
        </div>
        
        <div class="certificate-details">
          <div>Score: <span id="cert-score">0/10</span></div>
          <div>Date: <span id="cert-date"></span></div>
        </div>
        
        <div class="certificate-signature">
          <div class="signature-block">
            <div class="signature-line"></div>
            <div>Quiz Master</div>
          </div>
          <div class="signature-block">
            <div class="signature-line"></div>
            <div>Date Issued</div>
          </div>
        </div>
      </div>
      
      <button class="download-btn" id="download-cert-btn">Download Certificate</button>
      <button class="download-btn" id="back-to-results-btn">Back to Results</button>
    </div>

    <div id="feedback-screen">
      <h2 class="title">Feedback</h2>
      <p id="feedback-question" class="question">Enter your name and share your thoughts</p>
      <input id="player-name" type="text" class="quiz-input" placeholder="Your name...">
      <textarea id="feedback-input" rows="3" class="quiz-input" placeholder="Your feedback..."></textarea>
      <br>
      <button id="submit-feedback" class="pixel-btn">Submit Feedback</button>
    </div>
  </div>

  <script>
    const questionTypeText = document.getElementById("question-type");
    const feedbackQuestion = document.getElementById("feedback-question");
    const questions = [
      { type: "multiple", question: "What is the capital of the Philippines?", answers: ["Davao", "Cebu", "Manila", "Quezon City"], correct: 2 },
      { type: "multiple", question: "Which is the most active volcano in the Philippines?", answers: ["Taal Volcano", "Mayon Volcano", "Pinatubo", "Kanlaon"], correct: 1 },
      { type: "multiple", question: "What is the smallest province in the Philippines?", answers: ["Batanes", "Guimaras", "Siquijor", "Camiguin"], correct: 0 },
      { type: "multiple", question: "Who is the Philippine national hero?", answers: ["Andres Bonifacio", "Emilio Aguinaldo", "Jose Rizal", "Antonio Luna"], correct: 2 },
      { type: "multiple", question: "What is the world's smallest primate found in the Philippines?", answers: ["Macaque", "Tarsier", "Lemur", "Slow Loris"], correct: 1 },
      { type: "truefalse", question: "The Philippine flag has 3 stars and a sun.", correct: true },
      { type: "truefalse", question: "The Philippines has more than 7,000 islands.", correct: true },
      { type: "truefalse", question: "Pineapple is the national fruit of the Philippines.", correct: false },
      { type: "truefalse", question: "Lea Salonga is a world-renowned Filipina singer.", correct: true },
      { type: "truefalse", question: "The Banaue Rice Terraces are called the '8th Wonder of the World'.", correct: true }
    ];

    let currentQuestion = 0, score = 0, answered = false, playerName = "";

    const welcomeScreen = document.getElementById("welcome-screen");
    const quizScreen = document.getElementById("quiz-screen");
    const resultScreen = document.getElementById("result-screen");
    const feedbackScreen = document.getElementById("feedback-screen");
    const certificateScreen = document.getElementById("certificate-screen");
    const questionText = document.getElementById("question");
    const answersContainer = document.getElementById("answer-buttons");
    const progressText = document.getElementById("progress-text");
    const scoreDisplay = document.getElementById("score");

    document.getElementById("start-btn").onclick = startQuiz;
    document.getElementById("restart-btn").onclick = restartQuiz;
    document.getElementById("improve-btn").onclick = showFeedbackForm;
    document.getElementById("get-certificate-btn").onclick = showCertificate;
    document.getElementById("download-cert-btn").onclick = downloadCertificate;
    document.getElementById("back-to-results-btn").onclick = backToResults;

    function startQuiz() {
      welcomeScreen.style.display = "none";
      quizScreen.style.display = "block";
      loadQuestion();
    }

    function loadQuestion() {
      if (currentQuestion === 5) {
        quizScreen.style.display = "none";
        document.getElementById("id-screen").style.display = "block";
        return;
      }
      if (currentQuestion >= questions.length) {
        showFinalScore();
        return;
      }

      answered = false;
      const q = questions[currentQuestion];

      if (q.type === "multiple") questionTypeText.textContent = "Multiple Choice";
      else if (q.type === "truefalse") questionTypeText.textContent = "True or False";
      else questionTypeText.textContent = "Identification";

      questionText.textContent = q.question;
      progressText.textContent = `Question ${currentQuestion + 1} of ${questions.length}`;
      answersContainer.innerHTML = "";

      if (q.type === "multiple") {
        q.answers.forEach((ans, i) => {
          const btn = document.createElement("button");
          btn.className = "pixel-btn";
          btn.textContent = ans;
          btn.onclick = () => selectAnswer(i, q.correct);
          answersContainer.appendChild(btn);
        });
      } else {
        const trueBtn = document.createElement("button");
        trueBtn.className = "pixel-btn";
        trueBtn.textContent = "TRUE";
        trueBtn.onclick = () => selectTrueFalse(true, q.correct);
        const falseBtn = document.createElement("button");
        falseBtn.className = "pixel-btn";
        falseBtn.textContent = "FALSE";
        falseBtn.onclick = () => selectTrueFalse(false, q.correct);
        answersContainer.appendChild(trueBtn);
        answersContainer.appendChild(falseBtn);
      }
    }

    function selectAnswer(selected, correct) {
      if (answered) return;
      const buttons = answersContainer.querySelectorAll("button");
      if (selected === correct) {
        score++;
        buttons[selected].classList.add("correct");
        answered = true;
        setTimeout(() => { currentQuestion++; loadQuestion(); }, 1200);
      } else {
        buttons[selected].classList.add("incorrect");
        alert("Try again!");
      }
    }

    function selectTrueFalse(selected, correct) {
      if (answered) return;
      const buttons = answersContainer.querySelectorAll("button");
      if (selected === correct) {
        score++;
        buttons[selected ? 0 : 1].classList.add("correct");
        answered = true;
        setTimeout(() => { currentQuestion++; loadQuestion(); }, 1200);
      } else {
        buttons[selected ? 0 : 1].classList.add("incorrect");
        alert("Try again!");
      }
    }

    document.getElementById("id-submit-btn").onclick = () => {
      const input = document.getElementById("id-answer").value.trim().toLowerCase();
      const feedback = document.getElementById("id-feedback");
      if (!input) { alert("Please type an answer!"); return; }

      if (input === "sampaguita") {
        feedback.textContent = "Correct! Sampaguita is the national flower.";
        feedback.style.color = "#32CD32";
        score++;
      } else {
        feedback.textContent = "Incorrect. The correct answer is Sampaguita.";
        feedback.style.color = "#DC143C";
      }

      setTimeout(() => {
        document.getElementById("id-screen").style.display = "none";
        quizScreen.style.display = "block";
        currentQuestion++;
        loadQuestion();
      }, 1500);
    };

    function showFinalScore() {
      quizScreen.style.display = "none";
      resultScreen.style.display = "block";
      let message = "";
      if (score >= 9) message = "Outstanding! You're a Philippines expert!";
      else if (score >= 7) message = "Great job! You know your country well!";
      else if (score >= 5) message = "Good effort! Keep learning!";
      else message = "Nice try! Discover more about the Philippines!";
      document.getElementById("result-message").textContent = message;
      scoreDisplay.textContent = `Final Score: ${score}/${questions.length}`;
    }

    function showCertificate() {
      const name = prompt("Please enter your name for the certificate:");
      if (!name || name.trim() === "") {
        alert("Name is required to generate certificate!");
        return;
      }
      
      playerName = name.trim();
      document.getElementById("cert-name").textContent = playerName;
      document.getElementById("cert-score").textContent = `${score}/${questions.length}`;
      
      const today = new Date();
      const dateStr = today.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
      });
      document.getElementById("cert-date").textContent = dateStr;
      
      resultScreen.style.display = "none";
      certificateScreen.style.display = "block";
      setTimeout(() => certificateScreen.style.opacity = "1", 50);
    }

    function downloadCertificate() {
      // Create a simple text-based certificate download
      const certText = `
CERTIFICATE OF COMPLETION
Philippines Knowledge Quiz

This is to certify that
${playerName}

has successfully completed the Philippines Knowledge Quiz
and demonstrated excellent understanding of Philippine history, culture, and geography.

Score: ${score}/${questions.length}
Date: ${document.getElementById("cert-date").textContent}

Quiz Master - Lee Urem
      `;
      
      const blob = new Blob([certText], { type: 'text/plain' });
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = `Certificate_${playerName.replace(/\s+/g, '_')}.txt`;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      window.URL.revokeObjectURL(url);
      
      alert("Certificate downloaded! You can print or save this file.");
    }

    function backToResults() {
      certificateScreen.style.display = "none";
      certificateScreen.style.opacity = "0";
      resultScreen.style.display = "block";
    }

    function showFeedbackForm() {
      resultScreen.style.display = "none";
      feedbackScreen.style.display = "block";
      setTimeout(() => feedbackScreen.style.opacity = "1", 50);
    }

    function restartQuiz() {
      currentQuestion = 0; score = 0; answered = false; playerName = "";
      resultScreen.style.display = "none";
      feedbackScreen.style.display = "none"; feedbackScreen.style.opacity = "0";
      certificateScreen.style.display = "none"; certificateScreen.style.opacity = "0";
      quizScreen.style.display = "block";
      loadQuestion();
    }

    document.getElementById("submit-feedback").onclick = () => {
      const nameInput = document.getElementById("player-name");
      const feedbackInput = document.getElementById("feedback-input");
      const name = nameInput.value.trim();
      const feedback = feedbackInput.value.trim();
      if (!name || !feedback) { alert("Please enter both your name and feedback!"); return; }

      nameInput.style.display = "none";
      feedbackInput.style.display = "none";
      document.getElementById("submit-feedback").style.display = "none";

      feedbackQuestion.textContent = "Thank you! I love to hear from you. I'll get in touch with you as soon as possible!";
    };
  </script>
</body>
</html>