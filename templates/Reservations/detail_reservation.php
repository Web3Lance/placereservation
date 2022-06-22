<?= $this->Form->create($reservation, [
  "id" => "frm-edit-branch"
]) ?>
<div class="row custom-padding">
   <div class="col-sm-6">
       <!-- text input -->
       <div class="form-group">
           <label><?= $reservation->id ?></label>
        </div> 
        
   </div>
  
   
</div>


  <?= $this->Form->end() ?>