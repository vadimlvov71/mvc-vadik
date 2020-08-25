<?php
foreach($data["result"] as $item){
	echo $item."<br>";
}

?>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">zone</label>
    <input type="text" class="form-control" name="zone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter zone">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
