<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
@include('layouts.user.content.head')
<body>
    <!-- Header -->
    <div id="header" class="shell">
        <div class="logo">
            <h1><a href="" id="link">LIBRARY DA NANG</a></h1>
        </div>

        <!-- Navigation -->
        <div id="navigation">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contacts</a></li>
                <li>
                    <div class="search-container">
                        <form action="">
                            <input type="text" placeholder="Search.." name="search" id="phon">
                            <button type="submit"><i class="fa fa-search" id="phon"></i></button>
                        </form>
                    </div>
                </li>

            </ul>


        </div>

        <!-- End Navigation -->
        <div class="cl">&nbsp;</div>
        <!-- Login-details -->
        <div id="login-details">
            <p>Welcome, <a href="#" id="user">Guest</a> .</p>

        </div>
        <!-- End Login-details -->
    </div>
    <!-- End Header -->

    <!-- Main -->
    <div id="main" class="shell">
        <h1 id="font-1">YOUR PROFILE</h1>
        <br>
        <hr>
        <br><br>
        <form action="/action_page.php">
            <div class="col-11">
                <img src="/css/images/image01.jpg" alt="" id="detail-img"></div>
            <div class="col-12" style="margin-top: -300px">
                <div>
                    <label for="fname">Email</label>
                    <input type="text" id="fname" name="email" placeholder="Your email..">
                </div>
                <div>
                    <label for="lname">Full Name</label>
                    <input type="text" id="" name="fullname" placeholder="Your full name..">
                </div>
                <div>
                    <label for="lname">Address</label>
                    <input type="text" id="" name="address" placeholder="Your address..">
                </div>
                <div>
                    <label for="lname">Image</label>
                    <input type="text" id="" name="image" placeholder="Your image..">
                </div>

                <div><input type="submit" value="Edit"></div>


        </form>



        </div>
        <div class="cl">&nbsp;</div>
        <!-- Best-sellers -->

        <!-- End Best-sellers -->
    </div>
    <!-- End Content -->
    <div class="cl">&nbsp;</div>
    </div>
    <!-- End Main -->
    <!-- Footer -->
    @include('layouts.user.content.footer')
    <!-- End Footer -->
</body>

</html>