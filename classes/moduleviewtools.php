<?php

require_once('kernel/common/template.php');


class ModuleViewTools
{

	function ModuleViewTools($View, $PathName, $ModuleName, $isDefault=false)
   {
	$this->Name = isset($View['name'])?$View['name']:ucfirst($PathName);
	$this->PathName = $PathName;
	$this->ModuleName = $ModuleName;
	$this->isDefault = $isDefault;
	$this->View = $View;

	$this->ViewVariables=array();
   }

	function path($ResultPath=false){
	$Path = array( array(
		'url'=> ($ResultPath && $this->isCurrent()) ? false : $this->View['uri'],
		'text'=> ($ResultPath && $this->isDefault) ? ucfirst($this->module()->Name) : $this->Name)
	);
	      if(!$this->isDefault){
		$Path = array_merge($this->module()->defaultView(1)->path($ResultPath), $Path);
	   }
	return $Path;
   }

	function module(){
		return ModuleTools::instance(eZModule::findModule($this->ModuleName));
   }

	function isCurrent(){
	return $this->PathName == $Module = $this->module()->view()->PathName;
   }

	function template($TemplatePath, $Variables){
	$Template = templateInit();
	      foreach($Variables as $Name=>$Value){
		preg_match("/(\w*)\:*(\w*)/i", $Name, $VariableName);
		$Template->setVariable(strpos($Name,':')?$VariableName[2]:$Name, $Value, strpos($Name,':')?$VariableName[1]:'');
	   }
	return $Template->fetch($TemplatePath?$TemplatePath:'design:'.$this->ModuleName.'/'.$this->PathName.'.tpl');
   }

	function adminListLimit(){
	$LimitValues = array(10,10,25,50);
		return $LimitValues[eZPreferences::value('admin_list_limit')];
   }

	static function instance($Module, $Default=false){
	$ViewList = $Module->attribute('views');
	$UseView = $Default?$Module->Module['default_view']:$Module->currentView();
	return new ModuleViewTools($ViewList[$UseView], $UseView, $Module->Name, $Default);
   }

}


?>