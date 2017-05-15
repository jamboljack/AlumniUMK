<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-folder-open"></i> Agenda List - <b><?php echo $progdi->progdi_name; ?></b>
            </header>
            	
                <div class="panel-body">
    	            <a href="<?php echo site_url('user/agenda/addagenda/'.$this->uri->segment(4)); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                    	<th width="6%">No</th>
                        <th width="15%">Post Date</th>
                        <th>Title</th>                        
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_agenda as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                        <td><? echo tgl_indo($r->agenda_tgl_post); ?></td>
                    	<td><? echo $r->agenda_title; ?></td>                                            
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('user/agenda/editagenda/'.$this->uri->segment(4).'/'.$r->agenda_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('user/agenda/deletedata/'.$this->uri->segment(4).'/'.$r->agenda_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
                        </td>                    
                    </tr>
                    <?php 
                        $no++; 
                    } 
                    ?>
                    </tbody>
                    
                    <tfoot>
                    </tfoot>
    				</table>
                    </div>
    			</div>

    		</section>
		</div>
    </div>
</section>