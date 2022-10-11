<div class="col-lg-7 col-md-7 col-sm-7">
  <form method="POST">
    <!-- ฝังข้อมูลกับ DOM ใช้กับ Jquery -->
    <div id="msg-check" is_sent="not" class="d-none"></div>
    <div id="contact" data-contact="<?= $contact ?>" class="d-none"></div>
    <input type="hidden" name="contact" value="not">
    <div class="option-detail">
      <div class="option">
        <div class="text-primary timer_event">เครื่องกำลังทำงาน</div>
      </div>
      <div class="option">
        <a href="index.php" style="text-decoration: none;">
          <div class="cancel-btn" data-fee="30">ย้อนกลับ</div>
        </a>
        <button type="submit" name="submit_form" class="submit-btn d-none">เริ่มทำงาน</button>
      </div>
    </div>

  </form>
</div>

<script>
  var x = setInterval(function() {
    var estimate_time = $('#progress_time').attr('data-time');
    console.log(estimate_time);
    var countDownDate = new Date(estimate_time).getTime();
    var now = new Date().getTime();
    if (estimate_time != 0) {
      var distance = countDownDate - now;
    } else {
      var distance = now - now;
    }
    console.log(distance);
    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    var timer_text = '';
    timer_text += hours + "h " + minutes + "m " + seconds + "s ";
    $('#progress_time').html(timer_text);

    if (distance < 60000) {

      var check_msg = $('#msg-check').attr('is_sent');
      if (check_msg != "sent") {
        // link line address ไปให้กับ linenotify.php //
        var contact = $('#contact').attr('data-contact');
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "linenotify.php",
          data: {
            contact: contact
          },
          success: function(data) {
            console.log(data['contact']);
          }
        });
        alert('ส่งแจ้งเตือนไปที่ lineเรียบร้อย');
        $('.timer_event').html('ระบบใกล้เสร็จสิ้น');
        $('#msg-check').attr('is_sent', 'sent');
      }
    }
    if (distance < 0) {
      clearInterval(x);
      $('#progress_time').html("FINISH");
      $('.timer_event').html('ระบบทำงานสำเร็จ');
    }
  }, 1000);
</script>