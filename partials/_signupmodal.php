<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Sign Up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/roni/forum/partials/_handelsignup.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">User-Name</label>
                        <input type="text" class="form-control" id="username" name = "username" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name = "email" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name = "signupPassword">
                    </div>
                    <div class="mb-3">
                        <label for="signupcPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name = "signupcPassword">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Sign In</button>
                </div> -->
            </form>

        </div>
    </div>
</div>