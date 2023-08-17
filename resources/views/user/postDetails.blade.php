<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="shortcut icon" href="home\images\a.png" type="">
    <title>Post Detail</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset ('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{asset ('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset ('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href=
    "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
              rel="stylesheet">
        <script src=
    "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
        </script>
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .post-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
        }
        .post-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
        }
        .post-meta {
            margin-top: 10px;
            color: #888;
        }
        .post-content {
            margin-top: 20px;
            line-height: 1.6;
        }
        .post-tags {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
        }
        .post-tag {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    @include('user.header')
    <div class="container">
        <img class="post-image" src="../thumbnail/{{ $post->thumbnail }}" alt="{{ $post->title }}">
        <h1 class="post-title">{{ $post->title }}</h1>
        <div class="post-meta">
            By {{ $post->author }} | Category: {{ $post->category }}
        </div>
        <div class="post-content">
            {!! nl2br(e($post->content)) !!}
        </div>
        <div class="post-tags">
            @php $tags = explode(',', $post->tag); @endphp
            @foreach ($tags as $tag)
                <div class="post-tag">{{ trim($tag) }}</div>
            @endforeach
        </div>
    </div>
</body>
</html>
