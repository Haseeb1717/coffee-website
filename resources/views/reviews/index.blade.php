<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Reviews</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #2c1810, #4a2f1f);
            color: #f3e9dc;
            padding: 2.5rem 1.5rem;
        }

        .header {
            max-width: 1000px;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header h1 { margin: 0; }

        .header a {
            background: rgba(26,14,7,.85);
            color: #f3e9dc;
            text-decoration: none;
            padding: .6rem 1.1rem;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,.15);
        }

        .header a:hover { background: rgba(26,14,7,1); }

        .flash {
            max-width: 1000px;
            margin: 0 auto 1.5rem;
            background: rgba(26,14,7,.55);
            border-radius: 8px;
            padding: .8rem 1rem;
        }

        .grid {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        .card {
            background: rgba(26,14,7,.55);
            backdrop-filter: blur(6px);
            border-radius: 12px;
            padding: 1.5rem;
        }

        .card .name {
            font-weight: bold;
            margin-bottom: .3rem;
        }

        .card .stars {
            color: #e0a458;
            letter-spacing: 2px;
            margin-bottom: .6rem;
        }

        .card .stars .empty { color: rgba(255,255,255,.25); }

        .card .comment {
            font-size: .95rem;
            line-height: 1.4;
            margin-bottom: .8rem;
        }

        .card .date {
            font-size: .75rem;
            color: rgba(243,233,220,.6);
        }

        .empty-state {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
            opacity: .7;
        }
    </style>
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