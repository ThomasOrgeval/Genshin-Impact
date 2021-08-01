<div class="modal fade" id="signIn" tabindex="-1" aria-labelledby="signIn" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark">
            <div class="modal-body p-4">
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="mdb-tab-login" data-mdb-toggle="pill" href="#pills-login"
                           role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="mdb-tab-register" data-mdb-toggle="pill" href="#pills-register"
                           role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="pills-login" role="tabpanel"
                         aria-labelledby="mdb-tab-login">
                        <form method="post" action="{{ route('signin') }}">
                        @csrf
                        <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="loginMail" name="mail" class="form-control" required>
                                <label class="form-label" for="loginMail">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline form-white mb-4">
                                <input type="password" id="loginPassword" name="pass" class="form-control" required>
                                <label class="form-label" for="loginPassword">Password</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                            <!-- Register buttons -->
                            <!--div class="d-flex justify-content-between justify-content-md-around">
                                <a href="#!">Forgot password?</a>
                                <div>
                                    <p>Not a member?
                                        <a data-mdb-toggle="pill" href="#pills-register" role="tab"
                                           aria-controls="pills-register" aria-selected="false">Register</a>
                                    </p>
                                </div>
                            </div-->
                        </form>
                    </div>

                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="mdb-tab-register">
                        <form method="post" action="{{ route('signup') }}">
                        @csrf
                        <!-- Pseudo input -->
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="registerPseudo" name="pseudo" class="form-control" required>
                                <label class="form-label" for="registerPseudo">Pseudo</label>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="registerEmail" name="mail" class="form-control" required>
                                <label class="form-label" for="registerEmail">Email</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-outline form-white mb-4">
                                <input type="password" id="registerPassword" name="pass" autocomplete="new-password"
                                       class="form-control" minlength="8" required>
                                <label class="form-label" for="registerPassword">
                                    Password (8 Characters min)
                                </label>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-1">Sign up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
