# Error Manager
A wrapper for the laravel 4 message bag to make it simpler to add and retrieve messages, also flashes messages
to the session so they can be retrieved on the next request.

## Installation
Include the package in your `composer.json`.

  "michaeljennings/errormanager": "dev-master";

Run `composer install` or `composer update` to download the dependencies.

Once the package has been downloaded add the validation service provider to the list of service providers in 
`app/config/app.php`.
  
  'providers' => array(
  
    'Michaeljennings\ErrorManager\ErrorManagerServiceProvider'
  
  );

Add the `Error` facade to your aliases array.

    'aliases' => array(
      
      'Error' => 'Michaeljennings\ErrorManager\Facades\Error',
    
    );
  
## Usage
To add a message into the message bag use the `add` method.

    Error::add('foo', 'bar');
  
To check if there are any errors in the current message bag use the `hasErrors` method.

    Error::hasErrors();
  
To retrieve the errors from the message bag use the `errors` method.

    Errors::errors();
  
You may also use any of the standard message bag functions.

    $errors = Errors::errors();
    
    $errors->has('foo)
    $errors->first('bar')
  
You may also redirect with the errors.

    return Redirect::back()->withErrors(Errors::errors());
