<?php
require_once 'layouts/header.php';
$id = getGet('id');
$sql = "Select * from user where id = '$id'";
$user = executeResult($sql, true);
?>
<style>
    .container {
        margin-top: 50px;
        background-color: #f7f7f7;
        padding: 50px;
        border-radius: 10px;
    }

    h1 {
        font-size: 48px;
        text-align: center;
        margin-bottom: 30px;
    }

    hr {
        border-color: #e3e3e3;
    }

    .profile-pic {
        max-width: 100%;
        border-radius: 50%;
    }

    .change-pic-btn {
        margin-top: 20px;
    }

    .form-control {
        border-radius: 20px;
    }

    .save-btn {
        margin-top: 20px;
        border-radius: 20px;
    }
</style>
</head>

<body>
    <div class="container">
        <h1>Thông tin cá nhân</h1>
        <div id="alert"></div>
        <form id="update-form" method="post">
            <?php
            if (isset($user)) {
                echo '<input type="hidden" name="id" value="' . $user['id'] . '">';
            }
            ?>

            <div class="form-group">
                <label for="name">Tên:</label>
                <?php
                if (isset($user)) {
                    echo '<input type="text" class="form-control" id="name" name="name" value="' . $user['fullname'] . '">';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <?php
                echo '<input type="email" class="form-control" id="email" name="email" value="' . $user['email'] . '">';
                ?>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <?php
                echo '<input type="text" class="form-control" id="address" name="address" value="' . $user['address'] . '">';
                ?>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone:</label>
                <?php
                echo '<input type="text" class="form-control" id="phone_number" name="phone_number" value="' . $user['phone_number'] . '">';
                ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block save-btn">Lưu thay đổi</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#update-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'update_profile.php',
                    type: 'post',
                    data: $('#update-form').serialize(),
                    success: function(data) {
                        // Show success message
                        $('#alert').html('<div class="alert alert-success">' + data + '</div>');
                    },
                    error: function(data) {
                        // Show error message
                        $('#alert').html('<div class="alert alert-danger">' + data.responseText + '</div>');
                    }
                });
            });
        });
    </script>

</body>