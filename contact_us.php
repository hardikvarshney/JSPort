<?php 
define('TITLE', 'Contact Us');
define('PAGE', 'contact_us');
require("includes/pnavbar.php");
?>
<div class="container-fluid">
    <div class="row ms-2 py-3 text-white" style="margin-top:100px;background-image:url('images/contact.jpg');background-size:1310px 720px;background-repeat:no-repeat">
    <h2 class="text-center">Contact Us</h2>
        <div class="col-lg-6 col-md-12 py-3" >            
            <div class="col-lg-12 mt-3">
                <form action="" method="post">
                    <input type="text" class="form-control" placeholder="Name" name="name"><br>
                    <input type="text" class="form-control" placeholder="Subject" name="subject"><br>
                    <input type="email" class="form-control" placeholder="username@example.com" name="email"><br>
                    <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px"></textarea><br>
                    <input type="submit" class="btn btn-primary" value="Send" name="submit"><br><br>
                </form>
            </div>
            <!-- <form action="" method="post" class="mt-3">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name:</label>
                    <input type="name" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg ">Submit<i class="fas fa-paper-plane ms-2"></i></button>
            </form> -->
        </div>
        <div class="col-lg-6 col-md-12 mt-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3525.5069228251223!2d78.0724592145878!3d27.91710082285056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3974a4fd1a14b3a1%3A0x698d1d73d04e9c05!2sSir%20Ziauddin%20Hall%20AMU!5e0!3m2!1sen!2sin!4v1611815794869!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            
        </div>
    </div>
</div>
<?php require("includes/pfooter.php"); ?>
