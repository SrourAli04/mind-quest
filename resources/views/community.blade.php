@extends('layouts.app')

@section('content')

<div class="container">


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
