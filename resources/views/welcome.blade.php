<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>School Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{

font-family:Segoe UI,sans-serif;

background:#f8fafc;

overflow-x:hidden;

}

/* NAVBAR */

.navbar{

padding:18px 0;

background:rgba(15,23,42,.95);

backdrop-filter:blur(20px);

}

.logo{

font-size:30px;

font-weight:800;

color:#fff;

text-decoration:none;

}

.logo span{

color:#3b82f6;

}

/* HERO */

.hero{

min-height:100vh;

display:flex;

align-items:center;

background:

linear-gradient(rgba(15,23,42,.88),rgba(15,23,42,.88)),

url('https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1600&q=80');

background-size:cover;

background-position:center;

color:#fff;

}

.hero h1{

font-size:65px;

font-weight:800;

line-height:1.2;

}

.hero p{

font-size:20px;

color:#cbd5e1;

margin:25px 0;

max-width:650px;

}

.btn-main{

padding:15px 38px;

border-radius:50px;

font-weight:700;

margin-right:15px;

}

.btn-login{

background:#2563eb;

color:#fff;

}

.btn-login:hover{

background:#1d4ed8;

color:#fff;

}

.btn-register{

background:#fff;

color:#111827;

}

.btn-register:hover{

background:#e5e7eb;

}

/* FEATURES */

.features{

padding:100px 0;

}

.section-title{

font-size:42px;

font-weight:800;

margin-bottom:15px;

}

.section-text{

color:#64748b;

margin-bottom:50px;

}

.feature-card{

background:#fff;

padding:40px 30px;

border-radius:20px;

text-align:center;

transition:.35s;

box-shadow:0 15px 40px rgba(0,0,0,.07);

height:100%;

}

.feature-card:hover{

transform:translateY(-10px);

}

.feature-icon{

width:75px;

height:75px;

margin:auto;

border-radius:20px;

background:linear-gradient(135deg,#2563eb,#60a5fa);

display:flex;

align-items:center;

justify-content:center;

font-size:32px;

color:#fff;

margin-bottom:25px;

}

/* CTA */

.cta{

padding:100px 0;

background:#0f172a;

color:#fff;

text-align:center;

}

.cta h2{

font-size:45px;

font-weight:800;

margin-bottom:20px;

}

/* FOOTER */

footer{

background:#020617;

color:#94a3b8;

padding:25px;

text-align:center;

}

@media(max-width:768px){

.hero{

text-align:center;

padding:80px 0;

}

.hero h1{

font-size:42px;

}

.hero p{

font-size:18px;

}

.btn-main{

display:block;

width:100%;

margin-bottom:15px;

}

}

</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="logo" href="#">

School<span>MS</span>

</a>

<div>

<a href="{{ url('/login') }}" class="btn btn-login btn-main">

<i class="bi bi-box-arrow-in-right"></i>

Login

</a>
>
<a href="{{ url('/register') }}" class="btn btn-register btn-main">

<i class="bi bi-person-plus-fill"></i>

Register

</a>

</div>

</div>

</nav>

<!-- Hero -->

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-7">

<h1>

Modern School Management System

</h1>

<p>

Manage Students, Teachers, Attendance, Exams, Results, Fees and Online Payments in one powerful platform.

</p>

<a href="{{ url('/login') }}" class="btn btn-login btn-main">

Get Started

</a>

<a href="{{ url('/register') }}" class="btn btn-register btn-main">

Create Account

</a>

</div>

<div class="col-lg-5 text-center">

<i class="bi bi-mortarboard-fill" style="font-size:220px;color:#3b82f6;"></i>

</div>

</div>

</div>

</section>

<!-- Features -->

<section class="features">

<div class="container">

<div class="text-center">

<h2 class="section-title">

Everything Your School Needs

</h2>

<p class="section-text">

Professional modules designed for modern education.

</p>

</div>

<div class="row g-4">

<div class="col-lg-3">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-people-fill"></i>

</div>

<h5>Student Management</h5>

<p>

Manage admissions, profiles and academic records.

</p>

</div>

</div>

<div class="col-lg-3">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-calendar-check"></i>

</div>

<h5>Attendance</h5>

<p>

Track daily attendance with ease.

</p>

</div>

</div>

<div class="col-lg-3">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-journal-check"></i>

</div>

<h5>Online Exams</h5>

<p>

Conduct secure online examinations.

</p>

</div>

</div>

<div class="col-lg-3">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-credit-card"></i>

</div>

<h5>Online Fees</h5>

<p>

Stripe payment integration for fee collection.

</p>

</div>

</div>

</div>

</div>

</section>

<!-- CTA -->

<section class="cta">

<div class="container">

<h2>

Ready to Digitize Your School?

</h2>

<p class="mb-4">

Start managing your institution smarter today.

</p>

<a href="{{ url('/register') }}" class="btn btn-primary btn-lg px-5">

Register Now

</a>

</div>

</section>

<footer>

© {{ date('Y') }} School Management System • Designed with Laravel

</footer>

</body>
</html>