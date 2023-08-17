<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="home\images\a.png" type="">
    <title>Threads</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset ('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{asset ('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset ('home/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="css/file.css">
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        * {
    box-sizing: border-box;
  }
  .openBtn {
    display: flex;
    justify-content: left;
  }
  .openButton {
    border: none;
    border-radius: 5px;
    background-color: #1c87c9;
    color: white;
    padding: 14px 20px;
    cursor: pointer;
    position: fixed;
  }
  .loginPopup {
    position: relative;
    text-align: center;
    width: 100%;
  }
  .formPopup {
    display: none;
    position: fixed;
    left: 45%;
    top: 5%;
    transform: translate(-50%, 5%);
    border: 3px solid #999999;
    z-index: 9;

  }
  .formContainer {
    max-width: 300px;
    padding: 20px;
    background-color: #fff;
  }
  .formContainer input[type=text],
  .formContainer input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 20px 0;
    border: none;
    background: #eee;
  }
  .formContainer input[type=text]:focus,
  .formContainer input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }
  .formContainer .btn {
    padding: 12px 20px;
    border: none;
    background-color: #8ebf42;
    color: #fff;
    cursor: pointer;
    width: 100%;
    margin-bottom: 15px;
    opacity: 0.8;
  }
  .formContainer .cancel {
    background-color: #cc0000;
  }
  .formContainer .btn:hover,
  .openButton:hover {
    opacity: 1;
  }

    </style>
</head>
<body>

    @include('sweetalert::alert')
    <div style="height: 1200px; width:100%">
        <div style="height: 70px; width:100%">
            @include('user.header')
        </div>
        <div class="loginPopup">
            <div class="formPopup" id="popupForm">
              <form action="{{ url('/import') }}" class="formContainer" method="POST" enctype="multipart/form-data">
                @csrf
                <h2>Please Choose CSV file</h2>
                <label for="email">
                  <strong>CSV File</strong>
                </label>
                <input type="file" id="file" placeholder="Your Email" name="file" required>
                <button type="submit" class="btn">Submit</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
              </form>
            </div>
          </div>
        <div style="margin-top: 60px">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tags
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Catgeory
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Thumbnail
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $post)
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $post->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $post->author }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->content }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->tag }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->category }}
                                </td>
                                <td class="px-6 py-4">
                                   <img height="100px" width="200px" src="/thumbnail/{{ $post->thumbnail }}" alt="">
                                </td>
                                <td class="px-1 py-4">
                                    <a href="{{ url('/edit_post', $post->id)}}" class="btn btn-success" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a onclick="confirmation(event)" href="{{ url('/delete_post', $post->id)}}" class="btn btn-danger" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                    <a class="btn btn-success" onclick="openForm()">Import Posts</a>
                                    <a href="{{ url('/export') }}" class="btn btn-success">Export Posts</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);
          swal({
              title: "Are you sure to delete this blog",
              text: "You will not be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willCancel) => {
              if (willCancel) {
                  window.location.href = urlToRedirect;
              }
          });
      }
  </script>
  <script>
    function openForm() {
      document.getElementById("popupForm").style.display = "block";
    }
    function closeForm() {
      document.getElementById("popupForm").style.display = "none";
    }
  </script>
</body>
</html>
