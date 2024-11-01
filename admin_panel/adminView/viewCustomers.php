<div>
  <p class="section-title">All Customers</p>
  <div class="scrollable-table">
    <table class="table customer-table">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Username </th>
          <th class="text-center">Email</th>
          <th class="text-center">Contact Number</th>
          <th class="text-center">Joining Date</th>
          <th class="text-center">More Info</th>
        </tr>
      </thead>
      <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT * from users where isAdmin=0";
      $result = $conn->query($sql);
      $count = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

      ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row["first_name"] ?> <?= $row["last_name"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["contact_no"] ?></td>
            <td><?= $row["registered_at"] ?></td>
            <td><a class="btn btn-primary openPopup" style="color: #FFEAC5;" data-href="./adminView/viewEachCustomer.php?userID=<?= $row['user_id'] ?>" href="javascript:void(0);">View Address</a></td>
          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
    </table>
  </div>

  <div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Customer Address</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="customer-view-modal modal-body">

        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
  <script>
    //for view order modal  
    $(document).ready(function() {
      $('.openPopup').on('click', function() {
        var dataURL = $(this).attr('data-href');

        $('.customer-view-modal').load(dataURL, function() {
          $('#viewModal').modal({
            show: true
          });
        });
      });
    });
  </script>