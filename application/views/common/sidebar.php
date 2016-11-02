<?php 
$permission = @$_SESSION['RolePermission']; 
?> 
<nav class="uk-navbar">              
    <!-- main sidebar -->
    <aside id="sidebar_main">
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="#" class="sSidebar_hide"><img src="<?=BASEURL;?>public/assets/img/sidebar.jpg" alt="" height="15" width="200"/></a>
            </div>
        </div>
        <div class="scroll-wrapper scrollbar-inner">
            <div class="header_main_content">                       
            </div>
            <div class="menu_section">
                <ul>
                    <? if(isset($permission)){
					foreach($permission as $perm)
					{?> 
						<?php if($perm['page_name'] == "dashboard") 
						{?>
							<?php if(@$_SESSION['vendor_id']) 
							{?>	
								<li>
									<a href="<?=BASEURL?>vendor/dashboard">
										<span class="menu_icon"><i class="material-icons"></i></span>
										<span class="menu_title">Dashboard</span>
									</a>                    
								</li>
							<?}else{?>
								<li>
									<a href="<?=BASEURL?>dashboard">
										<span class="menu_icon"><i class="material-icons"></i></span>
										<span class="menu_title">Dashboard</span>
									</a>                    
								</li>
							<?}?>
						<?}?>                
						<?php if($perm['page_name'] == "user") 
						{?> 
							<?php if($_SESSION['role_id'] == "3") 
							{?>                
								<li>
									<a href="<?=BASEURL?>dashboard/regpro">
										<span class="menu_icon"><i class="material-icons"></i></span>
										<span class="menu_title">Registered Products</span>
									</a>                    
								</li>
							<?}else{?>
								<li >
									<a href="<?=BASEURL?>user">
										<span class="menu_icon"><i class="material-icons"></i></span>
										<span class="menu_title">Users</span>
									</a>                    
								</li>
							<?}?>
						<?}?>
						<?php if($perm['page_name'] == "vendor") 
						{?>
							<?php if(@$_SESSION['vendor_id']) 
							{?>
								<!-- <li>
									<a href="<?=BASEURL?>vendor/edit?vid=<?=urlencode(base64_encode($_SESSION['vendor_id']));?>">
										<span class="menu_icon"><i class="material-icons"></i></span>
										<span class="menu_title">Edit Profile</span>
									</a>                    
								</li>-->
							<?}else {?>
								<li>
									<a href="<?=BASEURL?>vendor">
										<span class="menu_icon"><i class="material-icons"></i></span>
										<span class="menu_title">Vendors</span>
									</a>                    
								</li>
							<?}?>
						<?}?>
						<?php if($perm['page_name'] == "role") 
						{?>
							<li>
								<a href="<?=BASEURL?>role">
									<span class="menu_icon"><i class="material-icons"></i></span>
									<span class="menu_title">Roles</span>
								</a>                    
							</li>
						<?}?>
						<?php if($perm['page_name'] == "preferences") 
						{?>
							<?php if($RoleId == "3") 
							{?>
								<li>
									<a href="<?=BASEURL?>preferences/favourite">
										<span class="menu_icon"><i class="material-icons"></i></span>
										<span class="menu_title">Favourite Products</span>
									</a>                    
								</li>
							<?} else {?>
								<li>
									<a href="<?=BASEURL?>preferences">
										<span class="menu_icon"><i class="material-icons"></i></span>
										<span class="menu_title">Preferences</span>
									</a>                    
								</li>
							<?}?>
						<?}?>
						<?php if($perm['page_name'] == "bundle") 
						{?>
							<li>
								<a href="<?=BASEURL?>bundle">
									<span class="menu_icon"><i class="material-icons"></i></span>
									<span class="menu_title">Bundles</span>
								</a>                   
							</li>
						<?}?>
						<?php if($perm['page_name'] == "product") 
						{?>
							<li>
								<a href="<?=BASEURL?>product">
									<span class="menu_icon"><i class="material-icons"></i></span>
									<span class="menu_title">Products</span>
								</a>                   
							</li>
						<?}?>
						<?php if($perm['page_name'] == "vproduct") 
						{?>
							<li>
								<a href="<?=BASEURL?>vproduct">
									<span class="menu_icon"><i class="material-icons"></i></span>
									<span class="menu_title">Products</span>
								</a>                   
							</li>
						<?}?>    				
						<?php if($perm['page_name'] == "question") 
						{?>
							<li>
								<a href="<?=BASEURL?>question">
									<span class="menu_icon"><i class="material-icons"></i></span>
									<span class="menu_title">Security Questions</span>
								</a>                                       
							</li>
						<?}?>
						<?php if($perm['page_name'] == "ubundle") 
						{?>
							<li>
								<a href="">
									<span class="menu_icon"><i class="material-icons"></i></span>
									<span class="menu_title">Bundles</span>
								</a>
								<ul class="">
									<?
									foreach($Bundles as $_){?>
									<li><a href="<?=BASEURL?>ubundle/type/?bid=<?=urlencode(base64_encode($_['bundle_id']));?>" value="<?=$_['bundle_id'];?>"><?=$_['bundle_name'];?></a></li>                        
									<?}?>                           
								</ul>
							</li>
						<?}?>
					<?}}?>             
                </ul>
            </div> 
        </div>
    </aside><!-- main sidebar end -->
</nav>
  