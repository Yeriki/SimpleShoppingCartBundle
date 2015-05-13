<?php

/*
 * This file is part of the Yeriki SimpleShoppingCartBundle
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yeriki\SimpleShoppingCartBundle\Tests\Model;

use Money\Money,
    Money\Currency;

use Yeriki\SimpleShoppingCartBundle\Model\Product;

/**
 * ProductTest
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.3.0
 */
class ProductTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test price is null by default
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     */
    public function testPriceNullByDefault()
    {
        $product = new Product();

        $this->assertNull($product->getPrice());
    }

    /**
     * Test price
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @dataProvider priceProvider
     */
    public function testPrice($amount, $currency, $price)
    {
        $product = new Product();
        $product->setPrice(new Money($amount, new Currency($currency)));

        $this->assertEquals($price, $product->getPrice());
    }

    /**
     * Test createdAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     */
    public function testCreatedAt()
    {
        $product = new Product;
        $product->setCreatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $product->getCreatedAt()->format('Y-m-d H:i:s')
        );
    }

    /**
     * Test updatedAt
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     */
    public function testUpdatedAt()
    {
        $product = new Product;
        $product->setUpdatedAt(new \DateTime(
            '2015-04-04 12:00:00'
        ));

        $this->assertSame(
            '2015-04-04 12:00:00',
            $product->getUpdatedAt()->format('Y-m-d H:i:s')
        );
    }

    /**
     * Price provider
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return array
     */
    public static function priceProvider()
    {
        return array(
            array(
                1,
                'USD',
                new Money(1, new Currency('USD'))
            ),
            array(
                0,
                'USD',
                new Money(0, new Currency('USD'))
            ),
            array(
                -1000,
                'USD',
                new Money(-1000, new Currency('USD'))
            ),
        );
    }
}
