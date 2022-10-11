<?php
$id = $_GET['id'];
$fee = isset($_GET['fee']) ? $_GET['fee'] : '30';
$step = isset($_GET['step']) ? $_GET['step'] : '1';
if ($_POST) {
  if (isset($_POST['submit_form'])) {
    $opt = $_POST['fee'];
    header("location:?id=" . $id . "&step=2&fee=" . $opt);
  }
  if (isset($_POST['submit_form2'])) {
    header("location:?id=" . $id . "&step=3&fee=" . $opt);
  }
}




/// เริ่มทำงาน กำหนดเวลาซักก ///
if ($step == 3) {
  $newTime = date("m-d, Y H:i:s", strtotime("+2  minutes"));
  $contact = "test@line";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title> Laundry</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/main.css" />

</head>

<body>
  <nav>Laudry Shop</nav>
  <main>
    <div class="container-fluid">
      <div class="card">
        <div class="selector-zone">
          <div class="selector-head">
            Machine <?= $id ?>
          </div>
          <div class="selector-body">
            <div class="machine-form">
              <div class="form-row">
                <div class=" col-lg-5 col-md-5 col-sm-5">
                  <div class=" machine-detail">
                    <div class="colum-detail">
                      <?php if ($step == 3) { ?>

                        <div id="progress_time" class="text-fee" data-time="<?= $newTime ?>">

                        </div>
                      <?php } else { ?>
                        <div class="text-fee">
                          <span id="fee" value="<?= $fee ?>"> <?= isset($fee) ? $fee : 30; ?></span> บาท
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <?php if ($step == 1) {
                  include('view/step1.php');
                } else if ($step == 2) {

                  include('view/step2.php');
                } else if ($step == 3) {

                  include('view/step3.php');
                }
                ?>

              </div>
            </div>
          </div>
        </div>

      </div>
  </main>
  <footer>
    Copyright 2022
  </footer>
</body>

</html>

<script>
  $(document).ready(function() {

    $(document).on('click', '.event_click_option', function(e) {
      $('.event_click_option').removeClass('activate');
      $(this).addClass('activate');
      var fee = $(this).attr('data-fee');
      $('#fee').html(fee);
      $('input[name="fee" ]').attr('value', fee);


    });

    $(document).on('click', '.event_click_coin', function(e) {
      var payment = $('#fee').attr('value');
      var remain = (payment - 10);
      if (remain >= 0) {

        $('#fee').html(remain);
        $('#fee').attr('value', remain);
      }
      if (remain == 0) {
        $('.submit-btn').removeClass('d-none');
        $('.submit-btn').addClass('ready');
      }
    });





  });
</script>