<?php

class MyEncryption
{

    // create your own Public Key from https://travistidwell.com/jsencrypt/demo/

    public $publicKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCyLNbf8jtBlVTGjJZmiRzRhO1y
bGKlZpvaL5VbBFTJCKypyc7kpTtOuXRgCY+jYbZ4+OKHicvy9pE8qSqSzFOxXmGK
00gziT+8lc0fpk8SLFeE/H1RF+qjh1k4zmqmSRe576bcLGRAJW0NtSWS+/+VwQFy
yUjRM67OjCh4huRaGwIDAQAB
-----END PUBLIC KEY-----';

    public function encrypt($data)
    {
        if (openssl_public_encrypt($data, $encrypted, $this->publicKey))
            $data = base64_encode($encrypted);
        else
            throw new Exception('Unable to encrypt data.');
        return $data;
    }

}

$test = new MyEncryption();

$entityBody = file_get_contents('php://input');
$entityBodyJson = json_decode($entityBody, true);

$data = $entityBodyJson["data"];

header('Content-Type: application/json');
echo "{ \"response\":\"" . $test->encrypt($data) . "\"}";

?>