<?php
	class statusLogin
	{
		private function isLogin ()
		{
			session_start();
			$isLogin = false;
			if(isset($_SESSION["id"]) && isset($_SESSION["user"]) && isset($_SESSION["pass"]) && isset($_SESSION["ten"]) && isset($_SESSION["quyen"]))
			{
				$isLogin = true;
			}
			
			return $isLogin;
		}
		
		public function showHeader ()
		{
			$username = 'User';
			$loginShow = "none";
			$noLoginShow = "";
			if($this->isLogin())
			{
				$username = $_SESSION['ten'];			
				$noLoginShow = "none";
				$loginShow = "";
			}
			
			echo "
			<div id='load' style='
	  background-image: url(images/loading.gif) !important;
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  z-index: 20;
  height: 100vh;
  background-color: #f5f7f6;'></div>
			  <header>
				<div class='header-container'>
				  <div class='container'>
					<div class='row'>
					  <div class='col-sm-3 col-xs-12'> 
						<!-- Header Logo -->
						<div class='logo'>
							<a title='Magento Commerce' href='index.php'><img alt='Magento Commerce' src='images/logo/logo.png' style='height:150px;'></a></div>
						<!-- End Header Logo --> 
					  </div>
					  <div class='col-lg-9 col-xs-12 right_menu'>
						<div class='toplinks'> 
						  <!-- Default Welcome Message -->
						  <div class='welcome-msg hidden-xs'>Welcome {$username}
						   </div>
						  <!-- End Default Welcome Message -->
						  <div class='links'>
							<div class='myaccount' style='display: {$loginShow}'><a title='My Account' href='user.php'><span class='hidden-xs'>Tài khoản</span></a></div>
						   
							<div class='check' style='display: {$loginShow}'><a title='Checkout' href='checkout.html'><span class='hidden-xs'>Thanh toán</span></a></div>							
							<div class='login' style='display: {$noLoginShow}'><a href='login.php'><span class='hidden-xs'>Đăng nhập</span></a></div>
							<div class='signup' style='display: {$noLoginShow}'><a href='signup.php'><span class='hidden-xs'>Đăng ký</span></a></div>
						  </div>
						  </div>
						  
						  
						  <!-- links --> 
						</div>
						
					   
						<div class='search-box pull-right'>
						  <form method='GET' id='search_mini_form' name='Categories' action='search.php'>
							<input type='text' placeholder='Search' maxlength='70' value='' name='txtsearch' id='search'>
							<label for='btnsearch' class='btn-search glyphicon glyphicon-search'>
							</label>
							<input type='submit' hidden class='search-btn-bg' id='btnsearch' style='display: none;' name='btn' value='btnsearch'/>
						  </form>
						</div>
						<!-- End Search-col --> 
						<!-- Header Language -->
						<div class='lang-curr'>
						  <div class='form-language'>
							<ul class='lang'>
							  <li class=''><a href='#' title='English'><img src='images/english.png' alt='English' /> <span>English</span></a></li>
							  <li class=''><a href='#' title='Francais'><img src='images/francais.png' alt='Francais' /> <span>francais</span></a></li>
							  <li class=''><a href='#' title='German'><img src='images/german.png' alt='German' /> <span>german</span></a></li>
							</ul>
						  </div>
						  <div class='form-currency'>
							<ul class='currencies_list'>
							  <li class=''><a class='' title='Dollar' href='#'>$</a></li>
							  <li class=''><a class='' title='Euro' href='#'>&euro;</a></li>
							  <li class=''><a class='' title='Pound' href='#'>&pound;</a></li>
							</ul>
						  </div>
						</div>
						
						<!-- End Header Currency --> 
					  </div>
					</div>
				  </div>
				</div>
			  </header>
			";
			
		}
		
		public function showFooter()
		{
			$loginShow = "none";
			$noLoginShow = "";
			if($this->isLogin())
			{			
				$noLoginShow = "none";
				$loginShow = "";
			}
			
			echo 
			"
			<footer>
				<section class='footer-navbar'>
				  <div class='footer-inner'>
					<div class='container'>
					  <div class='row'>
						<div class='col-sm-12 col-xs-12 col-lg-8'>
						  <div class='footer-column pull-left collapsed-block'>
							<h4>MEBOOK<a class='expander visible-xs' href='#TabBlock-1'>+</a></h4>
							<div class='tabBlock' id='TabBlock-1'>
							  <ul class='links'>
								<li class='first'><a href='#' title='How to buy'>Giới thiệu</a></li>
								<li><a href='#' title=''>Điều khoản sử dụng</a></li>
								<li><a href='#' title='Payment'>Chính sách bảo mật</a></li>
								<li><a href='#' title='Shipment&lt;/a&gt;'>Chính sách bán hàng</a></li>
								<li><a href='#' title='Where is my order?'>Phương thức vận chuyển</a></li>
							  </ul>
							</div>
						  </div>
						  <div class='footer-column pull-left collapsed-block'>
							<h4>Tài khoản<a class='expander visible-xs' href='#TabBlock-2'>+</a></h4>
							<div class='tabBlock' id='TabBlock-2'>
							  <ul class='links'>
								<li class='first' style='display: {$noLoginShow}'><a title='Your Account' href='login.php'>Đăng nhập</a></li>
								<li style='display: {$noLoginShow}'><a title='Information' href='#'>Tạo tài khoản</a></li>
								<li><a title='Addresses' href='./user.php'>Lịch sử mua hàng</a></li>
								<li><a title='Addresses' href='./user.php'>Chi tiết tài khoản</a></li>
								<!--<li><a title='Orders History' href='#'>Orders History</a></li>
								<li class='last'><a title=' Additional Information' href='#'>Additional Information</a></li>-->
							  </ul>
							</div>
						  </div>
						  <div class='footer-column pull-left collapsed-block'>
							<h4>Hỗ trợ<a class='expander visible-xs' href='#TabBlock-3'>+</a></h4>
							<div class='tabBlock' id='TabBlock-3'>
							  <ul class='links'>
								<li class='first'><a href='#' title='privacy policy'>Chính sách đổi trả</a></li>
								<li><a href='#' title='Search Terms'>Chính sách bảo hành</a></li>
								<li><a href='#' title='Advanced Search'>Chính sách giao hàng</a></li>
								<li><a href='contact_us.html' title='Contact Us'>Liên hệ</a></li>
								<!--<li><a href='#' title='Suppliers'>Suppliers</a></li>
								<li class=' last'><a href='#' title='Our stores' class='link-rss'>Our stores</a></li>-->
							  </ul>
							</div>
						  </div>
						</div>
						<div class='col-xs-12 col-lg-4'>
						  <div class='footer-column-last'>
							<div class='newsletter-wrap collapsed-block'>
							  <h4>Sign up for emails<a class='expander visible-xs' href='#TabBlock-4'>+</a></h4>
							  <div class='tabBlock' id='TabBlock-4'>
								<form id='newsletter-validate-detail' method='post' action='#'>
								  <div id='container_form_news'>
									<div id='container_form_news2'>
									  <input type='text' class='input-text required-entry validate-email' value='Enter your email address' onfocus=' this.value='' ' title='Sign up for our newsletter' id='newsletter' name='email'>
									  <button class='button subscribe' title='Subscribe' type='submit'><span>Subscribe</span></button>
									</div>
								  </div>
								</form>
							  </div>
							</div>
							<div class='social'>
							  <h4>Follow Us</h4>
							  <ul class='link'>
								<li class='fb pull-left'><a href='#'></a></li>
								<li class='tw pull-left'><a href='#'></a></li>
								<li class='googleplus pull-left'><a href='#'></a></li>
								<li class='rss pull-left'><a href='#'></a></li>
								<li class='pintrest pull-left'><a href='#'></a></li>
								<li class='linkedin pull-left'><a href='#'></a></li>
								<li class='youtube pull-left'><a href='#'></a></li>
							  </ul>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				  <div class='footer-middle'>
					<div class='container'>
					  <div class='row'>
						<div style='text-align:center'><a href='index.php'><img src='images/logo/logo.png' height='150' alt=''></a></div>
						<address>
						<i class='icon-location-arrow'></i> 12 Nguyễn Văn Bảo,Phường 4 ,Q.Gò Vấp,TP Hồ Chí Minh<i class='icon-mobile-phone'></i><span>0387120640</span> <i class='icon-envelope'></i><a href='mailto:support@magikcommerce.com'>lethoa22012020@gmail.com</a>
						</address>
					  </div>
					</div>
				  </div>
				  <!--<div class='footer-bottom'>
					<div class='container'>
					  <div class='row'>
						<div class='col-sm-5 col-xs-12 coppyright'>&copy; 2015 Magikcommerce. All Rights Reserved.</div>
						<div class='col-sm-7 col-xs-12 company-links'>
						  <ul class='links'>
							<li><a title='Magento Themes' href='#'>Magento Themes</a></li>
							<li><a title='Premium Themes' href='#'>Premium Themes</a></li>
							<li><a title='Responsive Themes' href='#'>Responsive Themes</a></li>
							<li class='last'><a title='Magento Extensions' href='#'>Magento Extensions</a></li>
						  </ul>
						</div>
					  </div>
					</div>
				  </div>-->
				</section>
			  </footer>
			  <script type='text/javascript' src='./js/loading.js'></script>
			";
		}
	}
?>