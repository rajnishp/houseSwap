<?php
   function sharepage($url) {
		echo "<ul class='list-inline'>
				<li class=''>
						<a href='https://www.facebook.com/sharer/sharer.php?u=".$url."' class='popup' target='_blank'>
							<img class='media-object img-circle' src='../../static/img/facebook.png' style='width:50px;'/>
						</a>
					</li>
					
					<li class=''>
						<a href='https://twitter.com/intent/tweet?status=".$url."' class='popup' target='_blank'>
							<img class='media-object img-circle' src='../../static/img/twitter.png' style='width:50px;'/>
						</a>
					</li>
					
					<li class=''>
						<a href='https://plus.google.com/share?url=".$url."' class='popup' target='_blank'>
							<img class='media-object img-circle' src='../../static/img/google.png' style='width:50px;'/>
						</a>
					</li>
				</ul> ";
			}              
?>
