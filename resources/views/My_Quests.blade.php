@extends('layouts.app')


@section('content')
<div class="container">
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
</div>


@endsection
