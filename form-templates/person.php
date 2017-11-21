<?php
/**
 * Person tpl
 *
 * @package understrap
 */

?>
<div class="row pr-0">
    <div class="col-12">
      <div class="form-group">
          <label for="name">Как к вам обращаться:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Иванов Иван Иванович" required>
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" id="email" name="email" required>
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
          <label for="phone">Телефон:</label>
          <input type="text" class="form-control" id="phone" name="phone">
      </div>
    </div>
    <div class="col-4">
      <div class="form-group">
        <label for="call_from">Звонить с</label>
        <select class="form-control" id="call_from" name="call_from">
          <?php for ($i = 0; $i <= 23; $i++) {  ?>
                <option value="<?php echo $i ?>"><?php echo $i ?>:00</option>
          <?php  }  ?>
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="form-group">
        <label for="call_till">до</label>
        <select class="form-control" id="call_till" name="call_till">
          <?php for ($i = 0; $i <= 23; $i++) {  ?>
                <option value="<?php echo $i ?>"><?php echo $i ?>:00</option>
          <?php  }  ?>
        </select>
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <label for="user_info">Дополнительная информация</label>
        <textarea class="form-control" id="user_info" rows="3" name="user_info"></textarea>
      </div>
      <div class="form-check">
         <label class="form-check-label">
           <input type="checkbox" class="form-check-input" required id="privacy" name="privacy">
           Даю согласие на обработку и хранение личных данных.
         </label>
       </div>
    </div>
</div>
