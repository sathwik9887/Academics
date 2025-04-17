<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
@include('partials.link')
<div class="error-container">
    <div class="lottie-animation"></div>
    <div class="error-content">
        <h1>404</h1>
        <p>Oops! Page not found.</p>
        <p>The page you're looking for doesn’t exist or has been moved.</p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
    </div>
</div>
@include('partials.scripts')