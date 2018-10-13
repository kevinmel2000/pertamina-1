
	<div class="panel panel-success">
  <div class="panel-heading"><i class="fa fa-calendar" style="font-size:30px"></i> Item List</div>
  <div class="panel-body table-responsive">
  	 <?php
          if(empty($approved)){
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
        <th>Item's Name</th>
        <th>Quantity</th>
        <th>Expired Until</th>
        <th>Expired In</th>
      </tr>
    </thead>
    <tbody>
            <?php
          foreach ($approved as $r) {
        ?>
      <tr>
        <td><?php  echo $r->id_trans; ?></td>
        <td><?php  echo $r->nama; ?></td>
        <td><?php  echo $r->jumlah; ?></td>
        <td><?php  echo $r->date; ?></td>
        <td><?php  echo $r->days; ?></td>
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