<?php require('header.php'); ?>

<div class="container d-flex justify-content-center flex-wrap " id="users">
  <a class="card" href="./signin" style="width:18rem;">
    <img class="card-img-top" src="./application/images/add.png" width="100px" height="170px">
    <div class="card-body">
      <h5 class="card-title"><br> <br> </h5>

    </div>
  </a>
</div>
<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modify privilege</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" value="" id="idstudentToModifyPrivileg"/>
        <select  class="custom-select"  id="role">
          <option>Admin</option>
          <option>BDE</option>
          <option>Delegue</option> 
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-saveRole">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>

<script src="./application/assets/js/scripts_users.js"></script>
<script>

</script>

</html>