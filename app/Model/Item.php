<?php

class Item extends AppModel {

	public $belongsTo = array('User', 'Category');
	
}