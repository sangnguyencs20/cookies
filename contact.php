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
    <link rel="stylesheet" href = "asset/css/contact.css">
<div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-6">
          <div class="form h-100">
            <h3>Form phản hồi</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">
              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="exampleInputPassword1" class="col-form-label">Họ *</label>
                  <input type="text" class="form-control" required name="firstname" id="exampleInputPassword1">
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="exampleInputPassword1" class="col-form-label">Tên *</label>
                  <input type="text" class="form-control" name="lastname" id="exampleInputPassword1">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Số điện thoại *</label>
                  <input required type="text" class="form-control" name="phone_number" id="exampleInputPassword1" >
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Email *</label>
                  <input required type="text" class="form-control" name="email" id="exampleInputPassword1" >
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group mb-5">
            
                    <label for="exampleInputPassword1">Chủ đề *</label>
                    <input required name="subject" type="text" class="form-control" id="exampleInputPassword1">
                </div>
            </div>
              <div class="row">
                <div class="col-md-12 form-group mb-5">
                  <label for="exampleInputPassword1" class="col-form-label">Nội dung *</label>
                  <textarea class="form-control" name="note" id="" cols="30" rows="4"  placeholder="Nhập nội dung"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <button name="submit" type="submit" class="btn btn-primary rounded-0 py-2 px-4">Gửi phản hồi</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
        <div class="contact-info h-100">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.874535151228!2d106.76137231488612!3d10.89713859223969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d85dcb9fa11b%3A0x25f3beafc350b072!2zMTI3IE5nw7QgVGjDrCBOaOG6rW0sIETEqSBBbiwgQsOsbmggRMawxqFuZywgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1670076028680!5m2!1sen!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>
      </div>
    </div>

  </div>
<?php
require_once ('layouts/footer.php')
?>