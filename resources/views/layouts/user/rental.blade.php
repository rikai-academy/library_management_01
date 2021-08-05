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
        @include('layouts.user.content.menubar')

        <!-- End Navigation -->
        <div class="cl">&nbsp;</div>
        <!-- Login-details -->
        <div id="login-details">
						@include('layouts.user.content.user')

        </div>
        <!-- End Login-details -->
    </div>
    <!-- End Header -->
    <!-- Slider -->
    <div id="slider">
        <div class="shell">
            <ul>
                <li>
                    <div class="image">
                        <img src="css/images/books.png" alt="" />
                    </div>
                    <div class="details">
                        <h2>Bestsellers</h2>
                        <h3>Special Offers</h3>
                        <p class="title">Pellentesque congue lorem quis massa blandit non pretium nisi pharetra</p>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id odio in tortor scelerisque dictum. Phasellus varius sem sit amet metus volutpat vel vehicula nunc lacinia.</p>
                        <a href="#" class="read-more-btn">Read More</a>
                    </div>
                </li>
            </ul>
            <div class="nav">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
            </div>
        </div>
    </div>
    <!-- End Slider -->
    <!-- Main -->
    <div id="main" class="shell">
        <div class="products">
            <h3>Book List Rental</h3>
            <br>
            <table>
                <tr>
                    <th id="items">Image Book</th>
                    <th id="items">Name Of Book</th>
                    <th id="items">Quanity</th>
                    <th id="items">Time Rent</th>
                    <th id="items">Time Return</th>
                    <th id="items">Price</th>
                </tr>
                <tr>
                    <td><img src="css/images/image02.jpg" alt="" id="rental-img"></td>
                    <td>Griffin</td>
                    <td>
                        <form id='myform' method='POST' action='#'>
                            <input type='button' value='-' class='qtyminus' field='quantity' />
                            <input type='text' name='quantity' value='0' class='qty' />
                            <input type='button' value='+' class='qtyplus' field='quantity' />
                        </form>
                    </td>
                    <td>
                        <input type="datetime-local" id="birthdaytime" name="birthdaytime">
                    </td>
                    <td>
                        <input type="datetime-local" id="birthdaytime" name="birthdaytime">
                    </td>
                    <td>1212$</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th id="items-1"><b>Total: 12$</b> </th>
                </tr>
            </table>
            <br>
            <button class="button" style="float: right"><a href="/rental.html" id="btn-a">Accpect</a></button>
            <!-- End Products -->
        </div>
        <div class="cl">&nbsp;</div>
        <!-- Best-sellers -->

        <!-- End Best-sellers -->

        <!-- End Content -->
        <div class="cl">&nbsp;</div>
    </div>
    <!-- End Main -->
    <!-- Footer -->
    @include('layouts.user.content.footer')
    <!-- End Footer -->
</body>

</html>