<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Reviews</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>
<body>

    <div class="header">
        <h1>☕ Customer Reviews</h1>
        <a href="{{ route('reviews.create') }}">Leave a Review</a>
    </div>

    @if (session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    @if ($reviews->isEmpty())
        <p class="empty-state">No reviews yet — be the first to share your experience.</p>
    @else
        <div class="grid">
            @foreach ($reviews as $review)
                <div class="card">
                    <div class="name">{{ $review->name }}</div>
                    <div class="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= $review->rating ? '' : 'empty' }}">★</span>
                        @endfor
                    </div>
                    <div class="comment">{{ $review->comment }}</div>
                    <div class="date">{{ $review->created_at->diffForHumans() }}</div>
                </div>
            @endforeach
        </div>
    @endif

</body>
</html>