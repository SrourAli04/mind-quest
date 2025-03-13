@extends('layouts.app')

@section('content')

<div class="container">
    <section class="hero">
      <h1>Embark on a Journey to Better Mental Health</h1>
      <p>Complete 3-day quests with AI guidance, track your progress, and connect with peers on your path to emotional wellbeing.</p>
      <div>
        <button class="btn btn-primary">Start a New Quest</button>
        <button class="btn btn-secondary">Chat with AI Companion</button>
      </div>
    </section>

    <section class="features">
      <div class="feature-card">
        <div class="feature-icon">🤖</div>
        <h3>AI Companion</h3>
        <p>Chat with our emotion-detecting AI that provides personalized guidance based on your emotional state.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">🐉</div>
        <h3>Story-Driven Quests</h3>
        <p>Engage in 3-day themed journeys that make mental health practices fun and meaningful.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">📊</div>
        <h3>Progress Tracking</h3>
        <p>Visualize your emotional growth and see how consistent practice impacts your wellbeing.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">👥</div>
        <h3>Peer Support</h3>
        <p>Connect with accountability buddies or join group challenges for extra motivation.</p>
      </div>
    </section>

    <section class="quest-section">
      <div class="quest-header">
        <h2>Current Quest</h2>
        <!-- <span>Day 2 of 3</span> -->
      </div>

      <div class="quest-card">
        <div class="quest-icon">🐉</div>
        <div class="quest-info">
          <h3>Defeat the Anxiety Dragon</h3>
          <p>Today's challenge: Identify cognitive distortions in your thought patterns</p>
          <div class="quest-stats">
            <span>⏱️ 15 min activity</span>
            <span>🔥 85% completion rate</span>
          </div>
        </div>
      </div>

      <div style="display: flex; justify-content: center; margin-top: 2rem;">
        <button class="btn btn-primary">Continue Quest</button>
      </div>
    </section>


    <section class="progress-section">
      <div class="progress-header">
        <h2>Your Progress</h2>
        <select>
          <option>Last 7 days</option>
          <option>Last 30 days</option>
          <option>All time</option>
        </select>
      </div>

      <div class="progress-chart">
        <div class="chart-day">
          <div class="chart-bar" style="height: 40%;"></div>
          <div class="chart-label">Mon</div>
        </div>
        <div class="chart-day">
          <div class="chart-bar" style="height: 60%;"></div>
          <div class="chart-label">Tue</div>
        </div>
        <div class="chart-day">
          <div class="chart-bar" style="height: 30%;"></div>
          <div class="chart-label">Wed</div>
        </div>
        <div class="chart-day">
          <div class="chart-bar" style="height: 70%;"></div>
          <div class="chart-label">Thu</div>
        </div>
        <div class="chart-day">
          <div class="chart-bar" style="height: 80%;"></div>
          <div class="chart-label">Fri</div>
        </div>
        <div class="chart-day">
          <div class="chart-bar" style="height: 75%;"></div>
          <div class="chart-label">Sat</div>
        </div>
        <div class="chart-day">
          <div class="chart-bar today" style="height: 65%;"></div>
          <div class="chart-label">Sun</div>
        </div>
      </div>

      <div class="mood-indicator">
        <div class="mood-icon">😔</div>
        <div class="mood-icon">😐</div>
        <div class="mood-icon active">😊</div>
        <div class="mood-icon">😄</div>
      </div>
    </section>

    <section class="community-section">
      <h2>Your Accountability Network</h2>
      <p>Connect with others on similar quests for mutual support and encouragement.</p>

      <div class="buddy-container">
        <div class="buddy-card">
          <div class="buddy-avatar">👤</div>
          <div class="buddy-name">Alex</div>
          <div class="buddy-status">Currently on: Anxiety Dragon (Day 3)</div>
          <button class="btn btn-secondary">Message</button>
        </div>

        <div class="buddy-card">
          <div class="buddy-avatar">👤</div>
          <div class="buddy-name">Jordan</div>
          <div class="buddy-status">Currently on: Stress Mountain (Day 1)</div>
          <button class="btn btn-secondary">Message</button>
        </div>

        <div class="buddy-card">
          <div class="buddy-avatar">👤</div>
          <div class="buddy-name">Taylor</div>
          <div class="buddy-status">Currently on: Anxiety Dragon (Day 2)</div>
          <button class="btn btn-secondary">Message</button>
        </div>

        <div class="buddy-card" style="border: 1px dashed var(--light-gray); display: flex; align-items: center; justify-content: center;">
          <button class="btn btn-secondary">+ Find New Buddy</button>
        </div>
      </div>
    </section>
  </div>

@endsection
