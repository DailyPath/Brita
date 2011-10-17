<?php  
App::import('Vendor', 'Brita.HTMLPurifier', array('file' => 'htmlpurifier' . DS . 'library' . DS . 'HTMLPurifier.auto.php'));

class BritaComponent extends Object { 

	// DPTODO (ben@dailypath.com): Move all of these into a config file to allow for use in a behavior as well
	public $Controller;
	
	public $definition_id = 'brita definitions';
	
	public $definition_revision = 1;
	
	public $tidy_level = 'heavy';
	
	public $doctype = 'XHTML 1.0 Transitional';
	
	public $encoding = 'ISO-8859-1';
	
	public $removeSpansWithoutAttributes = true;

	function initialize(&$Controller) { 
		
        //the next few lines allow the config settings to be cached 
        $config = HTMLPurifier_Config::createDefault(); 
        $config->set('HTML.DefinitionID', $this->definition_id); 
        $config->set('HTML.DefinitionRev', $this->definition_revision); 
        //levels describe how aggressive the Tidy module should be when cleaning up html 
        //four levels: none, light, medium, heavy 
        $config->set('HTML.TidyLevel', $this->tidy_level); 
        //check the top of your html file for the next two 
        $config->set('HTML.Doctype', $this->doctype); 
        $config->set('Core.Encoding', $this->encoding);
		$config->set('AutoFormat.RemoveSpansWithoutAttributes', $this->removeSpansWithoutAttributes);

		$config->set('Cache.SerializerPath', CACHE);
         
        //BritaComponent instance of controller is replaced by a htmlpurifier instance 
        $Controller->Brita =& new HTMLPurifier($config); 
        $Controller->set('Brita', $Controller->Brita); 

   } 
    
} 
?>