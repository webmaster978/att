<?php

//login.php

include('admin/database_connection.php');

session_start();

if (isset($_SESSION["teacher_id"])) {
  header('location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Presence</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="https://i.imgur.com/uNGdWHi.png" type="image/png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #B0BEC5;
    background-repeat: no-repeat
  }

  .card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
  }

  .card2 {
    margin: 0px 40px
  }

  .logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 35px
  }

  .image {
    width: 360px;
    height: 280px
  }

  .border-line {
    border-right: 1px solid #EEEEEE
  }

  .facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
  }

  .twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
  }

  .linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
  }

  .line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
  }

  .or {
    width: 10%;
    font-weight: bold
  }

  .text-sm {
    font-size: 14px !important
  }

  ::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
  }

  :-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
  }

  ::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
  }

  input,
  textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
  }

  input:focus,
  textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
  }

  button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
  }

  a {
    color: inherit;
    cursor: pointer
  }

  .btn-blue {
    background-color: #1A237E;
    width: 150px;
    color: #fff;
    border-radius: 2px
  }

  .btn-blue:hover {
    background-color: #000;
    cursor: pointer
  }

  .bg-blue {
    color: #fff;
    background-color: #1A237E
  }

  @media screen and (max-width: 991px) {
    .logo {
      margin-left: 0px
    }

    .image {
      width: 300px;
      height: 220px
    }

    .border-line {
      border-right: none
    }

    .card2 {
      border-top: 1px solid #EEEEEE !important;
      margin: 0px 15px
    }
  }
</style>

<body>




  <div class="container">
    <div class="row">
      <div class="col-md-4">

      </div>

      <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
          <div class="row d-flex">
            <div class="col-lg-6">
              <div class="card1 pb-5">
                <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div>
                <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card2 card border-0 px-4 py-5">
                <div class="row mb-4 px-3">
                  <h6 class="mb-0 mr-4 mt-2">Se connecter avec :</h6>
                  <div class="facebook text-center mr-3">
                    <div class="fa fa-facebook"></div>
                  </div>
                  <div class="twitter text-center mr-3">
                    <div class="fa fa-twitter"></div>
                  </div>
                  <div class="linkedin text-center mr-3">
                    <div class="fa fa-linkedin"></div>
                  </div>
                  <div class="linkedin text-center mr-3">
                    <div class="fa fa-google"></div>
                  </div>
                </div>
                <div class="row px-3 mb-4">
                  <div class="line"></div> <small class="or text-center">Or</small>
                  <div class="line"></div>
                </div>

                <form method="post" id="teacher_login_form" autocomplete="off">
                  <div class="form-group">
                    <label>Votre adresse mail</label>
                    <input type="text" name="teacher_emailid" id="teacher_emailid" class="form-control" required />
                    <span id="error_teacher_emailid" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label>Votre mot de passe </label>
                    <input type="password" name="teacher_password" id="teacher_password" class="form-control" required />
                    <span id="error_teacher_password" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="teacher_login" id="teacher_login" class="btn btn-info" value="Se connecter" />
                  </div>
                </form>
                <div>
                  <h4 class="text text-info" style="text-align: center;">Une solution pour la presence</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; <?php $today = new DateTime('today');
                                                                                      echo $today->format('2020 - Y'), PHP_EOL; ?>. All rights reserved by joel jt.</small>
              <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
          </div>
        </div>
      </div>




      <div class="col-md-4">

      </div>
    </div>
  </div>

</body>

</html>

<script>
  $(document).ready(function() {
    $('#teacher_login_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: "check_teacher_login.php",
        method: "POST",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
          $('#teacher_login').val('En cours...');
          $('#teacher_login').attr('disabled', 'disabled');
        },
        success: function(data) {
          if (data.success) {
            location.href = "acceuil";
          }
          if (data.error) {
            $('#teacher_login').val('Login');
            $('#teacher_login').attr('disabled', false);
            if (data.error_teacher_emailid != '') {
              $('#error_teacher_emailid').text(data.error_teacher_emailid);
            } else {
              $('#error_teacher_emailid').text('');
            }
            if (data.error_teacher_password != '') {
              $('#error_teacher_password').text(data.error_teacher_password);
            } else {
              $('#error_teacher_password').text('');
            }
          }
        }
      })
    });
  });
</script>