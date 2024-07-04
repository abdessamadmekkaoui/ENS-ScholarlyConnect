<html lang="en">
<head>
  <!--  06/03/2023 -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'inc/links.php' ?>
  <?php
    if (isset($_POST["submit"])) {
      $username = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $message = $_POST["message"];

      $from = $email;
      $to = "mekkaouiabdelkader2001@gmail.com";
      $subject = $message;

      $message = "Name: {$username} Email: {$email} Phone: {$phone}  Message: " . $message;

      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // Set the SMTP server and port
      ini_set("SMTP", "mail.example.com");
      ini_set("smtp_port", "587");

      // More headers
      $headers .= 'From: $from';

      $mail = mail('$to', '$subject', '$message', '$headers');

      if ($mail) {
        echo "<script>alert('Mail Sent.');</script>";
      } else {
        echo "<script>alert('Mail Not Sent.');</script>";
      }
    }
  ?>

    <style>
        .box{
          border-top-color: var(--teal) !important;
        }
        .pop:hover{
          transform: scale(1.13);
          transition: all 0.7s;
        }
    </style>
    <title>Kech School - About</title>
</head>
<body class="bg-light">
     <?php require('inc/header.php')?>
       
      <section id="h">
          <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container shadow">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="uploaded_img/11.jpg" class="w-100 d-block"/>
            </div>
            <div class="swiper-slide">
              <img src="uploaded_img/12.jpg" class="w-100 d-block"/>
            </div>
            <div class="swiper-slide">
              <img src="uploaded_img/13.jpg" class="w-100 d-block"/>
            </div>
          </div>
        </div>
        </div>
          
          <div class="container">
            <div class="row justify-content-between align-items-center">
              <div class="col-lg-6 col-md-5 mb-4 order-lg+1 order-md-1 order-2 mb-5">
              <h2 class="fw-bold h-font text-center mt-5">Ecole Normal Superieur Marrakech. </h2>
                
                <p>
                L’Ecole Normale Supérieure de Marrakech (ENS Marrakech) est un établissement de la formation des cadres de l’enseignement secondaire, créée en 1979 et appartenant au groupe ENS Maroc.
                L’ENS Marrakech assure des formations pour répondre aux besoins, à court terme, du secteur de l’enseignement secondaire, parmi ses missions on cite: <br>
                - La formation des enseignants du second degré (CAPES). <br>
                - La préparation à l’agrégation (CPA). <br>
                - La formation LMD : filières d’enseignement. <br>
                L'objectif de l'école est de fournir une formation de haute qualité aux étudiants et de promouvoir la recherche scientifique et technologique dans la région. Elle vise également à former des enseignants de qualité pour les établissements d'enseignement secondaire et supérieur du Maroc. <br>
                L'ENSM est une institution publique et est gérée par le ministère de l'Enseignement Supérieur, de la Recherche Scientifique et de la Formation des Cadres du Maroc. Elle est accréditée par le Ministère de l'Education Nationale, de la Formation Professionnelle, de l'Enseignement Supérieur et de la Recherche Scientifique.
                </p>
              </div>
              <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="img/ENSM.png" class="w-100">
              </div>
            </div>
          </div>
      </section>

      <section id="f">
            <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
            
              <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Distinctio laboriosam iusto in id soluta!<br>
                Facere doloremque sapiente veritatis nam numquam,
                nemo et ipsa placeat molestiae.
              </p>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-6 mb-5 px-4">
                  <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                      <img src="../IMAGES/HOTEL/icons/wifi.png" width="40px">
                      <h5 class="m-0 ms-3">Wifi</h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla fugiat,
                      molestiae ea quae quos officiis accusamus?</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4">
                  <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                      <img src="../IMAGES/HOTEL/icons/wifi.png" width="40px">
                      <h5 class="m-0 ms-3">Wifi</h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla fugiat,
                      molestiae ea quae quos officiis accusamus?</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4">
                  <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                      <img src="../IMAGES/HOTEL/icons/wifi.png" width="40px">
                      <h5 class="m-0 ms-3">Wifi</h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla fugiat,
                      molestiae ea quae quos officiis accusamus?</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4">
                  <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                      <img src="../IMAGES/HOTEL/icons/wifi.png" width="40px">
                      <h5 class="m-0 ms-3">Wifi</h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla fugiat,
                      molestiae ea quae quos officiis accusamus?</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4">
                  <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                      <img src="../IMAGES/HOTEL/icons/wifi.png" width="40px">
                      <h5 class="m-0 ms-3">Wifi</h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla fugiat,
                      molestiae ea quae quos officiis accusamus?</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4">
                  <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                      <img src="../IMAGES/HOTEL/icons/wifi.png" width="40px">
                      <h5 class="m-0 ms-3">Wifi</h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla fugiat,
                      molestiae ea quae quos officiis accusamus?</p>
                  </div>
              </div>
            </div>
          </div>
      </section>

      <section id="a">
       <h2 class="fw-bold h-font text-center mt-5">About Us </h2>
          <div class="container mt-5">
            <div class="row">
              <div class="col-lg-3 col-md-6 mb-4 px-4 pop">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                  <img src="img/student.png" width="70px">
                  <h4 class="mt-3">1000+ <br>students</h4>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-4 px-4 pop">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                  <img src="img/salle.png" width="70px">
                  <h4 class="mt-3">100+ <br> salles</h4>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-4 px-4 pop">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                  <img src="img/classe.png" width="70px">
                  <h4 class="mt-3">60+ <br>classes</h4>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-4 px-4 pop">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                  <img src="img/teacher.png" width="70px">
                  <h4 class="mt-3">40+ <br>teachers</h4>
                </div>
              </div>
            </div>
          </div>

          <h2 class="my-5 fw-bold h-font text-center">School introduction video</h2>

          <div class="container mt-5">
            <div class="row">
              <video controls>
                <source src="uploaded_img/azerty.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              
            </div>
          </div> 

          <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>
        

          <div class="container px-4">
            <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                  <img src="uploaded_img/teacher.png" class="w-100">
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                  <img src="uploaded_img/student.png" class="w-100">
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                  <img src="uploaded_img/Admin.png" class="w-100">
                </div>
            </div>
            
          </div>
          </div>
      </section>

      <section id="c">
            <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">CONTACT US</h2>
            
              <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Distinctio laboriosam iusto in id soluta!<br>
                Facere doloremque sapiente veritatis nam numquam,
                nemo et ipsa placeat molestiae.
              </p>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-6 mb-5 px-4">

                  <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217406.37638548051!2d-8.147938190409596!3d31.634544975604484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!5e0!3m2!1sen!2sma!4v1678824713577!5m2!1sen!2sma" loading="lazy"></iframe>
                    
                      <h5>Address</h5>
                      <a href="https://goo.gl/maps/r3isowgdEAf2w5Ny5" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-geo-alt-fill"></i> XYZ , MARRAKECH , ENSM</a>
                      
                      <h5 class="mt-4">Call us</h5>
                      <a href="tel: +212708551965" class="d-inline-block mb-2 text-decoration-none text-dark"> <i class="bi bi-telephone-fill"></i> +212708551965</a><br>
                      <a href="tel: +212708551965" class="d-inline-block mb-2 text-decoration-none text-dark"> <i class="bi bi-telephone-fill"></i> +212644330919</a>
                      
                      <h5 class="mt-4">Email</h5>
                      <a href="mailto: mekkaouiabdelkader2001@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope-at-fill"></i> mekkaouiabdelkader2001@gmail.com</a>
                      
                      <h5 class="mt-4">Follow us</h5>
                      <a href="https://twitter.com/EssamadMekkaoui" target="_blank" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                          <i class="bi bi-twitter me-1"></i> Twitter
                        </span>
                      </a>

                      <a href="https://web.facebook.com/profile.php?id=100041103906011" target="_blank" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                          <i class="bi bi-facebook me-1"></i> facebook
                        </span>
                      </a>

                      <a href="https://www.instagram.com/abd_essamad_mekk/" target="_blank" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-instagram me-1"></i> instagram
                        </span>
                      </a>

                      <a href="https://www.youtube.com/@abdessamadmekkaoui5723/featured" target="_blank" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-youtube me-1"></i> youtube
                        </span>
                      </a>

                  </div>
              </div>
              <div class="col-lg-6 col-md-6 px-4">
                  <div class="bg-white rounded shadow p-4">
              <form action="" method="post" autocomplete="off">
                  <h5>Sand a message</h5>
                      <div class="mb-3">
                        <label class="form-label" style="font-weight: 500;">Name</label>
                        <input name="name" type="text" class="form-control shadow-none">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" style="font-weight: 500;">Email</label>
                        <input name="email" type="email" class="form-control shadow-none">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" style="font-weight: 500;">phone</label>
                        <input name="phone" type="number" class="form-control shadow-none">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" style="font-weight: 500;">Message</label>
                        <textarea name="message" class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                      </div>
                    <input type="submit" name="submit" value="Send" class="btn btn-primary text-white custom-bg bg-mt-3 ms-3" />
                </form>
              </div>
            </div>
          </div>
          </div>
      </section>

       <?php require('inc/footer.php')?>
       
       <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      const inputs = document.querySelectorAll(".input");

        function focusFunc() {
          let parent = this.parentNode;
          parent.classList.add("focus");
        }

        function blurFunc() {
          let parent = this.parentNode;
          if (this.value == "") {
            parent.classList.remove("focus");
          }
        }

        inputs.forEach((input) => {
          input.addEventListener("focus", focusFunc);
          input.addEventListener("blur", blurFunc);
        });
    
        var swiper = new Swiper(".mySwiper", {
          spaceBetween: 40,
          pagination: {
            el: ".swiper-pagination",
          },

          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          slidesPerView: "3",
          loop: true,
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
          },
          autoplay: {
            delay: 1500,
            disableOnInteraction: false,
          },
          breakpoints:{
          320: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 3,
          },
          1024: {
            slidesPerView: 3,
          },
        }
        });
    
        var swiper = new Swiper(".swiper-container", {
          spaceBetween: 30,
          effect: "fade",
          loop:true ,
          autoplay: {
            delay: 3500,
            disableOnInteraction: false,
          }
        });

        var swiper = new Swiper(".swiper-testimonials", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          slidesPerView: "3",
          loop: true,
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
          },
          autoplay: {
            delay: 1500,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
          },
          breakpoints:{
            320: {
              slidesPerView: 1,
            },
            640: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            1024: {
              slidesPerView: 3,
            },
          },
        });
    </script>
  </body>
</html>





