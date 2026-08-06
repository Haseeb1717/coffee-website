<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave a Review</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #2c1810, #4a2f1f);
        }

        .form-panel {
            background: rgba(26,14,7,.55);
            backdrop-filter: blur(6px);
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 420px;
            color: #f3e9dc;
        }

        .form-panel h1 {
            margin-top: 0;
            font-size: 1.5rem;
        }

        label {
            display: block;
            margin-top: 1rem;
            margin-bottom: .3rem;
            font-size: .9rem;
        }

        input[type="text"],
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: .6rem;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,.15);
            background: rgba(255,255,255,.08);
            color: #f3e9dc;
        }

        .stars {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: .2rem;
        }

        .stars input { display: none; }

        .stars label {
            font-size: 1.8rem;
            color: rgba(255,255,255,.25);
            cursor: pointer;
            margin: 0;
        }

        .stars input:checked ~ label,
        .stars label:hover,
        .stars label:hover ~ label {
            color: #e0a458;
        }

        .error {
            color: #ff9d9d;
            font-size: .8rem;
            margin-top: .3rem;
        }

        button {
            margin-top: 1.5rem;
            width: 100%;
            padding: .8rem;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 8px;
            background: rgba(26,14,7,.85);
            color: #f3e9dc;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            background: rgba(26,14,7,1);
        }
    </style>
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