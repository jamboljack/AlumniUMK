<section class="wrapper">
    <div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Form Add Gaji
            </header>

            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Input Data Gaji
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/gaji/savedata'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Gaji Desc :</label>
                	<div class="col-sm-6 has-success">
                   <input type="text" name="desc" class="form-control" id="desc" placeholder="Enter Gaji Desc" value="<?php echo set_value('desc'); ?>" autocomplete="off" required="true" autofocus>
                    </div>
                    <?php echo form_error('desc', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>              
    			</div>
                                        
    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/gaji'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
    	
            </section>
		</div>
    </div>
</section>        