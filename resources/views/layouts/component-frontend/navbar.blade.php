  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <img src="{{ asset('backend/assets/images/logo/logo1.png') }}" alt="" style="width: 100px">
                      <h1>Esa</h1> &nbsp &nbsp &nbsp
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="{{ route('quizz') }}">Quiz</a></li>
                          <li class="scroll-to-section"><a href="">Penugasan</a></li>
                          <li class="scroll-to-section"><a href="{{ route('register') }}">Register</a></li>
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  <i class="lni lni-exit"></i> Sign Out </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </li>
                      </ul>
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
