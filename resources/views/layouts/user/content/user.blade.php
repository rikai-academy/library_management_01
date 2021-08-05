<ul class="navbar-nav ml-auto">
	<!-- Authentication Links -->
			<li class="nav-item dropdown" style="list-style-type: none;">
					

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<b id="navbarDropdown" style="text-decoration: none; margin-right:15px" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								Chào :	{{ Auth::user()->name }}
							</b>
							<a class="dropdown-item" style="text-decoration: none;" href="{{ route('logout') }} "
								 onclick="event.preventDefault();
															 document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
							</form>
					</div>
			</li>
	
</ul>