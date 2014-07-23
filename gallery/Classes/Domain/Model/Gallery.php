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
class Tx_Gallery_Domain_Model_Gallery extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Gallery title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Gallery description
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * Gallery folder
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $folder;

	/**
	 * Gallery album cover
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $albumCover;

	/**
	 * @var DateTime
	 */
	protected $datetime;

	/**
	 * Gallery sub albums
	 *
	 * @var \array
	 */
	protected $subAlbums;

	/**
	 * Gallery album photos
	 *
	 * @var \array
	 */
	protected $albumPhotos;

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the folder
	 *
	 * @return string $folder
	 */
	public function getFolder() {
		return $this->folder;
	}

	/**
	 * Sets the folder
	 *
	 * @param string $folder
	 * @return void
	 */
	public function setFolder($folder) {
		$this->folder = $folder;
	}

	/**
	 * Returns the album cover
	 *
	 * @return \string $albumCover
	 */
	public function getAlbumCover() {
		return $this->albumCover;
	}

	/**
	 * Sets the album cover
	 *
	 * @param \string $albumCover
	 * @return void
	 */
	public function setAlbumCover($albumCover) {
		$this->albumCover = $albumCover;
	}

	/**
	 * Get datetime
	 *
	 * @return DateTime
	 */
	public function getDatetime() {
		return $this->datetime;
	}

	/**
	 * Set date time
	 *
	 * @param DateTime $datetime datetime
	 * @return void
	 */
	public function setDatetime($datetime) {
		$this->datetime = $datetime;
	}

	/**
	 * Returns the sub albums of a gallery
	 *
	 * @return \array $subAlbums
	 */
	public function getSubAlbums() {
		return $this->subAlbums;
	}

	/**
	 * Sets the sub albums of a gallery
	 *
	 * @param \array $subAlbums
	 * @return void
	 */
	public function setSubAlbums($subAlbums) {
		$this->subAlbums = $subAlbums;
	}

	/**
	 * Returns the photos of a gallery or sub album
	 *
	 * @return \array $albumPhotos
	 */
	public function getAlbumPhotos() {
		return $this->albumPhotos;
	}

	/**
	 * Sets the photo albums of a gallery
	 *
	 * @param \array $albumPhotos
	 * @return void
	 */
	public function setAlbumPhotos($albumPhotos) {
		$this->albumPhotos = $albumPhotos;
	}
}
?>