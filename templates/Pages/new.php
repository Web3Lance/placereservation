
<?php echo $this->Html->css('https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css'); ?>
<?php echo $this->Html->script('//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',  ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->script('//cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js',  ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->script('https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js',  ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js',  ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->script('pages_new',  ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->scriptBlock(sprintf(
    'var csrfToken = %s;',
    json_encode($this->request->getAttribute('csrfToken'))
));
 echo $this->Html->scriptBlock(sprintf(
  'var reservation_id = %s;',
  json_encode($reservation->id)
));
?>
  <div class="container">
    <div class="messages"></div>
    <br/>
    <h2>Veuillez ajouter des utilisateurs en cliquant sur "Ajouter un utilisateur"</h2>
    <br/>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
      Ajouter un utilisateur
    </button>

    <table class="table table-striped" id="tbl-users-data">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>Email</th>
          <th>Téléphone</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  <div class="row">
    <div class="col text-center">
      <a href="<?= $this->Url->build('/changestatus/' . $reservation->id, ['fullBase' => true]) ?>" class="btn btn-default btn-lg">ENVOYER MAINTENANT</a>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-user" class="pr-2 pl-2" role="form" novalidate>
      <div class="modal-body">
        <div class="form-group row">
        <div  class="form-group row">
          <label for="nom" class="col-sm-2 col-form-label">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nom" name="lastname" placeholder="Nom" required="required" data-error="Nom est oblicatoire.">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="prenom" name="firstname" placeholder="Prénom" required="required" data-error="Prénom est oblicatoire.">
          </div>
        </div>
        <div class="form-group row">
          <label for="prenom" class="col-sm-2 col-form-label">Né(e) - Année</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="datenaissance" name="birthdate" placeholder="Date de naissance" required="required" data-error="La date de naissance est oblicatoire.">
          </div>
        </div>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control-plaintext" id="staticEmail" name="email" placeholder="email@domain.com" required="required" data-error="Email est oblicatoire.">
          </div>
        </div>

        <div class="form-group row">
          <label for="phone" class="col-sm-2 col-form-label">Tél.</label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Téléphone" required="required" data-error="Tél. est oblicatoire.">
          </div>
        </div>
        <input type="hidden" name="reservation_id" value="<?php echo $reservation->id ?>" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Eregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>

  </div>
