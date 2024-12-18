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
