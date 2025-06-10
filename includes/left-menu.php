      <?php
	  
      
/*     	 $q3="select * from _reference6203 INNER JOIN _reference6203_vt6207 ON _reference6203._idrref=_reference6203_vt6207._reference6203_idrref  WHERE _idrref='$f[_fld6219rref]' ORDER BY _fld6240";
		 $r3 = pg_query($connection, $q3) or die("Error in query: $q3." . pg_last_error($connection));
		
         
            $rows3= pg_num_rows($r3);
			
*/
			
			 for($i3=0; $i3<$rows33; $i3++)
 	    	{
               
			   
               $f3=pg_fetch_array($r33); 
                
               
               if ($f3['_fld6210']===$page_marker) { $class="left-menu-item-selected";  echo "<div class='$class'>".$f3['_fld6209']."</div>"; }
			   else
			   { $class="left-menu-item"; echo "<div class='$class'><a href='".$f3['_fld6211']."'>".$f3['_fld6209']."</a></div>";  }
                
            }
      
      ?>