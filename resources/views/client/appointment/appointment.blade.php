@extends('partials.client.main')

<div class="mt-5">
    <main>
        <!-- Debugging: Check the schedule -->

        <section class="container d-flex justify-content-center align-items-center py-5">
            <div class="card shadow-lg p-4 w-100" style="max-width: 500px;">
                <h1 class="text-center text-pink mb-3">Book an Appointment</h1>
                <p class="text-center text-muted mb-4">Ready for a makeover? Choose your service and schedule an appointment.</p>

                <!-- Appointment Form -->
                <form action="submit-appointment.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label text-pink">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-pink">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label text-pink">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required>
                    </div>

                    <div class="mb-3">
                        <label for="service" class="form-label text-pink">Select Service</label>
                        <select id="service" name="service" class="form-select" required>
                            <option value="nail-art">Nail Art</option>
                            <option value="eyelash-extensions">Eyelash Extensions</option>
                            <option value="manicure">Manicure</option>
                            <option value="pedicure">Pedicure</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label text-pink">Preferred Date</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="time" class="form-label text-pink">Preferred Time</label>
                        <select name="time" id="time" class="form-control">
                        <!-- Loop through even hours and create options -->
                        @foreach ($even_hours as $hour)
                            <option value="{{ $hour }}">{{ $hour }}</option>
                        @endforeach
                    </select>
                    </div>

                    <button type="submit" class="btn btn-pink w-100 py-2">Book Appointment</button>
                </form>
            </div>
        </section>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('date');
        const today = new Date();
        today.setDate(today.getDate() + 1); // Calculate tomorrow's date
        const tomorrow = today.toISOString().split('T')[0]; // Format as YYYY-MM-DD
        dateInput.min = tomorrow; // Set the min attribute to tomorrow's date
        dateInput.max = "2024-12-31"; // Optional: Set a max date or leave it open
    });
</script>

<style>
    .text-pink {
        color: #ff6699;
    }

    .btn-pink {
        background-color: #ff99bb;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-pink:hover {
        background-color: #ff6699;
    }
</style>
