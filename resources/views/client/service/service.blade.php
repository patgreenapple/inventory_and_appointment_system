@extends('partials.client.main')
<div class="mb-5" style="margin-top: 70px;">
<main class="container my-5">
    <section class="text-center mb-5">
        <h1 class="display-4">Our Services</h1>
        <p class="lead">We offer a range of beauty and wellness services to help you look and feel your best.</p>
    </section>

    <!-- Service Cards -->
    <section class="row g-4" aria-label="Available Services">
        <div class="col-12 col-sm-6 col-md-4">
            <article class="card shadow-sm">
                <img src="image/10.jpg" alt="Decorative nail art" class="card-img-top"> <!-- Placeholder image -->
                <div class="card-body text-center">
                    <h2 class="card-title h5">Nail Art</h2>
                    <p class="card-text">Get creative and stylish nail designs tailored just for you.</p>
                </div>
            </article>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <article class="card shadow-sm">
                <img src="image/11.jpg" alt="Close-up of eyelash extensions" class="card-img-top"> <!-- Placeholder image -->
                <div class="card-body text-center">
                    <h2 class="card-title h5">Eyelash Extensions</h2>
                    <p class="card-text">Enhance your natural beauty with our premium eyelash extension services.</p>
                </div>
            </article>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <article class="card shadow-sm">
                <img src="image/12.jpg" alt="Manicure and pedicure tools" class="card-img-top"> <!-- Placeholder image -->
                <div class="card-body text-center">
                    <h2 class="card-title h5">Manicures & Pedicures</h2>
                    <p class="card-text">Relax and enjoy professional care for your hands and feet.</p>
                </div>
            </article>
        </div>
    </section>
</main>
</div>
<style>
  



/* Main Content */
main {
    padding: 2rem;
    text-align: center;
}

/* Intro Section */
.intro h1 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    color: #5a0a3d; /* Dark pink for heading */
}

.intro p {
    font-size: 1.1rem;
    color: #7a1c52; /* Darker pink for introductory text */
}

/* Service Cards Container */
.services-container {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: center;
    margin-top: 2rem;
}

/* Individual Service Card */
.service-card {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(255, 102, 153, 0.2); /* Pinkish shadow */
    width: 300px;
    text-align: center;
    border: 1px solid #ff99bf; /* Light pink border */
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
</style>