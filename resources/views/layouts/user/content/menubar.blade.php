<div id="navigation">
		<ul>
			<li><a href="{{ route('homepage.index') }}" ><b>Home</b> </a></li>
		<li><a href="{{url('/rent')}}">Rental</a></li>
			<li><a href="{{url('/contact')}}">Contacts</a></li>
			<li> 
				<div class="search-container">
				<form action="{{url('/search')}}" method="get">
					<input  placeholder="Search.." name="query" type="search">
					<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</li>	
		</ul>
	</div>