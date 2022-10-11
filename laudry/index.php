<?php
/// mock data แสดงสถานะของเครื่อง //
$mock_data = [];
$mock_data = [
  [
    'status' => 'ว่าง',
    'is_status' => 'is_aval',
    'estimate_time' => '0'
  ],
  [
    'status' => 'อยู่ระหว่างดำเนินการ',
    'is_status' => 'inprogress',
    'estimate_time' => 'Jan 5, 2023 15:37:25'
  ],
  [
    'status' => 'ปรับปรุง',
    'is_status' => 'maintenance',
    'estimate_time' => '0'
  ],
  [
    'status' => 'ว่าง',
    'is_status' => 'is_aval',
    'estimate_time' => '0'
  ],
];

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
            Machine Menu
          </div>
          <div class="selector-body">
            <div class="form-row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div id="machine_event_1" class=" machine " data-id="1" data-status="<?= $mock_data[0]['is_status'] ?>" data-timer="<?= $mock_data[0]['estimate_time'] ?>">
                  <div class="colum-detail">
                    <div>เครื่องหมายเลข 1</div>
                    <div>สถานะ : <span class="text-success"> <?= $mock_data[0]['status'] ?></span> </div>
                    <div>เวลาดำเนินการ : <span id="machine_1"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6  col-md-6  col-sm-6">
                <div id="machine_event_2" class="machine" data-id="2" data-status="<?= $mock_data[1]['is_status'] ?>" data-timer="<?= $mock_data[1]['estimate_time'] ?>">
                  <div class="colum-detail">
                    <div>เครื่องหมายเลข 2</div>
                    <div>สถานะ : <span class="text-primary"> <?= $mock_data[1]['status'] ?></span> </div>
                    <div>เวลาดำเนินการ : <span id="machine_2"></span></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6  col-md-6  col-sm-6">
                <div id="machine_event_3" class="machine " data-id="3" data-status="<?= $mock_data[2]['is_status'] ?>" data-timer="<?= $mock_data[2]['estimate_time'] ?>">
                  <div class="colum-detail">
                    <div>เครื่องหมายเลข 3</div>
                    <div>สถานะ : <span class="text-danger"> <?= $mock_data[2]['status'] ?></span> </div>
                    <div>เวลาดำเนินการ : <span id="machine_3"></span></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6  col-md-6  col-sm-6">
                <div id="machine_event_4" class="machine " data-id="4" data-status="<?= $mock_data[3]['is_status'] ?>" data-timer="<?= $mock_data[3]['estimate_time'] ?>">
                  <div class="colum-detail">
                    <div>เครื่องหมายเลข 4</div>
                    <div>สถานะ : <span class="text-success"><?= $mock_data[3]['status'] ?></span> </div>
                    <div>เวลาดำเนินการ : <span id="machine_4"></span></div>
                  </div>
                </div>
              </div>
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
    // อนุญาติให้เครื่องที่ว่าง สามารถกดเข้าใช้งานได้ //
    $(document).on('click', '.machine', function(e) {
      var check = $(this).attr('data-status');
      var machine_id = $(this).attr('data-id');
      console.log(check);
      if (check == 'is_aval') {
        // alert('พร้อมใช้งาน');
        window.location.href = 'machine.php?id=' + machine_id;
      } else if (check == 'inprogress') {
        alert('อยู่ระหว่างการทำงาน');
      } else if (check == 'maintenance') {
        alert('ไม่พร้อมใช้งาน');
      }
    });

    //  inteval นับเวลาการทำงาน //
    var x = setInterval(function() {
      for (i = 1; i <= 4; i++) {
        var estimate_time = $('#machine_event_' + i).attr('data-timer');
        var countDownDate = new Date(estimate_time).getTime();
        var now = new Date().getTime();
        if (estimate_time != 0) {

          var distance = countDownDate - now;
        } else {

          var distance = now - now;
        }
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        var timer_text = '';
        timer_text += hours + "h " + minutes + "m " + seconds + "s ";
        $('#machine_' + i).html(timer_text);

        if (distance < 0) {
          clearInterval(x);
          $('#machine_' + i).html("EXPIRED");
        }
      }
    }, 1000);
  });
</script>