<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave a Review</title>
    <link rel="stylesheet" href="{{ asset('assets/css/create-review.css') }}">
</head>
<body>

    <div class="form-panel">
        <h1>☕ Leave a Review</h1>

        <form method="POST" action="{{ route('reviews.store') }}">
            @csrf

            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label>Rating</label>
            <div class="stars">
                @for ($i = 5; $i >= 1; $i--)
                    <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                        {{ old('rating') == $i ? 'checked' : '' }}>
                    <label for="star{{ $i }}">★</label>
                @endfor
            </div>
            @error('rating') <div class="error">{{ $message }}</div> @enderror

            <label for="comment">Your Review</label>
            <textarea name="comment" id="comment" rows="4">{{ old('comment') }}</textarea>
            @error('comment') <div class="error">{{ $message }}</div> @enderror

            <button type="submit">Submit Review</button>
        </form>
    </div>

</body>
</html>