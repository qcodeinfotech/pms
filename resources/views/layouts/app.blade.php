<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Bootstrap Components &rsaquo; Collapse &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layouts.header')
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title')</h1>
                    </div>

                    @stack('content')

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Simple</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Link with href
                                            </a>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                data-target="#collapseExample" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                Button with data-target
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <p>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer
                                                labore wes anderson cred nesciunt sapiente ea proident.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Multiple Targets</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="buttons">
                                            <a class="btn btn-primary" data-toggle="collapse"
                                                href="#multiCollapseExample1" role="button" aria-expanded="false"
                                                aria-controls="multiCollapseExample1">Toggle first element</a>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                data-target="#multiCollapseExample2" aria-expanded="false"
                                                aria-controls="multiCollapseExample2">Toggle second element</button>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                data-target=".multi-collapse" aria-expanded="false"
                                                aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both
                                                elements</button>
                                        </p>
                                        <div class="row">
                                            <div class="col">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <p>
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                        accusamus terry richardson ad squid. Nihil anim keffiyeh
                                                        helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                        ea proident.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="collapse multi-collapse" id="multiCollapseExample2">
                                                    <p>
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                        accusamus terry richardson ad squid. Nihil anim keffiyeh
                                                        helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                        ea proident.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Accordion</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="accordion">
                                            <div class="accordion">
                                                <div class="accordion-header" role="button" data-toggle="collapse"
                                                    data-target="#panel-body-1" aria-expanded="true">
                                                    <h4>Panel 1</h4>
                                                </div>
                                                <div class="accordion-body collapse show" id="panel-body-1"
                                                    data-parent="#accordion">
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                        minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                        commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                        velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                        cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est
                                                        laborum.</p>
                                                </div>
                                            </div>
                                            <div class="accordion">
                                                <div class="accordion-header" role="button" data-toggle="collapse"
                                                    data-target="#panel-body-2">
                                                    <h4>Panel 2</h4>
                                                </div>
                                                <div class="accordion-body collapse" id="panel-body-2"
                                                    data-parent="#accordion">
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                        minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                        commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                        velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                        cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est
                                                        laborum.</p>
                                                </div>
                                            </div>
                                            <div class="accordion">
                                                <div class="accordion-header" role="button" data-toggle="collapse"
                                                    data-target="#panel-body-3">
                                                    <h4>Panel 3</h4>
                                                </div>
                                                <div class="accordion-body collapse" id="panel-body-3"
                                                    data-parent="#accordion">
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                        minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                        commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                        velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                        cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est
                                                        laborum.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @include('layouts.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('theme/backend/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('theme/backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
</body>

</html>
