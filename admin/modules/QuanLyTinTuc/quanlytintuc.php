<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm tin tức</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <table class="table table-bordered">
        <form method="POST" action="../modules/QuanLyTinTuc/insert.php" enctype="multipart/form-data">
          <tr>
            <td>Nhập tiêu tin tức</td>
            <td><input type="text" name="title"></td>
          </tr>
          <tr>
            <td>Nhập nội dung</td>
            <td><textarea name="content"></textarea></td>
          </tr>
          <tr>
            <td>Nhập link hình ảnh</td>
            <td><input type="file" name="anh" require></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" name="insert" value="Thêm tin tức" class="btn btn-primary">
            </td>
          </tr>
        </form>
      </table>
    </div>
  </div>
</div>