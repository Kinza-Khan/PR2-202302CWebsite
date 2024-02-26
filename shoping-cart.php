<?php
include('query.php');
include('header.php');
?>


		<?php
		if(isset($_POST['addToCart'])){
			if(isset($_SESSION['finalCart'])){

					$productId = array_column($_SESSION['finalCart'],'p_id');
					if(in_array($_POST['p_id'],$productId)){

					echo "<script>alert('cart is already added')</script>";
					}
					else{
				
					$count = count($_SESSION['finalCart']);
					$_SESSION['finalCart'][$count] = array("p_id"=>$_POST['p_id'],"p_name"=>$_POST['p_name'],"p_price"=>$_POST['p_price'],"p_des"=>$_POST['p_des'],"p_qty"=>$_POST['num-product'],"p_image"=>$_POST['p_image']);
					echo "<script>alert('cart added successfully');
					location.assign('index.php')</script>";
			}
		}
			else{
				$_SESSION['finalCart'][0] = array("p_id"=>$_POST['p_id'],"p_name"=>$_POST['p_name'],"p_price"=>$_POST['p_price'],"p_des"=>$_POST['p_des'],"p_qty"=>$_POST['num-product'],"p_image"=>$_POST['p_image']);
				echo "<script>alert('cart added successfully')</script>";
			}
		}

		// remove item

		if(isset($_GET['remove'])){
			$id = $_GET['remove'];
				foreach($_SESSION['finalCart']   as  $key => $value){
					if($id == $value['p_id']){
							unset($_SESSION['finalCart'][$key]);
							// reset array
							$_SESSION['finalCart'] = array_values($_SESSION['finalCart']);
							echo "<script>alert('cart remove successfully');
							location.assign('shoping-cart.php')</script>";


					}
					
				}
		}
		
		?>
	<!-- breadcrumb -->
	<div class="container mt-5">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2">Des</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th>Action</th>
								</tr>

								<?php
								if(isset($_SESSION['finalCart'])){
									foreach($_SESSION['finalCart'] as $value){
								?>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="adminPanel/img/<?php echo $value['p_image']?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['p_name']?></td>
									<td class="column-3"><?php echo $value['p_price']?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="<?php echo $value['p_qty']?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?php echo $value['p_price']*$value['p_qty']?></td>
									<td class="column-2"><a href="?remove=<?php echo $value['p_id']?>" class="btn btn-danger">Remove</a></td>
								</tr>
						<?php
						}}
						?>

							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>
						<?php
						if(isset($_SESSION['userEmail'])){
							?>
								<button  class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
							<?php
						}
						else{
							
						?>

						<a href="login.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>

						<?php
						
					}
						
						?>
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		<h1>hello</h1>
	<?php

include('footer.php');
?>
