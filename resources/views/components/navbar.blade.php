    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow" style="margin-top: 15">
        <div class="container-md">
          <a class="navbar-brand" href="/">
            <img src="/asssets/img/navbar-logo.png" alt="" height="40" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase">
              <li class="nav-item">
                <a class="nav-link {{ ($tittle === "Home") ? 'active' : '' }}" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($tittle === "Product") ? 'active' : '' }}" href="/product">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($tittle === "About") ? 'active' : '' }}" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer">Contact</a>
              </li>
              <li>
                <a class="nav-link me-2 d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <div class="icon-navbar" style="cursor: pointer">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                  </div>
                </a>
              </li>
              <li>
                <a class="nav-link me-2 d-flex justify-content-center" href="/whistlist">
                  <div class="icon-navbar" style="cursor: pointer">
                    <i class="fas fa-heart fa-lg"></i>
                  </div>
                </a>
              </li>
            </ul>
            <form class="d-flex ms-1">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn search-btn" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>