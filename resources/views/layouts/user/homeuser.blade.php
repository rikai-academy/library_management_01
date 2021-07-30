<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
@include('layouts.user.content.head')
<body>
	<!-- Header -->
	<div id="header" class="shell">
		<div class="logo" ><h1><a href="" id="link" >LIBRARY DA NANG</a></h1></div>
		<!-- Navigation -->
		<div id="navigation">
			<ul>
				<li><a href="#" class="active">Home</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Rental</a></li>
				<li><a href="#">Contacts</a></li>
				<li> 
					<div class="search-container">
						<form action="">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit"><i class="fa fa-search"></i></button>
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
		<!-- Sidebar -->
		<div id="sidebar">
			<ul class="categories">
				<li>
					<h4>Categories</h4>
						<nav>
							<ul class="nav-menu nav-vertical" >
								<li ><a href="#" class="nav-active" >Nav Link</a>
								    <ul>
										<li>
                                            <a href="#">Sub Nav Link</a>
											<ul>
											    <li><a href="#">Sub Sub Nav Link</a></li>
												<li><a href="#">Sub Sub Nav Link</a></li>
												<li><a href="#">Sub Sub Nav Link</a></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</nav>
				</li>
				<li>
					<h4>Authors</h4>
					<nav>
						<ul class="nav-menu nav-vertical" >
                            <li ><a href="#" class="nav-active" >Nav Link</a>
								<ul>
									<li>
                                        <a href="#">Sub Nav Link</a>
										<ul>
											<li><a href="#">Sub Sub Nav Link</a></li>
											<li><a href="#">Sub Sub Nav Link</a></li>
											<li><a href="#">Sub Sub Nav Link</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</li>
			</ul>
		</div>
		<!-- End Sidebar -->
		<!-- Content -->
		<div id="content">
			<!-- Products -->
			<div class="products">
				<h3>Book List</h3>
				<ul>
					<li>
						<div class="product">
							<a href="detailbook.html" class="info">
								<span class="holder">
									<img src="css/images/image01.jpg" alt="" />
									<span class="book-name">Book Name</span>
									<span class="author">by John Smith</span>
									<span class="description">Maecenas vehicula ante eu enim pharetra<br />scelerisque dignissim <br />sollicitudin nisi</span>
								</span>
							</a>
						</div>
					</li>
				</ul>
			<!-- End Products -->
			</div>
			<div class="cl">&nbsp;</div>
			<!-- Best-sellers -->
			<div id="best-sellers">
				<h3>The most popular book</h3>
				<ul>
					<li>
						<div class="product">
							<a href="#">
								<img src="css/images/image-best01.jpg" alt="" />
								<span class="book-name">Book Name </span>
								<span class="author">by John Smith</span>	
							</a>
						</div>
					</li>
				</ul>
			</div>
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