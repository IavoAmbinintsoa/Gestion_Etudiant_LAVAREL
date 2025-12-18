<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('messages.dashboard') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-brand">
                <h1><i class="fas fa-graduation-cap"></i> {{ __('messages.dashboard') }}</h1>
            </div>
            
            @auth
            <div class="nav-menu">
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i> {{ __('messages.dashboard') }}
                </a>
                <a href="{{ route('students.index') }}">
                    <i class="fas fa-users"></i> {{ __('messages.students') }}
                </a>
                <a href="{{ route('students.create') }}">
                    <i class="fas fa-user-plus"></i> {{ __('messages.add_student') }}
                </a>
            </div>
            @endauth
            
            <div class="nav-actions">
                <div class="language-switcher">
                    <form action="{{ route('language.change') }}" method="get" class="language-form">
                        <select name="lang" onchange="this.form.submit()">
                            <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>
                                🇫🇷 {{ __('messages.french') }}
                            </option>
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                                🇬🇧 {{ __('messages.english') }}
                            </option>
                        </select>
                    </form>
                </div>
                
                @auth
                    <span class="user-info">
                        <i class="fas fa-user"></i> {{ Auth::user()->username }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt"></i> {{ __('messages.logout') }}
                        </button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>
    
    <main class="container">
        @if(session('message'))
            <div class="alert alert-{{ session('message_type', 'success') }}">
                {{ session('message') }}
            </div>
        @endif

        @yield('content')
    </main>
    
    <footer>
        <p>&copy; {{ date('Y') }} {{ __('messages.dashboard') }}. {{ __('messages.all_rights_reserved') }}</p>
    </footer>
    
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>