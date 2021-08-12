<?php

namespace App;

/**
 * Helper Class to set and get Title, Description, Price, Discount paths
 * 
 * @author Marcel Zacharias
 */
class Company
{
	private String $titlePath;

	private String $descriptionPath;

	private String $pricePath;

	private String $discountPath;



	/**
	 * Get the value of titlePath
	 */
	public function getTitlePath()
	{
		return $this->titlePath;
	}

	/**
	 * Set the value of titlePath
	 *
	 * @return  self
	 */
	public function setTitlePath($titlePath)
	{
		$this->titlePath = $titlePath;

		return $this;
	}

	/**
	 * Get the value of descriptionPath
	 */
	public function getDescriptionPath()
	{
		return $this->descriptionPath;
	}

	/**
	 * Set the value of descriptionPath
	 *
	 * @return  self
	 */
	public function setDescriptionPath($descriptionPath)
	{
		$this->descriptionPath = $descriptionPath;

		return $this;
	}

	/**
	 * Get the value of pricePath
	 */
	public function getPricePath()
	{
		return $this->pricePath;
	}

	/**
	 * Set the value of pricePath
	 *
	 * @return  self
	 */
	public function setPricePath($pricePath)
	{
		$this->pricePath = $pricePath;

		return $this;
	}

	/**
	 * Get the value of discountPath
	 */
	public function getDiscountPath()
	{
		return $this->discountPath;
	}

	/**
	 * Set the value of discountPath
	 *
	 * @return  self
	 */
	public function setDiscountPath($discountPath)
	{
		$this->discountPath = $discountPath;

		return $this;
	}
}
