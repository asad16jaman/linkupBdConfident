<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Vertical Category Tree Left Side</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .sliderSlogan{
      font-size: 55px;
    margin-top: 91px;
   
    width: 297px;
    margin-left: 73px;
    color: #ffffff;
    font-weight: 700;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #111;
      color: #fff;
      overflow-x: hidden;
    }

    .slider-container {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }

    .slide {
      position: absolute;
      width: 100%;
      height: 100%;
      opacity: 0;
      transition: all 1s ease;
      transform: scale(1.2);
    }

    .slide.active {
      opacity: 1;
      z-index: 1;
      transform: scale(1);
    }

    .slide img {
      width: 100%;
      height: 100vh;
      object-fit: cover;
      filter: brightness(0.75);
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      /* background: rgba(0,0,0,0.35); */
      z-index: 1;
      pointer-events: none;
    }

    /* CATEGORY PANEL - LEFT SIDE */
    .category-panel {
      position: absolute;
      top: 90%;
      left: 50px;
      transform: translateY(-70%);
      display: flex;
      flex-direction: row;
      /* gap: 20px; */
          gap: 15%;
      z-index: 10;
      max-width: 250px;
    }

    .category-box {
      background: #1a1a1a;
      border-left: 6px solid #FF6600;
      border-radius: 16px;
      padding: 16px 20px 16px 70px;
      color: #fff;
      font-weight: 600;
      font-size: 18px;
      display: flex;
      align-items: center;
      position: relative;
      /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4); */
      transition: 0.3s ease-in-out;
      text-decoration: none;
      cursor: pointer;
      opacity: 0;
      transform: translateX(-50px);
      animation-fill-mode: forwards;
    }

    /* .category-box:hover {
      background: #222;
      border-left-color: #FF6600;
      transform: scale(1.04);
      box-shadow: 0 0 25px rgba(255, 102, 0, 0.7);
    } */

    .category-icon {
      width: 54px;
      height: 54px;
      background: #FF6600;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 0 12px rgba(255, 102, 0, 0.6);
      position: absolute;
      left: 10px;
      pointer-events: none;
    }

    .category-icon svg {
      width: 24px;
      height: 24px;
      fill: white;
    }

    .category-label {
      flex-grow: 1;
    }

    .ongoing .category-icon {
      background: #FF9933;
      box-shadow: 0 0 12px rgba(255, 153, 51, 0.6);
    }

    .complete .category-icon {
      background: #33CC66;
      box-shadow: 0 0 12px rgba(51, 204, 102, 0.6);
    }

    .upcoming .category-icon {
      background: #3399FF;
      box-shadow: 0 0 12px rgba(51, 153, 255, 0.6);
    }

    .nav-buttons {
      position: absolute;
      width: 100%;
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      justify-content: space-between;
      z-index: 5;
      padding: 0 20px;
    }


    .nav-buttons button {
      background: rgba(0, 0, 0, 0.5);
      border: none;
      color: #fff;
      font-size: 20px;
      padding: 8px 14px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
    }
   

    .nav-buttons button:hover {
      background: #FF6600;
      box-shadow: 0 0 20px #FF6600;
    }


    /* ////Slider title section is hare */
    /* .sliderTitle{
      position: absolute;
    top: 13%;
    left: 6%;
    z-index: 99;
    }
    .sliderTitle > h1{
          font-weight: 700;
          line-height: 76px;
          font-size: 55px;
          padding: 0px 30px;
          color: #fff;
    } */

    @media screen and (max-width: 900px) {
      .category-panel {
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 90vw;
        gap: 15px;
      }

      .category-box {
        padding-left: 60px;
        font-size: 16px;
      }
    }

    @keyframes fadeSlideInRight {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    
    @media screen and (max-width: 768px) {
        .category-panel {
        top: 70%;
        left: 50px;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
      }

      .category-label{
        padding-left: 20px;
      }
    }

    @media screen and (max-width: 425px) {
      /* .sliderTitle > h1{
              font-weight: 50;
        line-height: 35px;
        font-size: 20px;
        padding: 0px 10px;
    } */

        .category-panel {
        top: 73%;
        left: 50px;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        /* gap: 20px; */
            gap: 10%;
        z-index: 10;
        max-width: 250px;
      }
    }

  </style>
</head>

<!-- <div class="slide  ($loop->index == 0) ? 'active' : '' }}">
      <img src=" asset($item->image) }}" alt="Slide" />
    </div> -->

<body>
  <div class="slider-container">
    @foreach ($slider as $item)
    <div class="slide active" 
             style="background-image: url('{{ asset($item->image) }}'); 
                    background-size: cover; 
                    background-position: center; 
                    background-repeat: no-repeat;">
                  <div class="sliderSlogan">
                    {{ $item->slogan }}
                  </div>
        </div>
  @endforeach

    <div class="overlay"></div>
    @php
    $categories = [
      [
      'status' => 'ongoing',
      'label' => 'Ongoing',
      'icon' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 14.5v-5h-2v5Zm-1-7a1 1 0 1 1 1-1 1.001 1.001 0 0 1-1 1Z"/>
        </svg>'
      ],
      [
      'status' => 'complete',
      'label' => 'Complete',
      'icon' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M9 16.2L4.8 12l-1.4 1.4L9 19l12-12-1.4-1.4z"/>
        </svg>'
      ],
      [
      'status' => 'upcoming',
      'label' => 'Upcoming',
      'icon' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M12 4a8 8 0 1 0 8 8 8.01 8.01 0 0 0-8-8Zm1 11h-2v-6h2Z"/>
        </svg>'
      ],
    ];
  @endphp

    <!-- <div class="sliderTitle">
       <h1>
        DISCOVER<br>YOUR<br>DREAM<br>HOME
       </h1>
    </div> -->

    <div class="category-panel">
      @foreach ($categories as $key => $card)
      @php $class = $card['status']; @endphp
      <a href="{{ route('projects.by.status', $card['status']) }}" class="category-box {{ $class }}" tabindex="0"
      aria-label="{{ $card['label'] }} Projects" style="animation: fadeSlideInRight 0.6s {{ $key * 0.3 }}s forwards;">
      <div class="category-icon">{!! $card['icon'] !!}</div>
      <div class="category-label">{{ $card['label'] }}</div>
      </a>
    @endforeach
    </div>


    <div class="nav-buttons">
      <button id="prev" aria-label="Previous Slide">&#8592;</button>
      <button id="next" aria-label="Next Slide">&#8594;</button>
    </div>
  </div>

  <script>
    const slides = document.querySelectorAll('.slide');
    const next = document.getElementById('next');
    const prev = document.getElementById('prev');
    let index = 0;

    function showSlide(i) {
      slides.forEach(slide => slide.classList.remove('active'));
      slides[i].classList.add('active');
    }

    next.addEventListener('click', () => {
      index = (index + 1) % slides.length;
      showSlide(index);
    });

    prev.addEventListener('click', () => {
      index = (index - 1 + slides.length) % slides.length;
      showSlide(index);
    });

    setInterval(() => {
      index = (index + 1) % slides.length;
      showSlide(index);
    }, 5000);
  </script>
</body>

</html>