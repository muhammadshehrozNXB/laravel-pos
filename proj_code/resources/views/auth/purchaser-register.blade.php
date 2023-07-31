@include('admin.partials.source-head')
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100">
            <div class="h-100 no-gutters row">
                <div
                    class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">
                    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                        <div class="app-logo"></div>
                        <h4>
                            <div>Welcome,</div>
                            <span>It only takes a <span
                                    class="text-success">few seconds</span> to create your purchaser account</span>
                        </h4>
                        <div>
                            <form id="purchaser-register-form" method="POST" action="#">
                                @csrf
                                <input type="hidden" id="purchaser-register-route"
                                       value="{{ route('submit-purchaser-register') }}">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        @if ($errors->count())
                                            <div class="alert alert-danger mt-4">
                                                <span class="append-error-text">{{ $errors->all()[0] }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger fancytree-helper-hidden error-validation">
                                            <span class="append-error-text"></span>
                                        </div>
                                        <div class="alert alert-success fancytree-helper-hidden res-success">
                                            <span class="append-success-text"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class><span class="text-danger">*</span>
                                                Email</label>
                                            <input name="email" id="exampleEmail" placeholder="Email here..."
                                                   type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="firstName" class>First Name</label>
                                            <input name="first_name" id="firstName" placeholder="First Name here..."
                                                   type="text"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="lastName" class>Last Name</label>
                                            <input name="last_name" id="lastName" placeholder="Last Name here..."
                                                   type="text"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword" class><span class="text-danger">*</span>
                                                Password</label>
                                            <input name="password" id="examplePassword" placeholder="Password here..."
                                                   type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePasswordRep" class><span class="text-danger">*</span>
                                                Confirm Password</label>
                                            <input name="password_confirmation" id="examplePasswordRep"
                                                   placeholder="Confirm Password here..." type="password"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 position-relative form-check">
                                    <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                    <label for="exampleCheck" class="form-check-label">Accept our <a
                                            href="javascript:void(0);">Terms and Conditions</a>.</label>
                                </div>
                                <div class="mt-4 d-flex align-items-center">
                                    <h5 class="mb-0">Already have an account? <a href="{{ url('/login') }}"
                                                                                 class="text-primary">Sign in</a></h5>
                                    <div class="ml-auto">
                                        <button type="submit" data-form-name="purchaser-register-form"
                                                data-route="purchaser-register-route" data-redirect="{{url("/login")}}"
                                                class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg submit-form-data">
                                            Create Account
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-lg-flex d-xs-none col-lg-5">
                    <div class="slider-light">
                        <div class="slick-slider slick-initialized">
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url('http://localhost:8000/assets/images/originals/citynights.jpg');"></div>
                                    <div class="slider-content">
                                        <h3>Scalable, Modular, Consistent</h3>
                                        <p>Easily exclude the components you don't require. Lightweight, consistent
                                            Bootstrap based styles across all elements and components
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('admin.partials.source-footer')
