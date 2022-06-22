<?= $this->Form->create($user, [
  "id" => "frm-edit-branch"
]) ?>
<div class="row custom-padding">
   <div class="col-sm-6">
       <!-- text input -->
       <div class="form-group">
           <label>Nom</label>
           <input type="text" value="<?= $user->lastname ?>" required class="form-control" placeholder="Nom" name="lastname">
       </div>
   </div>
   <div class="col-sm-6">
       <!-- text input -->
       <div class="form-group">
           <label>Prénoms</label>
           <input type="text" value="<?= $user->firstname ?>" required class="form-control" placeholder="Prénoms" name="firstname">
       </div>
   </div>
   <div class="col-sm-6">
       <!-- text input -->
       <div class="form-group">
           <label>Prénoms</label>
           <input type="text" value="<?= $user->birthdate ?>" required class="form-control" placeholder="Date de naissance" name="birthdate">
       </div>
   </div>
   <div class="col-sm-6">
       <!-- text input -->
       <div class="form-group">
           <label>Email</label>
           <input type="email" value="<?= $user->email ?>" required class="form-control" placeholder="email" name="email">
       </div>
       </div>
</div>
<div class="row custom-padding">
   <div class="col-sm-6">
       <!-- text input -->
       <div class="form-group">
           <label>N° tél</label>
           <input type="text" value="<?= $user->phone_no ?>" required class="form-control" placeholder="N° tél" name="phone_no">
       </div>
   </div>
</div>
<div class="row custom-padding">
   <div class="col-sm-6">
       <!-- Select multiple-->
       <div class="form-group">
           <button class="btn btn-primary">Submit</button>
       </div>
   </div>
</div>
  <?= $this->Form->end() ?>