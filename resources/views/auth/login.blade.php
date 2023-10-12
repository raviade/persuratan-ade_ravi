<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{ asset('email.png') }}">

    <style>
        .navbar .nav-item .nav-link:hover {
            color: #227dff;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-white">
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden vh-100 d-flex">
        <style>
            .background-radial-gradient {
                background-color: hsl(273, 100%, 29%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(194, 48%, 45%) 15%,
                        hsl(184, 51%, 51%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(194, 78%, 33%) 15%,
                        hsl(184, 91%, 27%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);
            }

            #radius-shape-1 {
                height: 220px;
                width: 220px;
                top: -60px;
                left: -100px;
                background: radial-gradient(#FFFFFF, #10f0f8);
                overflow: hidden; 
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -80px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#FFFFFF, #10f0f8);
                overflow: hidden;
            }

            #radius-shape-3 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -330px;
                right: 880px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#FFFFFF, #10f0f8);
                overflow: hidden;
            }


            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }

            
        </style>

        <div class="container d-flex text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-1 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Selamat datang di <br />
                        {{-- <span style="color: hsl(218, 81%, 75%)">Bersurat!</span> --}}  
                    </h1>
                    <img src="{{asset('Bersurat_Logo.png')}}" alt="bersurat logo" width="450" >
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Bersurat memudahkan Anda untuk menciptakan surat yang indah dan berarti. Bergabunglah dengan
                        komunitas Bersurat hari ini, buat kenangan yang tak terlupakan, dan biarkan kata-kata Anda
                        terbang mengudara.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div id="radius-shape-3" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass ">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form id="target">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" id="username" class="form-control" name="username" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" />
                                </div>

                                <div class="text-danger errors">
                                    <p class="err-message">@include('layouts.flash-message')</p>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Log In
                                </button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- Section: Design Block -->
<script type="module">
    $('form').submit(function(e) {
        e.preventDefault();
        let username = $('#username').val();
        let password = $('#password').val();

        axios.post('/login', {
                username,
                password
            })
            .then(() => window.location.href = '/dashboard')
            .catch((err) => console.log(err))

        // await axios({
        //     method: 'post',
        //     url: 'http://localhost:8000/login',
        //     data: {
        //         username,
        //         password
        //     }
        // }).then(async (res) => {
        //     console.log(res);
        //     await swal.fire({
        //         title: 'Login berhasil!',
        //         text: 'Redirecting to dashboard...',
        //         icon: 'success',
        //         timer: 1000,
        //         showConfirmButton: false
        //     })
        //     window.location = '/dashboard'
        //     console.log('success')
        // }).catch(({
        //     response
        // }) => {
        //     if (!$('.err-message').text()) {
        //         $('.err-message').append(document.createTextNode(response.data.errors.message))
        //     }
        // })

    })
</script>
