<?php
require_once __DIR__ . '/../vendor/autoload.php';


use Behavioral\Strategy\Context;
use Behavioral\Strategy\HashEncryptor;
use Behavioral\Strategy\Md5Encryptor;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    const TEXT = "ENCRYPT_ME";
    private Context $context;
    /**
     * @var mixed
     */
    private $encryptedData;

    protected function setUp(): void
    {
        $this->context = new Context(new HashEncryptor());
        $this->encryptedData = $this->context->encrypt(self::TEXT)[0];
    }

    public function testCanUseHashEncrypt()
    {
        [$data, $type] = $this->context->encrypt(self::TEXT);
        self::assertEquals($this->encryptedData, $data);
        self::assertEquals(HashEncryptor::TYPE, $type);
    }

    public function testCanUseMd5Encryption()
    {
        $this->context->setStrategy(new Md5Encryptor());
        [$data, $type] = $this->context->encrypt(self::TEXT);
        self::assertNotEquals($this->encryptedData , $data);
        self::assertEquals(Md5Encryptor::TYPE, $type);
    }



}