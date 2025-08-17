<div style="position: relative; overflow: hidden;">
  <!-- Background Layer with Opacity + Blur -->
  <div style="
    position: absolute;
    inset: 0;
    background-image: url('https://static.vecteezy.com/system/resources/thumbnails/003/368/640/small_2x/city-and-building-sunset-blurred-background-free-photo.jpg');
    background-size: cover;
    background-position: center;
    opacity: 0.5;
    z-index: 0;
  "></div>
  <!-- Foreground Content -->
  <div class="success-stories-container container" style="position: relative; z-index: 1;">
    <div class="row">
      <div class="col-md-12">
        <h2 class="Title anim fadeRight text-center" style="color:black; padding-top:15px">OUR Success Stories</h2>
      </div>
      <div class="clearfix"></div>
      <div class="BenefitNd__item-wrap anim fadeUp">
        <div class="BenefitNd-SliderInit row">
          @foreach($stories as $story)
          <div class="col-sm-3">
            <a href="{{ route('success-stories.show', $story->id) }}" class="BenefitNd__item-wrap__item" style="display: block; border-radius: 12px; overflow: hidden;">
              <div class="BenefitNd__item-wrap__item__bg" style="border-radius: 12px; overflow: hidden;">
                <img class="modify-img"
                  src="{{ asset($story->image) }}"
                  alt=""
                  style="width: 100%; height: auto; border-radius: 12px;">
              </div>
              <div class="BenefitNd__item-wrap__item__hover" style="border-radius: 0 0 12px 12px;">
                <h4>{{ $story->title }}</h4>
                <p>{!! Str::limit(strip_tags($story->description), 90) !!}</p>
              </div>
            </a>
          </div>
          @endforeach
        </div>

        <!-- Slider navigation -->
        <div class="slider__nav">
          <ul>
            <li class="Goleft">
              <img src="https://concordrealestatebd.com/wp-content/themes/concord/assets/image/goLeft.svg" alt="Go Left">
            </li>
            <li class="Goright">
              <img src="https://concordrealestatebd.com/wp-content/themes/concord/assets/image/goRight.svg" alt="Go Right">
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
