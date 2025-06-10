  <?php
         

	$text = mb_convert_encoding($f['_idrref'], 'UTF-8', 'UTF-8');
    $text2=htmlspecialchars_decode(htmlspecialchars($text, ENT_SUBSTITUTE, 'UTF-8'));



				 
         	//$q2="select * from _document6205_vt6222 INNER JOIN _reference6204 ON  _document6205_vt6222._fld6224rref=_reference6204._idrref  WHERE _document6205_idrref='$text2' ORDER BY _document6205_vt6222._fld6227";

			$q2="select * from _document6205_vt6222 INNER JOIN _document6205 ON  _document6205_vt6222._document6205_idrref = _document6205._idrref  
			                                        INNER JOIN _reference6204 ON  _document6205_vt6222._fld6224rref=_reference6204._idrref 
													WHERE _document6205._fld6217='$page_marker'
			ORDER BY _document6205_vt6222._fld6227";

         	$r2 = pg_query($connection, $q2) or die("Error in query: $q2." . pg_last_error($connection));
         	$rows2 = pg_num_rows($r2);
			 for($i3=0; $i3<$rows2; $i3++)
 	    	{
                $f2=pg_fetch_array($r2); 
                if ($f2['_fld6230']=='f')
				{ 
				   // текстовый инф.блок
                   if (!  $f2['_fld6214']=='') {echo '<h2>'.$f2['_fld6214'].'</h2>';}
				   echo $f2['_fld6215'];
				} else
				{
					require($f2['_fld6231']);
				}
				
            }
         
         ?>
         