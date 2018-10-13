	<div class="panel panel-warning">
  <div class="panel-heading"><i class="fa fa-calendar" style="font-size:30px"></i> Request List</div>
<div class="panel-body table-responsive">
      <?php
          if(empty($request)){
      ?>
      <p class="text-center">Not Heve Data yet</p>

        <?php
          }
          else{
            ?>
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>IdTrans</th>
        <th>Request Date</th>
        <th>Item's Name</th>
        <th>Quantity</th>
        <th>Time Remaining</th>
      </tr>
    </thead>
    <tbody>
            <?php
          foreach ($request as $r) {
        ?>
      <tr>
        <td><?php  echo $r->id_trans; ?></td>
        <td><?php  echo $r->date_trans; ?></td>
        <td><?php  echo $r->nama; ?></td>
        <td><?php  echo $r->jumlah; ?></td>
        <td><?php  echo $r->time; ?></td>
      </tr>
   
  
      <?php
        }
        ?>
         </tbody>
  </table>
        <?php
          }
      ?>
</div>
</div>