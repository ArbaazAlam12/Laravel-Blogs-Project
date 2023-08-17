<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>

    <!-- Meta information for the site -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Favicon for the browser tab -->
    <link rel="shortcut icon" href="home\images\a.png" type="">

    <!-- Bootstrap CSS for styling -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />

    <!-- Font Awesome for icons -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />

    <!-- Custom styles for the template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />

    <!-- Responsive design styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Additional responsive styles -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

    <!-- jQuery library for JavaScript functionality -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Livewire styles (for dynamic UI updates) -->
    @livewireStyles
</head>
<body style="height: 1000px;">

    <!-- Hero section of the webpage -->
    <div class="hero_area">
        <!-- Include the header section -->
        @include('user.header')

        <!-- Include the slider section using Livewire component -->
        @livewire('posts.index')

        <!-- JavaScript functions to handle comment replies and scroll position -->
        <script type="text/javascript">
            // Function to open reply section for comments
            function reply(caller){
                document.getElementById('commentId').value = $(caller).attr('data-Commentid');
                $('.replydiv').insertAfter($(caller));
                $('.replydiv').show();
            }

            // Function to close the reply section for comments
            function reply_close(caller){
                $('.replydiv').hide();
            }
        </script>

        <!-- Script to remember and restore scroll position -->
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>

        <!-- Livewire scripts for dynamic UI updates -->
        @livewireScripts

        <!-- JavaScript for handling multiple selection dropdown -->
        <script>
            // Select all checkboxes in the dropdown
            const chBoxes = document.querySelectorAll('.dropdown-menu input[type="checkbox"]');
            const dpBtn = document.getElementById('multiSelectDropdown');
            const clearBtn = document.getElementById('clearButton');
            let mySelectedListItems = [];

            function handleCB() {
                mySelectedListItems = [];
                let mySelectedListItemsText = '';

                // Loop through checkboxes to find selected items
                chBoxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        mySelectedListItems.push(checkbox.value);
                        mySelectedListItemsText += checkbox.value + ', ';
                    }
                });

                // Update the button text with selected items
                dpBtn.textContent = mySelectedListItemsText.slice(0, -2); // Remove trailing comma and space

                // Limit dropdown to 3 selected items
                if (mySelectedListItems.length >= 3) {
                    chBoxes.forEach((checkbox) => {
                        if (!checkbox.checked) {
                            checkbox.disabled = true;
                        }
                    });
                } else {
                    chBoxes.forEach((checkbox) => {
                        checkbox.disabled = false;
                    });
                }
            }
        </script>
    </div>
</body>
</html>
