<section class="menuBar">
    <div class="menuBar__logo"></div>
</section>

<style>
    .custom-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 70px;
        z-index: 999;
        backdrop-filter: blur(5px);
        transition: transform 0.3s ease;
    }

    .custom-logo a {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }

    .custom-logo img {
        height: 55px;
        width: 72px;
        border-radius: 50%;
        border: 3px solid #E9814C;
        padding: 5px;
        box-shadow: 0 0 8px rgba(233, 129, 76, 0.7);
        object-fit: contain;
        background: white;
    }

    .custom-logo span {
        font-size: 25px;
        color: #FFFCD6;
    }

    @media (max-width: 767.98px) {
        .custom-logo span {
            font-size: 18px !important;
        }
    }

    .custom-menu-toggle {
        width: 50px;
        height: 50px;
        cursor: pointer;
        position: relative;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-hamburger,
    .custom-close-icon {
        position: absolute;
        font-size: 1.8rem;
        color: white;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .custom-hamburger {
        opacity: 1;
    }

    .custom-close-icon {
        opacity: 0;
    }

    .custom-menu-toggle.active .custom-hamburger {
        opacity: 0;
    }

    .custom-menu-toggle.active .custom-close-icon {
        opacity: 1;
    }
    .custom-center-menu {
        position: fixed;
        top: 5px;
        right: 50px;
        width: 70%;
        /* opacity: 0; */
        /* transform: translateX(100%); */
        transition: transform 0.4s ease, opacity 0.4s ease, background-color 0.4s ease;
        z-index: 998;
        display: flex;
        justify-content: end;
        padding: 20px 0;
    }

    .custom-center-menu.active {
        transform: translateX(0);
        opacity: 1;
    }
    .custom-center-menu.active {
        transform: translateX(0);
        opacity: 1;
    }

    .custom-center-menu ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    .custom-center-menu ul li {
        position: relative;
    }

    .custom-center-menu ul li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s;
        padding: 9px 10px;
    }

    .custom-center-menu ul li a:hover {
        color: #ffcc00;
    }

    .custom-center-menu ul li ul {
        display: none;
        flex-direction: column;
        gap: 10px;
        background: #444;
        padding: 10px;
        border-radius: 5px;
        position: static;
    }

    .custom-center-menu ul li:hover ul {
        display: flex;
    }

    .custom-center-menu ul li ul li a {
        font-size: 14px;
        white-space: nowrap;
    }
    .companyName{
        display:none;
    }

    @media (min-width: 992px) {
        .custom-center-menu.active {
            transform: translateX(0%);
        }
        .custom-center-menu ul {
            flex-direction: row;
            gap: 30px;
        }
        .custom-center-menu ul li ul {
            position: absolute;
            top: 120%;
            left: 50%;
            transform: translateX(-50%);
        }

        
    }
    
     @media (max-width: 992px) {
        .custom-center-menu{
            background: black;
            right:0px;
            top:70px
        }
        .custom-center-menu ul{
                background: black;
                width: 100%;
            }

        .custom-center-menu ul li a {
            
            padding: 15px 10px;
            display: inline-block;
        }
        .custom-center-menu ul li{
            
            border-bottom: 1px dotted;
            width: 100%;
            text-align: center;
        }
        .custom-center-menu {
            opacity: 0; 
        transform: translateX(100%);
        }
     }
     @media (min-width: 1200px) {
        .companyName{
            display:block;
        }
     }
     @media (min-width: 993px) and (max-width: 1199px) {
            .custom-center-menu ul li a {
                font-size: 12px;
                padding: 9px 5px;
            }
        }
</style>

<header class="custom-header">
    <!-- Logo -->
    <div class="custom-logo">
        <a href="{{ route('index') }}">
            <img src="{{ $info->logo ? asset($info->logo) : asset('no.png') }}" alt="{{ $info->name ?? 'Company Logo' }}">
            <span class="fw-bold text-white d-none d-md-inline companyName">
                {{ $info->company_name ?? 'Company Logo' }}
            </span>
        </a>
    </div>

    <!-- Toggle Button -->
    <div class="custom-menu-toggle" id="customToggleBtn">
        <div class="custom-close-icon">&times;</div>
        <div class="custom-hamburger">&#9776;</div>
    </div>

    <!-- Center Menu -->
     <!-- active -->
    <div class="custom-center-menu" id="customCenterMenu">
        <ul>
            <li><a href="{{ route('index') }}">HOME</a></li>
            <li>
                <a type="button">ABOUT</a>
                <ul>
                    <li><a href="{{ route('about') }}">ABOUT US</a></li>
                    <li><a href="{{ route('director') }}">BOARD OF DIRECTORS</a></li>
                    <li><a href="{{ route('management') }}">MANAGEMENT TEAM</a></li>
                    <li><a href="{{ route('mission.vission') }}">MISSION & VISION</a></li>
                </ul>
            </li>
            <li><a href="{{ route('all.project') }}">PROJECTS</a></li>
            <li><a href="{{ route('event.show') }}">LATEST NEWS & EVENT</a></li>
            <li><a href="{{ route('vlog') }}">LATEST BLOGS</a></li>
            <li><a href="{{ route('contact') }}">CONTACT US</a></li>
        </ul>
    </div>
</header>

<script>
    const toggleBtn = document.getElementById('customToggleBtn');
    const centerMenu = document.getElementById('customCenterMenu');

    toggleBtn.addEventListener('click', () => {
        centerMenu.classList.toggle('active');
        toggleBtn.classList.toggle('active');
    });
</script>
