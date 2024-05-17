<div>
    @if(session('success'))
        <div class="notif active _success">
            <img src="/assets/icon-notif-green.svg" alt="success" class="notif-icon">
            <div class="notif-text">{{ session('success') }}</div>
        </div>
    @endif
    @if(session('error'))
        <div class="notif active _error">
            <img src="/assets/icon-notif-red.svg" alt="error" class="notif-icon">
            <div class="notif-text">{{ session('error') }}</div>
        </div>
    @endif
</div>