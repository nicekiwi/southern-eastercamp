<?php

class Photo extends Eloquent {

	public function import_photos() {

		$facebook = new Facebook([
			'appId'  => Config::get('keys.facebook.app_id'),
			'secret' => Config::get('keys.facebook.secret_key'),
		]);

		//dd($facebook);

		//$albums = $facebook->api('/southerneastercamp/albums');

		$albums = Cache::remember("product_$id", 10, function() use ($id)
	    {
	        echo('Getting this from Shopify');
	        $shopify = new ShopifyLib;
	        return json_encode($shopify->getShopifyProduct($id));
	    });

		$albums = $facebook->api('/10151439168936716/photos');


		return dd($albums);

	}

}