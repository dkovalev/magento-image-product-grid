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
 * Adminhtml observer
 *
 * @category   Kovalev
 * @package    Kovalev_Catalog
 * @subpackage Model
 * @author     Dmitry Kovalev <kovalev.dmitry.19@gmail.com>
 */
class Kovalev_Catalog_Model_Adminhtml_Observer
{
    /**
     * Add image column to grid
     *
     * @param Varien_Event_Observer $observer observer
     * @return void
     */
    public function addImageColumnToGrid(Varien_Event_Observer $observer)
    {
        $block = $observer->getBlock();
        if ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Grid) {
            $block->addColumnAfter('image', [
                'header'   => Mage::helper('kovalev_catalog')->__('Image'),
                'index'    => 'image',
                'align'    => 'center',
                'width'    => '100px',
                'filter'   => false,
                'renderer' => 'Kovalev_Catalog_Block_Adminhtml_Widget_Grid_Column_Renderer_Image'
            ], 'status');
        }
    }

    /**
     * Add image to collection
     *
     * @param Varien_Event_Observer $observer observer
     * @return void
     */
    public function addImageToCollection(Varien_Event_Observer $observer)
    {
        $collection = $observer->getCollection();
        $collection->addAttributeToSelect('image');
    }
}
