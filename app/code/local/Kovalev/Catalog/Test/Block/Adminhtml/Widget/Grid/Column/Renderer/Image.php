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
 * Adminhtml column image renderer test case
 *
 * @category   Kovalev
 * @package    Kovalev_Catalog
 * @subpackage Test
 * @author     Dmitry Kovalev <kovalev.dmitry.19@gmail.com>
 */
class Kovalev_Catalog_Test_Block_Adminhtml_Widget_Grid_Column_Renderer_Image
    extends EcomDev_PHPUnit_Test_Case
{
    /**
     * Test renderer image column
     *
     * @return void
     */
    public function testRenderImageColumn()
    {
        $row = $this->getModelMock('catalog/product', ['getProductUrl', 'getImage']);
        $row->expects($this->once())->method('getProductUrl')
            ->will($this->returnValue('http://magento.local/product.html'));
        $row->expects($this->once())->method('getImage')
            ->will($this->returnValue('/product.jpg'));

        $block = new Kovalev_Catalog_Block_Adminhtml_Widget_Grid_Column_Renderer_Image;

        $this->assertEquals(
            "<a href='http://magento.local/product.html'>".
            "<img src='http://magento.local/media/catalog/product/product.jpg' width='100px'/></a>",
            $block->render($row));
    }
}
