<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');


class PageExternal extends Controller
{
	public function myGetSearchablePages($arrPages) 
	{ 
		$this->import("Database");
		$time = time();
		$objPages = $this->Database->prepare("SELECT * FROM tl_page WHERE type='external_content_root' AND (start='' OR start<$time) AND (stop='' OR stop>$time) AND published=1 ORDER BY sorting")
								   ->execute();

		$domain = $this->Environment->base;
		
		
		while($objPages->next())
		{
			$strLanguage = $objPages->language;	
			$arrPages[] = $domain . $this->generateFrontendUrl($objPages->row(), null, $strLanguage);
		}
		

		return $arrPages; 
	} 
}