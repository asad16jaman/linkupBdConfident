<div style="position: relative; overflow: hidden;">
  <!-- Desktop Footer -->
  <section class="Footer DesktopFooter" style="position: relative; z-index: 1; color: white; padding: 60px 0; background-color: rgba(0,0,0,0.85);">
    
    <!-- Background Image Overlay -->
    <div style="
      content: '';
      position: absolute;
      inset: 0;
      background-image: url('https://t4.ftcdn.net/jpg/00/97/87/09/360_F_97870953_V0Aq7dhJp2reT1GsGXy0vI2fdazTC9IX.jpg');
      background-size: cover;
      background-position: center;
      filter: blur(8px);
      opacity: 0.4;
      z-index: 0;
    "></div>

    <!-- Content Container -->
    <div class="container" style="position: relative; z-index: 1;">
      <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between; margin: 0;">

        <!-- Column 1 -->
        <div class="col-sm-12 col-md-4" style="padding: 0; margin: 0;">
          <div style="border: 1px solid white; border-right: none;  height: 100%; padding: 20px;">
            <a href="{{ route('index') }}" class="text-decoration-none" style="display: block; color: white;">
              <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 20px; font-weight: 600;">
                  {{ $info->company_name }}
                </span>
              </div>
            </a>
            <p style="margin-top: 10px; font-size: 14px;color:white">{{ $info->footer_slogan }}</p>
          </div>
        </div>

        <!-- Column 2 -->
        <div class="col-sm-12 col-md-4" style="padding: 0; margin: 0;">
          <div style="border: 1px solid white;  height: 100%; padding: 20px;">
            <h4 style="font-size: 16px; margin-bottom: 15px; color:white">Contact</h4>
            <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; display: flex; gap: 14px; font-size: 18px;">
              <li><a href="{{ $info->facebook }}" style="color: white;"><i class="fa fa-facebook"></i></a></li>
              <li><a href="{{ $info->instagram }}" style="color: white;"><i class="fa fa-instagram"></i></a></li>
              <li><a href="{{ $info->linkdin }}" style="color: white;"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="{{ $info->twitter }}" style="color: white;"><i class="fa fa-twitter"></i></a></li>
              <li><a href="{{ $info->youtube }}" style="color: white;"><i class="fa fa-youtube"></i></a></li>
            </ul>
            <p style="margin: 0 0 6px 0; font-size: 14px;color:white">Phone: <a href="tel:{{ $info->phone }}" style="color: white;">{{ $info->phone }}</a></p>
            <p style="margin: 0 0 6px 0; font-size: 14px;color:white">Email: <a href="mailto:{{ $info->email }}" style="color: white;">{{ $info->email }}</a></p>
            <p style="margin: 0; font-size: 14px;color:white">Address: {{ $info->address }}</p>
          </div>
        </div>

        <!-- Column 3 -->
        <div class="col-sm-12 col-md-4" style="padding: 0; margin: 0;">
          <div style="border: 1px solid white; border-left: none;  height: 100%; padding: 20px; text-align: center;">
            <h4 style="font-size: 16px; margin-bottom: 15px; color:white">Company Overview</h4>
            <img src="{{asset('back_asset/images/finalslogan.png')}}" alt="Company Slogan" style="max-width: 100%; height: auto; border-radius: 8px;">
          </div>
        </div>

      </div>
    </div>
  </section>



</div>
<!-- Copyright -->
<section style="background: #2c2c2c; padding: 14px 0; position: relative; z-index: 2; border-top: 1px solid white;">
  <div class="container">
    <div class="row" style="display: flex;">
      <div class="col-12 col-md-6" style="padding: 5px; text-align: left;">
        <p style="margin: 0; color: #fff; font-size: 14px;">
          © 2025 Confident Properties LTD All Rights Reserved.
        </p>
      </div>
      <div class="col-12 col-md-6" style="padding: 5px; text-align: right;">
        <p style="margin: 0; color: #fff; font-size: 14px;">
          Design & Developed by
          <a href="https://linktechbd.com" target="_blank"
            style="font-weight: 600; background-color: #0d6efd; padding: 3px 8px; border-radius: 4px; color: white; text-decoration: none;">
            Link-Up Technology
          </a>
        </p>
      </div>
    </div>
  </div>
</section>

</section>