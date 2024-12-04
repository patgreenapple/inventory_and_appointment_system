@extends('partials.client.main')
<div class="mb-auto" style="margin-top: 100px;">
<main class="container my-5">
        <div class="row g-4">
            <!-- Gel Polish Product Card -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100">
                    <img src="image/7.jpg" class="card-img-top" alt="Gel Polish">
                    <div class="card-body">
                        <h5 class="card-title">Gel Polish</h5>
                        <p class="card-text">
                            A nail coating that is cured under UV or LED light, providing a glossy, chip-resistant finish that lasts up to two to three weeks.
                        </p>
                        `<p class="text-primary fw-bold">₱150.00</p>`
                         <div class="d-flex justify-content-center">
                                <button class="buy-button">Buy Now</button>
                         </div>
                         
                    </div>
                </div>
            </div>

            <!-- Lip Gloss Product Card -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100">
                    <img src="image/8.jpg" class="card-img-top" alt="Lip Gloss">
                    <div class="card-body">
                        <h5 class="card-title">Lip Gloss</h5>
                        <p class="card-text">
                            Lip gloss adds shine and moisture to your lips, providing a smooth, glossy finish. Available in various shades and finishes.
                        </p>
                        `<p class="text-primary fw-bold">₱350.00</p>`
                         <div class="d-flex justify-content-center">
                                <button class="buy-button">Buy Now</button>
                         </div>
                         
                    </div>
                </div>
            </div>

            <!-- Face Mask Product Card -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100">
                    <img src="image/9.jpg" class="card-img-top" alt="Face Mask">
                    <div class="card-body">
                        <h5 class="card-title">Face Mask</h5>
                        <p class="card-text">
                            A face mask nourishes, hydrates, or detoxifies skin, addressing concerns like dryness, acne, or dullness for a refreshed look.
                        </p>
                        `<p class="text-primary fw-bold">₱75.00</p>`
                        
                         <div class="d-flex justify-content-center">
                                <button class="buy-button">Buy Now</button>
                         </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<style>


/* Product Main Content */
.product-main {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
    padding: 2rem;
}

.product-card {
    background-color: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(255, 102, 153, 0.2); /* Pinkish shadow */
    max-width: 400px;
    text-align: center;
    border: 1px solid #ff99bf; /* Light pink border */
    margin: 1rem; /* Adds space between each card */
}

.product-card img {
    margin-bottom: 1.5rem; /* Adds space below the image */
}

.product-card h2 {
    margin-bottom: 1rem; /* Adds space below the heading */
}

.product-card p {
    margin-bottom: 2rem; /* Adds space below the description */
}


/* Product Image Styling */
.product-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 1rem;
}

/* Product Title */
.product-title {
    color: #7a1c52; /* Dark pink for product title */
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

/* Product Description */
.product-description {
    color: #994466; /* Medium pink for description text */
    font-size: 1rem;
    margin: 1rem 0;
    line-height: 1.5;
}

/* Product Price */
.product-price {
    color: #ff4d88; /* Bright pink for price */
    font-size: 1.5rem;
    font-weight: bold;
    margin: 1rem 0;
}

/* Buy Button Styling */
.buy-button {
    background-color: #ff80b3; /* Bright pink button */
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.buy-button:hover {
    background-color: #e6739f; /* Slightly darker pink on hover */
}
</style>