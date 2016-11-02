<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>TRANSPOTS/ASSIGN</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=BASEURL;?>public/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=BASEURL;?>public/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=BASEURL;?>public/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=BASEURL;?>public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=BASEURL;?>public/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>public/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=BASEURL;?>public/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />        
        <!--Custom stylesheet-->
        <link href="<?=BASEURL;?>public/assets/global/css/style.css" rel="stylesheet"/>
        <!--Google fonts Source sans pro-->
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200italic,200,300italic,400italic,700,700italic,600italic,600,300,900,900italic' rel='stylesheet' type='text/css'/>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
        <style type="text/css">
        #example > tbody > tr > td{
            font-family: source sans pro;
            font-weight: 300;
            font-size: 19px;
        }
		 #example1 > tbody > tr > td{
            font-family: source sans pro;
            font-weight: 300;
            font-size: 19px;
        }
        #example> tbody > tr > td > select{
            height: 30px;
        }
        #example1 > tbody > tr > td > select{
            height: 30px;
        }
        </style>
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-boxed" id="assign">
        <?php
        load_view("common/header");
        ?>   
        <div class="page-container-bg-solid page-boxed">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
				<div class="page-head">
					<div class="">
						<div class=""> 
							<div class="container">
								<div class="modal fade" id ="fff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-header">
										<h4 class="color_change modal-title">TRACEBOSS-ASSIGN</h4>
									</div>
									<div class="modal-body">
										<p><center><b class="color_change" id="invalid-data"></b></center></p>
									</div>
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" id="ok_all" class="btn blue btn-md grey-mint opt btn-close">OK</button>
									</div>
								</div>
								<?php if(@$_GET['mesadd']){?>
									<div class="modal-scrollable">
										<div id="static3" class="modal fade in" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false" aria-hidden="false" style="display: block; margin-top: -77px;">
											<div class="modal-header">
												<h4 class="modal-title">TRACEBOSS-DRIVER</h4>
											</div>
											<div class="modal-body">
												<p><center><b>Sucessfully Added</b></center></p>
											</div>
											<div class="modal-footer">
												<a href="<?=BASEURL;?>assign" data-dismiss="modal" class="btn  blue btn-md opt green-meadow">OK</a>
											</div>
										</div>
									</div>
									<div class="modal-backdrop fade in" style="z-index: 10050;"></div>
								<?php } ?>
								<?php if(@$_GET['mesadd1']){?>
									<div class="modal-scrollable">
										<div id="static3" class="modal fade in" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false" aria-hidden="false" style="display: block; margin-top: -77px;">
											<div class="modal-header">
												<h4 class="modal-title">TRACEBOSS-UNIT</h4>
											</div>
											<div class="modal-body">
												<p><center><b>Sucessfully Added</b></center></p>
											</div>
											<div class="modal-footer">
												<a href="<?=BASEURL;?>assign" data-dismiss="modal" class="btn  blue btn-md opt green-meadow">OK</a>
											</div>
										</div>
									</div>
									<div class="modal-backdrop fade in" style="z-index: 10050;"></div>
								<?php } ?>
								<!--pop_up 1 Display Box-->
								<div id="customer" style="display: none;">
									<form action="<?=BASEURL?>assign/add_new_units" method="POST" class="form-horizontal" id="form_sample_1"> 
										<div class="modal-backdrop fade in" style="z-index: 10050;"></div>
										<div class="modal-scrollable">
											<div  class="modal fade in" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false" aria-hidden="false" style="display: block; width: 920px;margin-left: -459px;margin-top: -243px;">
												<div class="row">
													<div class="col-md-12">
														<div class="portlet light ">
															<div class="portlet-title">
																<div class="caption">
																	<span class="caption-subject font-green-sharp sbold"><a class="setting"href="<?=BASEURL;?>settings"><span class="setting">SETTING</a>&nbsp;/</span>&nbsp;<span class="style">UNIT</span></span>
																</div>
															</div>
															<div class="portlet-body">                                
																<input type="hidden" name="company_id" id="company_id" value="1"/>
																<input type="hidden" name="ls_id" id="ls_id_unit" value=""/>
																<div class="form-body">                                       
																	<div class="row">
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">Unit*</label>
																				<input class="form-control required" type="text" id="unit" maxlength="20" name="unit" placeholder=""/> 
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">Unit Type*</label>
																				 <select class="form-control required" id="unit_type" maxlength="20" name="unit_type">
																					<option value="">Choose</option>
																					<option value="Tractor">Tractor</option>
																					<option value="Trailer">Trailer</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">Year*</label>
																				<select class="form-control required" id="year" maxlength="20" name="year">
																					<option value="">Choose</option>
																					<option value="2020">2020</option>
																					<option value="2019">2019</option>
																					<option value="2018">2018</option>
																					<option value="2017">2017</option>
																					<option value="2016">2016</option>
																					<option value="2015">2015</option>
																					<option value="2014">2014</option>
																					<option value="2013">2013</option>
																					<option value="2012">2012</option>
																					<option value="2011">2011</option>
																					<option value="2010">2010</option>
																					<option value="2009">2009</option>
																					<option value="2008">2008</option>
																					<option value="2007">2007</option>
																					<option value="2006">2006</option>
																					<option value="2005">2005</option>
																					<option value="2004">2004</option>
																					<option value="2003">2003</option>
																					<option value="2002">2002</option>
																					<option value="2001">2001</option>
																					<option value="2000">2000</option>
																					<option value="1999">1999</option>
																					<option value="1998">1998</option>
																					<option value="1997">1997</option>
																					<option value="1996">1996</option>
																					<option value="1995">1995</option>
																					<option value="1994">1994</option>
																					<option value="1993">1993</option>
																					<option value="1992">1992</option>
																					<option value="1991">1991</option>
																					<option value="1990">1990</option>
																				</select> 
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-4">
																		   <div class="form-group">
																				<label class="control-label" for="title">Make*</label>
																				<input class="form-control required" type="text" maxlength="20" id="make" name="make" placeholder=""/> 
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">Plate*</label>
																				<input class="form-control required" type="text" maxlength="20" id="plate" name="plate" placeholder=""/> 
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">VIN*</label>
																				<input class="form-control required" type="text" maxlength="20" id="vin" name="vin" placeholder=""/> 
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-4">
																		   <div class="form-group">
																				<label class="control-label" for="title">Status*</label>
																				<select class="form-control required" id="status" name="status">
																					<option value="">Choose</option>
																					<option value="1">Active</option>
																					<option value="0">Inactive</option>
																				</select>                                                    
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">Colour*</label>
																				<input class="form-control required" type="text" id="colour" maxlength="10" name="colour" placeholder=""/> 
																			</div>
																		</div>
																	</div><br/><br/>
																	<div class="form-actions">                                            
																		<div class="row">
																			<div class="save col-md-offset-4 col-md-7">
																				<a href="<?=BASEURL;?>assign" class="btn blue btn-md grey-mint opt btn-close">Cancel</a>
																				<input type="submit" class="btn  blue btn-md green-meadow opt" value="Save" id="submit1" name="submit"/>
																			</div>
																		</div>
																	</div>
																</div>      
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
                        
								<div id="driver" style="display: none;">  
									<form action="<?=BASEURL;?>assign/add_new_driver" method="post" id="form_sample_2" onsubmit="return vali();">
										<div class="modal-backdrop fade in" style="z-index: 10050;"></div>
										<div class="modal-scrollable">
											<div  class="modal fade in" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false" aria-hidden="false" style="display: block; width: 920px;margin-left: -459px;margin-top: -243px;">
												<div class="row">
													<div class="col-md-12">
														<div class="portlet light ">
															<div class="portlet-title">
																<div class="caption">
																	<span class="caption-subject font-green-sharp sbold"><a class="setting"href="<?=BASEURL;?>settings"><span class="setting">SETTING</a>&nbsp;/</span>&nbsp;<span class="style">DRIVER</span></span>
																</div>
															</div>
															<div class="portlet-body">
																<input type="hidden" name="company_id" id="company_id" value="1"/>
																<input type="hidden" name="ls_id" id="ls_id_driver" value=""/>
																<div class="form-body">                                       
																	<div class="row">
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">Phone Number*</label>
																				<input class="form-control required  mask_phone" type="text" id="phone" name="phone" placeholder="Phone Number" onchange="vali();"/> 
																				<span id="erroff" style="display:none;color:#e73d4a; font-family:Open Sans,sans-serif;;font-size:14px;">Enter Valid Phone Number</span>
																			</div>
																		</div>                                        
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">First Name*</label>
																				<input class="form-control required" type="text" id="first_name" maxlength="50" name="first_name" placeholder="First Name"/> 
																			</div>
																		</div>  
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label" for="title">Last Name*</label>
																				<input class="form-control required" type="text" id="last_name" maxlength="50" name="last_name" placeholder="Last Name"/> 
																			</div>
																		</div>
																	</div>      
																	<div class="form-actions">                                            
																		<div class="row">
																			<div class="save col-md-offset-4 col-md-7">
																				<a href="<?=BASEURL;?>assign" class="btn blue btn-md grey-mint opt btn-close">Cancel</a>
																				<input type="submit" class="btn  blue btn-md green-meadow opt" value="Save" id="submit2" name="submit"/>
																			</div>
																		</div>
																	</div>
																</div> 
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>	
								
								<div class="page-content-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="portlet light ">
											  <div class="search-bar">
													<div class="row">
														<div class="col-md-3"></div>
														<div class="col-md-3">
															<div class="form-group">
																<button type="button" name="pickup" id="pickup" class="btn red-mint btn-circle" style="border-radius:12px!important; width: 100%; height: 60px; font-family: source sans pro; font-weight:100; font-size: 36px;">PICKUP</button>
															</div>
														 </div>
														 <div class="col-md-3">
															<div class="form-group">
																<button type="button" name="delivery" id="delivery" class="btn btn-md btn-default" style="border-radius:12px!important; width: 100%; height: 60px; font-family: source sans pro; font-weight:100; font-size: 36px;">DELIVERY</button>
															</div>
														</div>
														<div class="col-md-3"></div>
													</div>
											   </div>
											</div>
										</div>
									</div>   
									<div class="row">
										<div class="col-md-12">
											<div class="portlet light portlet-fit portlet-datatable" id="form_wizard_1">  
												<div id="pick" class="pick_up portlet-body" style="display;">
													<table class="table table-striped table-hover table-bordered" id="example">
														<thead>
															<tr style="background: #9d9fa2; color: #fff;">
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Load #</th>
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Pickup Date</th>
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Customer</th>
																<!--<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">PickUp</th>
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Truck</th>
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Trailer</th>-->
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Driver</th>
															</tr>
														</thead>                                                                    
														<tbody>														   
														</tbody>                                                                
													</table>
												</div>
												<div class="delivery_up portlet-body" style="display:none;">
													<table class="table table-striped table-hover table-bordered" id="example1">
														<thead>
															<tr style="background: #9d9fa2; color: #fff;">
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Load #</th>
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Delivery Date</th>
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Customer</th>
																<!--<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Destination</th>
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Truck</th>
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Trailer</th>-->
																<th style="font-family: source sans pro;font-weight:300;font-size: 22px;">Driver</th>
															</tr>
														</thead>                                                                    
														<tbody>														   
														</tbody>                                                                           
													</table>
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>      
        <!-- END PAGE CONTENT INNER -->       
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=BASEURL;?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=BASEURL;?>public/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=BASEURL;?>public/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->       
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=BASEURL;?>public/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=BASEURL;?>public/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=BASEURL;?>public/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=BASEURL;?>public/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->       
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?=BASEURL;?>public/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="<?=BASEURL;?>public/assets/pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?=BASEURL;?>public/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            function vali()
            {
                var phone  = $('#phone').val();
                var office = phone.replace(/\D/g,'').length;            
                if(office != 10)
                {
                    $("#erroff").show(); 
                    return false;
                }
                else
                {
                    $("#erroff").hide(); 
                    return true;
                } 
            }            
        </script>
        <script type="text/javascript">  
			$(document).ready(function() {
				// var phone_number =$('#mask_phone').val();
				var table =   $('#example').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax": "<?=BASEURL?>assign/list_pick_up_details"
				} );
				var table =   $('#example1').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax": "<?=BASEURL?>assign/list_delivery_details"
				} );
			});
			function get_load_id(load_id){    
			   $("#load_id").val(load_id);
			} 
		   // var phone_number =$('#mask_phone').val();
			$("#pickup").click(function() {
			   //$("#pickup").addclass('red-mint');
			   $('.delivery_up').hide();
			   $('.pick_up').show();
			   $("#pickup").removeClass('btn-default').addClass('red-mint');
			   $("#delivery").removeClass('red-mint').addClass('btn-default');
			});
			 $("#delivery").click(function() {
				$('.pick_up').hide();
				$('.delivery_up').show();
				$("#delivery").removeClass('btn-default').addClass('red-mint');
				$("#pickup").removeClass('red-mint').addClass('btn-default');
			});
			function deletedriver(driver_id,phone_number)
			{
				$('#delete-form').show();
				$('#driver_id').val(driver_id);
				$('#phone1').val(phone_number);
			}
			$("#submit1").click(function() {
				// alert('ddd');
				var phone_number =$('#toll_free').val();
				var driver_id =$('#driver_id').val();
				$.post('<?=BASEURL?>settings/delete_driver', {  'phone_number': phone_number, 'driver_id' : driver_id } , function(jsondata) {
                    var htmldata = '';
                    var new_value_options   = '[';
                    for (var key in jsondata) {
                        htmldata += '<tr class="odd gradeX"><td>'+jsondata[key].driver_id+'</td><td>'+jsondata[key].first_name+'</td><td>'+jsondata[key].last_name+'</td><td>'+jsondata[key].last_name+'</td><td><a href="#" onClick="javascript:deletedriver('+jsondata[key].driver_id+')" class=""><i id="del" class="fa fa-trash" ></i> </a></td></tr>';
                    }
                    new_value_options   += ']';
                    $('table').find('tbody').append(htmldata);
                    $('#delete-form').hide();
                    $('.modal-backdrop').hide();
                }, 'json');
			});
        </script>         
        <script type="text/javascript">        
			function delete_pickup(loadid)
			{
				$('#delete-form').show();
				$('#load_id1').val(loadid);            
			}       
        </script>
        <script type="text/javascript">
			function delete_delivery(loadid)
			{
				$('#delete-form1').show();
				$('#load_id2').val(loadid);  
			}
			$(function() {
				$('.truck,.truck_pickup,.trailer,.trailer_pickup' ).click(function() {
				  var bid, trid;
				  bid = (this.id) ; // button ID 
				  trid = $(this).closest('tr').attr('id'); // table row ID 
				  $("#load_id").val(trid);
				});
			});         
			function update_truck_load(loadid,lsid,count_ls){ 
				var unitid = $('#unit_truck'+count_ls).val();
				 $('#ls_id_unit').val(lsid);
				if(unitid == 'add_new')
				{
					$('#customer').modal({
					 show: 'true'
					}); 
				}
				else
				{
					$.ajax({
						  type: "POST",
							url: "<?=BASEURL?>assign/update_load_unit",
							data: {
							unit_id:unitid,
							ls_id:lsid,
							load_id:loadid
						},              
						success: function (response) {
						if(response == "1") { 
							var table = $('#example').DataTable();
							   table.ajax.reload();
							 var table1 = $('#example1').DataTable();
							   table1.ajax.reload(); 

							}
						},
					});           
				} 
			}     
			function update_truck_load1(loadid,lsid,count_ls){ 
				var unitid = $('#unit_truckd'+count_ls).val();
				$('#ls_id_unit').val(lsid);
				if(unitid == 'add_new')
				{
					$('#customer').modal({
					 show: 'true'
					}); 
				}
				else
				{
					$.ajax({
						  type: "POST",
							url: "<?=BASEURL?>assign/update_load_unit",
							data: {
							unit_id:unitid,
							ls_id:lsid,
							load_id:loadid
						},              
						success: function (response) {
						if(response == "1") { 
							var table = $('#example').DataTable();
							   table.ajax.reload();
							 var table1 = $('#example1').DataTable();
							   table1.ajax.reload(); 

							}
						},
					});           
				} 
			}      
			function update_trailer_load(loadid,lsid,count_ls){ 
				var unitid = $('#unit_trailer'+count_ls).val();
				 $('#ls_id_unit').val(lsid);
				if(unitid == 'add_new')
				{
					 $('#customer').modal({
						show: 'true'
					}); 
				}
				else
				{
				   $.ajax({
						  type: "POST",
							url: "<?=BASEURL?>assign/update_load_unit",
							data: {
							unit_id:unitid,
							ls_id:lsid,
							load_id:loadid
						},              
						success: function (response) {
						if(response == "1") { 
							var table = $('#example').DataTable();
							   table.ajax.reload();
							 var table1 = $('#example1').DataTable();
							   table1.ajax.reload(); 

							}
						},
					});           
				}
			}   
			function update_trailer_load1(loadid,lsid,count_ls){ 
				var unitid = $('#unit_trailerd'+count_ls).val();
				$('#ls_id_unit').val(lsid);				
				if(unitid == 'add_new')
				{
					 $('#customer').modal({
						show: 'true'
					}); 
				}
				else
				{
				   $.ajax({
						  type: "POST",
							url: "<?=BASEURL?>assign/update_load_unit",
							data: {
							unit_id:unitid,
							ls_id:lsid,
							load_id:loadid
						},              
						success: function (response) {
						if(response == "1") { 
							var table = $('#example').DataTable();
							   table.ajax.reload();
							 var table1 = $('#example1').DataTable();
							   table1.ajax.reload(); 

							}
						},
					});           
				}
			}       
			function update_driver_load(lsid,count_ls){                
				var driverid = $('#driver'+count_ls).val();
				$('#ls_id_driver').val(lsid);
				if(driverid == 'add_new')
				{
					$('#driver').modal({
						show: 'true'
					}); 
				}
				else
				{
					$.ajax({
						type: "POST",
						url: "<?=BASEURL?>assign/update_driver_load",
						data: {
						driver_id:driverid,
						ls_id:lsid
						},              
						success: function (response) {
							if(response == "1") { 
								var table = $('#example').DataTable();
								   table.ajax.reload();
							}
						},
					});
				}           
			}  
			function update_driver_load1(lsid,count_ls){                
				var driverid = $('#driverd'+count_ls).val();
				$('#ls_id_driver').val(lsid);
				if(driverid == 'add_new')
				{
					$('#driver').modal({
						show: 'true'
					}); 
				}
				else
				{
					$.ajax({
						type: "POST",
						url: "<?=BASEURL?>assign/update_driver_load",
						data: {
							driver_id:driverid,
							ls_id:lsid
						},              
						success: function (response) {
							if(response == "1") { 
								var table1 = $('#example1').DataTable();
								table1.ajax.reload(); 
							}
						},
					});
				}           
			}       
        </script>
    </body>
</html>