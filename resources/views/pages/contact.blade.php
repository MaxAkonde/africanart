@extends('layouts.user')

@section('extra-css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset("user/css/bootstrap.min.css") }}>
    <!-- animate CSS -->
    <link rel="stylesheet" href={{ asset("user/css/animate.css") }}>
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href={{ asset("user/css/owl.carousel.min.css") }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset("user/css/all.css") }}>
    <!-- flaticon CSS -->
    <link rel="stylesheet" href={{ asset("user/css/flaticon.css") }}>
    <link rel="stylesheet" href={{ asset("user/css/themify-icons.css") }}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{ asset("user/css/magnific-popup.css") }}>
    <!-- swiper CSS -->
    <link rel="stylesheet" href={{ asset("user/css/slick.css") }}>
    <!-- style CSS -->
    <link rel="stylesheet" href={{ asset("user/css/style.css") }}>
@endsection

@section('content')
    <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Contactez nous</h2>
              <p>Acceuil <span>-</span> Contactez nous</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;"></div>
        <script>
          function initMap() {
            var uluru = {
              lat: -25.363,
              lng: 131.044
            };
            var grayStyles = [{
                featureType: "all",
                stylers: [{
                    saturation: -90
                  },
                  {
                    lightness: 50
                  }
                ]
              },
              {
                elementType: 'labels.text.fill',
                stylers: [{
                  color: '#ccdee9'
                }]
              }
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {
                lat: -31.197,
                lng: 150.744
              },
              zoom: 9,
              styles: grayStyles,
              scrollwheel: false
            });
          }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
        </script>

      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Entrer en contact</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="#" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Message'"
                    placeholder='Votre Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Votre nom'" placeholder='Votre nom'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Votre email'" placeholder='Votre email'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Votre Sujet'" placeholder='Votre Sujet'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <a href="#" class="btn_3 button-contactForm">Envoyer le message</a>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Buttonwood, California.</h3>
              <p>Rosemead, CA 91770</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>00 (440) 9865 562</h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>support@colorlib.com</h3>
              <p>Envoyez-nous votre requête à tout moment !</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->
@endsection

@section('extra-js')
    <!-- jquery plugins here-->
    <script src={{ asset("user/js/jquery-1.12.1.min.js") }}></script>
    <!-- popper js -->
    <script src={{ asset("user/js/popper.min.js") }}></script>
    <!-- bootstrap js -->
    <script src={{ asset("user/js/bootstrap.min.js") }}></script>
    <!-- easing js -->
    <script src={{ asset("user/js/jquery.magnific-popup.js") }}></script>
    <!-- swiper js -->
    <script src={{ asset("user/js/swiper.min.js") }}></script>
    <!-- swiper js -->
    <script src={{ asset("user/js/masonry.pkgd.js") }}></script>
    <!-- particles js -->
    <script src={{ asset("user/js/owl.carousel.min.js") }}></script>
    <script src={{ asset("user/js/jquery.nice-select.min.js") }}></script>
    <!-- slick js -->
    <script src={{ asset("user/js/slick.min.js") }}></script>
    <script src={{ asset("user/js/jquery.counterup.min.js") }}></script>
    <script src={{ asset("user/js/waypoints.min.js") }}></script>
    <script src={{ asset("user/js/contact.js") }}></script>
    <script src={{ asset("user/js/jquery.ajaxchimp.min.js") }}></script>
    <script src={{ asset("user/js/jquery.form.js") }}></script>
    <script src={{ asset("user/js/jquery.validate.min.js") }}></script>
    <script src={{ asset("user/js/mail-script.js") }}></script>
    <!-- custom js -->
    <script src={{ asset("user/js/custom.js") }}></script>
@endsection