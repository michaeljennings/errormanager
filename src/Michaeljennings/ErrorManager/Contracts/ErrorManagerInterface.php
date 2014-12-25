<?php namespace Michaeljennings\ErrorManager\Contracts;

interface ErrorManagerInterface {

	/**
	 * Check if there are any errors
	 * 
	 * @return boolean
	 */
	public function hasErrors();

	/**
	 * Alias for getMessages
	 * 
	 * @return Mixed
	 */
	public function errors();

	/**
	 * Check for the key in the error manager session else return the message
	 * from the message bag
	 *
	 * @param  string  $key
	 * @param  string  $format
	 * @return string
	 */
	public function first($key = null, $format = null);

	/**
	 * Check for the key in the error manager session else return the messages 
	 * from the message bag
	 *
	 * @param  string  $key
	 * @param  string  $format
	 * @return array
	 */
	public function get($key, $format = null);

}