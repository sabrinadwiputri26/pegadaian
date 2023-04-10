<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegadaian Online Sabrina</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body>

<header>

<a href="#" class="logo"><i class="fas fa-graduation-cap"></i>Pegadaian</a>

<nav class="navbar">
    <ul>
        
        <li><a href="#teacher">people</a></li>
        <li><a href="#review">review</a></li>
        <li><a href="#contact">contact</a></li>
    </ul>
</nav>

<div class="icons">
    @if (Auth::check())
    @if (Auth::user()->role === 'admin')
    <a href="{{route('data')}}" class= "login-btn">Lihat data</a>
    @elseif (Auth::user()->role == 'petugas')
    <a href="{{route('data.petugas')}}"
    class="login-btn">Lihat data</a>
    @endif
    
    @else
 
    <a href="/login"class="fas fa-user"></a>
    @endif
</div>

<div class="fas fa-bars"></div>

</header>

<section class="home" id="home">

<div class="content">
    <h1>Pinjaman Modal Produktif</h1>
    <p>Pegadaian Kini Menjadi The Most Valuable Financial Company yang di Indonesia dan Sebagai Agen Inklusi Keuangan Pilihan Utama Masyarakat.</p>
    <a target="_blank" href="https://www.pegadaian.co.id/"><button>read more</button></a>
</div>

<div class="box-container">

    <div class="box">
        <i class="fas fa-percent"></i>
        <h3>Persen Pergadai</h3>
        <p>Sewa dan pinjam modal dipegadaian dijamin kompetitif dan dapat dipercaya</p>
    </div>

    <div class="box">
        <i class="fas fa-box"></i>
        <h3>Asset Pegadaian</h3>
        <p>Pegadaian tidak dapat memberikan biaya asset bangunan ataupun fisik</p>
    </div>

    <div class="box">
        <i class="fas fa-clock"></i>
        <h3>Waktu Pegadaian</h3>
        <p>Proses waktu kami jamin cepat, aman, dan hemat waktu pengerjaan</p>
    </div>

</div>

</section>

<section class="about" id="about">



</section>

<section id="teacher" class="teacher">

<h1 class="heading">About Us</h1>
<h3 class="title">Pegadaian </h3>

<div class="card-container">

    <div class="card">
        <img src="{{asset('assets/img/pusat.jpeg')}}" alt="">
        <h3>Pusat Pegadaian</h3>
        <p>Kantor pusat pegadaian terletak di Jakarta</p>
        <div class="icons">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-github"></a>
        </div>
    </div>

    <div class="card">
        <img src="{{asset('assets/img/emas.jpeg')}}" alt="">
        <h3>Emas Pegadaian</h3>
        <p>Cara membuka tabungan emas pegadaian</p>
        <div class="icons">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-github"></a>
        </div>
    </div>

    <div class="card">
        <img src="{{asset('assets/img/gadai.jpg')}}" alt="">
        <h3>Pegadaian offline</h3>
        <p>Pegadaian menerima layanan online dan juga offline</p>
        <div class="icons">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-github"></a>
        </div>
    </div>

    <div class="card">
        <img src="{{asset('assets/img/cabang.jpg')}}" alt="">
        <h3>Cabang Pegadaian</h3>
        <p>Pegadaian memiliki banyak cabang di seluruh Indonesia</p>
        <div class="icons">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-github"></a>
        </div>
    </div>

</div>


<section id="review" class="review">

<h1 class="heading">Pegadaian Rate card</h1>
<h3 class="title">what our people says about us</h3>

<div class="box-container">

    <div class="box">
        <img src="{{asset('assets/img/box 1.png')}}" alt="">
        <h3>1000+</h3>
        <p>visitors every month at the pegadaian</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
    </div>

    <div class="box">
        <img src="{{asset('assets/img/box 3.png')}}" alt="">
        <h3>97%</h3>
        <p>People Like and Follow pegadaian</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
    </div>

    <div class="box">
        <img src="{{asset('assets/img/box 4.png')}}" alt="">
        <h3>740+</h3>
        <p>Propose to pawn their goods</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
    </div>

    <div class="box">
        <img src="{{asset('assets/img/box 2.png')}}" alt="">
        <h3>999+</h3>
        <p>honest reviews from all users</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
    </div>

</div>

</section>

<section class="contact" id="contact">

<h1 class="heading">contact us</h1>
<h3 class="title">we love conversatios, lets talk.</h3>
<form action="/store" method="POST" enctype="multipart/form-data"> 
    @csrf 
@if ($errors->any())
<div style="width: 45%; margin-left: 760px; margin-top: 30px; font-size:2rem; background: rgb(231, 152, 152);">
<ul>
  @foreach ($errors->all() as $error)
      <li> {{$error}} </li>
  @endforeach  
</ul>
</div>

@endif
@if (Session::get('success'))
            <div style="width: 45%; margin-left: 760px; margin-top: 30px; font-size:2rem; background: rgb(152, 197, 231);">
            {{ Session::get('success')}}
            </div>
            @endif 
<div class="row">

    <div class="image">
    <img src="{{asset('assets/img/formm.png')}}" alt="">
    </div>

    <div class="form-container">
        <form action="">
            <input type="text" placeholder="nik" class="box" name="nik">
            <input type="name" placeholder="nama" class="box" name="nama">
            <input type="no" placeholder="no.telphone" class="box" name="no">
            <textarea class="box" name="pegadaian" placeholder="Item yang akan di gadaikan" id="" cols="30" rows="10"></textarea>
            <div class="box">
                <input type="file" class="input" name="foto">
             </div> 
            <input type="submit" value="message">
        </form>


</div>

</section>
<section class="footer">

<div class="icons">
    <a href="https://www.linkedin.com/in/sabrina-dwi-putri-utami-2a3b67260/" class="fab fa-linkedin"></a>
    <a target="_blank" href="https://www.instagram.com/sabrina_dpu/" class="fab fa-instagram"></a>
    <a target="_blank" href="https://github.com/sabrinadwiputri26" class="fab fa-github"></a>
    <a target="_blank" href="https://id.pinterest.com/sabrinadpu/" class="fab fa-pinterest"></a>
</div>

<div class="credit">created by <span>Sabrina Dwi Putri Utami</span> | all rights reserved.</div>

</section>

    
</body>
</html>