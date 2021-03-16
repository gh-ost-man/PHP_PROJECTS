<?php  require_once 'layots/header.php'; ?>
    
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <h1 class="text-center">SIGN IN</h1>
        <form action="sign_in.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" name ="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" required id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary">SIGN IN</button>
        </form>
    </div>
    <div class="col-md-4">
        <h1 class="text-center">SIGN UP</h1>
        <form action="sign_up.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" required id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">SIGN UP</button>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<?php require_once 'layots/footer.php'; ?>