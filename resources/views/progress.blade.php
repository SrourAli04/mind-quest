@extends('layouts.app')


@section('content')
<div class="container">
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
</div>


@endsection
