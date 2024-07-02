<section class="section section-lg bg-default" id="contact">
        <div class="container text-center text-sm-left">
          <div class="pre-title wow fadeInLeft" style="visibility: hidden; animation-name: none;">Contact us</div>
          <h2 class="wow fadeInLeft" data-wow-dalay=".2s" style="visibility: hidden; animation-name: none;">Make an appointment and<br><span class="text-primary">visit our clinic</span></h2>
          <div class="row row-40">
            <div class="col-xl-7">
              <div class="row row-xl-40 row-narrow-80">
                <div class="col-sm-6 wow fadeInUp" style="visibility: hidden; animation-name: none;">
                  <ul class="contacts-list">
                    <li class="title">Los Angeles, CA</li>
                    <li>2566 Jim Rosa Lane, Suite 139</li>
                    <li>Los Angeles 94108</li>
                    <li><span>Email:</span><a href="mailto:#">info@demolink.org</a></li>
                    <li><span>Phone:</span><a href="tel:#">+88 (0) 101 0000 000</a></li>
                  </ul>
                </div>
                <div class="col-sm-6 wow fadeInUp" data-wow-dalay=".2s" style="visibility: hidden; animation-name: none;">
                  <ul class="contacts-list">
                    <li class="title">San Francisco, CA</li>
                    <li>1314 Fairmont Avenue, Suite 54</li>
                    <li>San Francisco 64723</li>
                    <li><span>Email:</span><a href="mailto:#">info@demolink.org</a></li>
                    <li><span>Phone:</span><a href="tel:#">+88 (0) 101 0000 000</a></li>
                  </ul>
                </div>
                <div class="col-sm-6 wow fadeInUp" data-wow-dalay=".3s" style="visibility: hidden; animation-name: none;">
                  <ul class="contacts-list">
                    <li class="title">New York, NY</li>
                    <li>198 West 21th Street, Suite 721</li>
                    <li>New York NY 10010</li>
                    <li><span>Email:</span><a href="mailto:#">info@demolink.org</a></li>
                    <li><span>Phone:</span><a href="tel:#">+88 (0) 101 0000 000</a></li>
                  </ul>
                </div>
                <div class="col-sm-6 wow fadeInUp" data-wow-dalay=".4s" style="visibility: hidden; animation-name: none;">
                  <ul class="contacts-list">
                    <li class="title">Washington, DC</li>
                    <li>Green Hill Road, Suite 195</li>
                    <li>Washington 72847</li>
                    <li><span>Email:</span><a href="mailto:#">info@demolink.org</a></li>
                    <li><span>Phone:</span><a href="tel:#">+88 (0) 101 0000 000</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-lg-7">
              <form class="" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{route('contact')}}">
              @csrf
                <div class="row row-20">
                  <div class="col-12 wow fadeInRight" data-wow-dalay=".2s" style="visibility: hidden; animation-name: none;">
                    <div class="form-wrap">
                      <input class="form-input form-control-has-validation" id="contact-name" type="text" name="name"><span class="form-validation"></span>
                      <label class="form-label rd-input-label" for="contact-name">Your Name</label>
                    </div>
                  </div>
                  <div class="col-md-12 wow fadeInRight" data-wow-dalay=".3s" style="visibility: hidden; animation-name: none;">
                    <div class="form-wrap">
                      <input class="form-input form-control-has-validation" id="contact-phone" type="text" name="phone" ><span class="form-validation"></span>
                      <label class="form-label rd-input-label" for="contact-phone">Phone</label>
                    </div>
                  </div>
                  <div class="col-12 wow fadeInRight" data-wow-dalay=".4s" style="visibility: hidden; animation-name: none;">
                    <div class="form-wrap">
                      <label class="form-label rd-input-label" for="contact-message">Your Message</label>
                      <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="message"></textarea><span class="form-validation"></span>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="bg-blue-500 text-white hover:bg-blue-700 font-bold button-sm" type="submit">Make an Appointment</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      @if (session()->has('error'))
                        <div x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 4000)"
                            x-show="show"
                            class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
                        >
                            <p>{{ session('error') }}</p>
                        </div>
                    @elseif (session()->has('success'))
                        <div x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 4000)"
                            x-show="show"
                            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
                        >
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif