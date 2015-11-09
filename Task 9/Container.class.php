<?php

Class Container  implements ArrayAccess {

	protected $providers = array();

	protected $singletons = array();

//implementacija metoda interface-a ArrayAccess
	public function offsetSet($offset, $value) {
		if (!array_key_exists($offset, $this->singletons)) {
       		$this->providers[$offset] = $value;
       	}
    }

    public function offsetExists($offset) {
        return (isset($this->providers[$offset]) || isset($this->singletons[$offset]));
    }

    public function offsetUnset($offset) {
    	if (array_key_exists($offset, $this->singletons)) {
        	unset($this->singletons[$offset]);
    	} elseif (array_key_exists($offset, $this->providers)) {
    		unset($this->providers[$offset]);
    	}
    }

    public function offsetGet($offset) {
        if (array_key_exists($offset, $this->providers)) {
           if (is_callable($this->providers[$offset])) {
				return call_user_func($this->providers[$offset]);
			} else {
				return $this->providers[$offset];
			}
        } elseif (array_key_exists($offset, $this->singletons)) {
        	if (is_callable($this->singletons[$offset])) {
				return call_user_func($this->singletons[$offset]);
			} else {
				return $this->singletons[$offset];
			}
        }
    }
	

//magic method __set poziva metod set()
	public function __set($name, $provider) {
    	$this->set($name, $provider);
    }

// magic method __get proverava da li postoji u niyovima $singletons ili $providers postoji element sa kljucem $name i vra'a njegovu vrednost
    public function __get($name) {
    	if (array_key_exists($name, $this->providers)) {
           if (is_callable($this->providers[$name])) {
				return call_user_func($this->providers[$name]);
			} else {
				return $this->providers[$name];
			}
        } elseif (array_key_exists($name, $this->singletons)) {
        	if (is_callable($this->singletons[$name])) {
				return call_user_func($this->singletons[$name]);
			} else {
				return $this->singletons[$name];
			}
        }
    }

// magic method __call proverava da li postoji u niyovima $singletons ili $providers postoji element sa kljucem $name i vra'a njegovu vrednost
    public function __call($name, $params= array()) {
    	if (array_key_exists($name, $this->providers)) {
           if (is_callable($this->providers[$name])) {
				return call_user_func_array($this->providers[$name], $params);
			} else {
				return $this->providers[$name];
			}
        } elseif (array_key_exists($name, $this->singletons)) {
        	if (is_callable($this->singletons[$name])) {
				return call_user_func($this->singletons[$name]);
			} else {
				return $this->singletons[$name];
			}
        }
    }

//$singleton = thrue, proverava da li atribut vec postoji, ukoliko ne, dodeljuje vrednost $provider elementu niza #singletons sa kljucem $name
//$singleton = false, dodeljuje vrednost $provider elementu niza #providers sa kljucem $name
	public function set($name, $provider, $singleton = false) {
		if ($singleton) {
			if (!array_key_exists($name, $this->singletons)) {
				$this->singletons[$name] = is_callable($provider)? 
        		$provider->bindTo($this, $this): 
        		$provider;	
			}
			 
		} else {
			$this->providers[$name] = is_callable($provider)? 
        	$provider->bindTo($this, $this): 
        	$provider;  
		}
	}

//proverava da li postoji u niyovima $singletons ili $providers postoji element sa kljucem $name i vra'a njegovu vrednost
	public function get($name,$params= array()){
		if (array_key_exists($name, $this->providers)) {
			if (is_callable($this->providers[$name])) {
				return call_user_func_array($this->providers[$name], $params);
			} else {
				return $this->providers[$name];
			}
		} elseif (array_key_exists($name, $this->singletons)) {
			if (is_callable($this->singletons[$name])) {
				return call_user_func_array($this->singletons[$name], $params);
			} else {
				return $this->singletons[$name];
			}
		}
	}

	public function register(Provider $provider){
		$provider->register($this);

	}	
}