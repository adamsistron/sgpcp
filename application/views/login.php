<?php echo "";?>
<!DOCTYPE html>

    <body>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('sesion/css/style.css')?>" />
		<script src="<?php echo base_url('sesion/js/modernizr.custom.63321.js')?>"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
   
        <div class="container">


			
			<section class="main">
                                    <form class="form-1" accept-charset="utf-8" method="post" action="<?php echo base_url('sesion/login')?>">
					<p class="field">
						<input type="text" name="indicador" placeholder="Indicador">
						<i class="icon-user icon-large"></i>
					</p>
						<p class="field">
							<input type="password" name="password" placeholder="Clave de Red">
							<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</form>
			</section>
        </div>
    </body>
</html>


