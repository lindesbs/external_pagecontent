<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');


$GLOBALS['TL_DCA']['tl_page']['palettes']['external_content_root'] =  '{title_legend},title,alias,type;{meta_legend},pageTitle,description;{areaExternalContent},externalcontent_url,externalcontent_output;{cache_legend:hide},includeCache;{search_legend},noSearch;{expert_legend:hide},language,sitemap,hide,guests;{publish_legend},published,start,stop';
$GLOBALS['TL_DCA']['tl_page']['list']['label']['label_callback']          = array('tl_page_externalcontent', 'addIcon');


$GLOBALS['TL_DCA']['tl_page']['fields']['externalcontent_output'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['externalcontent_output'],
			'exclude'                 => true,
			'inputType'               => 'checkbox'
		);
		
$GLOBALS['TL_DCA']['tl_page']['fields']['externalcontent_url'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['externalcontent_url'],
			'exclude'                 => true,
			'inputType'               => 'text',
			
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true)
		);
		
		
		
class tl_page_externalcontent extends tl_page
{

	public function addIcon($row, $label, DataContainer $dc=null, $imageAttribute='', $blnReturnImage=false, $blnProtected=false)
	{
		if ($row['type'] == 'external_content_root')
		{
			$image = 'system/modules/external_pagecontent/html/external_content_root.gif';
		
		
			if ($blnReturnImage)
			{
				
				return $this->generateImage($image, '', $imageAttribute);
			}
			
			return '<a href="contao/main.php?do=feRedirect&amp;page='.$row['id'].'" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['view']).'"' . (($dc->table != 'tl_page') ? ' class="tl_gray"' : '') . ' target="_blank">'.$this->generateImage($image, '', $imageAttribute).'</a> '.$label;
			
		}
		return parent::addIcon($row, $label, $dc, $imageAttribute, $blnReturnImage, $blnProtected);
	}
}