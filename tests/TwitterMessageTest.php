<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 21.09.17
 * Time: 22:33
 */
include __DIR__ . '/../src/feed/component/message/Message.php';
include __DIR__ . '/../src/feed/component/message/TwitterMessage.php';


use PHPUnit\Framework\TestCase;
use src\feed\component\message\TwitterMessage;

class TwitterMessageTest extends TestCase
{
    public function testSetAttributesFunction() {
        $message = new TwitterMessage();
        $message->setAttributes([
            'id' => 1,
            'text' => 2,
            'date' => 3,
        ]);
        $this->assertEquals(1, $message->getId());
        $this->assertEquals(2, $message->getText());
        $this->assertEquals(3, $message->getDate());

        $message = new TwitterMessage([
            'foo' => 1,
            'bar' => 2,
        ]);

        $this->assertEquals(null, $message->getId());
        $this->assertEquals(null, $message->getText());
        $this->assertEquals(null, $message->getDate());
        $this->assertEquals(null, $message->foo ?? null);
        $this->assertEquals(null, $message->bar ?? null);
    }
}