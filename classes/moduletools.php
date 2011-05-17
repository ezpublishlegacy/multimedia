<?php

class ModuleTools
{
	private $Modules = array();
	private $TemplateVariables = array();

	function ModuleTools($Module)
   {
	$this->Name = $Module->Module['name'];
	$this->Module = $Module;
	$this->ViewList = $Module->attribute('views');
	$this->LeftMenuPath = isset($Module->Module['left_menu'])?$Module->Module['left_menu']:'design:moduletools/menu.tpl';
   }

	function moduleURL(){
	$DefaultView = $this->defaultView();
		return $DefaultView['uri'];
   }

	function defaultView($asObject=false){
	      if($asObject){return ModuleViewTools::instance($this->Module,1);}
		return ModuleViewTools::instance($this->Module,1)->View;
	}

	function current($Option='module', $asObject=false){
	      switch($Option){
		case 'module':{
			return $this->Module;
		}
		case 'view':{
		      if($asObject){return ModuleViewTools::instance($this->Module);}
			return ModuleViewTools::instance($this->Module)->View;
		}
	   }
   }

	function view(){
		return $this->current('view',1);
   }

	function path($ResultPath=false, $ViewParam='script'){
		return $this->view()->path($ResultPath);
   }

	function result($Params){
	$this->setVariable('ModuleView',$this->current('view'));
	$Results = array(
		'content'=>$this->view()->template( isset($Params['templatepath'])?$Params['templatepath']:false, array_merge($this->TemplateVariables,$Params['variables']) ),
		'path'=>isset($Params['path'])?$Params['path']:$this->path(1)
	);
	   if(isset($Params['pagelayout'])){$Results = array_merge($Results, array('pagelayout'=>$Params['pagelayout']));}
	   if(isset($Params['content_info'])){$Results = array_merge($Results, array('content_info'=>$Params['content_info']));}
	   if($this->LeftMenuPath) {return array_merge($Results, array('left_menu'=>$this->LeftMenuPath));}
	return $Results;
   }

	function setVariable($var, $val, $namespace=false){
	$VariableKey = $namespace?$namespace.':'.$var:$var;
	      if(array_key_exists($VariableKey, $this->TemplateVariables)){
		array_push($this->TemplateVariables[$VariableKey],$val);
	   } else {
		$this->TemplateVariables = array_merge($this->TemplateVariables, array($VariableKey=>$val));
	   }
   }

	function moduleViewParameters($viewName=false){
		return $this->Module->parameters($viewName);
   }

	function createModule(){
	
   }

	static function instance($Module=false){
	      if($Module){
		return new ModuleTools($Module);
	   }
   }

	static function navigationPart($TopAdminMenu){
	return SiteUtils::configSetting("Topmenu_$TopAdminMenu",'NavigationPartIdentifier','menu.ini');
   }

	static function moduleList($alphaSort=false){
	$List = SiteUtils::configSetting('ModuleSettings','ModuleList','module.ini');
	   if($alphaSort) {sort($List);}
	return $List;
   }

	static function moduleFunction($FunctionName, $FunctionParameters){
	$ModuleFunction = new eZModuleFunctionInfo('moduletools');
	$ModuleFunction->loadDefinition();
		return $ModuleFunction->execute($FunctionName, $FunctionParameters);
   }

}

?>