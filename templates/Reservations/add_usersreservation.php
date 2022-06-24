<table id="tbl-users-list" class="table table-bordered table-striped">
  <thead>
      <tr>
            <td colspan="5" align="right"><a href="<?= $this->Url->build('/add-user/', ['fullBase' => true]) ?>">Add User</a></td>
       </tr>
  </thead>
    <tbody>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter des utilisateurs pour cette réservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?= $this->Form->create($user, [
                        "id" => "frm-add-branch"
                        ]) ?>
                        <div class="row custom-padding">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" name="lastname">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Prénoms</label>
                                <input type="text" required class="form-control" placeholder="Prénoms" name="firstname">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" required class="form-control" placeholder="email" name="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>N° téléphone</label>
                                <input type="text" required class="form-control" placeholder="N° téléphone" name="phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" required class="form-control" name="reservation_id" value="<?= $reservation->id ?>">
                        </div>
                        </div>
                        <div class="row custom-padding">
                        <div class="col-sm-6">
                            <!-- Select multiple-->
                            <div class="modal-footer">
                                <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button  class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                        <?= $this->Form->end() ?>
                </div>
           
                </div>
            </div>
        </div>
    </tbody>
</table>