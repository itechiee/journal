<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" action="{{ url('/login') }}" accept-charset="UTF-8" id="login-nav">
								 {{ csrf_field() }}

										<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="email" class="sr-only">E-Mail Address</label>

											<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
											 @if ($errors->has('email'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
			                                @endif
										</div>

										<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
											 <label class="sr-only" for="password">Password</label>
											 <input id="password" type="password" class="form-control" name="password" required>

			                                @if ($errors->has('password'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('password') }}</strong>
			                                    </span>
			                                @endif

                                             <div class="help-block text-right"><a href="{{ url('/password/reset') }}">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox" name="remember">  keep me logged-in
											 </label>
										</div>
								 </form>
							</div>
							<div class="bottom text-center">
								New here ? <a href="/register"><b>Join Us</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>