<?php namespace Michaeljennings\ErrorManager;

use Illuminate\Support\ServiceProvider;

class ErrorManagerServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register(){
		$this->app->singleton('error', function() {
			return new ErrorManager;
		});

		$this->app->after(function($request, $response)
		{
			if (!$this->app['error']->isEmpty()) {
				\Session::flash('errorManager.errors', $this->app['error']->errors());
			}
		});
	}
	
}