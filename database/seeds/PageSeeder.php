<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $homeHTML = '
            <div class="content-wrap">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="hero-headline bottommargin">
                    <h1>Web<span class="themecolor">Focus</span> Solutions, Inc. is the leading web development company in the Philippines since 2001</h1>
                    <span>WebFocus Solutions, Inc. is the leading provider of IT Solutions in the Philippines. We have enthusiastically served more than 1,600 clients, and the number keeps on growing.</span>
                  </div>

                  <a href="#" data-scrollto="#section-contact" data-easing="easeInOutExpo" data-speed="1250" data-offset="60" class="button button-dark button-black nomargin">Get Custom Quote</a>

                  <div class="line topmargin-lg bottommargin-lg"></div>
                </div>

                <div class="col-md-10">
                  <div class="heading-block">
                    <h2>Services</h2>
                    <span>As a key player in the IT industry, we have proven that our services work and sell. With that, we have expanded our horizon in order to meet the needs and demands of our clients.</span>             
                  </div>
                </div>

                <div class="col-lg-6 bottommargin">
                  <div class="feature-box fbox-plain fbox-dark">
                    <div class="fbox-icon">
                      <a href="#"><i class="icon-et-desktop themecolor"></i></a>
                    </div>
                    <h3>Domain</h3>
                    <p>We can help you elevate your business online, and there is no better way to start than choosing your domain name, one that is unique and fully represents your business.</p>
                  </div>
                </div>

                <div class="col-lg-6 bottommargin">
                  <div class="feature-box fbox-plain fbox-dark">
                    <div class="fbox-icon">
                      <a href="#"><i class="icon-et-global themecolor"></i></a>
                    </div>
                    <h3>Email and Web Hosting</h3>
                    <p>We offer powerful hosting solutions that are affordable and can store websites with fully integrated Internet solutions for both small and big organizations.</p>
                  </div>
                </div>

                <div class="col-lg-6 bottommargin">
                  <div class="feature-box fbox-plain fbox-dark">
                    <div class="fbox-icon">
                      <a href="#"><i class="icon-et-megaphone themecolor"></i></a>
                    </div>
                    <h3>Web Development</h3>
                    <p>Design the system, Automate the process, Transform your business. We cater a wide range of custom-built web solutions that transform business processes on the web.</p>
                  </div>
                </div>

                <div class="col-lg-6 bottommargin">
                  <div class="feature-box fbox-plain fbox-dark">
                    <div class="fbox-icon">
                      <a href="#"><i class="icon-et-tools themecolor"></i></a>
                    </div>
                    <h3>Document Management System</h3>
                    <p>We are an accredited implementation partner for document management system software applications that will help your organization to create e-documents, collaboratively edit and finalize these, completely secure and share documents within the organization.</p>
                  </div>
                </div>

                <div class="col-md-8 offset-md-2 text-center">
                  <div class="divider divider-center"><i class="icon-like"></i></div>

                  <h4>What they say about our service</h4>
                  <div class="fslider testimonial nopadding noborder noshadow" data-animation="slide" data-arrows="false">
                    <div class="flexslider">
                      <div class="slider-wrap">
                        <div class="slide">
                          <div class="testi-content">
                            <p>"We now have WebFocus’ Technical Support to assist us, most especially when we’re off site and out of office."</p>
                            <div class="testi-meta">
                              Anna Liza Fallar-Marquez, I.T. Manager
                              <span>AirSpeed International Corporation</span>
                            </div>
                          </div>
                        </div>
                        <div class="slide">
                          <div class="testi-content">
                            <p>"WebFocus officers are very accommodating and they go out of their way whenever we need assistance from them especially during the first few weeks after our website launching."</p>
                            <div class="testi-meta">
                              Greggy Romualdez, Head of External Affairs
                              <span>Team Energy Corporation</span>
                            </div>
                          </div>
                        </div>
                        <div class="slide">
                          <div class="testi-content">
                            <p>"The cPanel has definitely helped us input data in our website. We are satisfied with your service. Very hands on. Your team makes sure that all requests are granted immediately."</p>
                            <div class="testi-meta">
                              Ms. Pauline Abello
                              <span>Philippine Center for Environmental Protection and Sustainable Development, Inc. (PCEPSDI)</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="line topmargin-lg bottommargin-lg"></div>
                </div>

                <div class="col-md-10">
                  <div class="heading-block">
                    <h2>Why choose WebFocus?</h2>
                    <span>It has been proven time and time again that we deliver great value for clients who acquire our I.T. services. On top of this, we bring 24/7 customer support to them the best way we can.</span>              
                  </div>
                </div>

                <div class="col-md-3">
                  <img src="https://admin.webfocusprod.wsiph2.com/files/2/Others/feat1.jpg" />
                  <h3>Customized</h3>
                  <p>WebFocus will use the information you provide to design the solution that will perfectly match your requirements</p>
                </div>
                <div class="col-md-3">
                  <img src="https://admin.webfocusprod.wsiph2.com/files/2/Others/feat2.jpg" />
                  <h3>Modular</h3>
                  <p>We build our solutions through a modular approach, so that you can utilize more features and functionalities</p>
                </div>
                <div class="col-md-3">
                  <img src="https://admin.webfocusprod.wsiph2.com/files/2/Others/feat3.jpg" />
                  <h3>Scalable</h3>
                  <p>WebFocus provides scalable I.T. solutions for your business that will help you in growing smarter and faster</p>
                </div>
                <div class="col-md-3">
                  <img src="https://admin.webfocusprod.wsiph2.com/files/2/Others/feat1.jpg" />
                  <h3>Cost-Efficient</h3>
                  <p>WebFocus wants you to invest where it matters the most. We will help you adapt and learn as you go</p>
                </div>

                <div class="col-12">            

                  <div class="line topmargin-lg bottommargin-lg"></div>
                  <div class="heading-block">
                    <h2>Latest News</h2>
                  </div>

                  <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="true" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">

                    {Featured Articles}

                  </div>

                  <div class="line topmargin-lg bottommargin-lg"></div>

                  <div class="heading-block">
                    <h2>Brands weve worked with</h2>
                  </div>

                  <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="false" data-pagi="true" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6">
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo1.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo2.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo3.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo4.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo5.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo6.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo7.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo8.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo9.png" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/clients/logo10.png" alt="Clients"></a></div>
                  </div>

                </div>

              </div>
            </div>
          </div>';

        $aboutHTML = '
          <div class="content-wrap">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="heading-block">
                    <h3>About us with banner image</h3>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>
                </div>
              </div>
            </div>
          </div>';



        $contactUsHTML = '
            <div class="col-lg-6">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.7395283445844!2d121.0487146566528!3d14.571756989820798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8448f1f3569%3A0xf50b5ce937fcfc83!2sGlobe%20Telecom%20Plaza!5e0!3m2!1sen!2sph!4v1612285065708!5m2!1sen!2sph" width="100%" height="500" frameborder="1" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="pb-4"></iframe>

              <address>
                <strong>Head Office:</strong><br>
                Unit 721 7F Globe Telecom Plaza II Pioneer Highlands Condo Pioneer St Barangka Ilaya Mandaluyong City 1550 Philippines
              </address>

              <div class="row"><br>
                <div class="col-md-6">
                  <address>
                    <strong>Lilo-an Cebu Office:</strong><br>
                    Purok Molave, Tayud, Lilo-an Cebu
                  </address>
                </div>
                <div class="col-md-6">
                  <address>
                    <strong>Cavite Plant:</strong><br>
                    Brgy. Osorio, Trece Martires City, Cavite
                  </address>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <abbr title="Phone Number"><strong>Phone:</strong><br>
                  </abbr> (02) 8687-4982<br>
                  (02) 8687-5123 to 30<br>
                  <br>
                  <abbr title="Fax"><strong>Fax:</strong><br>
                  </abbr> (02) 8687-1410<br>
                </div>

                <div class="col-md-6">
                  <abbr title="Mobile"><strong>Mobile:</strong><br>
                  </abbr> +63917 598 8518<br>
                  <br>
                  <abbr title="Email Address"><strong>Email:</strong><br>
                  </abbr> sales@nffic.com.ph<br>
                  marketing@nffic.com.ph
                </div>
              </div>

              <div class="noborder notoppadding mt-4">
                <strong>Social Media:</strong><br>
                <a href="#" class="social-icon si-small si-dark si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>

                <a href="#" class="social-icon si-small si-dark si-twitter">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>

                <a href="#" class="social-icon si-small si-dark si-linkedin">
                  <i class="icon-linkedin"></i>
                  <i class="icon-linkedin"></i>
                </a>

              </div>
            </div>';

        $footerHTML = '
        <div id="copyrights" style="background-color:#111;">
          <div class="container-fluid">

            Copyrights &copy; Canvas 2015 | All Rights Reserved

          </div>
        </div>';

      
        $pages = [
            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'home',
                'name' => 'Home',
                'label' => 'Home',
                'contents' => $homeHTML,
                'status' => 'PUBLISHED',
                'page_type' => 'default',
                'image_url' => '',
                'meta_title' => 'Home',
                'meta_keyword' => 'home',
                'meta_description' => 'Home page',
                'user_id' => 1,
                'template' => 'home',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'about-us',
                'name' => 'About Us',
                'label' => 'About Us',
                'contents' => $aboutHTML,
                'status' => 'PUBLISHED',
                'page_type' => 'standard',
                'image_url' => \URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/banners/sub/image1.jpg',
                'meta_title' => 'About Us',
                'meta_keyword' => 'About Us',
                'meta_description' => 'About Us page',
                'user_id' => 1,
                'template' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'contact-us',
                'name' => 'Contact Us',
                'label' => 'Contact Us',
                'contents' => $contactUsHTML,
                'status' => 'PUBLISHED',
                'page_type' => 'standard',
                'image_url' => \URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/banners/sub/image1.jpg',
                'meta_title' => 'Contact Us',
                'meta_keyword' => 'Contact Us',
                'meta_description' => 'Contact Us page',
                'user_id' => 1,
                'template' => 'contact-us',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'news',
                'name' => 'News',
                'label' => 'News',
                'contents' => '',
                'status' => 'PUBLISHED',
                'page_type' => 'customize',
                'image_url' => '',
                'meta_title' => 'News',
                'meta_keyword' => 'news',
                'meta_description' => 'News page',
                'user_id' => 1,
                'template' => 'news',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'footer',
                'name' => 'Footer',
                'label' => 'footer',
                'contents' => $footerHTML,
                'status' => 'PUBLISHED',
                'page_type' => 'default',
                'image_url' => '',
                'meta_title' => '',
                'meta_keyword' => '',
                'meta_description' => '',
                'user_id' => 1,
                'template' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];

        DB::table('pages')->insert($pages);
    }
}
