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
class Tx_Gallery_Controller_GalleryController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * galleryRepository
	 *
	 * @var Tx_Gallery_Domain_Repository_GalleryRepository
	 */
	protected $galleryRepository;

	/**
	 * injectGalleryRepository
	 *
	 * @param Tx_Gallery_Domain_Repository_GalleryRepository $galleryRepository
	 * @return void
	 */
	public function injectGalleryRepository(Tx_Gallery_Domain_Repository_GalleryRepository $galleryRepository) {
		$this->galleryRepository = $galleryRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$galleries = $this->galleryRepository->findAll();
		foreach($galleries as $key=>$gallery){
			$this->galleryRepository->findAlbumPhotos($gallery,6);
		}
		$this->view->assign('galleries', $galleries);
	}

	/**
	 * action detail
	 *
	 * @param Tx_Gallery_Domain_Model_Gallery $gallery
	 * @return void
	 */
	public function detailAction(Tx_Gallery_Domain_Model_Gallery $gallery = null) {
		if(is_null($gallery))
			$galleryId = ((int)$this->settings['singleGallery'] > 0) ? $this->settings['singleGallery'] : 0;

		if($galleryId > 0)
			$gallery = $this->galleryRepository->findByUid($galleryId);

		$this->galleryRepository->findAlbumPhotos($gallery, 6);
		$this->view->assign('gallery', $gallery);
	}

}