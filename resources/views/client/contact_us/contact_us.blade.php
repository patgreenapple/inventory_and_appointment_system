@extends('partials.client.main')
<div style="margin-top: 120px;">
<main class="container my-5 d-flex justify-content-center">
        <section class="contact-card">
            <div class="text-center">
                <h1 class="mb-3">Contact Us</h1>
                <p>If you have any questions, feel free to reach out to us using the form below.</p>
            </div>
            <form action="{{ route('contact_us.store_without_user') }}" method="post" class="row g-3">
                @csrf  <!-- CSRF protection -->

                @if(session()->has('message'))
                    <div class="alert alert-success mt-3" style="font-size: 11px">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                </div>

                <div class="col-12">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="message" class="form-control" rows="4" placeholder="Write your message here"></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="submit-button w-100">Send Message!</button>
                </div>
            </form>
        </section>
    </main>
</div>

    <style>
        body {
            background-color: #ffe6f2;
        }
       
        h1 {
            color: #b30086;
        }
    </style>
