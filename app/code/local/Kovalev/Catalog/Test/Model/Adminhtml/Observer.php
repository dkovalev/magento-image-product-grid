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
 * Adminhtml observer test case
 *
 * @category   Kovalev
 * @package    Kovalev_Catalog
 * @subpackage Test
 * @author     Dmitry Kovalev <kovalev.dmitry.19@gmail.com>
 */
class Kovalev_Catalog_Test_Model_Adminhtml_Observer extends EcomDev_PHPUnit_Test_Case
{
    /**
     * Test add image column to grid
     *
     * @return void
     */
    public function testAddImageColumnToGrid()
    {
        $block = $this->getBlockMock('adminhtml/catalog_product_grid', ['addColumnAfter']);
        $block->expects($this->once())->method('addColumnAfter')
            ->with($this->equalTo('image'), $this->equalTo([
                'header'   => 'Image',
                'index'    => 'image',
                'align'    => 'center',
                'width'    => '100px',
                'filter'   => false,
                'renderer' => 'Kovalev_Catalog_Block_Adminhtml_Widget_Grid_Column_Renderer_Image'
            ]), $this->equalTo('status'));
        $observer = new Varien_Event_Observer();
        $observer->setBlock($block);
        Mage::getModel('kovalev_catalog/adminhtml_observer')->addImageColumnToGrid($observer);
    }

    /**
     * Test add image to collection
     *
     * @return void
     */
    public function testAddImageToCollection()
    {
        $collection = $this->getResourceModelMock('catalog/product_collection', ['addAttributeToSelect']);
        $collection->expects($this->once())->method('addAttributeToSelect')
            ->with($this->equalTo('image'))->will($this->returnSelf());
        $observer = new Varien_Event_Observer();
        $observer->setCollection($collection);
        Mage::getModel('kovalev_catalog/adminhtml_observer')->addImageToCollection($observer);
    }
}
