<div class="container" style="width:400px;">

    <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <label for="inputfirstname" class="sr-only">First name</label>
        <input type="text" name="firstname" id="inputfirstname" class="form-control" placeholder="Enter your first name" >

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign in" />
    </form>

</div> <!-- /container -->