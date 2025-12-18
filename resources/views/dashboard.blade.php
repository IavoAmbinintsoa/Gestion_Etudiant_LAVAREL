@extends('layouts.app')

@section('content')
<div class="dashboard-header">
    <h2><i class="fas fa-tachometer-alt"></i> {{ __('messages.welcome_dashboard') }}</h2>
    <p>{{ __('messages.welcome_greeting', ['username' => Auth::user()->username]) }}</p>
</div>

<div class="dashboard-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $totalStudents }}</h3>
            <p>{{ __('messages.total_students') }}</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-day"></i>
        </div>
        <div class="stat-info">
            <h3>{{ date('d/m/Y') }}</h3>
            <p>{{ __('messages.current_date') }}</p>
        </div>
    </div>
</div>

<div class="recent-students">
    <div class="section-header">
        <h3><i class="fas fa-history"></i> {{ __('messages.recent_students') }}</h3>
        <a href="{{ route('students.index') }}" class="btn-view-all">
            {{ __('messages.view_all') }} <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    
    @if($recentStudents->isEmpty())
        <p class="no-data">{{ __('messages.no_students') }}</p>
    @else
        <div class="students-grid">
            @foreach($recentStudents as $student)
                <div class="student-card">
                    <div class="student-avatar">
                        {{ $student->initials }}
                    </div>
                    <div class="student-info">
                        <h4>{{ $student->full_name }}</h4>
                        <p><i class="fas fa-envelope"></i> {{ $student->email }}</p>
                        @if($student->phone)
                            <p><i class="fas fa-phone"></i> {{ $student->phone }}</p>
                        @endif
                    </div>
                    <div class="student-actions">
                        <a href="{{ route('students.edit', $student) }}" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
