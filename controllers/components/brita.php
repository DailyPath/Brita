<?php  
App::import('Vendor', 'HTMLPurifier', array('file' => 'htmlpurifier' . DS . 'library' . DS . 'HTMLPurifier.auto.php'));

class BritaComponent extends Object { 

	public $Controller;
	
	public $definition_id = 'brita definitions';
	
	public $definition_revision = 1;
	
	public $tidy_level = 'heavy';
	
	public $doctype = 'XTML 1.0 Transitional';
	
	public $encoding = 'ISO-8859-1';

	function initialize(&$Controller) { 

        //the next few lines allow the config settings to be cached 
        $config = HTMLPurifier_Config::createDefault(); 
        $config->set('HTML', 'DefinitionID', $this->definition_id); 
        $config->set('HTML', 'DefinitionRev', $this->definition_revision); 
        //levels describe how aggressive the Tidy module should be when cleaning up html 
        //four levels: none, light, medium, heavy 
        $config->set('HTML', 'TidyLevel', $this->tidy_level); 
        //check the top of your html file for the next two 
        $config->set('HTML', 'Doctype', $this->doctype); 
        $config->set('Core', 'Encoding', $this->encoding); 
         
        //BritaComponent instance of controller is replaced by a htmlpurifier instance 
        $Controller->Brita =& new HTMLPurifier($config); 
        $Controller->set('Brita', $Controller->Brita); 

   } 
    
} 
?>