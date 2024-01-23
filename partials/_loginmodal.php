<!-- Modal -->
<div class="modal fade" id="loginModalLabel" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login to your account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/roni/forum/partials/_handelLogin.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginusername" class="form-label">User-Name</label>
                        <input type="text" name = "loginusername"class="form-control" id="loginusername" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="loginpassword" class="form-label">Password</label>
                        <input type="password" name="loginpassword" class="form-control" id="loginpassword">
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