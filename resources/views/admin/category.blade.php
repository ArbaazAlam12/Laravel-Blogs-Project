<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
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
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .div_center{
            margin-left:100px;
            text-align: center;
            padding-top: 40px;

        }
        .h2_font{
            font-size: 30px;
            padding-bottom: 30px;
            font-weight: bold;
        }
        .input_color{
            color: black;
            margin-right: 70px;
        }
        .center{
          margin: auto;
          width: 50%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid black;


        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    @include('admin.header')
        <div class="main-panel">

                    <div class="div_center">
                        <h2 class="h2_font">Add Category</h2>
                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <input class="input_color" type="text" name="category" placeholder="Category Name">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </form>
                    </div>

                        <table class="center">
                        <tr>
                            <th>Category name</th>
                            <th>Action </th>
                        </tr>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->category_name }}</td>
                            <td>
                                 <a onclick="confirmation(event)" class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </table>

                </div>
            </div>
            <script>
                function confirmation(ev) {
                  ev.preventDefault();
                  var urlToRedirect = ev.currentTarget.getAttribute('href');
                  console.log(urlToRedirect);
                  swal({
                      title: "Are you sure to delete this category",
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

      </body>
    </html>

</body>
</html>
