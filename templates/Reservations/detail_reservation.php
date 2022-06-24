<table id="tbl-users-list" class="table table-bordered table-striped">
  <thead>
     
      <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénoms</th>
          <th>Email</th>
          <th>N° Tél</th>
          <th>Réservation ID</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      <?php
        if (count(array($users)) > 0) {
            foreach ($users as $key=>$data) {
                ?>
                    <tr>
                        <td><?= $data->id ?></td>
                        <td><?= $data->lastname ?></td>
                        <td><?= $data->firstname ?></td>
                        <td><?= $data->email ?></td>
                        <td><?= $data->phone ?></td>
                        <td><?= $data->reservation_id ?></td>
                        <td>
                            <form id="frm-delete-user-<?= $data->id ?>" action="<?= $this->Url->build('/delete-user/' . $data->id, ['fullBase' => false]) ?>" method="post"><input type="hidden" value="<?= $data->id ?>" name="id" /></form>
                            <a href="<?= $this->Url->build('/edit-user/' . $data->id, ['fullBase' => true]) ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= $this->Url->build('/delete-user/' . $data->id, ['fullBase' => true]) ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
              <?php
                    }
                }
                ?>
          </tbody>
        </table>