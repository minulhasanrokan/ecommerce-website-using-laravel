<?php

	function cart_array(){
		$cartCollection = Cart::getContent();

		return $cartCollection->toArray();
	}

