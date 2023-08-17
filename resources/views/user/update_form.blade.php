<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set, viewport, and compatibility -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title and additional meta information -->
    <title>Update Blog</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="home\images\a.png" type="">

    <!-- Page styles and external resources -->
    <link rel="stylesheet" type="text/css" href="{{asset ('home/css/bootstrap.css') }}">
    <link href="{{asset ('home/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset ('home/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/amsify/amsify.suggestags.css">
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom styles -->
    <style>
        .gap {
            display: flex;
            margin-top: 20px;
        }
        .h2_font {
            font-size: 30px;
            padding-bottom: 30px;
            font-weight: bold;
        }
        .input_color {
            color: black;
            height: 40px;
            width: 300px;
        }
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    <!-- Include a sweet alert notification -->
    @include('sweetalert::alert')

    <!-- Hero section -->
    <div class="hero_area">
        @include('user.header')

        <!-- Form to add a product -->
        <div style="height: 800px; width: 1200px; text-align:center; margin-left:auto; margin-right:auto">
            <h1 style="font-size: 25px; font-weight: bold">Add Product</h1><br><hr style="solid 1px"><br>
            <form action="{{ url('/edited_post', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="gap">
                    <label for="">Title</label>
                    <input class="input_color" type="text" name="title" value="{{ $data->title }}" required>
                    <label for="">Author</label>
                    <input class="input_color" type="text" name="author" value="{{ $data->author }}" required>
                </div>
                <div class="gap">
                    <label style="margin-left:25px">Content</label>
                    <textarea id="story" name="content" rows="5" cols="33">{{ $data->content }}</textarea>
                </div>
                <div class="gap">
                    <label for="">Tag</label>
                    <input style="border: 1px solid; height:60px" value="{{ $data->tag }}" class="input_color" type="text" name="tag" placeholder="Tags" required>
                </div>
                <div class="gap">
                    <label for="">Category </label>
                    <select class="input_color" name="category" id="" selected="">
                        <!-- Loop through categories and create options -->
                        @foreach ($category as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div><br><hr><br>
                <div class="gap" style="margin-left:auto; margin-right:auto">
                    <label for="">Previous thumbnail</label>
                    <img style="height: 100px; width:200px;" src="/thumbnail/{{ $data->thumbnail }}" alt="">
                </div><br><hr><br>
                <div style="margin-left:auto; margin-right:auto">
                    <label for="">New Thumbnail</label>
                    <input class="input_color" type="file" name="thumbnail" placeholder="image">
                </div>
                <div class="gap">
                    <input type="submit" class="btn btn-primary" value="Add Product">
                </div>
            </form>
        </div>
    </div>

    <!-- Include a suggestags script -->
    <script src="/amsify/jquery.amsify.suggestags.js"></script>
    <script>
        // Initialize suggestags for the tag input field
        $('input[name="tag"]').amsifySuggestags();
    </script>
</body>
</html>
