<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Очаг-Админка</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">

      @auth
      <form action="http://api.ochag55.ru/logout" method="get" enctype="multipart/form-data">
        <button type="submit" class="btn btn-success">Выйти</button>
      </form>
      
      @endauth
    </li>
  </ul>
</nav>