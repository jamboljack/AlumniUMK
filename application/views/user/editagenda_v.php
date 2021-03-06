<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Agenda - <b><?php echo $progdi->progdi_name; ?></b>
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Agenda
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('user/agenda/updatedata/'.$this->uri->segment(4).'/'.$this->uri->segment(5)); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="agenda_id" value="<?php echo $agenda->agenda_id; ?>" />               
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                            

                <div class="form-group">
                	<label class="control-label col-sm-2">Title :</label>
                	<div class="col-sm-6 has-success">
                   <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?php echo $agenda->agenda_title; ?>" autocomplete="off" required="true">
                    </div>                
                </div>                
                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Short Description :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control ckeditor" name="short" id="short" rows="6"><?php echo $agenda->agenda_short; ?></textarea>
                    </div>                
                </div>
                <div class="form-group">
    				<label class="col-sm-2 control-label col-sm-2">Description :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control ckeditor" name="deskripsi" rows="6"><?php echo $agenda->agenda_desc; ?></textarea>
                    </div>
    			</div>
                
    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('user/agenda/progdi/'.$this->uri->segment(4)); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>