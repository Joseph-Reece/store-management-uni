@extends('frontend.layouts.app')
@section('content')

    <!-- Services Section Start -->
    <section id="services" class="section">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Our Services</h2>
          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
          <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
              <div class="icon">
                <i class="lnr lnr-pushpin"></i>
              </div>
              <h4>Gear Acquisiton</h4>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.8s">
              <div class="icon">
                <i class="lnr lnr-cart"></i>
              </div>
              <h4>Gear Rentals</h4>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="1.2s">
              <div class="icon">
                <i class="lnr lnr-mustache"></i>
              </div>
              <h4>Sports Consultancy</h4>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

    <!-- Features Section Start -->
    <section id="features" class="section" data-stellar-background-ratio="0.2">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Some Features</h2>
          <hr class="lines">
          <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-12 col-xs-12">
            <div class="container">
              <div class="row">
                 <div class="col-lg-6 col-sm-6 col-xs-12 box-item">
                    <span class="icon">
                      <i class="lnr lnr-rocket"></i>
                    </span>
                    <div class="text">
                      <h4>Quality Assuarance</h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-xs-12 box-item">
                    <span class="icon">
                      <i class="lnr lnr-laptop-phone"></i>
                    </span>
                    <div class="text">
                      <h4>Fully Customized</h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-xs-12 box-item">
                    <span class="icon">
                      <i class="lnr lnr-layers"></i>
                    </span>
                    <div class="text">
                      <h4>Readily Available</h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-xs-12 box-item">
                    <span class="icon">
                      <i class="lnr lnr-cog"></i>
                    </span>
                    <div class="text">
                      <h4>Flexible</h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12">
            <div class="show-box">
              <img class="img-fulid" style="max-height:450px" src="{{ asset('frontend/img/features/racket02.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features Section End -->

    <!-- Portfolio Section -->
    <section id="portfolios" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Our Portfolio</h2>
          <hr class="lines">
          <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Portfolio Controller/Buttons -->
            <div class="controls text-center">
              <a class="filter active btn btn-common" data-filter="all">
                All
              </a>
              <a class="filter btn btn-common" data-filter=".design">
                Design
              </a>
              <a class="filter btn btn-common" data-filter=".development">
                Development
              </a>
              <a class="filter btn btn-common" data-filter=".print">
                Print
              </a>
            </div>
            <!-- Portfolio Controller/Buttons Ends-->
          </div>

          <!-- Portfolio Recent Projects -->
          <div id="portfolio" class="row">
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development print">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="frontend/img/portfolio/img1.jpg" alt="" />
                  <a class="overlay lightbox" href="frontend/img/portfolio/img1.jpg">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix design print">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="{{ asset('frontend/img/portfolio/img2.jpg')}}" alt="" />
                  <a class="overlay lightbox" href="{{ asset('frontend/img/portfolio/img2.jpg')}}">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="{{ asset('frontend/img/portfolio/img3.jpg')}}" alt="" />
                  <a class="overlay lightbox" href="{{ asset('frontend/img/portfolio/img3.jpg')}}">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development design">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="{{ asset('frontend/img/portfolio/img4.jpg')}}" alt="" />
                  <a class="overlay lightbox" href="{{ asset('frontend/img/portfolio/img4.jpg')}}">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="{{ asset('frontend/img/portfolio/img5.jpg')}}" alt="" />
                  <a class="overlay lightbox" href="{{ asset('frontend/img/portfolio/img5.jpg')}}">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix print design">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="{{ asset('frontend/img/portfolio/img6.jpg')}}" alt="" />
                  <a class="overlay lightbox" href="{{ asset('frontend/img/portfolio/img6.jpg')}}">
                    <i class="lnr lnr-eye item-icon"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container Ends -->
    </section>
    <!-- Portfolio Section Ends -->

    <!-- Counter Section Start -->
    <div class="counters section" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item">
              <div class="icon">
                <i class="lnr lnr-bubble"></i>
              </div>
              <div class="fact-count">
                <h3><span class="counter">1589</span></h3>
                <h4>Total Transactions</h4>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item">
              <div class="icon">
                <i class="lnr lnr-cog"></i>
              </div>
              <div class="fact-count">
                <h3><span class="counter">699</span></h3>
                <h4>Total Gear</h4>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item">
              <div class="icon">
                <i class="lnr lnr-user"></i>
              </div>
              <div class="fact-count">
                <h3><span class="counter">203</span></h3>
                <h4>No. of Clients</h4>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item">
              <div class="icon">
                <i class="lnr lnr-earth"></i>
              </div>
              <div class="fact-count">
                <h3><span class="counter">1689</span></h3>
                <h4>Sports Coverage</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Counter Section End -->

    <!-- Team section Start -->
    <section id="team" class="section">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Our Team</h2>
          <hr class="lines">
          <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <img src="frontend/img/team/face.jpg" alt="">
              <div class="team-details">
                <div class="team-inner">
                  <h4 class="team-title">Jhon Doe</h4>
                  <p>Chief Technical Officer</p>
                  <ul class="social-list">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <img src="frontend/img/team/face.jpg" alt="">
              <div class="team-details">
                <div class="team-inner">
                  <h4 class="team-title">Paul Kowalsy</h4>
                  <p>CEO & Co-Founder</p>
                  <ul class="social-list">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <img src="frontend/img/team/face.jpg" alt="">
              <div class="team-details">
                <div class="team-inner">
                  <h4 class="team-title">Emilly Williams</h4>
                  <p>Business Manager</p>
                  <ul class="social-list">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <img class="img-fulid" src="frontend/img/team/face.jpg" alt="">
              <div class="team-details">
                <div class="team-inner">
                  <h4 class="team-title">Patricia Green</h4>
                  <p>Graphic Designer</p>
                  <ul class="social-list">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Team section End -->

    <!-- testimonial Section Start -->
    <div id="testimonial" class="section" data-stellar-background-ratio="0.1">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <div class="touch-slider owl-carousel owl-theme">
              <div class="testimonial-item">
                <img src="frontend/img/testimonial/customer1.jpg" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing ciusmod tempor incididunt ut labore et</p>
                  <h3>Jone Deam</h3>
                  <span>Fondor of Jalmori</span>
                </div>
              </div>
              <div class="testimonial-item">
                <img src="frontend/img/testimonial/customer2.jpg" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing ciusmod tempor incididunt ut labore et</p>
                  <h3>Oidila Matik</h3>
                  <span>President Lexo Inc</span>
                </div>
              </div>
              <div class="testimonial-item">
                <img src="frontend/img/testimonial/customer3.jpg" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing ciusmod tempor incididunt ut labore et</p>
                  <h3>Alex Dattilo</h3>
                  <span>CEO Optima Inc</span>
                </div>
              </div>
              <div class="testimonial-item">
                <img src="frontend/img/testimonial/customer4.jpg" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing ciusmod tempor incididunt ut labore et</p>
                  <h3>Paul Kowalsy</h3>
                  <span>CEO & Founder</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- testimonial Section Start -->

    <!-- Contact Section Start -->
    <section id="contact" class="section" data-stellar-background-ratio="-0.2">
      <div class="contact-form">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="contact-us">
                <h3>Contact us</h3>
                <div class="contact-address">
                  <p>University Of Software Engineering</p>
                  <p class="phone">Phone: <span>(+94 123 456 789)</span></p>
                  <p class="email">E-mail: <span>(contact@se.com)</span></p>
                </div>
                <div class="social-icons">
                  <ul>
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li class="dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="contact-block">
                <form id="contactForm">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" placeholder="Your Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea class="form-control" id="message" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="submit-button text-center">
                        <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section End -->
@endsection
