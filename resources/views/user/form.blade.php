<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Blog</title>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="home\images\a.png" type="">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset ('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{asset ('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset ('home/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="/amsify/amsify.suggestags.css">
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .gap{
            display: flex;
        }
        .h2_font{
            font-size: 30px;
            padding-bottom: 30px;
            font-weight: bold;
        }
        .input_color{
            color: black;
            height: 40px;
            width: 300px;;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .gap{
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('sweetalert::alert')
        @include('user.header')

    <div style="height: 800px; width: 1200px; text-align:center; margin-left:auto; margin-right:auto">
        <h1 style="font-size: 25px; font-weight: bold">Add Blog</h1><br><hr style="solid 1px"><br>
        <form action="{{ url('posts') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="gap">
            <label for="">Title</label>
            <input class="input_color" type="text" name="title" placeholder="Title" required>
            <label for="">Author</label>
            <input class="input_color" type="text" name="author" placeholder="Author" required>
        </div>
        <div class="gap">
            <label style="margin-left:25px">Content</label>
            <textarea id="story" name="content" rows="5" cols="33"></textarea>
        </div>
        <div class="gap">
            <label for="">Tag</label>
            <input style="border: 1px solid; height:60px" class="input_color" type="text" name="tag" placeholder="Tags" required>
        </div>
        <div class="gap">
            <label for="">Category </label>
            <select class="input_color" name="category" id="" required required>
                @foreach ($category as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div><br><hr><br>
        <div style="margin-left:auto; margin-right:auto">
            <label for="">Thumbnail</label>
            <input class="input_color" type="file" name="thumbnail" placeholder="image" required>
        </div>
        <div class="gap">
            <input type="submit" class="btn btn-primary" value="Add Product">
        </div>
    </form>
    </div>
    <script src="/amsify/jquery.amsify.suggestags.js"></script>
    <script>
        $('input[name="tag"]').amsifySuggestags();
    </script>
</body>
</html>
