@extends('client.layouts.index')

@section('container')
    <!-- Start: Contact Form Clean -->
    <section class="contact-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="{{ route('client.booking.store') }}" method="POST" style="margin-top: 70px;max-width: 1000px;">
                        @csrf

                        <h2 class="text-center">Book A Ride</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thank you for your booking!',
                                    html: '{!! session('success') !!}',
                                    footer: '<a href="">Book Again</a>'
                                })
                            </script>
                        @endif

                        @if (session()->has('sbname'))
                            <script>
                                Swal.fire({
                                    icon: 'question',
                                    title: 'Going Somewhere?',
                                    text: 'We Just Need A Little Bit More Info For Our Taxi Riders',
                                    showDenyButton: true,
                                    confirmButtonText: 'OK',
                                    denyButtonText: 'Cancel',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        Swal.fire('Lets Fill Out Some Info For Our Taxi Riders', '', 'info')
                                    } else if (result.isDenied) {
                                        location.href = "/cancel-booking";
                                    }
                                })
                            </script>
                        @endif

                        @if (session()->has('cancelSuccess'))
                            <script>
                                Swal.fire(
                                    'Canceled Success!',
                                    '{{ session('cancelSuccess') }}',
                                    'success'
                                )
                            </script>
                        @endif

                        <div class="mb-3">
                            <p><strong>Pickup Unit Number</strong></p>
                                <input type="text" class="form-control @error('pk-unit-numer') is-invalid @enderror" name="pk-unit-numer" placeholder="🏡 Enter your pickup unit numer" value="{{ old('pk-unit-numer') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Pickup Street Number</strong></p>
                                <input type="text" class="form-control @error('pk-street-number') is-invalid @enderror" name="pk-street-number" placeholder="🏡 Enter your pickup street number" value="{{ old('pk-street-number') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Pickup Street Name</strong><br></p>
                            <input type="text" class="form-control @error('pk-street-name') is-invalid @enderror" name="pk-street-name" placeholder="🏡 Enter your pickup street name" value="{{ old('pk-street-name') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Pickup area Name</strong><br></p>
                            <input type="text" class="form-control @error('pk-area') is-invalid @enderror" name="pk-area" placeholder="🏡 Enter your pickup area" value="{{ old('pk-area') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Unit Number</strong></p>
                                <input type="text" class="form-control @error('dp-unit-numer') is-invalid @enderror" name="dp-unit-numer" placeholder="🏙️ Enter your Drop-off unit numer" value="{{ old('dp-unit-numer') }}">
                            @error('unitNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Street Number</strong></p>
                                <input type="text" class="form-control @error('dp-street-number') is-invalid @enderror" name="dp-street-number" placeholder="🏙️ Enter your Drop-off street number" value="{{ old('dp-street-number') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Street Name</strong><br></p>
                            <input type="text" class="form-control @error('dp-street-name') is-invalid @enderror" name="dp-street-name" placeholder="🏙️ Enter your Drop-off street name" value="{{ old('dp-street-name') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination area Name</strong><br></p>
                            <input type="text" class="form-control @error('dp-area') is-invalid @enderror" name="dp-area" placeholder="🏙️ Enter your Drop-off area" value="{{ old('dp-area') }}">
                        </div>

                        <div class="mb-3">
                            <p><strong>Pick-Up Date</strong><br></p>
                            @php
                            $dateTime = new DateTime('now', new DateTimeZone('Asia/Karachi'));
                            @endphp
                            <input class="form-control form-control-lg @error('pickUpTime') is-invalid @enderror"
                                type="date" id="pickUpTime" name="pickUpTime" required
                                value={{ $dateTime->format('Y-m-d') }}>
                           
                        </div>
                        <div class="mb-3">
                            @php
                                $dateTime = new DateTime('now', new DateTimeZone('Asia/Karachi'));
                            @endphp

                            <p><strong>Pick-Up Time</strong><br></p>
                                <input class="form-control form-control-lg @error('pickUpTime') is-invalid @enderror"
                                    type="time" id="pickUpTime" name="pickUpTime" required
                                    value={{ $dateTime->format('H:i A') }}>
                        </div>
                        <div class="d-flex d-xxl-flex justify-content-xxl-center mb-3">
                            <input class="btn btn-secondary flex-fill" type="submit" name="book-button"
                                style="background: rgb(254,209,54);" value="Book">

                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <section id="map-head" class="map-clean" id="ride-map" style="margin-top: 70px;">
                        <div class="container">
                            <div class="intro">
                                <h3 class="text-center">Location </h3>
                                <p class="text-center">A Map For Your Convenience </p>
                            </div>
                        </div><iframe allowfullscreen frameborder="0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB3YYb5sin7I3vXQiaX02RIp9zQn91ClLY&amp;q=Pakistan&amp;zoom=15"
                            width="100%" height="450"></iframe>
                    </section>
                </div>
            </div>
        </div>

    </section>
    <!-- End: Contact Form Clean -->
@endsection
