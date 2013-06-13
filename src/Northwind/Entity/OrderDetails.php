<?php

namespace Northwind\Entity;


/**
 * Orders
 *
 * @Table(name="`order details`")
 * @Entity
 */
class OrderDetails
{

    /** @ManyToOne(targetEntity="order", inversedBy="orderid") */
    public $orderID;
    
    /** @ManyToOne(targetEntity="product", inversedBy="productid") */
    public $ProductID;
}
