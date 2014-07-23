<?php
//namespace AVROTROS\Slider\ViewHelpers;

/**
 * Fluid Viewhelper to get number of photos of a given gallery folder
 * Created at 13-12-2013
 * @author  Mark Zuurhout <mark.zuurhout@tros.nl>
 */

class Tx_Gallery_ViewHelpers_CountAlbumPhotosViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Count number of photos in a gallery album folder
	 *
	 * @param string $folder
	 * @return string
	 */
	public function render($folder){
		if(empty($folder))
			return '';

		$i = 0;
		if ($handle = opendir($folder)) {
			while (false !== ($file = readdir($handle))) {
				if(!in_array($file, array('.', '..', 'Thumbs.db')) && strpos($file, 'thumb-') === FALSE && !is_dir($folder.$file))
				$i++;
			}
		}
		$stringNumPhotos = ($i==1) ? '1 foto' : $i.' foto\'s';
		return $stringNumPhotos;
	}
}