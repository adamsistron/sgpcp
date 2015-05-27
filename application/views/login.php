<?php echo "";?>
<!DOCTYPE html>

    <body>
        
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
   
        <div class="">
            <form class="form-1" accept-charset="utf-8" method="post" action="<?php echo base_url('sesion/login')?>">
                <p class="">
                        <input type="text" name="indicador" placeholder="Indicador">

                </p>
                        <p class="">
                                <input type="password" name="password" placeholder="Clave de Red">

                </p>
                <p class="submit">
                        <button type="submit" name="submit">Ingresar</button>
                </p>
            </form>
        </div>
    </body>
</html>


