<div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Wave Cafe</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="{{route('drink')}}" class="tm-page-link {{ Route::is('drink') ? 'active' : '' }}">
                  <i class="fas fa-mug-hot tm-page-link-icon"></i>
                  <span>Drink Menu</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="{{route('aboutus')}}" class="tm-page-link {{ Route::is('aboutus') ? 'active' : '' }}">
                  <i class="fas fa-users tm-page-link-icon"></i>
                  <span>About Us</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="{{route('special')}}" class="tm-page-link {{ Route::is('special') ? 'active' : '' }}">
                  <i class="fas fa-glass-martini tm-page-link-icon "></i>
                  <span>Special Items</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="{{route('contact')}}" class="tm-page-link {{ Route::is('contact') ? 'active' : '' }}">
                  <i class="fas fa-comments tm-page-link-icon "></i>
                  <span>Contact</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>        
      </div>
      <div class="tm-right">
        
      