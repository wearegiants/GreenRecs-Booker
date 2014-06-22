 <?php

 abstract class baseGr {

 	private static $instances = array();

 	// A protected get method with locking
 	public function __get( $variable ) {
 		$module = get_called_class();

 		if ( in_array( $variable, $module::$readable_properties)) {
 			return $this->$variable;
 		} else {
 			throw new Exception( __METHOD__ . "Error - " . $variable . " doesn't exist or isn't readable at this time.");
 		}
 	}

 	// A protected set method with locking
 	public function __set( $variable ) {
 		$module = get_called_class();

 		if ( in_array( $variable, $module::$writeable_properties ) ) {
				$this->$variable = $value;
				if (!$this->is_valid() ) {
					throw new Exception( __METHOD__ . "Error - " . $variable . " doesn't exist or isn't writtable at this time.");
 		} else {
 			throw new Exception( __METHOD__ . "Error - " . $variable . " doesn't exist or isn't writtable at this time.");
 		}
 	}

 	// Provides access to a single instance of a module using the singleton pattern
		public static function get_instance() {
			$module = get_called_class();

			if ( ! isset( self::$instances[ $module ] ) ) {
				self::$instances[ $module ] = new $module();
			}

			return self::$instances[ $module ];
		}
	//base methods on the class
 	abstract protected function __construct();

 	abstract public function register_hook_callbacks();

 	abstract public function init();

 	abstract protected function is_valid( $property = 'all' );


 }