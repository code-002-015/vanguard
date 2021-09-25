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
          <section class="position-relative" id="section-about">
                <div class="content-wrap">
                    <div class="container">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 pr-lg-5 mb-5 mb-lg-0">
                                <h6 class="mb-2 ls5 text-uppercase text-secondary">Welcome to Our School</h6>
                                <h2 class="mb-4">About Vanguard Academy</h2>
                                <p>The Vanguard Academy is the school in Metro Manila where all students will have equitable opportunities to develop their skills, interests, and talents in preparation for their uniquely different life paths after secondary education,including tertiary education in the Philippines or abroad, assisted or fully independent part or full-time employment in small or large businesses, and varying levels of independent living.</p>
                                <a href="contact.html" class="button button-custom button-large nomargin clearfix">Learn More <i class="icon-circle-arrow-right ml-2 mr-0"></i></a>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 pb-4 pb-lg-5">
                                        <img class="rounded-20px mx-auto d-block" src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/about/img-1.jpg" alt="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 pt-lg-5">
                                        <img class="rounded-20px mx-auto d-block" src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/about/img-2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="shape-divider-bottom">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="white">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                    </svg>
                </div>
            </section>

            <section class="position-relative" id="section-video">
                <div class="h-192px"></div>
                <div class="overlay"></div>
                <div class="content-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <a class="d-block position-relative mb-5 mb-lg-0" href="https://vimeo.com/101373765" data-lightbox="iframe">
                                    <img class="w-100" src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/video.jpg" alt="Video">
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark">
                                            <span class="overlay-trigger-icon size-lg op-ts bg-light text-dark animated op-07" data-hover-animate="op-1" data-hover-animate-out="op-07" data-hover-parent=".row" style="animation-duration: 600ms;"><i class="icon-play text-primary"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 pl-lg-5">
                                <h6 class="mb-2 ls5 text-uppercase text-secondary">Watch This Out</h6>
                                <h2 class="mb-4">Our School Video</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-192px"></div>         
            </section>

            <section class="position-relative" id="section-best-practice">
                <div class="shape-divider-top">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="white">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                    </svg>
                </div>
                <div class="content-wrap" style="z-index:2">
                    <div class="container">
                        <h6 class="mb-2 ls5 text-uppercase text-secondary text-center">Our Student Learning</h6>
                        <h2 class="mb-4 text-center">Best Practices</h2>

                        <div class="row">
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <div class="card p-4 rounded-20px bg-gray text-center mb-4">
                                    <div class="card-body">
                                        <img src="https://via.placeholder.com/221x221" alt="">
                                        <h3 class="mt-5 mb-0">Collaboration/Teamwork</h3>
                                    </div>
                                </div>

                                <ul class="list-unstyled text-center">
                                    <li class="mb-2">Celebrate successes.</li>
                                    <li class="mb-2">Begin with the “end” in mind.</li>
                                    <li class="mb-2">Be open and honest.</li>
                                    <li class="mb-2">Compare and contrast ideas.</li>
                                    <li class="mb-2">Serve one another.</li>
                                </ul>
                            </div>

                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <div class="card p-4 rounded-20px bg-gray text-center mb-4">
                                    <div class="card-body">
                                        <img src="https://via.placeholder.com/221x221" alt="">
                                        <h3 class="mt-5 mb-0">Instructional Strategies</h3>
                                    </div>
                                </div>

                                <ul class="list-unstyled text-center">
                                    <li class="mb-2">Incorporate multiple intelligences.</li>
                                    <li class="mb-2">Use inquiry-based learning.</li>
                                    <li class="mb-2">Exercise collaborative learning.</li>
                                    <li class="mb-2">Encourage higher-order thinking skills.</li>
                                    <li class="mb-2">Be child-centered.</li>
                                </ul>
                            </div>

                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <div class="card p-4 rounded-20px bg-gray text-center mb-4">
                                    <div class="card-body">
                                        <img src="https://via.placeholder.com/221x221" alt="">
                                        <h3 class="mt-5 mb-0">Online Learning</h3>
                                    </div>
                                </div>

                                <ul class="list-unstyled text-center">
                                    <li class="mb-2">Set up a conducive space.</li>
                                    <li class="mb-2">Use age-appropriate applications.</li>
                                    <li class="mb-2">Integrate manipulatives.</li>
                                    <li class="mb-2">Utilize a myriad of teaching tools.</li>
                                    <li class="mb-2">Use real-world application.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape-divider-bottom">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="white">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                    </svg>
                </div>          
            </section>

            <section class="position-relative" id="section-video">
                <div class="h-192px"></div>
                <div class="overlay"></div>
                <div class="content-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 pl-lg-5 mb-4 mb-lg-0">
                                <h6 class="mb-2 ls5 text-uppercase text-secondary">Stay Connected</h6>
                                <h2 class="mb-4">Want to Discover More?</h2>
                                <a href="contact.html" class="button button-custom button-large nomargin clearfix">Contact Us <i class="icon-circle-arrow-right ml-2 mr-0"></i></a>
                            </div>
                            <div class="col-lg-6">
                                <svg class="position-absolute mt-n5 ml-n5" style="z-index:1" width="581" height="459" viewBox="0 0 581 459" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M304.5 42.0001C402.9 -39.1999 475.833 16.8334 500 55.0001C611.6 176.6 583.833 325.333 556 384.5C523.333 423.667 417.5 489.7 255.5 440.5C53 379 4.00012 313.5 0.500123 241.5C-2.29988 183.9 72.6668 153.5 110.5 145.5C134.167 144.833 206.1 123.2 304.5 42.0001Z" fill="white" fill-opacity="0.5"/>
                                </svg>
                                <img class="position-relative w-100 mt-4" style="z-index: 2;" src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/contact.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>      
            </section>';


        $aboutHTML = '
          <h3 class="font-32px">About Vanguard Academy </h3>                    
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

          <p class="nobottommargin">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>';


        $contactUsHTML = '
            <h3>Contact Details</h3>
            <iframe class="mb-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6351879919657!2d121.0079802148399!3d14.562842589826564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97529aecac7%3A0xf575bfff50902c78!2s7708%20Saint%20Paul%20Road%2C%20Village%2C%20Makati%2C%201203%20Kalakhang%20Maynila!5e0!3m2!1sen!2sph!4v1605668109563!5m2!1sen!2sph" width="100%" height="70" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            <div class="row topmargin">
                <div class="col-lg-6">
                    <address>
                        <abbr title="Address">Address:</abbr><br>
                        444a EDSA, Guadalupe Viejo, Makati City, Philippines 1211
                    </address>
                </div>
                <div class="col-lg-6">
                    <p><abbr title="Email Address">Email:</abbr><br>info@vanguard.edu.ph</p>
                </div>
                <div class="col-lg-6">
                    <p class="nomargin"><abbr title="Phone Number">Phone:</abbr><br>(632) 8-1234-4567</p>
                </div>
                <div class="col-lg-6">
                    <p class="nomargin"><abbr title="Phone Number">Fax:</abbr><br>(632) 8-1234-4567</p>
                </div>
            </div>';

        $footerHTML = '
          <div class="container">
            <div class="footer-widgets-wrap clearfix">

              <div class="row justify-content-center">
                <div class="col-lg-6 mb-5 mb-lg-0 pr-0 pr-lg-4">
                  <div class="widget">
                    <div class="d-block d-lg-flex justify-content-start">
                      <img class="w-auto h-100 pr-3 mb-4" src="'.\URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/footer-logo.png" alt="">
                      <div>
                        <h4 class="mb-3 text-white">The Vanguard Academy is proudly presented by the Academy for Children of All Abilities Philippines (ACAAP), Inc.</h4>
                        <ul class="list-unstyled mb-0 footer-contact">
                          <li><i class="icon-map-marker1"></i>444a EDSA, Guadalupe Viejo,<br> Makati City, Philippines 1211</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 mb-5 mb-lg-0">
                  <div class="widget">
                    <ul class="list-unstyled mb-0 footer-contact">
                      <li><i class="icon-phone3"></i>(632) 8-1234-4567</li>
                      <li><i class="icon-fax"></i>(632) 8-1234-4567</li>
                      <li><i class="icon-envelope"></i>info@vanguard.edu.ph</li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 mb-5 mb-lg-0">
                  <div class="widget">
                    <h4 class="mb-3 text-white">Get Connected</h4>
                    <ul class="list-inline">
                      <li class="list-inline-item mr-2">
                        <a href="#" class="text-white border-white si-rounded social-icon si-facebook">
                          <i class="icon-facebook"></i>
                          <i class="icon-facebook"></i>
                        </a>
                      </li>
                      <li class="list-inline-item mr-2">
                        <a href="#" class="text-white border-white si-rounded social-icon si-instagram">
                          <i class="icon-instagram"></i>
                          <i class="icon-instagram"></i>
                        </a>
                      </li>
                      <li class="list-inline-item mr-2">
                        <a href="#" class="text-white border-white si-rounded social-icon si-youtube">
                          <i class="icon-youtube"></i>
                          <i class="icon-youtube"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="text-white border-white si-rounded social-icon si-linkedin">
                          <i class="icon-linkedin-in"></i>
                          <i class="icon-linkedin-in"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-12 mt-4">
                  <p class="card-text"><small class="text-white">Copyright © 2019 - 2021. All Rights Reserved.</small></p>
                </div>
              </div>

              <div class="row justify-content-center mt-5 d-none">
                <div class="col-lg-12">
                  <p><small class="text-white">Posted on Sept 6, 2021</small></p>
                </div>
              </div>
            </div>
          </div>

          <div id="copyrights">
            <div class="container clearfix">
              <p class="text-center mb-0"><small class="text-white">Powered by WebFocus Solutions, Inc.</small></p>
            </div>
          </div>';

      
        $pages = [
            [
                'parent_page_id' => 0,
                'album_id' => 1,
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
                'image_url' => \URL::to('/').'/theme/'.env('THEME_FOLDER').'/images/subbanner.jpg',
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
                'image_url' => '',
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
                'name' => 'News and Updates',
                'label' => 'News and Updates',
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
