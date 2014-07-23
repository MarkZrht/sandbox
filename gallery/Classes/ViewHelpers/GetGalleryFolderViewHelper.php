<?php
//namespace AVROTROS\Slider\ViewHelpers;

/**
 * Fluid Viewhelper to get gallery folder from full path
 * Created at 13-03-2014
 * @author  Mark Zuurhout <mark.zuurhout@tros.nl>
 */

class Tx_Gallery_ViewHelpers_GetGalleryFolderViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Get gallery folder from full path
	 *
	 * @param string $path
	 * @return string
	 */
	public function render($path){
		if(empty($path))
			return '';
		return basename($path);
	}
}