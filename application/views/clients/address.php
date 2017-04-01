<?php defined('BASEPATH') or die('Restricted direct access'); ?>
			<div class="row">
				<div class="col-sm-3">
					<strong><?php echo LTEXT('_address_category')?></strong> : 
					<?php
	                if($address->kunde)
	                {
	                	echo LTEXT("_global_client");
	                }
	                if($address->eigentuemer)
	                {
	                	echo LTEXT("_obj_owner");
	                }
	                if($address->kontaktart)
	                {
	                	echo LTEXT("_global_other");
	                }
	                ?>
				</div>
				<div class="col-sm-3">
					<p>
						<strong><?php echo LTEXT('_global_status')?></strong> : 
						<?php echo ($address->status) ?  LTEXT('_global_active') :  LTEXT('_global_inactive');?>
					</p>
					<p>
						<strong><?php echo LTEXT('_adr_valoration')?></strong> : 
						<?php echo ($address->bewertung) ?  $address->bewertung :  '-';?>
					</p>
				</div>
				<div class="col-sm-3">
					<p>
						<strong><?php echo LTEXT('_global_registered')?></strong> : 
						<?php echo $address->datum?>
					</p>
					<p>
						<strong><?php echo LTEXT('_global_from')?></strong> : 
						<?php echo $address->erfasst_von?>
					</p>
				</div>
				<div class="col-sm-3">
					<p>
						<strong><?php echo LTEXT('_global_modify')?></strong> : 
						<?php echo $address->modify_datum?>
					</p>
					<p>
						<strong><?php echo LTEXT('_global_from')?></strong> : 
						<?php echo $address->erfasst_von?>
					</p>
				</div>
			</div>
		
		<div class="well well-sm" style="margin-top:10px;">
			<div class="row">
				<div class="col-sm-12">
					<ul class="list-inline">
						<li>
							<strong><?php echo LTEXT('_objects')?> : </strong>
						</li>
						<?php foreach ($objects_for_menu as $object) {?>
						<li>
							<a href="#"><?php echo $object->id_object?></a>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		<?php $this->load->view('clients/adress_details_partial');?>
		<?php $this->load->view('clients/additional_in_charge_partial')?>
		<?php $this->load->view('clients/additional_address_partial')?>	
		<?php $this->load->view('clients/additional_data_partial')?>	
		<?php $this->load->view('clients/additional_contacts_partial')?>
		<?php $this->load->view('clients/additional_search_profile_partial')?>
		<?php $this->load->view('clients/additional_tasks_partial')?>	
		<?php $this->load->view('clients/additional_contacthistory_partial')?>
	