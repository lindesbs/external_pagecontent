<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');


class PageExternalContent extends Frontend
{
	public function generate(Database_Result $objPage)
	{
	
		$strUrl = $objPage->externalcontent_url;
		
		$objRequest = new Request();
			$objRequest->send($strUrl);

			if ($objRequest->hasError())
			{
				echo "ERROR";
				die();
			}
	
	
			if (!$objPage->noSearch)
			{
				$this->import('Search');
			
				$arrData = array
				(
					'url' => $strUrl,
					'content' => $objRequest->response,
					'title' => (strlen($objPage->pageTitle) ? $objPage->pageTitle : $objPage->title),
					'protected' => ($objPage->protected ? '1' : ''),
					'groups' => $objPage->groups,
					'pid' => $objPage->id,
					'language' => $objPage->language
				);
				
				$this->Search->indexPage($arrData);
			}
			
			
			if ($objPage->externalcontent_output)
				echo $objRequest->response;
			
	}
}

?>