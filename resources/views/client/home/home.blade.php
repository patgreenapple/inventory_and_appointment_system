@extends('partials.client.main')
<div style="margin-top: 60px;">
<main>
        <section class="hero">
            <h1>Welcome to C beauty Lounge</h1>
            <p>Your gateway to beautiful, seamless experiences!</p>
            <a href="services.html" class="main-btn">Explore Our Services</a>
        </section>

        <!-- Services Section -->
        <section class="services py-5">
        <h2 class="text-center mb-4">About Us</h2>
        <p class="text-center">We offer a range of beauty services to elevate your style and confidence.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h3 class="card-title">Our Mission</h3>
                        <p class="card-text">We aim to enhance each client’s natural beauty by offering exceptional nail services 
                            that combine creativity, quality, and precision.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h3 class="card-title">Our Vision</h3>
                        <p class="card-text">We envision a world where beauty is accessible and empowering, bringing confidence to 
                            everyone who walks through our doors.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h3 class="card-title">Company Goal</h3>
                        <p class="card-text">Our primary goal is to become the go-to destination for clients seeking top-notch nail 
                            care and artistry.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Products Section -->
        <section class="products">
        
            <h2>Gallery</h2>
            <p>Our gallery showcases a curated selection of our finest nail designs, highlighting the artistry and creativity that define our brand.</p>
            <br>
            <br>    
           
                </div>
            </div>
        </section>

        

<section class="services-container" aria-label="Available Services">
    <article class="service-card">
        <img  src="image/1.jpg"  alt="Decorative nail art" class="service-image"> <!-- Placeholder image -->

        
    </article>
    <article class="service-card">
        <img  src="image/2.jpg" alt="Close-up of eyelash extensions" class="service-image"> <!-- Placeholder image -->
       
        
    </article>
    <article class="service-card">
        <img  src="image/3.jpg" alt="Manicure and pedicure tools" class="service-image"> <!-- Placeholder image -->
        
        
    </article>
</section>

<section class="services-container" aria-label="Available Services">
    <article class="service-card">
        <img  src="image/4.jpg" alt="Decorative nail art" class="service-image"> <!-- Placeholder image -->
        
        
    </article>
    <article class="service-card">
        <img  src="image/5.jpg" alt="Close-up of eyelash extensions" class="service-image"> <!-- Placeholder image -->
        
        
    </article>
    <article class="service-card">
        <img  src="image/6.jpg" alt="Manicure and pedicure tools" class="service-image"> <!-- Placeholder image -->
        
        
    </article>
</section>

<!-- Contact Us Section -->
<section class="contact">
    <h2>Contact Us</h2>
    <p>We'd love to hear from you! Reach out for appointments or inquiries.</p> 
    <br>
<br>
    <div class="contact-btn-container">
        <a href="{{ url('/contact_us') }}" class="contact-btn">Get in Touch</a>
    </div>
</section>

    </main>
</div>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.services-container {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: center;
    margin-top: -6rem;
}

/* Individual Service Card */
.service-card {
    background-color: #fff;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(255, 102, 153, 0.2); /* Pinkish shadow */
    width: 250px;
    text-align: center;
    border: 1.5px solid #ff99bf; /* Light pink border */
}

.service-card h2 {
    color: #7a1c52; /* Dark pink for card title */
    font-size: 1.5rem;
    margin-top: 0.5rem;
}

.service-card p {
    color: #994466; /* Medium pink for card description */
    margin-top: 0.5rem;
    font-size: 1rem;
    line-height: 1.4;
}

/* Service Card Image Styling */
.service-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 1rem;
}

body {
    font-family: Arial, sans-serif;
    background-color: #fff0f5;
    color: #333;
}

/* Navigation Bar */
header {
    background-color: #ff99bb;
    padding: 15px 20px;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 1.8em;
    font-weight: bold;
    color: #fff;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-links li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

.auth-buttons .btn {
    background-color: #ffffff;
    color: #ff6699;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    margin-left: 10px;
    font-weight: bold;
}

.auth-buttons .btn:hover {
    background-color: #ff6699;
    color: #fff;
}

/* Hero Section */
.hero {
    text-align: center;
    padding: 80px 20px;
    background: linear-gradient(135deg, #ffe6f0, #ffccdd);
}

.hero h1 {
    color: #ff6699;
    font-size: 2.5em;
    margin-bottom: 15px;
}

.hero p {
    font-size: 1.2em;
    margin-bottom: 30px;
}

.main-btn {
    background-color: #ff99bb;
    color: #fff;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.main-btn:hover {
    background-color: #ff6699;
}



/* Section Styling */
section {
    padding: 60px 20px;
    text-align: center;
}

.services, .products, .contact {
    background-color: #fff5f9;
    border-radius: 8px;
    margin: 20px auto;
    max-width: 1000px;
}

.services h2, .products h2, .contact h2 {
    color: #ff6699;
    font-size: 2em;
    margin-bottom: 15px;
}

/* Service & Product Items */
.service-items, .product-items {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.service-item, .product-item {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 300px;
}

.service-item h3, .product-item h3 {
    color: #ff6699;
    font-size: 1.5em;
    margin-bottom: 10px;
}

/* Contact Button */
.contact-btn {
    background-color: #ff99bb;
    color: #fff;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.contact-btn:hover {
    background-color: #ff6699;
}

/* Responsive Design */
@media (max-width: 768px) {
    .service-items, .product-items {
        flex-direction: column;
    }

    .nav-links {
        flex-direction: column;
        gap: 10px;
    }

    .hero h1 {
        font-size: 2em;
    }
    
    
}
</style>