<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Behavioral\Strategy\EncryptContext;
use Behavioral\Strategy\HashEncrypt;
use Behavioral\Strategy\Md5Encrypt;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    const TEXT = "ENCRYPT_ME";
    private \Behavioral\Strategy\EncryptContext $ecnryptContext;

    protected function setUp(): void
    {
        $this->ecnryptContext = new EncryptContext(new HashEncrypt());
        $this->encryptedData = $this->ecnryptContext->encrypt(self::TEXT)[0];
    }

    public function testCanUseHashEncrypt()
    {
        [$data, $type] = $this->ecnryptContext->encrypt(self::TEXT);
        self::assertEquals($this->encryptedData, $data);
        self::assertEquals(\Behavioral\Strategy\HashEncrypt::TYPE, $type);
    }

    public function testCanUseMd5Encryption()
    {
        $this->ecnryptContext->setStrategy(new Md5Encrypt());
        [$data, $type] = $this->ecnryptContext->encrypt(self::TEXT);
        self::assertNotEquals($this->encryptedData , $data);
        self::assertEquals(Md5Encrypt::TYPE, $type);
    }



}