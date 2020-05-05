<?php
namespace Tests\Unit\Model\Entities\Orders;

use PHPUnit\Framework\TestCase;
use Model\Entities\Orders\OnlineOrder;
use Model\Entities\Orders\Order;
use Model\Entities\Destiny;
use Model\Entities\Client;
use Model\Entities\Items\Item;
use DateTime;

class OnlineOrderTest extends TestCase {

    public function testOrderInstance()
    {
        $destiny = $this->createStub(Destiny::class);
        $client = $this->createStub(Client::class);
        $opentime = new DateTime;

        $order = new OnlineOrder($destiny, $opentime, $client);

        $this->assertTrue($order instanceof Order);
    }

    public function testAddItem()
    {
        $destiny = $this->createStub(Destiny::class);
        $client = $this->createStub(Client::class);
        $opentime = new DateTime;

        $order = new OnlineOrder($destiny, $opentime, $client);

        $item1 = $this->createStub(Item::class);
        $item2 = $this->createStub(Item::class);
        $order->addItem($item1);
        $order->addItem($item2);

        $items = $order->getItems();

        $this->assertEquals($item1, $items->getAll()[0]);
        $this->assertEquals(2, count($items->getAll()));
    }

    public function testGetDestiny()
    {
        $destiny = $this->createStub(Destiny::class);
        $client = $this->createStub(Client::class);
        $opentime = new DateTime;

        $order = new OnlineOrder($destiny, $opentime, $client);

        $this->assertEquals($destiny, $order->getDestiny());
    }


    public function testGetOpenTime()
    {
        $destiny = $this->createStub(Destiny::class);
        $client = $this->createStub(Client::class);
        $opentime = new DateTime;

        $order = new OnlineOrder($destiny, $opentime, $client);

        $this->assertEquals(
            $opentime->format('Y-m-d H:i:s'),
            $order->getOpenTime()->format('Y-m-d H:i:s')
        );
    }

    public function testGetCloseTime()
    {
        $destiny = $this->createStub(Destiny::class);
        $client = $this->createStub(Client::class);
        $opentime = new DateTime;

        $order = new OnlineOrder($destiny, $opentime, $client);

        $closetime = new DateTime;
        $order->setCloseTime($closetime);

        $this->assertEquals(
            $closetime->format('Y-m-d H:i:s'),
            $order->getCloseTime()->format('Y-m-d H:i:s')
        );
    }

    public function testGetClient()
    {
        $destiny = $this->createStub(Destiny::class);
        $client = $this->createStub(Client::class);
        $opentime = new DateTime;

        $order = new OnlineOrder($destiny, $opentime, $client);

        $this->assertEquals($client, $order->getClient());
    }

    public function testRequiredClient()
    {
        $this->expectException(\ArgumentCountError::class);

        $destiny = $this->createStub(Destiny::class);
        $opentime = new DateTime;

        $order = new OnlineOrder($destiny, $opentime);
    }
}
