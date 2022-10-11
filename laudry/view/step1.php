<div class="col-lg-7 col-md-7 col-sm-7">
  <form method="POST">
    <input type="hidden" name="fee" value="30">
    <div class="option-detail">
      <div class="option">
        <div id="contact" data-contact="<?= $contact ?>" class="d-none"></div>
        <div class="event_click_option option-btn activate" data-fee="30">น้ำเย็น</div>
        <div class="event_click_option option-btn" data-fee="40">น้ำอุ่น</div>
        <div class="event_click_option option-btn" data-fee="50">น้ำร้อน</div>
      </div>
      <div class="option">
        <a href="index.php" style="text-decoration: none;">
          <div class="cancel-btn">ย้อนกลับ</div>
        </a>
        <button type="submit" name="submit_form" class="submit-btn">ยืนยัน</button>
      </div>
    </div>
  </form>
</div>