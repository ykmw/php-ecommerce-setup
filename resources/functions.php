<?php

// helper functions

function redirect($location){
	
header("Location: $location");

}

function query($sql){
	
global $connection;

	return mysqli_query($connection, $sql);

}

function confirm($result){
	
global $connection;

if(!$result){
	
die("QUERY FAILED " . mysqli_error($connection));

}
}

function escape_string($string){
	
global $connection;

	return mysqli_real_escape_string($connection, $string);

}

function fetch_array($result){
	
	return mysqli_fetch_array($result);

}

// get products

function get_products(){
	
$query = query(" SELECT * FROM products");
confirm($query);

while($row = fetch_array($query)) {
	
$product = <<<DELIMETER
	<div class="col-sm-4 col-lg-4 col-md-4">
			<div class="thumbnail">
				<img src="{$row['product_image']}" alt="">
				<div class="caption">
					<h4 class="pull-right">&#36;{$row['product_price']}</h4>
					<h4><a href="product.html">{$row['product_title']}</a>
					</h4>
					<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>
					</p>
						<div class="ratings">
				
							<p class="pull-right">15 reviews</p>
							<p>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							</p>
						</div>
						<a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">Add to Cart</a>     
				</div>
			</div>
	</div>
DELIMETER;

echo $product;
}	
}


?>