<?php
require_once ('layouts/header.php');
if(!empty($_POST)){
    $firstname = getPost('firstname');
    $lastname = getPost('lastname');
    $email = getPost('email');
    $phone_number = getPost('phone_number');
    $subject = getPost('subject');
    $note = getPost('note');
    $created_at = $updated_at = date('Y-m-d H:s:i');
    $sql="INSERT INTO `feedback`(`firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES ('$firstname','$lastname','$email','$phone_number','$subject','$note','$created_at','$updated_at','0')";
    execute($sql);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ</label>
                            <input required name="firstname" type="text" class="form-control" id="exampleInputEmail1">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên</label>
                            <input required name="lastname" type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input required name="email" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại</label>
                    <input required name="phone_number" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chủ đề</label>
                    <input required name="subject" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nội dung</label>
                    <textarea name="note" class="form-control" id="" cols="50" rows="3"></textarea>
                </div>
                <button name="submit" type="submit" class="btn btn-success mt-3">Gửi phản hồi</button>
            </form>
        </div>
        <div class="col-md-6 col-sm-12">
            <iframe class="mt-3"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.874535151228!2d106.76137231488612!3d10.89713859223969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d85dcb9fa11b%3A0x25f3beafc350b072!2zMTI3IE5nw7QgVGjDrCBOaOG6rW0sIETEqSBBbiwgQsOsbmggRMawxqFuZywgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1670076028680!5m2!1sen!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>


<?php
require_once ('layouts/footer.php')
?>