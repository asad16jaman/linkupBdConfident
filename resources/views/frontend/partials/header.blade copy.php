<style>
    .menuItems {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(20, 20, 20, 0.95);
        z-index: 9999;
        display: none;
        flex-direction: column;
        transition: all 0.4s ease;
        overflow-y: auto;
    }
    .menuItems.active {
        display: flex;
    }

    .menuItems__wrap {
        width: 100%;
        padding: 50px 20px;
    }

    .menuItems__close {
        text-align: right;
        padding: 20px;
    }

    .menuItems__close img {
        width: 35px;
        cursor: pointer;
        margin-top: -1px;
    }

    .menuItems__wrap__left ul {
        list-style: none;
        padding: 0;
        margin: 0;
        position: relative;
    }

    .menuItems__wrap__left ul li {
        margin: 10px 0;
        position: relative;
    }

    .menuItems__wrap__left ul li > a {
        color: white;
        font-size: 18px;
        text-decoration: none;
        display: inline-block;
        padding: 10px;
        transition: color 0.3s;
        cursor: pointer;
    }

    .menuItems__wrap__left ul li > a:hover {
        color: #E9814C;
    }

    /* Dropdown submenu */
    .menuItems__wrap__left ul li ul {
        list-style: none;
        padding: 0;
        margin: 0;
        position: absolute;
        top: 100%;
        left: 0;
        background: rgba(20, 20, 20, 0.95);
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.3s ease, visibility 0.3s ease;
        border-radius: 6px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.3);
        z-index: 10000;
    }


    

    /* Show submenu on hover */
    .menuItems__wrap__left ul li:hover > ul {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    /* Submenu items */
    .menuItems__wrap__left ul li ul li {
        margin: 0;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .menuItems__wrap__left ul li ul li a {
        padding: 10px 15px;
        display: block;
        color: white;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
    }

    .menuItems__wrap__left ul li ul li a:hover {
        background-color: #E9814C;
        color: white;
    }

    /* Hamburger styles */
    .menuBar__hamburger {
        cursor: pointer;
        display: flex;
        flex-direction: column;
        gap: 6px;
        padding: 10px;
    }

    .menuBar__hamburger .bar {
        width: 30px;
        height: 3px;
        background-color: #fff;
        transition: 0.3s;
    }

     
    /* Responsive: make submenu position static on small screens */
    @media (max-width: 768px) {
        .menuItems__wrap__left ul li ul {
            position: static;
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            box-shadow: none;
            background: transparent;
            min-width: auto;
            border-radius: 0;
        }

        .menuItems__wrap__left ul li:hover > ul {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
        }

      
    }
</style>

<section class="menuBar">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo Section -->
        <div class="menuBar__logo d-flex align-items-center gap-2">
           <a href="{{ route('index') }}" class="d-flex align-items-center text-decoration-none" style="gap: 10px;">
               <img src="{{ $info->logo ? asset($info->logo) : asset('no.png') }}"
                    alt="{{ $info->name ?? 'Company Logo' }}"
                    style="
                        height: 55px; 
                        width: 72px; 
                        border-radius: 50%;          
                        border: 3px solid #E9814C;  
                        padding: 5px;                
                        box-shadow: 0 0 8px rgba(233, 129, 76, 0.7);
                        object-fit: contain;
                        background: white;          
                    ">
               <span class="fw-bold text-white d-none d-md-inline" style="font-size: 25px;">
                   <span style="font-size: 25px;color:#FFFCD6; margin-top:10px ">
                       {{ $info->company_name ?? 'Company Logo' }}
                   </span><br>
               </span>
           </a>
        </div>
        <!-- Hamburger Button -->
        <div class="menuBar__hamburger" id="menuToggleBtn">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
</section>

<!-- MENU SECTION -->
<section class="menuItems" id="menuItems">
    <div class="menuItems__wrap">
        <div class="menuItems__close" id="menuCloseBtn">
            <img src="{{ asset('frontend/images/closeMenu.svg') }}" alt="Close">
        </div>
        <div class="menuItems__wrap__left">
            <ul class="mobile-res">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="has-submenu">
                    <a href="{{ route('about') }}">About Us</a>
                    <ul>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('director') }}">Board of Directors</a></li>
                        <li><a href="{{ route('management') }}">Management Team</a></li>
                        <li><a href="{{ route('mission.vission') }}">Mission & Vision</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('all.project') }}">Projects</a></li>
                <li><a href="{{ route('event.show') }}">NEWS & Event</a></li>
                <li><a href="{{ route('contact') }}">Contact US</a></li>
            </ul>
        </div>
    </div>
</section>

<script>
    // Show menu when hamburger clicked
    const menuToggleBtn = document.getElementById('menuToggleBtn');
    const menuItems = document.getElementById('menuItems');
    const menuCloseBtn = document.getElementById('menuCloseBtn');

    menuToggleBtn.addEventListener('click', () => {
        menuItems.classList.add('active');
    });

    menuCloseBtn.addEventListener('click', () => {
        menuItems.classList.remove('active');
    });

    // Mobile-friendly submenu toggle
    document.querySelectorAll('.has-submenu > a').forEach(link => {
        link.addEventListener('click', function(e) {
            // Only run for small screens (mobile)
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const submenu = this.nextElementSibling;
                if (!submenu) return;

                // Toggle submenu visibility
                if (submenu.style.maxHeight) {
                    submenu.style.maxHeight = null;
                    submenu.style.opacity = '0';
                    submenu.style.visibility = 'hidden';
                    submenu.style.pointerEvents = 'none';
                } else {
                    submenu.style.maxHeight = submenu.scrollHeight + 'px';
                    submenu.style.opacity = '1';
                    submenu.style.visibility = 'visible';
                    submenu.style.pointerEvents = 'auto';
                }
            }
        });
    });
</script>
