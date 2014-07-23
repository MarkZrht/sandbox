<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Mark Zuurhout <mark.zuurhout@avrotros.nl>, AVROTROS
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package gallery
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Gallery_Domain_Repository_GalleryRepository extends Tx_Extbase_Persistence_Repository {

	protected $defaultOrderings = array(
		'datetime' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING
	);

	/**
	 * Find album photos
	 *
	 * @param $gallery
	 * @param $limit
	 * @return array
	 */
	public function findAlbumPhotos($gallery, $limit = null){
		$folder = $gallery->getFolder();
		$photos = array();
		$i=0;
		if(is_dir($folder)){
			if($handle = opendir($folder)){
				while(($file = readdir($handle)) !== false){
					if(!in_array($file, array('.', '..', 'Thumbs.db')) && strpos($file, 'thumb-') === FALSE && !is_dir($folder.$file)){
						$photos[] = $file;
						$i++;
					}
				}
			}
		}

        // sort by natural order
        natsort($photos);

        // shorten array with given limit
        if(!empty($limit))
            $photos = array_slice($photos, 0, $limit);

		$gallery->setAlbumPhotos($photos);
	}
}
?>