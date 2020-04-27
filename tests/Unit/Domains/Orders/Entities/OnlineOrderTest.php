<?php
namespace Tests\Unit\Domains\Order\Entities;

use PHPUnit\Framework\TestCase;
use Domain\Orders\Entities\OnlineOrder;
use Domain\Orders\Entities\Order;
use Domain\Orders\ValueObjects\Name;
use Domain\Orders\ValueObjects\Address;
use Domain\Orders\ValueObjects\Destiny\Destiny;
use Domain\Orders\ValueObjects\Destiny\Delivery;
use Domain\Orders\ValueObjects\Requesters\Requester;
use Domain\Orders\ValueObjects\Requesters\OnlineClient;
use Domain\Orders\ValueObjects\Client;
use Domain\Orders\ValueObjects\Items\Collection as ItemsCollection;
use Domain\Orders\ValueObjects\Items\Item;
use DateTime;

class OnlineOrderTest extends TestCase {

    public function testOrderInstance()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        
        $destiny = $this->createStub(Delivery::class);
        $requester = $this->createStub(OnlineClient::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new OnlineOrder($destiny, $requester, $datetime, $client);

        $this->assertTrue($order instanceof Order);
    }

    public function testAddItem()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        
        $destiny = $this->createStub(Delivery::class);
        $requester = $this->createStub(OnlineClient::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new OnlineOrder($destiny, $requester, $datetime, $client);

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
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        
        $destiny = $this->createStub(Delivery::class);
        $requester = $this->createStub(OnlineClient::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new OnlineOrder($destiny, $requester, $datetime, $client);

        $this->assertEquals($destiny, $order->getDestiny());
    }

    public function testGetRequester()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        
        $destiny = $this->createStub(Delivery::class);
        $requester = $this->createStub(OnlineClient::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new OnlineOrder($destiny, $requester, $datetime, $client);

        $this->assertEquals($requester, $order->getRequester());
    }

    public function testGetDateTime()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        
        $destiny = $this->createStub(Delivery::class);
        $requester = $this->createStub(OnlineClient::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new OnlineOrder($destiny, $requester, $datetime, $client);

        $this->assertEquals(
            $datetime->format('Y-m-d H:i:s'),
            $order->getDateTime()->format('Y-m-d H:i:s')
        );
    }

    public function testGetClient()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        
        $destiny = $this->createStub(Delivery::class);
        $requester = $this->createStub(OnlineClient::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new OnlineOrder($destiny, $requester, $datetime, $client);

        $this->assertEquals($client, $order->getClient());
    }

    public function testRequiredClient()
    {
        $this->expectException(\ArgumentCountError::class);
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        
        $destiny = $this->createStub(Delivery::class);
        $requester = $this->createStub(OnlineClient::class);
        $datetime = new DateTime;

        $order = new OnlineOrder($destiny, $requester, $datetime);
    }
}
