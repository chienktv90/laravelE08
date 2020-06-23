<html>

<head>
    <title>Laravel Jquery Form Validation From Scratch</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<style type="text/css">
    body {
        background-color: #25274d;
    }

    .contact {
        padding: 4%;
        height: 400px;
    }

    .col-md-3 {
        background: #ff9b00;
        padding: 4%;
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }

    .contact-info {
        margin-top: 10%;
    }

    .contact-info img {
        margin-bottom: 15%;
    }

    .contact-info h2 {
        margin-bottom: 10%;
    }

    .col-md-9 {
        background: #fff;
        padding: 3%;
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }

    .contact-form label {
        font-weight: 600;
    }

    .contact-form button {
        background: #25274d;
        color: #fff;
        font-weight: 600;
        width: 25%;
    }

    .contact-form button:focus {
        box-shadow: none;
    }

    .error {
        color: red;
    }
</style>

<body>
    <div class="container contact">
        <br><br><br>
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info">
                    <!-- <img src="contact.png" alt="image" /> -->
                    <h2>Liên Hệ</h2>
                    <h4>Hảy gửi thông tin để chúng tôi phục vụ Bạn!</h4>
                </div>
            </div>
            <div class="col-md-9">
                <form action="" method="post" accept-charset="utf-8" id="contact_form">
                    <div class="contact-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fname">Họ tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="Nhập họ tên" name="name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="comment">Thông điệp:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="message" id="message"></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Thực hiện</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br><br>
    </div>
</body>

<script>
    if ($("#contact_form").length > 0) {
        $("#contact_form").validate({

            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },

                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },

                message: {
                    required: true,
                    minlength: 50,
                    maxlength: 500,
                },
            },
            messages: {

                name: {
                    required: "Please enter name",
                },
                message: {
                    required: "Please enter message",
                },
                email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                },

            },
        })
    }
</script>

</html>