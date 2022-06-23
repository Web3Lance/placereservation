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
       <!-- text input -->
       <div class="form-group">
           <label>Réservation</label>
           <select name="reservation_id" id="reservation">
            <?php foreach($reservations as $reservation){ ?>
                <option value="<?php echo $reservation->id; ?>">
                    <?php echo $reservation->id; ?>
                </option>
            <?php } ?>
           </select>
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