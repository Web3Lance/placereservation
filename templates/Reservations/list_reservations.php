<table id="tbl-users-list" class="table table-bordered table-striped">
  <thead>
      
      <tr>
          <th>ID</th>
          <th>Date</th>
      </tr>
  </thead>
  <tbody>
      <?php
        if (count($reservations) > 0) {
            foreach ($reservations as $index => $data) {
                ?>
                      <tr>
                          <td><?= $data->id ?></td>
                          <td><?= $data->created_at ?></td>
                          <td>
                              
                              <a href="<?= $this->Url->build('/detail-reservation/' . $data->id, ['fullBase' => true]) ?>" class="btn btn-info">Detail</a> 
                          </td>
                      </tr>
              <?php
                    }
                }
                ?>
          </tbody>
        </table>