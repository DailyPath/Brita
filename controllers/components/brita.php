<?php  
App::import('Vendor', 'Brita.HTMLPurifier', array('file' => 'htmlpurifier' . DS . 'library' . DS . 'HTMLPurifier.auto.php'));

class BritaComponent extends Object { 

	// DPTODO (ben@dailypath.com): Move all of these into a config file to allow for use in a behavior as well
	public $Controller;
	
	public $definition_id = 'brita definitions';
	
	public $definition_revision = 1;
	
	public $tidy_level = 'medium';
	
	public $doctype = 'XHTML 1.0 Transitional';
	
	public $encoding = 'UTF-8';
	
	public $removeSpansWithoutAttributes = true;
	
	public $html_allowed = 'a[href],a,img[src],p,strong,em,h1,h2,h3,h4,h5,h6,hr,ul,ol,li';

	function initialize(&$Controller) { 
		
        //the next few lines allow the config settings to be cached 
        $config = HTMLPurifier_Config::createDefault(); 
        $config->set('HTML.DefinitionID', $this->definition_id); 
        $config->set('HTML.DefinitionRev', $this->definition_revision); 
        //levels describe how aggressive the Tidy module should be when cleaning up html 
        //four levels: none, light, medium, heavy 
        $config->set('HTML.TidyLevel', $this->tidy_level); 
		// HTML tags allowed
		$config->set('HTML.Allowed', $this->html_allowed);
		// Don't allow any CSS properties
		$config->set('CSS.AllowedProperties', NULL);
        //check the top of your html file for the next two 
        $config->set('HTML.Doctype', $this->doctype); 
        $config->set('Core.Encoding', $this->encoding);

		$config->set('Cache.SerializerPath', rtrim(CACHE, '/'));
		
		$config->set('AutoFormat.RemoveEmpty', true);
		$config->set('AutoFormat.RemoveEmpty.RemoveNbsp', true);
         
        //BritaComponent instance of controller is replaced by a htmlpurifier instance 
        $Controller->Brita =& new HTMLPurifier($config); 
        $Controller->set('Brita', $Controller->Brita); 

   } 
    
} 
?>