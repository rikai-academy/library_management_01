<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
@include('layouts.user.content.head')
<body>
	
	<div id="header" class="shell">
		<div class="logo" ><h1><a href="{{ route('homepage.index') }}" id="link" >LIBRARY DA NANG</a></h1></div>
		<!-- Navigation -->
		@include('layouts.user.content.menubar')
		
		<div class="cl">&nbsp;</div>
		
		<div id="login-details">
				@include('layouts.user.content.user')
		</div>
		
	</div>
	
	
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
				@include('layouts.user.content.menu')
		</div>
		<!-- End Sidebar -->
		<!-- Content -->
		<div id="content">
			<!-- Products -->
			<div class="products">
				<h3>Book Detail</h3>
				<div id="detail">
				<img id="detail-img" src="/css/userhome/images/{{$userbook->image}}">
				<div id ="detail-content ">
					<h1 id="font-1" >{{$userbook->name}}</h1>
					<br>
					<div style="display:flex">
						
						
							
						<div style="display:flex">	
							
								<p> <i class="fas fa-thumbs-up"></i> : {{$likes}}</p> &emsp;
								<p><i class="fas fa-thumbs-down"></i> : {{$dislikes}}</p>
							</div>
							&ensp;
							<div><form action="{{url('/save-likedislike')}}" method="POST" >
								<input type="hidden" name="_token" value="{{ csrf_token() }}">				
								<input type="hidden" name="book_id" value="{{$userbook->id}}">	
							@if ($checkfirst)
							<input type="submit" name='choice'  value="Like"  />
							<input type="submit" name='choice'  value="disLike" />
							
							@else
								@if ($check)
								<input type="submit" name='choice'  value="disLike"/>
								<i ></i>
								@else
								<input type="submit" name='choice' value="Like"/>
								
								@endif
							@endif
								</form></div>
					</div>
					
				<p id="detail-content-b">Author : <a href="/author/{{$userbook->author->id}}"> {{$userbook->author->name}}</a> </p>
					<p id="detail-content-b">Trích dẫn :  {{$userbook->desc}}</p>
				
				</div>
			</div>
			<button class="button" style="float: right"><a href="" id="btn-a">RENT</a></button>
			<!-- End Products -->
			<br><br><br>
			<h3>Comments Of User</h3>
			<div class="panel-body">
				<form method="post" action=" {{url('/comment')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="book_id" value="{{$userbook->id}}">
				
					<div class="form-group">
						<textarea required="required" placeholder="Enter comment here" name="desc_comment" class="form-control" rows="5" cols="100"></textarea>
						<input type="submit" name='post_comment' class="btn btn-success" value="Comment" />
					</div>
					
				</form>
			</div>
			<div>
				
			
					@foreach($comment as $cmt)
				
						<div class="list-group">
							<div class="list-group-item">
								<b>{{$cmt->User->name}}</b>
								<p class="comment-space">Date Time : {{ $cmt->created_at->format('d-m-Y H:i:s') }}</p>
								<hr>
								<br>
								<b>{{ $cmt->desc_comment }}</b>
							</div>
						</div>
					@endforeach
		
				
			</div>
			</div>
		
			<div class="cl">&nbsp;</div>
			<!-- Best-sellers -->
			<div id="best-sellers">
				<h3>The most popular book</h3>
				<ul>
						@foreach($userbooks as $ubs)
						<li>
							<div class="product">
								<a href="{{ route('homepage.show', $ubs->id) }}">
									<img src="/css/userhome/images/{{$ubs->image}}" alt="" />
									<span class="book-name">{{$ubs->name}}</span>
								</a>
							</div>
						</li>
						@endforeach
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