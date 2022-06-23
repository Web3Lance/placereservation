<?= $this->Form->create($reservation, [
  "id" => "frm-add-branch"
]) ?>

<h3>Réservation</h3>
<div class="row custom-padding">
    <div class="col-sm-6">
        <!-- text input -->
       <div class="form-group">
           <label>Date début</label>
           <input type="date" required class="form-control" placeholder="Prénoms" name="start_date">
       </div>
   </div>
   <div class="col-sm-6">
       <!-- text input -->
       <div class="form-group">
           <label>Date fin</label>
           <input type="date" required class="form-control" placeholder="Prénoms" name="end_date">
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