
<?php include 'model.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Css main file -->
    <link rel="stylesheet" href="Css/style.css" />
    <!--  Css Normalize file -->
    <link rel="stylesheet" href="Css/Normalize.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="Css/all.min.css" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
      rel="stylesheet"
    />
    <title>MedTrust</title>
  </head>
  <body>
    <!-- Start header -->
    <div class="header">
      <div class="container">
        <div class="left">
          <a href="" class="logo">Doctor.</a>
          <ul class="links">
            <li><a href="">Home</a></li>
            <li><a href="">Pages</a></li>
            <li><a href="">About</a></li>
            <form action="login.php">
              <li><a href="login.php">Services</a></li>
            </form>
            <li><a href="">Contact</a></li>
          </ul>
        </div>
        <div class="right">
          <i class="fa-solid fa-bag-shopping"></i>
          <a class="button">Book Now</a>
        </div>
      </div>
    </div>
    <!-- end header -->
    <!-- Start Landing -->
    <div class="landing">
      <div class="container">
        <div class="text">
          <h4 class="">Hi Doctor , Welcome :)</h4>
          <h2>A dedicated doctor you can trust</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus
            fugiat molestiae aliquam dicta nobis, obcaecati laborum unde natus.
          </p>
          <a href="">Book An Appointment</a>
        </div>
        <div class="image">
          <img src="Image/landing 2.jpg" alt="" />
        </div>
      </div>
    </div>
    <!-- End Landing -->
    <!-- start Benefits -->
    <div class="Benefits">
      <div class="container">
        <div class="box">
          <i class="fa-solid fa-clock"></i>
          <div class="content">
            <h3>24 hour service</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi,
              provident.
            </p>
          </div>
        </div>
        <div class="box">
          <i class="fa-solid fa-notes-medical"></i>
          <div class="content">
            <h3>8 years of experience</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat,
              officiis?
            </p>
          </div>
        </div>
        <div class="box">
          <i class="fa-solid fa-trophy"></i>
          <div class="content">
            <h3>High quality care</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione,
              est.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Benefits -->
    <!-- start about -->
    <div class="about">
      <div class="container">
        <div class="image">
          <img src="Image/about1.jpg" alt="" />
        </div>
        <div class="text">
          <h4 class="">About Me</h4>
          <h2>A dedicated doctor with the core mission to help</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
            ratione nisi dolorum culpa reprehenderit sed ipsum adipisci
            obcaecati explicabo voluptas eveniet molestiae commodi debitis dicta
            sint quia, possimus cupiditate optio.
          </p>
          <a href="">Book An Appointment</a>
        </div>
      </div>
    </div>
    <!-- End about -->
    <!-- start footer -->
    <div class="footer">
      <div class="container">
        <div class="box">
          <h3>Doctor.</h3>
          <ul class="social">
            <li>
              <a href="#" class="facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="#" class="twitter">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#" class="youtube">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          </ul>
          <p class="text">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus
            nulla rem, dignissimos iste aspernatur
          </p>
        </div>
        <div class="box">
          <ul class="links">
            <li><a href="#">Important Link 1</a></li>
            <li><a href="#">Important Link 2</a></li>
            <li><a href="#">Important Link 3</a></li>
            <li><a href="#">Important Link 4</a></li>
            <li><a href="#">Important Link 5</a></li>
          </ul>
        </div>
        <div class="box">
          <div class="line">
            <i class="fas fa-map-marker-alt fa-fw"></i>
            <div class="info">
              Egypt, Giza, Inside The Sphinx, Room Number 220
            </div>
          </div>
          <div class="line">
            <i class="far fa-clock fa-fw"></i>
            <div class="info">Business Hours: From 10:00 To 18:00</div>
          </div>
          <div class="line">
            <i class="fas fa-phone-volume fa-fw"></i>
            <div class="info">
              <span>+20123456789</span>
              <span>+20198765432</span>
            </div>
          </div>
        </div>
        <div class="box footer-gallery">
          <img decoding="async" src="Image/gallery-02.png" alt="" />
          <img decoding="async" src="Image/gallery-03.jpg" alt="" />
          <img decoding="async" src="Image/gallery-04.png" alt="" />
          <img decoding="async" src="Image/gallery-05.jpg" alt="" />
          <img decoding="async" src="Image/gallery-06.png" alt="" />
          <img decoding="async" src="Image/gallery-04.png" alt="" />
        </div>
      </div>
      <p class="copyright">Made With &lt;3 team</p>
    </div>
    <!-- end footer -->
  </body>
</html>
