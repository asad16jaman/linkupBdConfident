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
    right: 0;
    width: 70%;
    opacity: 0;
    transform: translateX(100%);
    transition: transform 0.4s ease, opacity 0.4s ease, background-color 0.4s ease;
    z-index: 998;
    display: flex;
    justify-content: center;
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

    /* Desktop styles */
    @media (min-width: 768px) {
        .custom-center-menu {
            /* top: 70px;
            right: 0;
            width: auto;
            background: rgba(0, 0, 0, 0.9);
            transform: translateX(100%); */
        }

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
</style>

<header class="custom-header">
    <!-- Logo -->
    <div class="custom-logo">
        <a href="{{ route('index') }}">
            <img src="{{ $info->logo ? asset($info->logo) : asset('no.png') }}" alt="{{ $info->name ?? 'Company Logo' }}">
            <span class="fw-bold text-white d-none d-md-inline">
                {{ $info->company_name ?? 'Company Logo' }}
            </span>
        </a>
    </div>

    <!-- Toggle Button -->
    <div class="custom-menu-toggle" id="customToggleBtn">
        <div class="custom-hamburger">&#9776;</div>
        <div class="custom-close-icon">&times;</div>
    </div>

    <!-- Center Menu -->
    <div class="custom-center-menu" id="customCenterMenu">
        <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li>
                <a href="{{ route('about') }}">About</a>
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
</header>

<script>
    const toggleBtn = document.getElementById('customToggleBtn');
    const centerMenu = document.getElementById('customCenterMenu');

    toggleBtn.addEventListener('click', () => {
        centerMenu.classList.toggle('active');
        toggleBtn.classList.toggle('active');
    });
</script>
