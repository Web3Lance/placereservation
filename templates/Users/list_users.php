<table id="tbl-users-list" class="table table-bordered table-striped">
  <thead>
      
      <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénoms</th>
          <th>Date de naissance</th>
          <th>Email</th>
          <th>N° Tél</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      <?php
        if (count($users) > 0) {
            foreach ($users as $index => $data) {
                ?>
                      <tr>
                          <td><?= $data->id ?></td>
                          <td><?= $data->lastname ?></td>
                          <td><?= $data->firstname ?></td>
                          <td><?= $data->birthdate ?></td>
                          <td><?= $data->email ?></td>
                          <td><?= $data->phone_no ?></td>
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