@php
$statusCards = [
[
'title' => 'Ongoing',
'count' => $ongoingProjects->count(),
'icon' => asset('frontend/images/category1.svg'),
'color' => '#667EEA',
'status' => 'ongoing',
],
[
'title' => 'Complete',
'count' => $completeProjects->count(),
'icon' => asset('frontend/images/category2.svg'),
'color' => '#764BA2',
'status' => 'complete',
],
[
'title' => 'Upcoming',
'count' => $upcomingProjects->count(),
'icon' => asset('frontend/images/category3.svg'),
'color' => '#667EEA',
'status' => 'upcoming',
],
];
@endphp

<section id="home_slider" class="home-slider" style="height: 100vh; position: relative; overflow: hidden;">
    {{-- Slider Images --}}
    @foreach ($slider as $item)
    <div class="ls-slide"
         data-ls="bgsize:cover; bgposition:50% 50%; duration:7000; transition2d:5;">
        <img class="ls-bg modify-img"
             src="{{ asset($item->image) }}"
             data-src="{{ asset($item->image) }}"
             data-image-small="{{ asset($item->image) }}"
             data-image-large="{{ asset($item->image) }}"
             data-image-standard="{{ asset($item->image) }}"
             alt="Slide Image">
    </div>
    @endforeach

    {{-- Category Cards --}}
    <div class="BannerCategory">
        <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.5); backdrop-filter: blur(10px); z-index: 0; border-radius: 16px;"></div>

        <div class="container" style="position: relative; z-index: 1; height: 100%; display: flex; align-items: center; justify-content: center;">
            <div class="row" style="display: flex; gap: 24px; flex-wrap: nowrap; flex-direction: row;">
                @foreach ($statusCards as $card)
                <a href="{{ route('projects.by.status', $card['status']) }}" style="text-decoration: none;">
                    <div style="
                        width: 140px; height: 170px;
                        background: rgba(255,255,255,0.15);
                        border-radius: 20px;
                        padding: 20px 12px;
                        color: #fff;
                        font-weight: 600;
                        text-align: center;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        transition: 0.3s ease-in-out;
                        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
                        border-top: 4px solid {{ $card['color'] }};
                        backdrop-filter: blur(10px) saturate(180%);
                    "
                    onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 16px 35px {{ $card['color'] }}';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 15px rgba(0,0,0,0.2)';">
                        <img src="{{ $card['icon'] }}" alt="{{ $card['title'] }}" style="width: 42px; height: 42px; margin-bottom: 12px;">
                        <h4 style="font-size: 14px; margin: 0; line-height: 1.3;">{{ $card['title'] }}</h4>
                        <span style="font-size: 12px; font-weight: 400;">({{ $card['count'] }})</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Optional Auto Rotate --}}
    <script>
        const container = document.querySelector('.BannerCategory .row');
        function rotateItems() {
            if (container.children.length > 1) {
                const firstChild = container.children[0];
                container.appendChild(firstChild);
            }
        }
        setInterval(rotateItems, 3000);
    </script>
</section>
