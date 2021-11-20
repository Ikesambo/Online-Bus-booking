<style>
  	 div.scroll{
	    margin:4px,4px;
		padding:4px;
		height:100px;
		overflow-x:hidden;
		overflow-y:auto;
		text-align:justify;
}
</style>

<?php

  $sql="select * from notice_board order by date DESC";
  $results=mysqli_query($conn,$sql);
  if(mysqli_num_rows($results)>0){
     
    while($row = mysqli_fetch_array($results))
	{

       $output='<br><div class="scroll" style="width:80%;margin:0 auto"><a><b><u>'.$row["subject"].'</u></b></a><br><br><p style=
                 "text-size=10px"><i>posted on '
                .$row["date"].'</i></p><br>
                 <p>'.$row["details"].'</p></div><br><hr>';

       echo $output;

    }

 }

?>