<?php ob_start(); ?>
    <p></p>
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
            </div>
            <?php

                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }

            ?>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form action="index.php?action=login" method="post" autocomplete="off" novalidate>
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                                <span class="form-label-description">
                        <a href="./forgot-password.html">I forgot password</a>
                      </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" id="password" name="password" class="form-control"  placeholder="Your password"  autocomplete="off" required>
                                <span class="input-group-text">
                        <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                        </a>
                      </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1674944402" defer></script>
    <script src="./dist/js/demo.min.js?1674944402" defer></script>

<?php $content = ob_get_clean(); ?>

<?php require('views/layouts/authentification/LoginLayout.php') ?>