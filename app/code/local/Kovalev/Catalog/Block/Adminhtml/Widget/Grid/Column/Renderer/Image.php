<?php
/**
 * Kovalev extension for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade
 * the Kovalev Catalog module to newer versions in the future.
 * If you wish to customize the Kovalev Catalog module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Kovalev
 * @package    Kovalev_Catalog
 * @copyright  Copyright (C) 2015 
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml column image renderer
 *
 * @category   Kovalev
 * @package    Kovalev_Catalog
 * @subpackage Block
 * @author     Dmitry Kovalev <kovalev.dmitry.19@gmail.com>
 */
class Kovalev_Catalog_Block_Adminhtml_Widget_Grid_Column_Renderer_Image
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * Render
     *
     * @param Varien_Object $row row object
     * @return string
     */
    public function render(Varien_Object $row)
    {
        return "<a href='" . $row->getProductUrl() . "'><img src='" .
            $this->_getImageUrl($row) . "' width='100px'/></a>";
    }

    /**
     * Get image url
     *
     * @param Varien_Object $row row
     * @return string
     */
    private function _getImageUrl($row)
    {
        return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'catalog' .
            DS . 'product' . $row->getImage();
    }
}
