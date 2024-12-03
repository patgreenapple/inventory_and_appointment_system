<template>
    <div class="landing-page">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-white" href="#"><h2><b>CBeauty Lounge</b></h2></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarNav">
  <!-- Right-aligned Navbar Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link text-white" href="#"><b>Home</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#"><b>Services</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#"><b>Products</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#"><b>Contact Us</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#"><b>Login</b></a>
    </li>
  </ul>
</div>


      </nav>
  
      <header class="hero text-center">
        <h1>Welcome to CBeauty Lounge</h1>
        <p>Your one-stop solution for beauty services and products.</p>
        <a href="#" class="btn btn-primary btn-lg">Get Started</a>
      </header>
  
      <section class="features container text-center my-5">
        <h2>Features</h2>
        <div class="row">
          <div class="col-md-4">
            <i class="fa fa-cogs fa-3x"></i>
            <h4>Customizable</h4>
            <p>Fully customizable design for your needs.</p>
          </div>
          <div class="col-md-4">
            <i class="fa fa-mobile fa-3x"></i>
            <h4>Responsive</h4>
            <p>Works seamlessly on all devices.</p>
          </div>
          <div class="col-md-4">
            <i class="fa fa-lock fa-3x"></i>
            <h4>Secure</h4>
            <p>Top-notch security for your data.</p>
          </div>
        </div>
      </section>
      
      <!-- Footer remains fixed at the bottom -->
      <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p>&copy; 2024 CBeauty Lounge. All Rights Reserved.</p>
      </footer>
    </div>
  </template>
  
  <script>
  export default {
    name: "LandingPage",
  };
  </script>
  
  <style scoped>
  .hero {
    background: #f8f9fa;
    padding: 50px 0;
  }
  
  /* Header Styling */
  nav {
    background-color: #ff99bb !important;
    padding: 15px 20px;
  }
  
  /* Mobile-responsive adjustments */
  @media (max-width: 768px) {
    .navbar-nav {
      text-align: center;
    }
  
    .navbar-toggler {
      margin-right: 10px;
    }
  
    .navbar-nav li {
      margin-top: 10px;
    }
  }
  
  /* Features Icons Color */
  .features i {
    color: #007bff;
    margin-bottom: 10px;
  }
  
  /* Navbar Buttons Styling */
  .navbar-nav .btn {
    padding: 10px 20px;
    font-size: 16px;
  }
  
  /* Make Navbar Text White */
  .navbar-light .navbar-nav .nav-link,
  .navbar-light .navbar-brand {
    color: white;
  }
  
  .navbar-light .navbar-nav .nav-link:hover,
  .navbar-light .navbar-brand:hover {
    color: #ff99bb;
  }
  
  /* Ensure the footer stays at the bottom */
  .landing-page {
    display: flex;
    flex-direction: column;
    height: 100vh;
  }
  
  footer {
    margin-top: auto;
  }
  </style>
  