<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
          <img src="https://scontent-mrs2-1.xx.fbcdn.net/v/t1.6435-9/78164289_649728928893699_8246583082312794112_n.png?_nc_cat=109&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=MIiCLimcjHUAX8hkEAJ&_nc_oc=AQlGpADyIBUEfAQn9U0fA2WiIP14XrKO0gWKlSEBZ8HLgwLFrMIQQ9Q7vhIWxPidLsE&_nc_ht=scontent-mrs2-1.xx&oh=65602894177165d9f48c1602453ede34&oe=60B1F77B" width="32" height="450">
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item {{ Route::currentRouteName() == 'home' ? 'is-active' : '' }}"  href="/">
            Home
          </a>
          <a class="navbar-item"  href="{{ route('posts.index') }}">
            Posts
          </a>
          <a class="navbar-item"  href="{{ route('categories.index') }}">
            Categories
          </a>
          <a class="navbar-item"  href="{{ route('tags.index') }}">
            Tags
          </a>
          @auth
          <a class="navbar-item"  href="{{ route('posts.create') }}">
            Create Post
          </a>
          <a class="navbar-item"  href="{{ route('categories.create') }}">
            Create Catygory
          </a>
          <a class="navbar-item"  href="{{ route('tags.create') }}">
            Create Tag
          </a>
          @endauth
        </div>
        <div class="navbar-end">
          @guest
            <div class="navbar-item">
              <div class="buttons">
                <a class="button is-primary" href="{{ route('register') }}">
                  <strong>Sign up</strong>
                </a>
                <a class="button is-light" href="{{ route('login') }}">
                  Log in
                </a>
              </div>
            </div>
          @endguest
          @auth
            <div class="navbar-item">
              Hi {{ Auth::user()->name }}!!
            </div>
            <div class="navbar-item">
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" class="button is-light" value="Logout">
              </form>
            </div>
          @endauth
        </div>
      </div>
    </div>
  </nav>
