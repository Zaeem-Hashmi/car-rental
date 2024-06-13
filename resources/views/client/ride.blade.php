@extends('client.layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-asset') }}/js/select.dataTables.min.css">
@endsection
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

                        @if (session()->has('cancel'))
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
                                <input type="text" class="form-control @error('pk_unit_numer') is-invalid @enderror" name="pk_unit_numer" placeholder="🏡 Enter your pickup unit numer" value="{{ old('pk_unit_numer') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Pickup Street Number</strong></p>
                                <input type="text" class="form-control @error('pk_street_number') is-invalid @enderror" name="pk_street_number" placeholder="🏡 Enter your pickup street number" value="{{ old('pk_street_number') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Pickup Street Name</strong><br></p>
                            <input type="text" class="form-control @error('pk_street_name') is-invalid @enderror" name="pk_street_name" placeholder="🏡 Enter your pickup street name" value="{{ old('pk_street_name') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Pickup area Name</strong><br></p>
                            <input type="text" class="form-control @error('pk_area') is-invalid @enderror" name="pk_area" placeholder="🏡 Enter your pickup area" value="{{ old('pk_area') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Pickup City Name</strong><br></p>
                            <input type="text" class="form-control @error('pk_city') is-invalid @enderror" name="pk_city" placeholder="🏡 Enter your pickup city" value="{{ old('pk_city') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Unit Number</strong></p>
                                <input type="text" class="form-control @error('dp_unit_numer') is-invalid @enderror" name="dp_unit_numer" placeholder="🏙️ Enter your Drop-off unit numer" value="{{ old('dp_unit_numer') }}">
                            @error('unitNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Street Number</strong></p>
                                <input type="text" class="form-control @error('dp_street_number') is-invalid @enderror" name="dp_street_number" placeholder="🏙️ Enter your Drop-off street number" value="{{ old('dp_street_number') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Street Name</strong><br></p>
                            <input type="text" class="form-control @error('dp_street_name') is-invalid @enderror" name="dp_street_name" placeholder="🏙️ Enter your Drop-off street name" value="{{ old('dp_street_name') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination area Name</strong><br></p>
                            <input type="text" class="form-control @error('dp_area') is-invalid @enderror" name="dp_area" placeholder="🏙️ Enter your Drop-off area" value="{{ old('dp_area') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Dropoff City Name</strong><br></p>
                            <input type="text" class="form-control @error('dp_city') is-invalid @enderror" name="dp_city" placeholder="🏡 Enter your pickup city" value="{{ old('dp_city') }}">
                        </div>
                        <div class="mb-3">
                            <p><strong>Pick-Up Date</strong><br></p>
                            @php
                            $dateTime = new DateTime('now', new DateTimeZone('Asia/Karachi'));
                            @endphp
                            <input class="form-control form-control-lg @error('pk_date') is-invalid @enderror"
                                type="date" id="pickUpdate" name="pk_date" required
                                value={{ $dateTime->format('Y-m-d') }}>
                           
                        </div>
                        <div class="mb-3">
                            @php
                                $dateTime = new DateTime('now', new DateTimeZone('Asia/Karachi'));
                            @endphp

                            <p><strong>Pick-Up Time</strong><br></p>
                                <input class="form-control form-control-lg @error('pk_time') is-invalid @enderror"
                                    type="time" id="pk_time" name="pk_time" required
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
            @auth
            <div class="container shadow bg-light p-5 mt-5 rounded"> 
                <div class="table-responsive">
                    <h3>
                        {{ auth()->user()->username }} Rides
                    </h3>
                    <table class="table table-hover" id="rides">
                        <thead>
                            <tr class="bg-warning text-light">
                                <th>Driver Name</th>
                                <th>Driver Email</th>
                                <th>PickUp Address</th>
                                <th>DropOff Address</th>
                                <th>Ride Cost</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>
                </div>
            </div>
            @endauth
            
        </div>

    </section>
    <!-- End: Contact Form Clean -->
@endsection

@section('scripts')
<script src="{{ asset('admin-asset') }}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('admin-asset') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('admin-asset') }}/js/dataTables.select.min.js"></script>
<script>
     $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#rides').DataTable({
                'processing': true,
                'serverSide': true,
                'searching':false,
                'ajax': {
                    'url': '{{ route('client.booking.ajax') }}',
                    'type': 'POST'
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }, ],
                "columns": [
                    {
                        "data":"driver",
                        "render":function(data,type,row){
                            return data ? data.username : "Not Assigned";
                        }
                    },
                    {
                        "data":"driver",
                        "render":function(data,type,row){
                            return data ? data.email : "Not Assigned";
                        }
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row) {
                            return `Street Number ${row.pickupStreetNumber}, House Number ${row.pickupUnitNumber}, Street name ${row.pickupStreetName}, ${row.pickupAreaName}, ${row.pickupCity}`;
                        }
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row) {
                            return `Street Number ${row.dropoffStreetNumber}, House Number ${row.dropoffUnitNumber}, Street name ${row.pickupStreetName}, ${row.dropoffAreaName}, ${row.dropoffCity}`;
                        }
                    },
                    {
                        "data":"cost",
                    },
                    {
                        "data":"status",
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="{{ route('client.booking.cancel','data') }}" class="text-primary"><i class="fas fa-times"></i></a>`.replaceAll("data",row.id)
                        }
                    },
                ]
            });
        });
</script>
@endsection
