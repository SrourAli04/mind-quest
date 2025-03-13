<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MindQuest - AI-Powered Mental Health Companion</title>
  @vite(['resources/css/home.css'])
  @vite(['resources/css/chatbot.css'])
</head>
<body>
  <header>
    <div class="container">
      <div class="nav">
        <div class="app-name">
          <div class="logo">🧠</div>
          MindQuest
        </div>
        <div class="nav-links">
          <a href="/home" class="nav-link active">Home</a>
          <a href="#" class="nav-link ">My Quests</a>
          <a href="#" class="nav-link">Progress</a>
          <a href="#" class="nav-link">Community</a>
          <a href="/chatbot"  class ="nav-link ">AI Companion</a>
        </div>
        <div>
          <span style="margin-right: 10px;">👤</span>
        </div>
      </div>
    </div>
  </header>

  @yield('content')

  <footer class="footer">
    <p>© 2025 MindQuest - Your AI-Powered Mental Health Companion</p>
  </footer>
</body>
</html>
