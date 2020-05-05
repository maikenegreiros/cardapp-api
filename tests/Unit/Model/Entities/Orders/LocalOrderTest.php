<?php
namespace Tests\Unit\Model\Entities\Orders;

use PHPUnit\Framework\TestCase;
use Model\Entities\Orders\LocalOrder;
use Model\Entities\Orders\Order;
use Model\Entities\Table;
use Model\Entities\Staff;
use Model\Entities\Client;
use Model\Entities\Items\Item;
use DateTime;

class LocalOrderTest extends TestCase {

    public function testOrderInstance()
    {
        $table = $this->createStub(Table::class);
        $staff = $this->createStub(Staff::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new LocalOrder($table, $staff, $datetime, $client);

        $this->assertTrue($order instanceof Order);
    }

    public function testAddItem()
    {
        $table = $this->createStub(Table::class);
        $staff = $this->createStub(Staff::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new LocalOrder($table, $staff, $datetime, $client);

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
        $table = $this->createStub(Table::class);
        $staff = $this->createStub(Staff::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new LocalOrder($table, $staff, $datetime, $client);

        $this->assertEquals($table, $order->getTable());
    }

    public function testGetStaff()
    {
        $table = $this->createStub(Table::class);
        $staff = $this->createStub(Staff::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new LocalOrder($table, $staff, $datetime, $client);

        $this->assertEquals($staff, $order->getStaff());
    }

    public function testGetOpenTime()
    {
        $table = $this->createStub(Table::class);
        $staff = $this->createStub(Staff::class);
        $client = $this->createStub(Client::class);
        $openTime = new DateTime;

        $order = new LocalOrder($table, $staff, $openTime, $client);

        $this->assertEquals(
            $openTime->format('Y-m-d H:i:s'),
            $order->getOpenTime()->format('Y-m-d H:i:s')
        );
    }

    public function testGetCloseTime()
    {
        $table = $this->createStub(Table::class);
        $staff = $this->createStub(Staff::class);
        $client = $this->createStub(Client::class);
        $openTime = new DateTime;

        $order = new LocalOrder($table, $staff, $openTime, $client);

        $closeTime = new DateTime;
        $order->setCloseTime($closeTime);

        $this->assertEquals(
            $closeTime->format('Y-m-d H:i:s'),
            $order->getCloseTime()->format('Y-m-d H:i:s')
        );
    }

    public function testGetClient()
    {
        $table = $this->createStub(Table::class);
        $staff = $this->createStub(Staff::class);
        $client = $this->createStub(Client::class);
        $datetime = new DateTime;

        $order = new LocalOrder($table, $staff, $datetime, $client);

        $this->assertEquals($client, $order->getClient());
    }

    public function testOptionalClient()
    {
        $table = $this->createStub(Table::class);
        $staff = $this->createStub(Staff::class);
        $datetime = new DateTime;

        $order = new LocalOrder($table, $staff, $datetime);

        $this->assertEquals(null, $order->getClient());
    }
}
