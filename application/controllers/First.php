<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class First extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';

		// build the list of authors, to pass on to our view
		$record = $this->quotes->get(1);
                $this->data = array_merge($this->data, $record);
		$this->render();
	}
        
        function gimme($number) {
            $this->data['pagebody'] = 'justone';    // this is the view we want shown
            // get the author and quote of the id passe by the route, to pass on to our view
            $record = $this->quotes->get(3);
            $this->data = array_merge($this->data, $record);
            $this->render();
    }
    

}