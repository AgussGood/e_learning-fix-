  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <img src="{{ asset('backend/assets/images/logo/logo1.png') }}" alt="" style="width: 100px">
                      <h1 class="text-white">Esa</h1> &nbsp &nbsp &nbsp
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="{{ route('welcome') }}" class="active">Beranda</a></li>
                          <li class="scroll-to-section"><a href="{{ route('quizz') }}">Quiz</a></li>
                          <li class="scroll-to-section"><a href="{{ route('user.tugas.index') }}">Penugasan</a></li>
                          <li>
                              @if (Auth::check())
                                  <a href="{{ route('profil', Auth::user()->id) }}"><img
                                          src="{{ asset('backend/assets/images/profile/profile-image.png') }}"
                                          alt="image" style="width: 40px"></a>
                              @else
                                  <a href="{{ route('login') }}">Login</a>
                              @endif
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
