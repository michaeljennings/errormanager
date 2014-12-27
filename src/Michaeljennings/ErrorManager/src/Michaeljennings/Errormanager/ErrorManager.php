<?php namespace Michaeljennings\Errormanager;

use Session;
use Illuminate\Support\MessageBag;

class ErrorManager extends MessageBag implements Contracts\ErrorManagerInterface {

	/**
	 * Check if there are any errors
	 * 
	 * @return boolean
	 */
	public function hasErrors()
	{
		return ! $this->isEmpty();
	}

	/**
	 * Alias for getMessages
	 * 
	 * @return Mixed
	 */
	public function errors()
	{
		return $this->getMessages();
	}

	/**
	 * Check for the key in the error manager session else return the message
	 * from the message bag
	 *
	 * @param  string  $key
	 * @param  string  $format
	 * @return string
	 */
	public function first($key = null, $format = null)
	{
		if ($key) {
			if (Session::has('errorManager.errors')) {
				$errors = new parent(Session::get('errorManager.errors'));
				if ($errors->has($key)) {
					return $errors->first($key);
				}
			}
		}

		return parent::first($key);
	}

	/**
	 * Check for the key in the error manager session else return the messages 
	 * from the message bag
	 *
	 * @param  string  $key
	 * @param  string  $format
	 * @return array
	 */
	public function get($key, $format = null)
	{
		if (Session::has('errorManager.errors')) {
			$errors = new parent(Session::get('errorManager.errors'));
			if ($errors->has($key)) {
				return $errors->get($key);
			}
		}

		return parent::get($key);
	}
	
}