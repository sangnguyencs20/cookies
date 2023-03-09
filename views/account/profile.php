<?php
if (isset($_SESSION['account]'])) {
    extract($_SESSION['account']);
}
?>
<div class="d-flex justify-content-center align-items-center">

    <form action="index.php?act=update_account" method="post" class="col-6">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $username ?>">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?= $email ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="<?= $address ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" name="phone" value="<?= $phone ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?= $password ?>">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </div>
            <h1>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>

            </h1>
        </div>
    </form>
</div>