    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow" style="margin-top: 15">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="/asssets/img/navbar-logo.png" alt="" height="40" />
          </a>
          <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ ($tittle === "Home") ? 'active' : '' }} text-uppercase" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($tittle === "Produk") ? 'active' : '' }} text-uppercase" href="/product">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($tittle === "About") ? 'active' : '' }} text-uppercase" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-uppercase"  href="#footer">Contact</a>
              </li>

              @auth
              <li>
                <a class="nav-link me-2 d-flex justify-content-center" href="/cart">
                  <div class="icon-navbar" style="cursor: pointer">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                  </div>
                </a>
              </li>
              @endauth

              
              <form class="d-flex ms-1" action="/product">
                <input class="form-control me-2" type="search" name="search" placeholder="Search . . ." value="{{ request('search') }}" aria-label="Search" />
                <button class="btn search-btn" type="submit">Search</button>
              </form>

              @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-user-circle fa-lg me-2"></i>
                    <span>{{ auth()->user()->username }}</span>
                  </a>
                  <ul class="dropdown-menu ms-auto mb-2 mb-lg-0" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/daftar-transaksi"><i class="fas fa-tasks fa-sm me-2"></i></i>Daftar Transaksi</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                          <i class="fas fa-sign-out-alt fa-sm me-2"></i>Logout
                        </button>
                      </form>
                    </li>
                  </ul>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link ms-3 me-2 d-flex justify-content-center {{ ($tittle === "Login") ? 'active' : '' }} text-uppercase" href="/login">
                    <div class="icon-navbar nav-item" style="cursor: pointer">
                      <i class="fas fa-user-circle fa-lg me-2"></i>Login
                    </div>
                  </a>
                </li>
              @endauth

            </ul>
            
          </div>
        </div>
      </nav>