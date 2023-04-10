
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-COMMERRCE</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">    <link rel="stylesheet" href="{{asset('assets/css/open.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

<div class="sidebar">
  <div class="logo_content">
      <div class="logo">
          <i class='bx bx-laptop'></i>
          <div class="logo_name">GO-EAT</div>
      </div>
      <i class='bx bx-menu' id="btn"></i>
  </div>

  <ul>
      <li>
          <a href="/">
              <i class='bx bxs-home-alt-2'></i>
              <span class="link_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
      </li>
      <li>
          <a href="/create">
              <i class='bx bxs-file-plus'></i>
              <span class="link_name">Create</span>
          </a>
          <span class="tooltip">Create</span>
      </li>
      <li>
          <a href="/data">
              <i class='bx bx-menu-alt-left'></i>
              <span class="link_name">Data</span>
          </a>
          <span class="tooltip">Data</span>
      </li>
    <li>
        <a href="/logout">
            <i class='bx bxs-log-out-circle'></i>
            <span class="link_name">LOG OUT</span>
        </a>
        <span class="tooltip">LOG OUT</span>
    </li>
  </ul>
</div>

<main id="content">
  <nav class="navs"><h1 class="navtitle" style="margin: 0">GO-EAT</h1></nav>
@yield('content')
</main>

<script>
  let btn = document.querySelector('#btn');
  let sidebar = document.querySelector('.sidebar');
  let srcBtn = document.querySelector('.bx-search');
  let main = document.getElementById("content")


  btn.onclick = function(){
      sidebar.classList.toggle('active');
      main.classList.toggle("home-active")
  }
  srcBtn.onclick = function(){
      sidebar.classList.toggle('active');
  }


  
</script>
</body>
</html>