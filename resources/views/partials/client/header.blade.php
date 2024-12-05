<nav class="navbar navbar-expand-lg navbar-light" >
    <div class="container-fluid">
        <a class="company-name  navbar-brand fw-bold" href="#">CBeauty Lounge</a>
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0"> <!-- Centering links -->
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/services') }}" class="nav-link {{ request()->is('services') ? 'active' : '' }}">Services</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/product') }}" class="nav-link {{ request()->is('product') ? 'active' : '' }}">Products</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/appointment_with_out_user') }}" class="nav-link {{ request()->is('appointments') ? 'active' : '' }}">Appointments</a>
                </li>
            </ul>
            </div>
        <div class="d-flex">
            <a href="{{ route('login') }}" class="btn me-2">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        </div>
        </div>
    </div>
</nav>
<style>
.btn {
    /* background-color: #ffffff; */
    color: #ff6699;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    margin-left: 10px;
    font-weight: bold;
}
.btn:hover {
    background-color: #ff6699;
    color: #fff;
}
</style>