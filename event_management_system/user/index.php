<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event Management System</title>

<style>

/* ===== GLOBAL STYLES ===== */
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(120deg, #0f2027, #203a43, #2c5364);
    color: white;
    overflow-x: hidden;
    scroll-behavior: smooth;
}

/* ===== NAVBAR ===== */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(8px);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.logo {
    font-size: 24px;
    font-weight: bold;
    color: #00ffd5;
}

.nav-links a {
    color: white;
    margin-left: 20px;
    text-decoration: none;
    font-weight: 500;
    position: relative;
    transition: 0.3s;
}

.nav-links a:hover {
    color: #00ffd5;
}

.nav-links a::after {
    content: '';
    width: 0%;
    height: 2px;
    background: #00ffd5;
    position: absolute;
    left: 0;
    bottom: -5px;
    transition: 0.3s;
}

.nav-links a:hover::after {
    width: 100%;
}

/* ===== IMAGE SLIDER ===== */
.slider {
    width: 100%;
    height: 400px; /* slightly taller for better visibility */
    overflow: hidden;
    position: relative;
}

.slide {
    width: 100%;
    height: 100%;
    position: absolute;
    opacity: 0;
    animation: slideAnimation 15s infinite;
}

.slide img {
    width: 100%;
    height: 500px;

    object-fit: cover;
    background: black;        /* fills container */
    object-position: center;  /* keeps image centered */
}

/* Animation timing */
.slide:nth-child(1) { animation-delay: 0s; }
.slide:nth-child(2) { animation-delay: 5s; }
.slide:nth-child(3) { animation-delay: 10s; }

@keyframes slideAnimation {
    0% { opacity: 0; }
    10% { opacity: 1; }
    30% { opacity: 1; }
    40% { opacity: 0; }
    100% { opacity: 0; }
}

/* ===== HERO SECTION ===== */
.hero {
    height: 30vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
}

.hero h1 {
    font-size: 48px;
    margin-bottom: 10px;
    animation: fadeInDown 1.5s ease;
}

.hero p {
    font-size: 20px;
    margin-bottom: 30px;
    animation: fadeInUp 1.5s ease;
}

button {
    padding: 12px 25px;
    font-size: 16px;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    background: #00ffd5;
    color: black;
    font-weight: bold;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.1);
    background: #00c9a7;
}

/* ===== FLOATING SHAPES ===== */
.shape {
    position: absolute;
    border-radius: 50%;
    opacity: 0.3;
    animation: float 6s infinite ease-in-out;
}

.shape1 {
    width: 120px;
    height: 120px;
    background: #00ffd5;
    top: 10%;
    left: 15%;
}

.shape2 {
    width: 200px;
    height: 200px;
    background: #ff00c8;
    bottom: 10%;
    right: 10%;
}

.shape3 {
    width: 80px;
    height: 80px;
    background: #ffaa00;
    top: 60%;
    left: 5%;
}

/* ===== PORTFOLIO SECTION ===== */
.section {
    padding: 60px 20px;
    text-align: center;
}

.cards {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 30px;
}

.card {
    background: rgba(255,255,255,0.1);
    padding: 25px;
    border-radius: 15px;
    width: 250px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-10px);
    background: rgba(0,255,213,0.2);
}

.card h2 {
    font-size: 35px;
    color: #00ffd5;
}

.card p {
    font-size: 25px;
    color: white;
}

/* ===== FOOTER ===== */
.footer {
    background: black;
    padding: 20px;
    text-align: center;
}

/* ===== ANIMATIONS ===== */
@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-40px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">EventPro</div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="events.php">Events</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="#contact">Contact</a>
        <a href="/event_management_system/admin/admin_login.php">
            Admin
        </a>

    </div>
</div>

<!-- IMAGE SLIDER -->
<div class="slider">

<div class="slide">
<img src="image1.jfif">
</div>

<div class="slide">
<img src="image3.jfif">
</div>

<div class="slide">
<img src="image2.jfif">
</div>

</div>

<!-- HERO SECTION -->
<div class="hero">

    <div class="shape shape1"></div>
    <div class="shape shape2"></div>
    <div class="shape shape3"></div>

    <h1>Welcome to EventPro</h1>
    <p>Creating unforgettable experiences through world-class events</p>

    <a href="events.php">
        <button>Explore Events</button>
    </a>

</div>

<!-- PORTFOLIO SECTION -->
<div class="section">

<h1>Our Achievements</h1>

<div class="cards">

<div class="card">
<h2>150+</h2>
<p>Events Organized</p>
</div>

<div class="card">
<h2>10,000+</h2>
<p>Participants</p>
</div>

<div class="card">
<h2>25+</h2>
<p>Cities Covered</p>
</div>

</div>

</div>

<!-- FOOTER -->
<!-- CONTACT SECTION -->

<div id="contact" class="footer">

<h2>Contact Us</h2>

<p>
📧 Email: eventpro@gmail.com
</p>

<p>
📞 Phone: +91 9876543210
</p>

<p>
📍 Address: ABC Event Management Pvt. Ltd., Delhi, India
</p>

<br>

<p>
© 2026 Event Management System | Developed for Academic Project
</p>

</div>

</body>
</html>